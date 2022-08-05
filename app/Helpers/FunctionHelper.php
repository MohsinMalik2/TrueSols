<?php

use App\Jobs\AddAuditTrailRecordForCammp;
use App\Jobs\AddAuditTrailRecordForSimms;
use App\Models\CmsContent;
use App\Models\CorrectionalFacility;
use App\Models\CorrectionalFacilityCorrectionalOfficer;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerOrderTransaction;
use App\Models\DiscountDeal;
use App\Models\Document;
use App\Models\HelpTopicCategory;
use App\Models\HelpTopicContent;
use App\Models\Inmate;
use App\Models\InmateReply;
use App\Models\MassCommunication;
use App\Models\Module;
use App\Models\Order;
use App\Models\Photo;
use App\Models\State;
use App\Models\TextCardCategory;
use App\Models\TextCardImage;
use App\Models\Video;
use App\Notifications\InmateReplyReceivedNotification;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;
use Jenssegers\Agent\Agent;
use KubAT\PhpSimple\HtmlDomParser;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;
use Twilio\Rest\Client;

function utcToLocalDateTime($date, $timezone_offset_minutes){
    $timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);
    $date = new DateTime($date);
    $date->setTimeZone(new DateTimeZone($timezone_name));
    return $date->format('D, F d Y h:i:s A');
}

function createUniqueName(){
    return time() . uniqid(rand());
}

function calculatePhotoDimension($fileWidth, $fileHeight, $photoType = null)
{
    $requiredWidth = 592;
    $requiredHeight = 772;
    if ($photoType == PhotoType::COLORED_TEXT_PAGE ||$photoType == PhotoType::COLORED_ENVELOPE || $photoType == PhotoType::GRAYSCALE_ENVELOPE || $photoType == PhotoType::GRAYSCALE_TEXT_PAGE || $photoType == PhotoType::PHOTO_PDF || $photoType == PhotoType::DOODLE_4_KIDS) {
        $requiredWidth = 1224;
        $requiredHeight = 1584;
    }
    $widthRatio = $requiredWidth / $fileWidth;
    $heightRatio = $requiredHeight / $fileHeight;
    $ratio = $widthRatio;
    if ($heightRatio < $widthRatio) {
        $ratio = $heightRatio;
    }
    $newWidth = ceil($fileWidth * $ratio);
    $newHeight = ceil($fileHeight * $ratio);
    return [$newWidth, $newHeight];
}

function rotatePhoto($file){
    if ($file->width() > (1.25 * $file->height())) {
        $file->rotate(-90);
    }
    return $file;
}

function createPdf($fileName, $htmlForPdf, $overwrite = false)
{
    if(!$overwrite) {
        if ($pos = strrpos($fileName, '.')) {
            $name = substr($fileName, 0, $pos);
            $ext = substr($fileName, $pos);
        } else {
            $name = $fileName;
        }
        $fileName = str_replace(' ', '_', $fileName);
        $newPath = ORDER_PDF_FILE_PATH . $fileName;
        $newName = $fileName;
        $counter = 1;
            while (Storage::exists($newPath)) {
            $newName = $name . '_' . $counter . $ext;
            $newPath = ORDER_PDF_FILE_PATH . $newName;
            $counter++;
        }
        $fileName = $newName;
    }
    $snappy = App::make('snappy.pdf');
    Storage::put(ORDER_PDF_FILE_PATH .$fileName, $snappy->getOutputFromHtml($htmlForPdf));

    return $fileName;
}

function searchCustomerSelect2($request){
    $search = $request->keyword;
    $names = explode(' ', $search);
    if($search != ''){
        $customers = Customer::searchLike(['id', 'first_name','middle_name', 'last_name', 'email', 'phone_number', 'street_address', 'zip_code', 'city', 'state'], $search)
            ->active()
            ->verified()
            ->notSuspended()
            ->orderBy('created_at', 'desc')
            ->limit(100)
            ->get();
        $response = array();

        foreach ($customers as $customer) {
            if ($customer->profile_image == null){
                $avatar =' <div class="symbol symbol-50 symbol-light-primary" flex-shrink-0>
                                 <div class="symbol-label font-size-h5">'.$customer->initials.'</div>
                               </div>';
            } else{
                $avatar = '<div class="select2-result-repository__avatar">
                                    <img height="50px" width="50px" src="http://simms.localhost:8080/simms/media/users/100_1.jpg" />
                                </div>';
            }
            $response[] = array(
                "id" => $customer->id,
                "text" => $customer->full_name . ' ('. $customer->id .')',
                "email" => $customer->email,
                "avatar" => $avatar,
                "full_name" => $customer->full_name,
                "street_address" => $customer->street_address,
            );
        }
        return $response;
    } else {
        return null;
    }
}
function get_array_diff($oldData, $newData)
{
    $previousData = array();
    $changedData = array();
    foreach ($newData as $field => $updatedData)
    {
        if(isset($oldData[$field]))
        {
            $oldFieldData = $oldData[$field];
            if ($oldFieldData != $updatedData)
            {
                $previousData[$field] = $oldFieldData;
                $changedData[$field] = $updatedData;
                if(isset($newData['password']))
                {
                    $changedData['password'] = '******';
                    $previousData['password'] = '******';
                }
                if (isset($newData['state']))
                {
                    if($newData['state'] != $oldData['state']) {
                        if  (isset($newData['country'])) {
                            $newCountry = \App\Models\Country::where('id', $newData['country'])->pluck('name');
                            $oldCountry = \App\Models\Country::where('id', $oldData['country'])->pluck('name');
                            if ($newData['country'] == 234) {
                                $newState = State::where('id', $newData['state'])->pluck('full_name');
                                $changedData['state'] = $newState[0];
                                $changedData['country'] = $newCountry[0];
                                $previousData['country'] = $oldCountry[0];
                                if ($oldData['state'] == null) {
                                    $previousData['state'] = ' ';
                                } else {
                                    $previousState = State::where('id', $oldData['state'])->pluck('full_name');
                                    if (!$previousData) {
                                        $previousData['state'] = $previousState[0];
                                    }else{
                                        $previousData['state'] = $oldData['state'];
                                    }
                                }
                            }
                            else {
                                $changedData['state'] = $newData['state'];
                                $previousData['state'] = $oldData['state'];
                                $changedData['country'] = $newCountry[0];
                                $previousData['country'] = $oldCountry[0];
                            }
                        }
                        else {
                            $newState = State::where('name', $newData['state'])->pluck('full_name');
                            $changedData['state'] = $newState[0];
                            if ($oldData['state'] == null) {
                                $previousData['state'] = ' ';
                            } else {
                                $previousState = State::where('name', $oldData['state'])->pluck('full_name');
                                $previousData['state'] = $previousState[0];
                            }
                        }
                    }
                }
                if (isset($newData['moa_state'])) {
                    if ($newData['moa_state'] != $oldData['moa_state']) {
                        $newState = State::where('id', $newData['moa_state'])->pluck('full_name');
                        $changedData['money_order_address_state'] = $newState[0];
                        if ($oldData['moa_state'] == null) {
                            $previousData['money_order_address_state'] = ' ';
                        } else {
                            $previousState = State::where('id', $oldData['moa_state'])->pluck('full_name');
                            $previousData['money_order_address_state'] = $previousState[0];
                        }
                    }
                }
                if (isset($newData['jmo_state'])) {
                    if ($newData['jmo_state'] != $oldData['jmo_state']) {
                        $newState = State::where('id', $newData['jmo_state'])->pluck('full_name');
                        $changedData['jpay_money_order_state'] = $newState[0];
                        if ($oldData['jmo_state'] == null) {
                            $previousData['jpay_money_order_state'] = ' ';
                        } else {
                            $previousState = State::where('id', $oldData['jmo_state'])->pluck('full_name');
                            $previousData['jpay_money_order_state'] = $previousState[0];
                        }
                    }
                }
                if (isset($newData['fmo_state'])) {
                    if ($newData['fmo_state'] != $oldData['fmo_state']) {
                        $newState = State::where('id', $newData['fmo_state'])->pluck('full_name');
                        $changedData['federal_money_order_state'] = $newState[0];
                        if ($oldData['fmo_state'] == null) {
                            $previousData['federal_money_order_state'] = ' ';
                        } else {
                            $previousState = State::where('id', $oldData['fmo_state'])->pluck('full_name');
                            $previousData['federal_money_order_state'] = $previousState[0];
                        }
                    }
                }
                if (isset($newData['correctional_facility_id'])) {
                    if ($newData['correctional_facility_id'] != $oldData['correctional_facility_id']) {
                        $newFacility = CorrectionalFacility::where('id',$newData['correctional_facility_id'])->pluck('facility_name');
                        $changedData['correctional_facility_name'] = $newFacility[0];
                        $oldFacility = CorrectionalFacility::where('id',$oldData['correctional_facility_id'])->pluck('facility_name');
                        $previousData['correctional_facility_name'] = $oldFacility[0];
                    }
                }
                if (isset($newData['type']))
                {
                    if ($newData['type'] == 1){
                        $changedData['type'] = 'CAMMP Inquiry';
                    } else {
                        $changedData['type'] = 'General Inquiry';

                    }
                    if ($oldData['type'] == 1){
                        $previousData['type'] = 'CAMMP Inquiry';
                    } else {
                        $previousData['type'] = 'General Inquiry';

                    }
                }
                if ($previousData[$field] == '0')
                {
                    $previousData[$field] = 'No';
                }
                if ($previousData[$field] == '1')
                {
                    $previousData[$field] = 'Yes';
                }
                if ($changedData[$field] == '0')
                {
                    $changedData[$field] = 'No';
                }
                if ($changedData[$field] == '1')
                {
                    $changedData[$field] = 'Yes';
                }
            }
        }
    }
    unset(
        $changedData['correctional_facility_id'],
        $previousData['correctional_facility_id'],
        $changedData['fmo_state'],
        $previousData['fmo_state'],
        $changedData['jmo_state'],
        $previousData['jmo_state'],
        $changedData['moa_state'],
        $previousData['moa_state']
    );
//    dd($previousData, $changedData);
    return array($previousData, $changedData);
}

function getFormattedOrderType($type){
    if ($type == OrderType::TEXT_LETTER)
        return 'Text Letter';
    elseif($type == OrderType::TEXT_CARD)
        return 'TextCard';
    elseif($type == OrderType::DOODLE4KIDS)
        return 'Doodle4Kids';
    elseif($type == OrderType::PHYSICAL_MAIL_STANDARD)
        return 'Physical Mail';
    elseif($type == OrderType::PHYSICAL_MAIL_MASS_COMM)
        return 'Mass Communication';
    elseif($type == OrderType::DOCUMENT_STANDARD)
        return 'General Document';
    elseif($type == OrderType::DOCUMENT_MASS_COMM)
        return 'Mass Communication';
    elseif($type == OrderType::DOCUMENT_LEGAL)
        return 'Legal Mail';
}

function getFormattedCustomerRole($role){
    if ($role == CustomerRole::ORGANIZATION)
        return 'Organization & Educator';
    elseif($role == CustomerRole::ATTORNEY)
        return 'Attorney';
    elseif($role == CustomerRole::PUBLIC_OFFICIAL)
        return 'Public Official';
    elseif($role == CustomerRole::FRIEND_FAMILY)
        return 'Friend & Family';
}

function getFormattedPaymentType($type){
    if ($type == OrderPaymentType::CREDITS)
        return 'Credits';
    elseif($type == OrderPaymentType::CREDIT_CARD)
        return 'Credit Card';
    elseif($type == OrderPaymentType::ICS_ACCOUNT)
        return 'ICS Account';
    elseif($type == OrderPaymentType::CASH_BALANCE)
        return 'Cash Balance';
}

/**
 * Function to check how specific inmate has been added in the system
 */
function checkInmateAddType($type){
    if($type == AddedViaType::ROSTER_INGESTION)
        return 'Roster Ingestion';
    else if($type == AddedViaType::PHYSICAL_MAIL_PROCESSING)
        return 'Physical Mail Processing';
    else if($type == AddedViaType::CUSTOMER_REQUEST)
        return 'Customer Request';
    else if($type == AddedViaType::ADMIN)
        return 'Admin';
}

/**
 * Function to check category of a correctional facility
 */
function checkCategoryType($type){
    if($type == CorrectionalFacilityCategory::FEDERAL)
        return 'Federal';
    else if($type == CorrectionalFacilityCategory::STATE)
        return 'State';
    else if($type == CorrectionalFacilityCategory::COUNTY)
        return 'County';
}

function setActiveNavItem( $route, $class ) {
//    dd(Request::path());
    // if( is_array( $route ) ){
    //     return in_array(Request::path(), $route) ? $class : '';
    // }
    return Request::routeIs($route) ? $class : '';
}

function generateDimiUSerToken(){
    return Str::random(60);
}

function checkPassword($password){
    if (Hash::check($password, Auth::guard('admins')->user()->password)) {
        return true;
    } else {
        return  'Your password is incorrect. Please try again with correct password.';
    }
}

function getStorageUrl($filePath, $no_cache=false){
    if(config('filesystems.default') == 's3')
    {
        $headers = ($no_cache) ? ['ResponseCacheControl' => 'no-cache'] : [];
        return Storage::temporaryUrl($filePath, now()->addMinutes(30), $headers);
    }
    return Storage::url($filePath);
}

function getTextCardImagesPath($folderName){
    return asset(TEXT_CARD_IMAGES_PATH.$folderName);
}

function checkValidVideoFile($filePath)
{
    $ffprobe = FFMpeg\FFProbe::create();
    return true; //Todo: Returning hard-coded true value for now, replace with check on file size, container duration and codec type
    //    return $ffprobe->isValid($filePath);
}

function get_video_duration($filePath){
    $ffprobe = FFMpeg\FFProbe::create();
    return $ffprobe->format($filePath)->get('duration');
}

function generate_video_thumbnail($file){
    $ffmpeg = FFMpeg\FFMpeg::create();
    $video = $ffmpeg->open($file);
    return $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(0));
}

function convertWithFFMPEG($videoObj){
    $ffmpeg = FFMpeg\FFMpeg::create();
    $video = $ffmpeg->open(getStorageUrl(VIDEO_PATH . $videoObj->filename));
    $format = new FFMpeg\Format\Video\X264();

    $format->setAudioCodec('aac')
        ->setKiloBitrate(1000)
        ->setAudioChannels(2)
        ->setAudioKiloBitrate(256);
    $convertedPath = './storage/videos/converted/';
    if (!is_dir($convertedPath)) {
        mkdir($convertedPath, 0664, true);
    }
    $video->save($format, $convertedPath . $videoObj->filename);
    Storage::delete($videoObj->filename);
    return $videoObj;
}

function sort_by_datetime($obj1,$obj2) {
    $time1 = strtotime($obj1['created_at']) * 1000;
    $time2 = strtotime($obj2['created_at']) * 1000;
    if ($time1 == $time2) {
        return 0;
    }
    return ($time1 < $time2) ? 1 : -1;
}

function sendSMS($targetNumber, $message){
    if(app()->environment('production')) {
        $account_sid = config('app.twilio_account_sid');
        $auth_token =  config('app.twilio_auth_token');
        $twilio_from = config('app.twilio_from');

        try {
            $client = new Client($account_sid, $auth_token);
        } catch (\Twilio\Exceptions\ConfigurationException $e) {}

        try {
            $client->messages->create(
                $targetNumber,
                array(
                    'from' => $twilio_from,
                    'body' => $message
                )
            );
        } catch (\Twilio\Exceptions\TwilioException $e) {
            Log::info($e->getMessage());
        }
    } else {
        Log::info('Sent SMS to '. $targetNumber . ': ' . $message);
    }
}

//TODO: Improve generatePDF function
//function generatePDF($order)
//{
//    $inmate = $order->inmate->load('correctionalFacility', 'building', 'block', 'cell', 'bed');
//    $customer =$order->customer;
//    $textCardImage = null;
//    //Todo: delete redacted photos for complete mail rejection
////        if (!$inmate_id || ($inmate_id && $order->mass_comm_approval_status == 0)){
////            if ($order->approval_status == 0){
////                deleteRedactedPhotos($orderId);
////            }
////        }
//
////       get attached images
//    if($order->order_type == OrderType::PHYSICAL_MAIL_MASS_COMM){
//        $massComm = MassCommunication::where('id', $order->massCommunication()->id)->with('photos',function($q){
//            $q->orderBy('original_filename');
//        })->first();
//        $photos = $massComm->photos;
//    } else if($order->order_type == OrderType::PHYSICAL_MAIL_STANDARD){
//        $order->load(['photos' => function($q){
//            $q->orderBy('original_filename');
//        }]);
//        $photos = $order->photos;
//    } elseif($order->order_type == OrderType::DOCUMENT_MASS_COMM){
//        $massComm = MassCommunication::with('photos', 'documents.photos')->find($order->massCommunication()->id);
//        $photos = getDocumentPhotosPrintSequence($massComm);
//    } else if($order->order_type == OrderType::DOCUMENT_STANDARD || $order->order_type == OrderType::DOCUMENT_LEGAL){
//        $photos = getDocumentPhotosPrintSequence($order);
//    } else {
//        $order->load('photos', 'textCardImage');
//        $photos = $order->photos;
//    }
//
//    $textCardImage = null;
//    if($order->order_type == OrderType::TEXT_CARD)
//    {
//        $textCardImage = $order->textCardImage->getImageObject();
//        $textCardImage = $textCardImage->rotate(-90)->stream();
//    }
//
//    $coloredPhotos = $doodlePhotos = $coloredTextPagePhotos = $grayscaleTextPagePhotos = $coloredEnvelopePhotos = $grayscaleEnvelopePhotos = $pdfPhotos = $documentPhotos = [];
//    $html = '';
//    foreach ($photos as $row) {
//        $image = ($row->isRedacted()) ? Storage::get($row->redacted_filename) : Storage::get($row->filename);
//        $img = Image::make($image);
//        $originalImageWidth = $img->width();
//        $originalImageHeight = $img->height();
//        if ($originalImageWidth > (1.25 * $originalImageHeight)) {
//            $img->rotate(-90);
//            $tempWidth = $originalImageWidth;
//            $originalImageWidth = $originalImageHeight;
//            $originalImageHeight = $tempWidth;
//        }
//        $resizedImage = calculatePhotoDimension($originalImageWidth, $originalImageHeight, $row->sorting_order);
//        if ($order->order_type == OrderType::DOCUMENT_STANDARD || $order->order_type == OrderType::DOCUMENT_LEGAL || $order->order_type == OrderType::DOCUMENT_MASS_COMM){
//            if ($row->sorting_order == PhotoType::GRAYSCALE_TEXT_PAGE){
//                $img->greyscale();
//            }
//        }
//        $row['resized_image'] = $img->resize($resizedImage[0], $resizedImage[1], function ($constraint) {})->stream();
//
//        if ($order->order_type == OrderType::PHYSICAL_MAIL_MASS_COMM || $order->order_type == OrderType::PHYSICAL_MAIL_STANDARD) {
//            if ($row->sorting_order == PhotoType::COLORED_ENVELOPE) {
//                $coloredEnvelopePhotos[] = $row;
//            } else if ($row->sorting_order == PhotoType::GRAYSCALE_ENVELOPE) {
//                $grayscaleEnvelopePhotos[] = $row;
//            } else if ($row->sorting_order == PhotoType::COLORED_TEXT_PAGE) {
//                $coloredTextPagePhotos[] = $row;
//            } else if ($row->sorting_order == PhotoType::GRAYSCALE_TEXT_PAGE) {
//                $grayscaleTextPagePhotos[] = $row;
//            } else if ($row->sorting_order == PhotoType::COLORED_PHOTO) {
//                $coloredPhotos[] = $row;
//            } else {
//                $pdfPhotos[] = $row;
//            }
//        }
//        else if ($order->order_type == OrderType::DOCUMENT_STANDARD || $order->order_type == OrderType::DOCUMENT_LEGAL || $order->order_type == OrderType::DOCUMENT_MASS_COMM) {
//            $documentPhotos[] = $row;
//        }
//        elseif($order->order_type == OrderType::DOODLE4KIDS)
//        {
//            $doodlePhotos[] = $row;
//        }
//        elseif ($order->order_type == OrderType::TEXT_CARD || $order->order_type == OrderType::TEXT_LETTER){
//            $coloredPhotos[] = $row;
//        }
//    }
//    if($order->order_type == OrderType::PHYSICAL_MAIL_MASS_COMM || $order->order_type == OrderType::DOCUMENT_MASS_COMM ){
//        $totalPdfPages = $order->massCommunications()->first()->calculatePdfPages();
//    } else {
//        $totalPdfPages = $order->calculatePdfPages();
//    }
//    if ($order->order_type == OrderType::PHYSICAL_MAIL_MASS_COMM || $order->order_type == OrderType::PHYSICAL_MAIL_STANDARD) {
//        $html = view('pdf_template.index', compact('coloredEnvelopePhotos', 'grayscaleEnvelopePhotos', 'coloredTextPagePhotos', 'grayscaleTextPagePhotos', 'coloredPhotos', 'pdfPhotos', 'photos', 'order', 'inmate', 'customer', 'totalPdfPages'))->render();
//    } else if ($order->order_type == OrderType::DOCUMENT_STANDARD || $order->order_type == OrderType::DOCUMENT_LEGAL || $order->order_type == OrderType::DOCUMENT_MASS_COMM ) {
//        $html = view('pdf_template.index', compact('documentPhotos', 'photos', 'order', 'inmate', 'customer', 'totalPdfPages', 'coloredPhotos'))->render();
//    } elseif ($order->order_type == OrderType::TEXT_CARD || $order->order_type == OrderType::TEXT_LETTER || $order->order_type == OrderType::DOODLE4KIDS) {
//        $html = view('pdf_template.index', compact('photos', 'order', 'inmate', 'customer', 'textCardImage', 'doodlePhotos', 'coloredPhotos', 'totalPdfPages'))->render();
//    }
//
////    return $html;
//
//    if ($order->pdf_filename){
//        $fileArr = explode(DIRECTORY_SEPARATOR, $order->pdf_filename);
//        $pdfFileName = createPdf(end($fileArr), $html, true);
//    } else {
//        $pdfFileName = $inmate->correctionalFacility->state->code . '_' . $inmate->correctionalFacility->pcode . '_' . $customer->id . '_' . $inmate->inmate_number . '_' . $order->id . '_' . date('mdy') . '.pdf';
//        $pdfFileName = createPdf($pdfFileName, $html);
//    }
//    return $pdfFileName;
//}

function getDocumentPhotosPrintSequence($obj){
    $photos = array();
    if ($obj->print_sequence) {
        foreach ($obj->print_sequence as $print_sequence) {
            if ($print_sequence['type'] == DocumentType::IMAGE) {
                $photos[] = $obj->photos->find($print_sequence['id']);
            } else {
                $documentPdfPhotos = array();
                foreach ($obj->documents as $document) {
                    $tempDocument = $document->find($print_sequence['id']);
                    $documentPdfPhotos = $tempDocument->photos;
                }
                $collection = collect($photos);
                $photos = $collection->merge($documentPdfPhotos);
            }
        }
    } else {
        $photos = $obj->photos;
        $documentPdfPhotos = array();
        foreach ($obj->documents as $document) {
            $documentPdfPhotos = $document->photos;
        }
        $collection = collect($photos);
        $photos = $collection->merge($documentPdfPhotos);
    }
    return $photos;
}

function synchronizeTextCards()
{
    DB::beginTransaction();

    $totalNewCount = 0;

    $textCardImageFolders = [
        'Birthday' => 'Birthday',
        'Christmas' => 'Christmas',
        'Condolence' => 'Condolence',
        'Easter' => 'Easter',
        'Encouragement' => 'Encouragement',
        'Family' => 'Family',
        'Fathers Day' => 'FathersDay',
        'Forgiveness' => 'Forgiveness',
        'Freedom' => 'Freedom',
        'Halloween' => 'Halloween',
        'Inspirational' => 'Inspirational',
        'Just Because' => 'JustBecause',
        'Kids' => 'Kids',
        'Kwanza' => 'Kwanza',
        'LGBTQ' => 'LGBTQ',
        'Love Behind Bars' => 'LoveBehindBars',
        'Memorial Day' => 'MemorialDay',
        'Mothers Day' => 'MothersDay',
        'Spiritual' => 'Spiritual',
        'Thanksgiving' => 'Thanksgiving',
        'Valentine\'s Day' => 'Valentines',
        'Veterans Day' => 'Veterans',
        'Wedding Anniversary' => 'Wedding-Ann',
    ];

    foreach($textCardImageFolders as $key => $row)
    {
        if (file_exists('thumbnail')) {
            rmdir('thumbanil');
        }
        $textCardCategory = TextCardCategory::where('name', '=', $key)->first();
        if(empty($textCardCategory))    //category does not exist in DB, create it
        {
            $newCategory = [
                'name' => $key,
                'folder_name' => $row,
            ];

            if ($textCardCategory = TextCardCategory::create($newCategory)) {
                echo 'Added category: ' . $key . "\n";
            } else {
                echo 'There was an error adding the category: ' . $key . "\n";
                DB::rollBack();
                exit;
            }

        }

        $textCardImagesPath = public_path('images/textcards/' . $row);

        if ($textCardImages = scandir($textCardImagesPath)) {

//            if (!file_exists($textCardImagesPath.'/thumbnail/')) {
//                mkdir($textCardImagesPath.'/thumbnail/', 0775);
//            }
            foreach ($textCardImages as $index => $image)
            {
                $imageFileName = $image;
                $imageFilePath = 'images/textcards/' . $row  . '/' . $imageFileName;
                if (preg_match('=^[^/?*;:{}\\\\]+\.[^/?*;:{}\\\\]+$=', $imageFileName)) {
//                    $imageThumbnail = Image::make(file_get_contents(public_path($imageFilePath)))->resize(null, 200, function ($constraint) {
//                        $constraint->aspectRatio();
//                        $constraint->upsize();
//                    });
//                    $imageThumbnail->save($textCardImagesPath  . '/thumbnail/' . $imageFileName);

                    $textCardImage = TextCardImage::where('filename', $row)->get();
                    if ($textCardImage->isEmpty())   //Category does not exist, create it
                    {
                        $newTextCardImage = new TextCardImage();
                        $newTextCardImage->text_card_category_id = $textCardCategory->id;
                        $newTextCardImage->filename = $imageFileName;
//                        $newTextCardImage->thumbnail = $imageFileName;
                        $newTextCardImage->save();
                        $totalNewCount++;
                        echo $totalNewCount . ": +++ Added TextCard Image File '" . $imageFileName . "' for category ". $textCardCategory->name . ".\n";
                    }
                    else
                    {
                        echo "TextCard Image File '" . $imageFileName . "' already exists. Skipping.\n";
                    }
                }
            }
        }
    }
    DB::commit();
    echo 'Total new card images added: ' . $totalNewCount . "\n";
}

/**
 * Function to return date validation rules
 */
function dateRule() {
    return [
        'start_date' => 'bail | nullable | date',
        'end_date'   => 'bail | nullable | date | after_or_equal:start_date',
    ];
}

/**
 * Function to return date validation messages
 */
function dateMessages() {
    return [
        'start_date.date'         => 'Please enter a valid start date.',
        'end_date.date'           => 'Please enter a valid end date.',
        'end_date.after_or_equal' => 'End date should be greater than or equal to start date.'
    ];
}

function formatAsAmount($amount){
    return number_format($amount, 2, '.', '');
}

function getDimiCMSContent($key){
   return CmsContent::dimiCMSContent()->findByKey($key)->value('content');
}

function getCustomerCMSContent($key){
    return CmsContent::customerCMSContent()->findByKey($key)->value('content');
}

function getCammpCMSContent($key){
    return CmsContent::cammpCMSContent()->findByKey($key)->value('content');
}

function getCorporateCMSContent($key){
    return CmsContent::corporateCMSContent()->findByKey($key)->value('content');
}

function getSimmsCMSContent($key){
    return CmsContent::simmsCMSContent()->findByKey($key)->value('content');
}

function verifyRecaptchaV3($token, $ip_address)
{
    $flag = false;
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $remoteip = $ip_address;
    $data = [
            'secret' => config('services.recaptcha.secretkey'),
            'response' => $token,
            'remoteip' => $remoteip
        ];
    $options = [
            'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
            ]
        ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $resultJson = json_decode($result);
    if ($resultJson->success && ($resultJson->score >= 0.4))
        $flag = true;
    return $flag;
}

function stripXFromCreditCardNumber($card_number)
{
    return str_replace('X', '', $card_number);
}

/**
 * Function to get difference between previous and new data, update data in database and dispatch job for changed data
 * 1. Get new info as collection
 * 2. For each key and value in previous data:
 * 2.a. If new info has the key and value is same as previous data:
 * 2.a.1. If key is module id or help topic id then get their respective names for previous and new values
 * 2.a.2. If key is is_featured or is_active and its value is null then replace it with 0
 * 2.a.3. If key is expire_at then change its format to human readable form
 * 2.b. Push previous value and value of new info into respective arrays
 * 3. Dispatch job with info (if any), old and new data
 * @param $previousData, $changedData
 * @return JsonResponse
 */
function getDataDifference($previousData, $changedData) {
    $newInfo = collect($changedData->all());
    $oldData = $newData = [];
    foreach($previousData->toArray() as $key => $value){
        if($newInfo->has($key) && $newInfo[$key] != $value) {
            if($key == 'module_id') {
                $value = $previousData->module->name;
                $newInfo[$key] = Module::where('id',$newInfo[$key])->value('name');
            }
            if($key == 'help_topic_category_id') {
                $value = $previousData->category->name;
                $newInfo[$key] = HelpTopicCategory::where('id',$newInfo[$key])->value('name');
            }
            if($key == 'category') {
                $value = checkCategoryType($previousData->category);
                $newInfo[$key] = checkCategoryType($newInfo[$key]);
            }
            if(($key == 'is_featured' || $key == 'is_active') || $key == 'use_printable_address' && $previousData[$key] == '') {
                $value = 0;
            }
            if($key == 'expire_at' || $key == 'created_at') {
                $value = date('D, M d, Y',strtotime($value));
                $newInfo[$key] = date('D, M d, Y',strtotime($newInfo[$key]));
            }
            if($key == 'country_id'){
                $value = $previousData->country->name;
                $newInfo[$key] = Country::where('id',$newInfo[$key])->value('name');
            }
            if($key == 'state_id' || $key == 'printable_state_id'){
                $value = $previousData->state->name;
                $newInfo[$key] = State::where('id',$newInfo[$key])->value('name');
            }
            if($key == 'correctional_facility_id') {
                $value = $previousData->correctionalFacility->name;
                $newInfo[$key] = CorrectionalFacility::where('id', $newInfo[$key])->value('name');
            }
            if($key == 'role') {
                $newInfo[$key] = getFormattedCustomerRole($newInfo[$key]);
                unset($previousData[$key]);
            }
            if($key == 'phone_number' && $newInfo->has('full_phone')) {
                $newInfo[$key] = $newInfo['full_phone'];
            }
            if($key == 'password'){
                $value = 'N/A';
                $newInfo[$key] = 'N/A';
            }
            $oldData[$key] = $value;
            $newData[$key] = $newInfo[$key];
        }
    }
    $detail = [
        'old_data'  => $oldData,
        'new_data'  => $newData
    ];
    if(isset($previousData['name']) && $previousData['name'] == $newInfo['name'])
        $detail['data']['Name'] = $previousData['name'];
    else if(isset($previousData['title']) && $previousData['title'] == $newInfo['title'])
        $detail['data']['Title'] = $previousData['title'];
    else if(isset($previousData['first_name']))
        $detail['data']['Name'] = $previousData['first_name'] . ' ' . $previousData['middle_name'] . ' ' . $previousData['last_name'];
    else if(isset($previousData['correctional_facility_id']) && $previousData['correctional_facility_id'] == $newInfo['correctional_facility_id'])
        $detail['data']['Correctional Facility'] = CorrectionalFacility::where('id',$previousData['correctional_facility_id'])->value('name');
    else if(isset($previousData['key']) && $previousData['key'] == $newInfo['key'])
        $detail['data']['Key'] = $previousData['key'];

    return $detail;
}

/**
 * Function to log action for exporting data in table
 */
function logExportActionforSimms($modelName) {
    $detail['data'] = [
        'Message'   => 'Data Exported'
    ];
    AddAuditTrailRecordForSimms::dispatch('Data for ' . $modelName . ' Exported', $detail, getIpAddress(), auth('admins')->user());
}

function logExportActionForCAMMP($modelName) {
    $detail['data'] = [
        'Message'   => 'Data Exported'
    ];
    AddAuditTrailRecordForCammp::dispatch('Data for ' . $modelName . ' Exported', $detail, getIpAddress(), auth('correctional_officers')->user());
}

/** Function to dispatch job for SIMMS audit trail of updated data */
function dispatchJobForSimms($modelName, $detail){
    AddAuditTrailRecordForSimms::dispatch($modelName . ' Updated', $detail, getIpAddress(), auth('admins')->user());
}

/** Function to dispatch job for CAMMP audit trail of updated data */
function dispatchJobForCammp($modelName, $detail){
    AddAuditTrailRecordForCammp::dispatch($modelName . ' Updated', $detail, getIpAddress(), auth('correctional_officers')->user());
}

function replaceRedactedContent($message)
{
    if ($message) {
        foreach (HTMLDomParser::str_get_html($message)->find('span.redacted-block,u.redactedBlock') as $element) {
            $arr = explode(' ', $element->plaintext);
            $encrypt = array();
            foreach ($arr as $item) {
                $encrypt[] = str_repeat('x', strlen($item));
            }
            $str = implode(' ', $encrypt);
            $message = str_replace('<span class="redacted-block">' . $element->innertext . '</span>', '<span class="redacted-block">' . $str . '</span>', $message);
            $message = str_replace('<u class="redactedBlock">' . $element->innertext . '</u>', '<span class="redacted-block">' . $str . '</span>', $message);
        }
    }
    return $message;
}

function countTextCardCategoryImages($categoryId)
{
    return TextCardImage::where('text_Card_Category_id', $categoryId)->count();
}

function inlineCSSinHTML($html, $css)
{
    $cssToInlineStyles = new CssToInlineStyles(); // create instance of css inliner
    $html = "<div>" . $html . "</div>";
    $html = $cssToInlineStyles->convert($html, $css);
    $doc = new DOMDocument();
    $doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
    $container = $doc->getElementsByTagName('div')->item(0);
    $container = $container->parentNode->removeChild($container);
    while ($doc->firstChild) {
        $doc->removeChild($doc->firstChild);
    }
    while ($container->firstChild ) {
        $doc->appendChild($container->firstChild);
    }
    return trim($doc->saveHTML());
}

function calculateRefundableAmount($customerDiscountDealTransaction){
    $totalCredits = $customerDiscountDealTransaction->discountDeal->credits;
    $totalAmount = $customerDiscountDealTransaction->total_amount;
    $remainingCredits = $customerDiscountDealTransaction->customerDiscountDeal->remaining_credits;
    return number_format(($remainingCredits / $totalCredits) * $totalAmount, '2');
}


function clearOutputBuffer(){
    ob_end_clean();
    ob_start();
}

function downloadExcel($excel, $filename)
{
    clearOutputBuffer();
    return Excel::download($excel, $filename);
}

/**
 * Function to remove JS script tags from content
 * 1. Create DOMDocument object
 * 2. Load content as html with "LIBXML_HTML_NODEFDTD" flag to prevent DOCTYPE that is appended by DOMDocument
 * 3. get script element
 * 4. For each script element:
 * 4.a. Prepare array for the element to be removed
 * 5. For each element in prepared array:
 * 5.a. Remove the whole script tag and everything inside it
 * 6. Replace html and body tags that are appended by DOMDocument and save HTML
 * @param $content
 * @return string $html
 */
function sanitizeHtmlContent($content) {
    $doc = new DOMDocument();
    $doc->loadHTML(mb_convert_encoding($content,'HTML-ENTITIES','UTF-8'),LIBXML_HTML_NODEFDTD); //LIBXML_HTML_NOIMPLIED |
    $script = $doc->getElementsByTagName('script');
    $remove = [];
    foreach($script as $item) {
        $remove[] = $item;
    }
    foreach ($remove as $item) {
        $item->parentNode->removeChild($item);
    }
    $html = str_replace(array('<html>','</html>','<body>','</body>'),'', $doc->saveHTML($doc->documentElement));
    return $html;
}

/**
 * Function to remove unwanted characters from search words.
 * 1. Replace any underscores in string with '\_' to escape LIKE operator wildcards.
 * 2. Split the string based on white spaces.
 * 3. Filter out null characters except '0'.
 * 4. Pick values from filtered array of words.
 * @param $searchTerms
 * @return array
 */
function splitSearchTerms($searchTerms) {
    return array_values(array_filter(explode(' ', str_replace('_','\_',$searchTerms)),
        function($value) {
            return ($value !== null && $value !== false && $value !== '');
        }));
}

function br2nl( $input ) {
    return preg_replace('/<br\s?\/?>/ius', "\n", str_replace("\n","",str_replace("\r","", htmlspecialchars_decode($input))));
}

function storage_get_video($file)
{
    if(config('app.env') == 'local')
        return asset(Storage::disk(config('app.video_storage_provider'))->url(VIDEO_PATH . $file));
    else
        return generatePreSignedVideoURL($file);
}

function storage_get_video_thumbnail($file)
{
    if(config('app.env') == 'local')
        return asset(Storage::disk(config('app.video_storage_provider'))->url(VIDEO_THUMBNAIL_PATH . $file));
    else
        return generateVideoThumbnailURL($file);
}

function generatePreSignedVideoURL($file)
{
    $s3Client = new Aws\S3\S3Client([
        'region' => config('filesystems.disks.s3.region'),
        'version' => 'latest',
    ]);

    $cmd = $s3Client->getCommand('GetObject', [
        'Bucket' => config('filesystems.disks.s3.bucket'),
        'Key' => CONVERTED_VIDEO_PATH . $file
    ]);

    $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

    $presignedUrl = (string)$request->getUri();

    return $presignedUrl;
}

function generateVideoThumbnailURL($file)
{
    $s3Client = new Aws\S3\S3Client([
        'region' => config('filesystems.disks.s3.region'),
        'version' => 'latest',
    ]);

    $cmd = $s3Client->getCommand('GetObject', [
        'Bucket' => config('filesystems.disks.s3.bucket'),
        'Key' => VIDEO_THUMBNAIL_PATH . $file
    ]);

    $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

    $presignedUrl = (string)$request->getUri();

    return $presignedUrl;
}

/**
 * Function to highlight auto content discovery keywords in a text message
 * 1. Split message into an array of words
 * 2. For each message word:
 * 2.a. Add message word into message array
 * 2.b. For each keyword:
 * 2.b.1. Get position of keyword in message word
 * 2.b.2. If keyword is present in message word:
 * 2.b.2.1. Remove message from message array
 * 2.b.2.2. Split message word into three parts i-e 1) part before ACD word 2) highlighted ACD word 3) part after ACD word
 * 2.b.2.3. Merge back the three parts of message word as highlighted word
 * 2.b.2.4. Add highlighted word to message array
 * 3. Merge message array as string
 * @param $autoContentDiscoveryData, $originalMessage, $style
 * @return string $message
 */
function applyAutoContentDiscovery($autoContentDiscoveryData, $originalMessage, $style) {
    $originalMessage = explode(' ', $originalMessage);
    $message = array();
    foreach ($originalMessage as $word) {
        $message[] = $word;
        foreach ($autoContentDiscoveryData as $row) {
            $keywordPos = stripos($word, $row->keyword);
            if ($keywordPos !== false) {
                array_pop($message);
                $keywordLength = strlen($row->keyword);
                $wordLength = strlen($word);
                $wordKeywordLength = $keywordPos + strlen($row->keyword);

                $partOne = substr($word, 0, $keywordPos);
                $partTwo = '<em class="mail-review-tooltip" style="'.$style.'">' . substr($word, $keywordPos, $keywordLength) . '</em>';
                $partThree = substr($word, $wordKeywordLength, $wordLength);

                $highlight = $partOne . $partTwo . $partThree;
                $message[] = $highlight;
            }
        }
    }
    return implode(' ', $message);
}

/**
 * Function to print five correctional facilities of correctional officer with see more button in side menu
 * 1. For each correcitonal facility:
 * 2. If facility counter is equal to 5:
 * 2.a. Add "Show More" anchor tag to open modal for remaining correctional facilities
 * 2.b. Exit step 1
 * 3. Add a span with correctional facility name
 * 4. Increment facility counter
 * @return String $correctionalFacilitiesSpan
 */
function printCorrectionalOfficerFacilities() {
    $facilityCount = 0;
    $correctionalFacilitiesSpan = "";
    foreach(auth('correctional_officers')->user()->correctionalFacilities as $correctionalFacility){
        if($facilityCount == 5){
            $correctionalFacilitiesSpan .= "<br>
            <a onclick='initCorrectionalFacilitiesListModal()' href='javascript:void(0);'>Show More...</a>";
            break;
        }
        $correctionalFacilitiesSpan .= " <span class='label font-weight-bold label-lg  bg-txb-orange text-white label-inline mb-2'>" . $correctionalFacility->name . ', ' . $correctionalFacility->state->code ."</span>";
        $facilityCount++;
    }
    return $correctionalFacilitiesSpan;
}

/**
 * Function to get IP address of user
 */
function getIpAddress() {
    return Request::ip();
}

function trimCorrectionalFacilitiesName(){
    $correctionalFacilities = CorrectionalFacility::all();
    foreach ($correctionalFacilities as $correctionalFacility){
        $correctionalFacility->update([
            'name' => trim($correctionalFacility->name),
        ]);
    }
}

function getInmateStatusBadge($inmate) {
    $status = $inmate->released_at ? 'label-danger' : 'label-success';
    $tooltipTitle = $inmate->released_at ? 'Inmate not in custody' : 'Inmate in custody';
    return  '<span>' . $inmate->full_name . '</span>' . '<span data-toggle="tooltip" title="'. $tooltipTitle .'" class="label label-lg label-dot '. $status .' ml-2"></span>';
}

/**
 * Function to get metadata of customer device
 */
function getDeviceMetadata() {
    $agent = new Agent();
    $metadata = [
        "OS Type"       => $agent->platform(),
        "Browser Type"  => $agent->browser(),
        "Device Type"   => $agent->device()
    ];
    return $metadata;
}

/** --------------------------------------------------------------------------**/
/** ------------------- ONE TIME CODE TO SEED SORTING ORDER ------------------**/
/** ---------------------- HELP TOPICS + DISCOUNT DEALS ----------------------**/
/** --------------------------------------------------------------------------**/

function addSortingOrderToExistingRecords() {
    $helpTopics = HelpTopicContent::all();
    $helpTopicIds = $helpTopics->pluck('id');

    foreach($helpTopicIds as $id) {
        HelpTopicContent::where('id', $id)->update(['sorting_order'=> $id]);
    }

    $discountDeals = DiscountDeal::all();
    $discountDealIds = $discountDeals->pluck('id');

    foreach($discountDealIds as $id) {
        DiscountDeal::where('id', $id)->update(['sorting_order'=> $id]);
    }
}

function checkInvoicePaymentType($invoice){
    $type = $invoice->payment_type == InvoicePaymentType::CASH ? "Cash" : ($invoice->payment_type == InvoicePaymentType::CHECK ? "Cheque": "Credit Card");
    return $type;
}

/** --------------------------------------------------------------------------**/
/** ------------------- ONE TIME CODE TO ADD INMATE REPLY TYPE ------------------**/
/** --------------------------------------------------------------------------**/
function updateCreatedUsingColumnInInmateReplies(){
    $inmateReplies = InmateReply::whereHas('textMessage')->where('created_using', 1)->with('textMessage')->get();
    foreach ($inmateReplies as $inmateReply){
        if($inmateReply->textMessage != null){
            $inmateReply->update([
                'created_using' => CreatedVia::DIMI_SYSTEM
            ]);
        }
    }
}

/** --------------------------------------------------------------------------**/
/** ---------------- ONE TIME CODE TO REMOVE DUPLICATE INMATES ---------------**/
/** --------------------------------------------------------------------------**/

function removeDuplicateInmates($display=true) {
    $inmates = Inmate::all();
    $duplicateIds = [];
    $duplicateInmates = [];
    foreach($inmates as $inmate){
        if(in_array($inmate->id,array_unique(Arr::flatten($duplicateIds)))){
            continue;
        }
        $duplicates = Inmate::where('inmate_number',$inmate->inmate_number)
        ->where('correctional_facility_id',$inmate->correctional_facility_id)
        ->orderBy('updated_at','desc')
        ->get();
        $duplicates = $duplicates->keyBy('id');

        if(count($duplicates) > 1){
            array_push($duplicateIds,$duplicates->pluck('id')->toArray());
            $duplicateInmates[] = [
                'ids'                   => implode(', ',$duplicates->pluck('id')->toArray()),
                'names'                 => implode(', ', $duplicates->pluck('full_name')->toArray()),
                'inmate_number'         => $inmate->inmate_number,
                'correctional_facility' => $inmate->correctionalFacility->name . " - " . $inmate->correctionalFacility->pcode
            ];

            $rosterInmate = $duplicates->where('added_via', AddedViaType::ROSTER_INGESTION)->first();

            if($rosterInmate)
            {
                $primaryInmate = $rosterInmate;
                $duplicates->forget($rosterInmate->id);
            }
            else
            {
                $primaryInmate = $duplicates->shift();
            }

            if($display == false){
                DB::beginTransaction();
                try {
                foreach($duplicates as $secondaryInmate){
                    Inmate::mergeInmates($secondaryInmate, $primaryInmate);
                }
                DB::commit();
                } catch (\Exception $e) {
                    DB::rollback();
                    return $e->getMessage();
                }
            }
        }
    }
    if($display != false){
        return $duplicateInmates;
    }
    return "Duplicate inmates have been merged successfully.";
}

/** ---------------------------------------------------------------------------**/
/** ----------- ONE TIME CODE TO REMOVE MARK LETTERS AS QA REVIEWED -----------**/
/** ---------------------------------------------------------------------------**/

function markLettersAsQaReviewed() {
    Order::query()->update(['qa_reviewed_at' => Carbon::now(), 'qa_reviewer_id' => 1]);
    return "All orders have been marked as QA Reviewed successfully.";
}


/* Utility function to restore system consistency
 * Searches for active, paid orders for which the PDF generation failed for some reason, and generates the PDF for them
 */
function generateMissingPDFs()
{
    $missingPDFOrders = Order::where('is_active', 1)
        ->whereNull('pdf_filename')
        ->whereDate('created_at', '>=', Carbon::now()->startOfYear())
        ->whereNotNull('reviewed_at')
        ->get();

    foreach($missingPDFOrders as $order)
    {
        echo "Generating PDF for Order ID: ". $order->id . "\r\n";
        $order->generatePDF();
    }
}

function removeSpacesFromString($string){
    if ($string){
        return preg_replace('/\s/', '', $string);
    }
}

/**
 * Custom Scripts to Restore Customer Transaction History Data for Customers
 * Whom It Was Not Recorded Due to Roster Ingestion.
 * One Time Script
 * Remove Once Run on Production
 */
function createCustomerOrderTransactions(){
    $orders = Order::wheredoesnthave('customerOrderTransaction')->get();
    $total = $orders->count();
    $i = 1;
    foreach ($orders as $order){
        if ($order->order_type == OrderType::PHYSICAL_MAIL_STANDARD){
            $orderSummary['line_items'] = [
                'name' => 'Physical Mail',
                'amount' => '0.00',
            ];
            $totalAmount = 0;
            $creditUsed = 0;
        } else {
            $orderSummary = $order->prepareOrderSummary();
            $totalAmount = $orderSummary['total_order_amount'];
            $creditUsed = $orderSummary['total_amount_in_credits'];
        }
        CustomerOrderTransaction::create([
            'customer_id' => $order->customer_id,
            'inmate_id' => $order->inmate_id,
            'order_id' => $order->id,
            'total_order_cost' => $totalAmount,
            'paid_via' => OrderPaymentType::CASH_BALANCE,
            'credit_used' => $creditUsed,
            'summary' => $orderSummary['line_items'],
            'credit_card_payment_id' => null,
            'customer_discount_deal_id' => null,
            'ics_payment_id' => null,
            'device_metadata'   => null
        ]);
        show_status($i, $total);
        $i++;
    }
    echo 'done';
    exit;
}

function getModerationReasonType($reason){
    if($reason->type == ModerationReasonType::CUSTOMER){
        $type = "Customer";
    }
    else if($reason->type == ModerationReasonType::INMATE){
        $type = "Inmate";
    }
    else {
        $type = "Quality Assurance";
    }
    return $type;
}
