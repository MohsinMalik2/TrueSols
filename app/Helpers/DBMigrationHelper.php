<?php

use App\Models\CorrectionalFacilityCorrectionalOfficer;
use App\Models\CorrectionalOfficerAuditTrail;
use App\Models\CorrectionalFacilityBuilding;
use App\Models\AutoContentDiscoveryKeyword;
use App\Models\CorrectionalFacilityBlock;
use App\Models\CorrectionalFacilityCell;
use App\Models\CustomerDiscountDealTransaction;
use App\Models\CustomerOrderTransaction;
use App\Models\CorrectionalFacilityBed;
use App\Models\CustomerGiftTransaction;
use App\Models\CustomerDiscountDeal;
use App\Models\CorrectionalFacility;
use App\Models\CorrectionalOfficer;
use App\Models\CreditCardPayment;
use App\Models\HelpTopicCategory;
use App\Models\IcsPayment;
use App\Models\MassCommunication;
use App\Models\HelpTopicContent;
use App\Models\ModerationReason;
use App\Models\AdminAuditTrail;
use App\Models\CustomerInmate;
use App\Models\InmateLinkage;
use App\Models\InvalidEmail;
use App\Models\InmateReply;
use App\Models\PmpClientCorrectionalFacility;
use App\Models\PmpInvoiceService;
use App\Models\Attachment;
use App\Models\PmpClient;
use App\Models\PmpInvoice;
use App\Models\Testimonial;
use App\Models\TextCardCategory;
use App\Models\TextCardImage;
use App\Models\TextMessage;
use App\Models\CmsContent;
use App\Models\QuickReply;
use App\Models\Customer;
use App\Models\Inquiry;
use App\Models\Country;
use App\Models\Inmate;
use App\Models\Order;
use App\Models\Photo;
use App\Models\State;
use App\Models\Video;
use App\Models\Admin;
use App\Models\Note;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

const OLD_DB_CONN = 'mysql_old';

//Notes:
// ALl the primary IDs from the original database are preserved, and become the new primary IDs for the
// new records in the new database.

function migrateOldSchemaToNewSchema()
{
    migrateTextCardImages();
    migrateTestimonials();
    migrateCMS();
    migrateQuickReplies();
    migrateCorrectionalFacilities();
    migrateCorrectionalFacilityBuildings();
    migrateCorrectionalFacilityBlocks();
    migrateCorrectionalFacilityCells();
    migrateCorrectionalFacilityBeds();
    migrateInmates();
    migrateCustomers();
    migrateCustomerInmates();
    migrateCAMMPUsers();
    migrateCAMMPUserFacilities();
    migrateCAMMPUserActivityLog();
    migrateAdmins();
    migrateAdminActivityLog();
    migrateHelpTopics();
    migrateCustomerInquiries();
    migrateGiftTransactions();
    migrateRejectionReasons();
    migrateAutoContentDiscoveries();
    migrateInvalidEmails();
    migrateLinkedInmates();
    migrateInmateReplies();
    migrateInmateReplyFiles();
    migrateMassCommunications();
    migrateCommunications();
    migrateCommunicationPhotos();
    migrateMassCommunicationPhotos();
    migrateVideos();
    migrateCustomerOrderTransactions();
    migrateNotes();
}

function migrateTextCardImages()
{
    echo "Migration Start: Text Card Images\n";

    //Define folder mapping for TextCard categories and their folders, these are system-level assets
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


    $oldTextCardCategories = DB::connection(OLD_DB_CONN)
        ->table('text_cards')
        ->get();

    foreach($oldTextCardCategories as $oldTextCardCategory)
    {
        $textCardCategoryData = [
            'id' => $oldTextCardCategory->id,
            'name' => $oldTextCardCategory->name,
            'folder_name' => $textCardImageFolders[$oldTextCardCategory->name],
            'created_at' => convertESTtoUTC($oldTextCardCategory->created_at),
            'updated_at' => convertESTtoUTC($oldTextCardCategory->updated_at)
        ];

        $newTextCardCategory = TextCardCategory::create($textCardCategoryData);
        echo "Added Text Card Category: " . $newTextCardCategory->title . "\n";
    }
    echo "Text card categories migrated count: " . count($oldTextCardCategories) . "\n";

    $oldTextCardImages = DB::connection(OLD_DB_CONN)
        ->table('text_card_images')
        ->get();

    foreach($oldTextCardImages as $oldTextCardImage)
    {
        $textCardImageData = [
            'id' => $oldTextCardImage->id,
            'text_card_category_id' => $oldTextCardImage->text_card_id,
            'filename' => explode(DIRECTORY_SEPARATOR, $oldTextCardImage->image)[2],
            'is_active' => 1,
            'created_at' => convertESTtoUTC($oldTextCardImage->created_at),
            'updated_at' => convertESTtoUTC($oldTextCardImage->updated_at)
        ];

        $newTextCardImage = TextCardImage::create($textCardImageData);
        echo "Added Text Card Image: " . $newTextCardImage->filename . "\n";
    }

    echo "Migration End: TextCardImages\n\n";
}

function migrateQuickReplies()
{
    echo "Migration Start: Quick Replies\n";
    $oldQuickReplies = DB::connection(OLD_DB_CONN)
        ->table('quick_replies')
        ->get();

    foreach($oldQuickReplies as $oldQuickReply)
    {
        $quickReplyData = [
            'title' => $oldQuickReply->title,
            'content' => $oldQuickReply->content,
            'module_id' => Modules::CUSTOMER,
            'created_at' => convertESTtoUTC($oldQuickReply->created_at),
            'updated_at' => convertESTtoUTC($oldQuickReply->updated_at)
        ];

        $newQuickReply = QuickReply::create($quickReplyData);
        echo "Added Quick Reply: " . $newQuickReply->title . "\n";
    }
    echo "Quick replies migrated count: " . count($oldQuickReplies) . "\n";
    echo "Migration End: Quick Replies\n\n";

}

function migrateTestimonials()
{
    echo "Migration Start: Testimonials\n";
    $oldTestimonials = DB::connection(OLD_DB_CONN)
        ->table('testimonials')
        ->get();

    $total = $oldTestimonials->count();
    $i = 1;

    foreach($oldTestimonials as $oldTestimonial)
    {
        $testimonialData[] = [
            'sender_name' => $oldTestimonial->name,
            'content' => strip_tags($oldTestimonial->content),
            'rating' => $oldTestimonial->rating,
            'created_at' => convertESTtoUTC($oldTestimonial->created_at),
            'updated_at' => convertESTtoUTC($oldTestimonial->updated_at),
        ];

        show_status($i, $total);
        $i++;
//        echo "Added Testimonial: " . $newTestimonial->sender_name . "\n";
    }

    Testimonial::insert($testimonialData);
    echo "Testimonials migrated count: " . count($oldTestimonials) . "\n";
    echo "Migration End: Testimonials\n\n";

}

function migrateCAMMPUsers()
{
    echo "Migration Start: CAMMP Users\n";
    $oldCAMMPUsers = DB::connection(OLD_DB_CONN)
        ->table('users')
        ->where('type', '=' , 'cammp')
        ->get();
    $total = $oldCAMMPUsers->count();
    $i = 1;

    foreach($oldCAMMPUsers as $oldCAMMPUser)
    {
       $correctionalOfficer =  CorrectionalOfficer::create([
            'id' => $oldCAMMPUser->id,
            'first_name' => $oldCAMMPUser->first_name,
            'middle_name' => $oldCAMMPUser->middle_name,
            'last_name' => $oldCAMMPUser->last_name,
            'email' => strtolower($oldCAMMPUser->email),    //Converting emails to lowercase for standardization
            'phone_number' => $oldCAMMPUser->mobile_number,
            'password' => $oldCAMMPUser->password,
            'created_at' => convertESTtoUTC($oldCAMMPUser->created_at),
            'updated_at' => convertESTtoUTC($oldCAMMPUser->updated_at),
        ]);

       //Assign Permissions
        $cammpUserDetail = DB::connection(OLD_DB_CONN)
            ->table('cammp_user_details')
            ->where('user_id', $correctionalOfficer->id)
            ->first();
       if ($cammpUserDetail->printing_permission == 1) {
           $correctionalOfficer->givePermissionTo(CorrectionalOfficer::PERMISSION_PRINT_CENTER);
       }
       if ($cammpUserDetail->activity_log_permission == 1) {
           $correctionalOfficer->givePermissionTo(CorrectionalOfficer::PERMISSION_AUDIT_TRAIL);
       }
       if ($cammpUserDetail->incoming_mail_review_permission == 1) {
           $correctionalOfficer->givePermissionTo(CorrectionalOfficer::PERMISSION_INCOMING_MAIL_REVIEW, CorrectionalOfficer::PERMISSION_MASS_COMM_MAIL_REVIEW);
       }
       if ($cammpUserDetail->outgoing_mail_review_permission == 1) {
           $correctionalOfficer->givePermissionTo(CorrectionalOfficer::PERMISSION_OUTGOING_MAIL_REVIEW);
       }
       if ($cammpUserDetail->linkage_permission == 1) {
           $correctionalOfficer->givePermissionTo(CorrectionalOfficer::PERMISSION_INMATE_LINKAGE);
       }
        show_status($i, $total);
        $i++;
   }
    echo "CAMMP Users migrated count: " . count($oldCAMMPUsers) . "\n";
    echo "Migration End: CAMMP Users\n\n";
}

function migrateCAMMPUserFacilities(){
    echo "Migration Start: CAMMP User facilities\n";
    $oldCAMMPUserFacilities = DB::connection(OLD_DB_CONN)
        ->table('cammp_user_facilities')
        ->get();

    $total = $oldCAMMPUserFacilities->count();
    $i = 1;

    foreach($oldCAMMPUserFacilities as $oldCAMMPUserFacility)
    {
        $cammpUserFacilityData[] = [
            'correctional_facility_id' => $oldCAMMPUserFacility->correctional_facility_id,
            'correctional_officer_id' => $oldCAMMPUserFacility->cammp_user_id,
            'created_at' => $oldCAMMPUserFacility->created_at ? convertESTtoUTC($oldCAMMPUserFacility->created_at) : now(),
            'updated_at' => $oldCAMMPUserFacility->updated_at ? convertESTtoUTC($oldCAMMPUserFacility->updated_at): now(),
        ];

        show_status($i, $total);
        $i++;
//        echo "Added Testimonial: " . $newTestimonial->sender_name . "\n";
    }

    CorrectionalFacilityCorrectionalOfficer::insert($cammpUserFacilityData);
    echo "CAMMP User facilities migrated count: " . count($oldCAMMPUserFacilities) . "\n";
    echo "Migration End: CAMMP User facilities\n\n";
}

function migrateAdmins()
{
    echo "Migration Start: SIMMS Admin Users\n";
    $oldAdmins = DB::connection(OLD_DB_CONN)
        ->table('users')
        ->where('type', '=' , 'simms')
        ->get();
    $total = $oldAdmins->count();
    $i = 1;

    foreach($oldAdmins as $oldAdmin)
    {
        $adminData = [
          'id' => $oldAdmin->id,
          'first_name' => $oldAdmin->first_name,
          'middle_name' => $oldAdmin->middle_name,
          'last_name' => $oldAdmin->last_name,
          'email' => $oldAdmin->email,
          'phone_number' => $oldAdmin->mobile_number,
          'is_active' => $oldAdmin->active,
          'password' => $oldAdmin->password,
          'created_at' => $oldAdmin->created_at,
          'updated_at' => $oldAdmin->updated_at,
        ];

        show_status($i, $total);
        $i++;

        $newAdmin = Admin::create($adminData);
        $newAdmin->assignRole(ADMIN);
        echo "Added Admin: " . $newAdmin->full_name;
    }
    echo "Admins migrated count: " . count($oldAdmins) . "\n";
    echo "Migration End: SIMMS Admin Users\n\n";
}

function migrateHelpTopics()
{
    echo "Migration Start: Help Topic Categories and Content\n";
    $oldHelpTopicCategories = DB::connection(OLD_DB_CONN)
        ->table('help_categories')
        ->get();

    $total = $oldHelpTopicCategories->count();
    $i = 1;

    foreach($oldHelpTopicCategories as $oldCategory)
    {
        $newHelpTopicCategory = [
            'id' => $oldCategory->id,
            'module_id' => Modules::CUSTOMER,
            'name' => $oldCategory->name
        ];

        $newCategory = HelpTopicCategory::create($newHelpTopicCategory);
        echo "Added Help Category: " . $oldCategory->name . "\n";

        if($newCategory)
        {
            $oldHelpTopics = DB::connection(OLD_DB_CONN)
                ->table('help_topics')
                ->where('help_category_id', '=', $oldCategory->id)
                ->get();

            $newHelpTopics = array();

            foreach($oldHelpTopics as $topic)
            {
                $newHelpTopics[] = [
                    'help_topic_category_id' => $newCategory->id,
                    'title' => $topic->name,
                    'content' => $topic->content,
                    'created_at' => convertESTtoUTC($topic->created_at),
                    'updated_at' => convertESTtoUTC($topic->updated_at)
                ];

                echo "Added Help Topic Content: " . $topic->name . "\n";
            }
            HelpTopicContent::insert($newHelpTopics);
        }

        show_status($i, $total);
        $i++;

    }
    echo "Help topic categories migrated count: " . count($oldHelpTopicCategories) . "\n";
    echo "Migration End: Help Topic Categories and Content\n\n";
}

function migrateCustomerInquiries()
{
    echo "Migration Start: Customer inquiries\n";

    $oldContactUs = DB::connection(OLD_DB_CONN)
        ->table('contact_us as cu')
        ->select('cu.*')
        ->join('users as u', 'cu.user_id', '=', 'u.id')
        ->where('cu.user_id', '<>', '0')
        ->whereNotNull('cu.user_id')
        ->get();

    $total = $oldContactUs->count();
    $i = 1;

    foreach($oldContactUs as $inquiry)
    {
        $inquiryData[] = [
            'inquiry_subject_id' => 1,
            'inquirable_id' => $inquiry->user_id,
            'inquirable_type' => Customer::class,
            'content' => $inquiry->message,
            'rating' => (!empty($inquiry->rating) ? $inquiry->rating : null),
            'read_at' => $inquiry->is_read === 1 ? convertESTtoUTC($inquiry->updated_at) : null,
//            'help_topic_content_id' => (!empty($inquiry->help_topic_id) ? $inquiry->help_topic_id : null),
            'created_at' => convertESTtoUTC($inquiry->created_at),
            'updated_at' => convertESTtoUTC($inquiry->updated_at)
        ];

        show_status($i, $total);
        $i++;
    }

    foreach(collect($inquiryData)->chunk(500) as $chunk)
    {
        Inquiry::insert($chunk->toArray());
    }

    $oldAdminReplies = DB::connection(OLD_DB_CONN)
        ->table('simms_conversion_with_customers as sc')
        ->select('sc.*')
        ->join('users as u', 'sc.receiver_id', '=', 'u.id')
        ->get();

    $total = $oldAdminReplies->count();
    $i = 1;

    foreach($oldAdminReplies as $reply)
    {
        $replyData[] = [
            'inquiry_subject_id' => 1,
            'admin_id' => $reply->sender_id,
            'inquirable_id' => $reply->receiver_id,
            'inquirable_type' => Customer::class,
            'content' => $reply->message,
            'read_at' => convertESTtoUTC($inquiry->updated_at),
            'created_at' => convertESTtoUTC($inquiry->created_at),
            'updated_at' => convertESTtoUTC($inquiry->updated_at)
        ];

        show_status($i, $total);
        $i++;
    }

    foreach(collect($replyData)->chunk(500) as $chunk)
    {
        Inquiry::insert($chunk->toArray());
    }

    echo "Migration End: Customer Inquiries\n";
    echo "Customer inquiries migrated count: " . count($oldContactUs) . "\n";
    echo "Admin replies migrated count: " . count($oldAdminReplies) . "\n";
    echo "Total new count of inquiries: " . (count($oldAdminReplies) + count($oldContactUs))  . "\n\n";
}

function migrateInmates()
{
    echo "Migration Start: Inmates\n";
    $oldInmates = DB::connection(OLD_DB_CONN)
        ->table('inmates as i')
        ->select('i.*')
        ->join('correctional_facilities as cf', 'i.correctional_facility_id', '=', 'cf.id')
        ->get();

    $total = $oldInmates->count();
    $i = 1;

    foreach($oldInmates as $oldInmate)
    {
        $addedVia = AddedViaType::CUSTOMER_REQUEST;
        if($oldInmate->added_by_roster)
        {
            $addedVia = AddedViaType::ROSTER_INGESTION;
        }

        $inmateData[] = [
            'id' => $oldInmate->id,
            'correctional_facility_id' => $oldInmate->correctional_facility_id,
            'first_name' => $oldInmate->first_name,
            'middle_name' => $oldInmate->middle_name,
            'last_name' => $oldInmate->last_name,
            'inmate_number' => $oldInmate->inmate_number,
            'temp_id' => $oldInmate->temp_id,
            'sid' => $oldInmate->sid_number,
            'building_id' => $oldInmate->building_id,
            'block_id' => $oldInmate->block_id,
            'cell_id' => $oldInmate->cell_id,
            'bed_id' => $oldInmate->bed_id,
            'is_verified' => $oldInmate->verified,
            'is_flagged' => $oldInmate->is_flagged,
            'is_watched' => $oldInmate->is_watched,
            'is_blocked' => ($oldInmate->is_blocked) ? 0 : 1,
            'added_via' => $addedVia,
            'more_info' => $oldInmate->more_info,
            'released_at' => convertESTtoUTC($oldInmate->released_at),
            'deleted_at' => convertESTtoUTC($oldInmate->deleted_at),
            'created_at' => convertESTtoUTC($oldInmate->created_at),
            'updated_at' => convertESTtoUTC($oldInmate->updated_at),
        ];

        show_status($i, $total);
        $i++;
    }

    foreach(collect($inmateData)->chunk(500) as $chunk)
    {
        Inmate::insert($chunk->toArray());
    }

    echo "Inmates migrated count: " . count($oldInmates) . "\n";
    echo "Migration End: Inmates\n\n";
}

function migrateCustomers()
{
    $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

    echo "Migration Start: Customers\n";
    $oldCustomers = DB::connection(OLD_DB_CONN)
        ->table('users as u')
        ->select('u.*', 'c.iso_3166_1_alpha2', 's.name as state_code')
//        ->select('u.id,','u.first_name,','u.middle_name,','u.last_name,','u.email,','u.password,','u.mobile_number,','u.photo,','u.city,','u.street,','u.zip,','u.active,','u.cash,','u.id,','u.id,','u.id,','u.id,','u.id,', 'c.*', 's.*')
        ->leftjoin('countries as c', 'c.id' , '=', 'u.country')
        ->leftJoin('states as s', 's.id' , '=', 'u.state')
        ->where('u.type', '=' , 'user')
//        ->whereNull('u.country')
//        ->limit(5)
        ->get();
//    dd($oldCustomers);
    $total = $oldCustomers->count();
    $i = 1;
    $creditDetails = array();
    foreach($oldCustomers as $oldCustomer) {

        //Prepare purchased credits for migration
        $totalPurchasedCredits = $oldCustomer->text_message_credits + $oldCustomer->photo_credits + $oldCustomer->text_card_credits + $oldCustomer->doodle4_kids_credits + $oldCustomer->universal_credits;
        if ($totalPurchasedCredits > 0 ){
            $creditDetails[] = [
                'customerID' => $oldCustomer->id,
                'credits' => $totalPurchasedCredits,
            ];
        }

        //Prepare country for migration
        $oldCountryCode = $oldCustomer->iso_3166_1_alpha2 ?? 'US';
        $country = Country::where('code', '=', $oldCountryCode)->first();
        if (empty($country)) {
            $country = Country::where('code', '=', 'US')->first();
        }

        //Prepare state for migration
        $state = (is_numeric($oldCustomer->state)) ? $oldCustomer->state_code : $oldCustomer->state;

        //Prepare phone for migration
        $phoneNumber = null;
        if (!empty($oldCustomer->mobile_number) && $country->id == UNITED_STATES)
        {
            try {
                $phoneObj = $phoneUtil->parse($oldCustomer->mobile_number, "US");
                $phoneNumber = $phoneUtil->format($phoneObj, \libphonenumber\PhoneNumberFormat::E164);
            } catch (\libphonenumber\NumberParseException $e) {
                $phoneNumber = $oldCustomer->mobile_number;
            }
        }
        else
        {
            $phone = null;
        }

        $customerData[] = [
            'id' => $oldCustomer->id,
            'first_name' => $oldCustomer->first_name,
            'middle_name' => $oldCustomer->middle_name,
            'last_name' => $oldCustomer->last_name,
            'email' => strtolower($oldCustomer->email),
            'password' => $oldCustomer->password,
            'phone_number' => $phoneNumber,
            'profile_picture' => $oldCustomer->photo,
            'registration_heard_about_option_id' => rand(1,5),
            'country_id' => $country->id,
            'state' => $state,
            'city' => $oldCustomer->city,
            'street_address' => $oldCustomer->street,
            'zip_code' => $oldCustomer->zip,
            'is_active' => $oldCustomer->active,
            'cash_balance' => $oldCustomer->cash,
            'email_verified_at' => ($oldCustomer->verified) ? now() : null,
            'created_at' => convertESTtoUTC($oldCustomer->created_at),
            'updated_at' => convertESTtoUTC($oldCustomer->updated_at)
        ];

        show_status($i++, $total);
    }

    foreach(collect($customerData)->chunk(500) as $chunk)
    {
        Customer::insert($chunk->toArray());
        Role::findByName(CUSTOMER_STANDARD)->users()->attach(array_column($chunk->toArray(), 'id'));

    }

    if(count($creditDetails)) {
        foreach ($creditDetails as $key => $creditDetail) {

            $customerDiscountDealTransactionData[] = [
                'id' => $key + 1,
                'customer_id' => $creditDetail['customerID'],
                'discount_deal_id' => DEFAULT_DISCOUNT_DEAL_ID,
                'total_amount' => 0,
                'paid_via' => OrderPaymentType::CASH_BALANCE,
                'summary' => json_encode([
                    'name' => 'Discount Deal',
                    'amount' => 0,
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ];

            $customerDiscountDealData[] = [
                'transaction_id' => $key + 1,
                'customer_id' => $creditDetail['customerID'],
                'discount_deal_id' => DEFAULT_DISCOUNT_DEAL_ID,
                'remaining_credits' => $creditDetail['credits'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        foreach (collect($customerDiscountDealTransactionData)->chunk(500) as $chunk) {
            CustomerDiscountDealTransaction::insert($chunk->toArray());
        }

        foreach (collect($customerDiscountDealData)->chunk(500) as $chunk) {
            CustomerDiscountDeal::insert($chunk->toArray());
        }
    }

    echo "Customers migrated count: " . count($oldCustomers) . "\n";
    echo "Migration End: Customers\n\n";
}

function migrateCustomerInmates()
{
    echo "Migration Start: user_inmates\n";
    $user_inmates = DB::connection(OLD_DB_CONN)
        ->table('user_inmates as ui')
        ->select('ui.*')
        ->join('inmates as i', 'ui.inmate_id', '=', 'i.id')
        ->join('users as u', 'ui.user_id', '=', 'u.id')
        ->join('correctional_facilities as cf', 'i.correctional_facility_id', '=', 'cf.id')
//        ->limit(1000)
        ->get();
    $total = $user_inmates->count();
    $i = 1;

    foreach($user_inmates as $user_inmate)
    {
        $addedVia = null;
        if ($user_inmate->step === 1){
            $addedVia = CustomerInmateRelation::ESTABLISHED_VIA_SEARCH;
        } elseif ($user_inmate->step === 2 || $user_inmate->step === 3){
            $addedVia = CustomerInmateRelation::ESTABLISHED_VIA_MANUALLY;
        } elseif ($user_inmate->step === 4 ){
            $addedVia = CustomerInmateRelation::ESTABLISHED_VIA_PMP;
        }
        $data[] = [
            'customer_id' => $user_inmate->user_id,
            'inmate_id' => $user_inmate->inmate_id,
            'is_verified' => $user_inmate->verified,
            'is_blocked' => $user_inmate->is_blocked,
            'is_customer_picture_blocked' => ($user_inmate->is_profile_picture_enabled) ? 0 : 1,
            'inmate_profile_picture' => $user_inmate->profile_picture,
            'added_via' => $addedVia,
            'created_at' => convertESTtoUTC($user_inmate->added_on),
            'updated_at' => convertESTtoUTC($user_inmate->added_on),
        ];

        show_status($i, $total);
        $i++;
    }

    foreach(collect($data)->chunk(500) as $chunk)
    {
        CustomerInmate::insert($chunk->toArray());
    }

    echo "user_inmates migrated count: " . count($user_inmates) . "\n";
    echo "Migration End: user_inmates\n\n";

}

function migrateCMS()
{
    echo "Migration Start: CMS\n";
    $oldCMSContents = DB::connection(OLD_DB_CONN)
        ->table('content_management_systems')
        ->get();

    foreach($oldCMSContents as $oldCMSContent) {

        $cmsData = [
            'module_id' => Modules::CUSTOMER,
            'key' => $oldCMSContent->key,
            'content' => $oldCMSContent->english_text,
        ];

        $newCMSContent = CmsContent::create($cmsData);
        echo "Added CMS Content: " . $newCMSContent->name;
    }
    echo "CMS migrated count: " . count($oldCMSContents) . "\n";
    echo "Migration End: CMS\n";
}

function migrateCorrectionalFacilities()
{
    echo "Migration Start: Correctional Facilities\n";
    $oldCorrectionalFacilities = DB::connection(OLD_DB_CONN)
        ->table('correctional_facilities')
        ->get();

    $total = $oldCorrectionalFacilities->count();
    $i = 1;

    foreach($oldCorrectionalFacilities as $oldCorrectionalFacility) {
        $state = State::where('code', '=', $oldCorrectionalFacility->state)->first();
        $category = null;
        if($oldCorrectionalFacility->category == "federal")
        {
            $category = CorrectionalFacilityCategory::FEDERAL;
        }
        else if($oldCorrectionalFacility->category == "state")
        {
            $category = CorrectionalFacilityCategory::STATE;
        }
        else if($oldCorrectionalFacility->category == "county")
        {
            $category = CorrectionalFacilityCategory::COUNTY;
        }

        //Prepare printable state id for migration
        $newStateID = null;
        if (!empty($oldCorrectionalFacility->printable_state)){
            $oldStateCode = DB::connection(OLD_DB_CONN)->table('states')->where('id', '=', $oldCorrectionalFacility->printable_state)->value('name');
            $newStateID = State::where('code', $oldStateCode)->value('id');
        }

        $correctionalFacilityData[] = [
            'id' => $oldCorrectionalFacility->id,
            'pcode' => $oldCorrectionalFacility->id,
            'name' => $oldCorrectionalFacility->facility_name,
            'state_id' => $state->id,
            'city' => $oldCorrectionalFacility->city,
            'street_address' => $oldCorrectionalFacility->street,
            'zip_code' => $oldCorrectionalFacility->zip_code,
            'category' => $category,
            'printable_state_id' => $newStateID,
            'printable_city' => !empty($oldCorrectionalFacility->printable_city) ? $oldCorrectionalFacility->printable_city : null,
            'printable_street_address' =>!empty($oldCorrectionalFacility->printable_street_address) ? $oldCorrectionalFacility->printable_street_address : null,
            'printable_zip_code' => !empty($oldCorrectionalFacility->printable_zip_code) ? $oldCorrectionalFacility->printable_zip_code : null,
            'created_at' => convertESTtoUTC($oldCorrectionalFacility->created_at),
            'updated_at' => convertESTtoUTC($oldCorrectionalFacility->updated_at),
        ];

//        $newCorrectionalFacility = CorrectionalFacility::create($correctionalFacilityData);
        show_status($i, $total);
        $i++;
//        echo "Added Correctional Facility: " . $newCorrectionalFacility->name;
    }

    CorrectionalFacility::insert($correctionalFacilityData);

    echo "Correctional facilities migrated count: " . count($oldCorrectionalFacilities) . "\n";
    echo "Migration End: Correctional Facilities\n";

}

function migrateCorrectionalFacilityBuildings()
{
    echo "Migration Start: Correctional Facility Buildings\n";
    $oldBuildings = DB::connection(OLD_DB_CONN)
        ->table('cammp_buildings')
        ->get();

    $total = $oldBuildings->count();
    $i = 1;

    foreach($oldBuildings as $oldBuilding)
    {
        $buildingData[] = [
            'id' => $oldBuilding->id,
            'correctional_facility_id' => $oldBuilding->facility_id,
            'name' => $oldBuilding->name,
            'unique_keyword' => $oldBuilding->unique_keyword,
            'created_at' => convertESTtoUTC($oldBuilding->created_at),
            'updated_at' => convertESTtoUTC($oldBuilding->updated_at)
        ];

        show_status($i, $total);
        $i++;
    }
    CorrectionalFacilityBuilding::insert($buildingData);
    echo "Correctional Facility Buildings migrated count: " . count($oldBuildings) . "\n";
    echo "Migration End: Correctional Facility Buildings\n\n";
}

function migrateCorrectionalFacilityBlocks()
{
    echo "Migration Start: Correctional Facility Blocks\n";
    $oldBlocks = DB::connection(OLD_DB_CONN)
        ->table('cammp_blocks')
        ->get();

    $total = $oldBlocks->count();
    $i = 1;

    foreach($oldBlocks as $oldBlock)
    {
        $blockData[] = [
            'id' => $oldBlock->id,
            'building_id' => $oldBlock->building_id,
            'name' => $oldBlock->block_name,
            'unique_keyword' => $oldBlock->unique_keyword,
            'created_at' => convertESTtoUTC($oldBlock->created_at),
            'updated_at' => convertESTtoUTC($oldBlock->updated_at)
        ];

        show_status($i, $total);
        $i++;
    }
    CorrectionalFacilityBlock::insert($blockData);
    echo "Correctional Facility Blocks migrated count: " . count($oldBlocks) . "\n";
    echo "Migration End: Correctional Facility Blocks\n\n";
}

function migrateCorrectionalFacilityCells()
{
    echo "Migration Start: Correctional Facility Cells\n";
    $oldCells = DB::connection(OLD_DB_CONN)
        ->table('cammp_cells')
        ->get();

    $total = $oldCells->count();
    $i = 1;

    foreach($oldCells as $oldCell)
    {
        $cellData[] = [
            'id' => $oldCell->id,
            'block_id' => $oldCell->block_id,
            'unique_keyword' => $oldCell->unique_keyword,
            'created_at' => convertESTtoUTC($oldCell->created_at),
            'updated_at' => convertESTtoUTC($oldCell->updated_at)
        ];

        show_status($i, $total);
        $i++;
    }
    CorrectionalFacilityCell::insert($cellData);
    echo "Correctional Facility Cells migrated count: " . count($oldCells) . "\n";
    echo "Migration End: Correctional Facility Cells\n\n";
}

function migrateCorrectionalFacilityBeds()
{
    echo "Migration Start: Correctional Facility Beds\n";
    $oldBeds = DB::connection(OLD_DB_CONN)
        ->table('cammp_beds')
        ->get();

    $total = $oldBeds->count();
    $i = 1;

    foreach($oldBeds as $oldBed)
    {
        $bedData[] = [
            'id' => $oldBed->id,
            'cell_id' => $oldBed->cell_id,
            'unique_keyword' => $oldBed->unique_keyword,
            'created_at' => convertESTtoUTC($oldBed->created_at),
            'updated_at' => convertESTtoUTC($oldBed->updated_at)
        ];

        show_status($i, $total);
        $i++;
    }

    foreach(collect($bedData)->chunk(500) as $chunk)
    {
        CorrectionalFacilityBed::insert($chunk->toArray());
    }

    echo "Correctional Facility Beds migrated count: " . count($oldBeds) . "\n";
    echo "Migration End: Correctional Facility Beds\n\n";
}

function migrateGiftTransactions()
{
    echo "Migration Start: Gift Transactions\n";
    $oldGiftTransactions = DB::connection(OLD_DB_CONN)
        ->table('gift_transactions as gt')
        ->select('gt.*')
        ->join('users as u', 'gt.receiver_id', '=', 'u.id')
        ->get();

    $total = $oldGiftTransactions->count();
    $i = 1;

    foreach($oldGiftTransactions as $oldGiftTransaction)
    {
        $creditCardPayment = CreditCardPayment::create(
            [
                'credit_card_number' => str_replace('x', '', $oldGiftTransaction->cc_last_four_digit),
                'amount' => $oldGiftTransaction->amount,
                'created_at' => convertESTtoUTC($oldGiftTransaction->created_at),
                'updated_at' => convertESTtoUTC($oldGiftTransaction->updated_at),
            ]
        );
        $summary = array();
        $summary[] = [
            'name' => 'Gift Amount',
            'amount' => $oldGiftTransaction->amount,
        ];
        CustomerGiftTransaction::create(
            [
                'sender_id' => $oldGiftTransaction->sender_id,
                'receiver_id' => $oldGiftTransaction->receiver_id,
                'credit_card_payment_id' => $creditCardPayment->id,
                'amount' => $oldGiftTransaction->amount,
                'total_amount' => $oldGiftTransaction->amount,
                'summary' => $summary,
                'paid_via' => OrderPaymentType::CREDIT_CARD,
                'created_at' => convertESTtoUTC($oldGiftTransaction->created_at),
                'updated_at' => convertESTtoUTC($oldGiftTransaction->updated_at),
            ]
        );

        show_status($i, $total);
        $i++;
    }

    echo "Gift Transactions migrated count: " . count($oldGiftTransactions) . "\n";
    echo "Migration End: Gift Transactions\n\n";
}

function migrateCAMMPUserActivityLog(){
    echo "Migration Start: CAMMP User Activity Log\n";
    $correctionalOfficers = CorrectionalOfficer::pluck('id')->toArray();
    $oldActivityLogs = DB::connection(OLD_DB_CONN)
        ->table('cammp_activity_logs')
        ->whereIn('user_id', $correctionalOfficers)
        ->get();

    $total = $oldActivityLogs->count();
    $i = 1;

    foreach($oldActivityLogs as $oldActivityLog)
    {
        $activity_detail = unserialize($oldActivityLog->activity_detail);
        $activity_detail = replaceKeys('activity_message', 'data', $activity_detail);
        $activity_detail = replaceKeys('changedData', 'new_data', $activity_detail);
        $activity_detail = replaceKeys('previousData', 'old_data', $activity_detail);

       $logs[] = [
            'correctional_officer_id' => $oldActivityLog->user_id,
            'correctional_facility_id' => $oldActivityLog->correctional_facility_id,
            'action' => $oldActivityLog->activity_type,
            'detail' => json_encode($activity_detail),
            'ip_address' => $oldActivityLog->ip_address,
            'created_at' => convertESTtoUTC($oldActivityLog->created_at),
            'updated_at' => convertESTtoUTC($oldActivityLog->updated_at),
        ];
        show_status($i, $total);
        $i++;
    }

    foreach(collect($logs)->chunk(500) as $chunk)
    {
        CorrectionalOfficerAuditTrail::insert($chunk->toArray());
    }

    echo "CAMMP Activity Logs migrated count: " . count($oldActivityLogs) . "\n";
    echo "Migration End: CAMMP Activity Logs\n\n";
}

function migrateAdminActivityLog(){
    echo "Migration Start: Admin Activity Log\n";

    $admin = Admin::pluck('id')->toArray();
    $oldActivityLogs = DB::connection(OLD_DB_CONN)
        ->table('simms_activity_logs')
        ->whereIn('user_id', $admin)
        ->get();

    $total = $oldActivityLogs->count();
    $i = 1;

    foreach($oldActivityLogs as $oldActivityLog)
    {
        $activity_detail = unserialize($oldActivityLog->activity_detail);
        $activity_detail = replaceKeys('activity_message', 'data', $activity_detail);
        $activity_detail = replaceKeys('changedData', 'new_data', $activity_detail);
        $activity_detail = replaceKeys('previousData', 'old_data', $activity_detail);

        $logs[] = [
            'admin_id' => $oldActivityLog->user_id,
            'action' => $oldActivityLog->activity_type,
            'detail' => json_encode($activity_detail),
            'ip_address' => $oldActivityLog->ip_address,
            'created_at' => convertESTtoUTC($oldActivityLog->created_at),
            'updated_at' => convertESTtoUTC($oldActivityLog->updated_at),
        ];

        show_status($i, $total);
        $i++;
    }

    foreach(collect($logs)->chunk(500) as $chunk)
    {
        AdminAuditTrail::insert($chunk->toArray());
    }

    echo "Admin Activity Logs migrated count: " . count($oldActivityLogs) . "\n";
    echo "Migration End: Admin Activity Logs\n\n";
}

function migrateRejectionReasons()
{
    echo "Migration Start: Rejection Reasons\n";
    $reasons = DB::connection(OLD_DB_CONN)
        ->table('rejection_reasons')
        ->get();

    $total = $reasons->count();
    $i = 1;

    foreach($reasons as $reason)
    {
        $customerReasons[] = [
            'id' => $reason->id,
            'reason' => $reason->reason,
            'type' => ModerationReasonType::CUSTOMER,
            'created_at' => convertESTtoUTC($reason->created_at),
            'updated_at' => convertESTtoUTC($reason->updated_at),
        ];

        $inmateReasons[] = [
            'reason' => $reason->reason,
            'type' => ModerationReasonType::INMATE,
            'created_at' => convertESTtoUTC($reason->created_at),
            'updated_at' => convertESTtoUTC($reason->updated_at),
        ];
        show_status($i, $total);
        $i++;
    }

    ModerationReason::insert($customerReasons);
    ModerationReason::insert($inmateReasons);
    echo "Rejection reason migrated count: " . count($reasons) . "\n";
    echo "Migration End: Rejection reason\n\n";

}

function migrateAutoContentDiscoveries(){
    echo "Migration Start: Auto Content Discoveries\n";

    $correctionalOfficers = CorrectionalOfficer::pluck('id')->toArray();

    $oldACDs = DB::connection(OLD_DB_CONN)
        ->table('auto_content_discoveries')
        ->whereIn('user_id', $correctionalOfficers)
        ->get();

    $hits = DB::connection(OLD_DB_CONN)
        ->table('auto_content_discovery_hits')
        ->select('auto_content_discovery_id', DB::raw('COUNT(auto_content_discovery_hits.hits) as hit_count'))
        ->groupBy('auto_content_discovery_id')
        ->get();

    $total = $oldACDs->count();
    $i = 1;

    foreach($oldACDs as $oldACD)
    {
        $count = 0;
        foreach($hits as $hit){
            if ($hit->auto_content_discovery_id == $oldACD->id){
                $count = $hit->hit_count;
                break;
            }
        }
        $data[] = [
            'id' => $oldACD->id,
            'correctional_officer_id' => $oldACD->user_id,
            'keyword' => $oldACD->word,
            'hits' => $count,
            'created_at' => convertESTtoUTC($oldACD->created_at),
            'updated_at' => convertESTtoUTC($oldACD->updated_at),
        ];

        show_status($i, $total);
        $i++;
    }

    AutoContentDiscoveryKeyword::insert($data);

    echo "Auto content discovery migrated count: " . count($oldACDs) . "\n";
    echo "Migration End: Auto content discovery\n\n";
}

function migrateInvalidEmails(){
    echo "Migration Start: In-valid Emails\n";


    $oldInvalidEmails = DB::connection(OLD_DB_CONN)
        ->table('invalid_emails')
        ->get();

    $total = $oldInvalidEmails->count();
    $i = 1;

    $data = array();
    foreach($oldInvalidEmails as $oldInvalidEmail)
    {
        $data[] = [
            'email' => $oldInvalidEmail->email_address,
            'bounce_type' => $oldInvalidEmail->bounce_type,
            'bounce_sub_type' => $oldInvalidEmail->bounce_sub_type,
            'diagnostic_code' => $oldInvalidEmail->diagnostic_code,
            'remote_mta_ip' => $oldInvalidEmail->remote_mta_ip,
            'created_at' => convertESTtoUTC($oldInvalidEmail->created_at),
            'updated_at' => convertESTtoUTC($oldInvalidEmail->updated_at),
        ];

        show_status($i, $total);
        $i++;
    }

    foreach(collect($data)->chunk(500) as $chunk)
    {
        InvalidEmail::insert($chunk->toArray());
    }

    echo "In-valid Emails migrated count: " . count($oldInvalidEmails) . "\n";
    echo "Migration End: In-valid Emails\n\n";

}

function migrateLinkedInmates(){
    echo "Migration Start: Linked inmates\n";

    $oldLinkedInmates = DB::connection(OLD_DB_CONN)
        ->table('linked_inmates')
        ->get();

    $total = $oldLinkedInmates->count();
    $i = 1;

    foreach($oldLinkedInmates as $oldLinkedInmate)
    {
        $data[] = [
            'linkage_key' => $oldLinkedInmate->link_id,
            'inmate_id' => $oldLinkedInmate->inmate_id,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        show_status($i, $total);
        $i++;
    }
    InmateLinkage::insert($data);


    echo "Linked inmates migrated count: " . count($oldLinkedInmates) . "\n";
    echo "Migration End: Linked inmates\n\n";

}

function migrateInmateReplies()
{
    echo "Migration Start: Inmate replies\n";
    $oldInmateReplies = DB::connection(OLD_DB_CONN)
        ->table('inmate_replies as ir')
        ->select('ir.*')
        ->join('inmates as i', 'ir.inmate_id', '=', 'i.id')
        ->join('users as u', 'ir.user_id', '=', 'u.id')
        ->join('correctional_facilities as cf', 'i.correctional_facility_id', '=', 'cf.id')
        ->get();
    $total = $oldInmateReplies->count();
    $i = 1;

    foreach($oldInmateReplies as $oldInmateReply)
    {
        //Prepare Approval Status for migration
        $reviewed_at = $rejected_at = $redacted_at = $text_msg_rejected_at = null;
        if ($oldInmateReply->approval_status === 0) {
            $rejected_at = $oldInmateReply->approval_status_updated_at;
            $reviewed_at = $oldInmateReply->approval_status_updated_at;
        } else if ($oldInmateReply->approval_status === 1) {
            $rejected_at = null;
            $reviewed_at = $oldInmateReply->approval_status_updated_at;
        }

        //Prepare Text Message for migration
        if($oldInmateReply->message != null){
            if($oldInmateReply->is_redacted == 1){
                $redacted_at = $oldInmateReply->approval_status_updated_at;
            }
            if($oldInmateReply->is_complete_text_rejected == 1) {
                $text_msg_rejected_at = $oldInmateReply->approval_status_updated_at;
            }

            $textMessagesData[] = [
                'text_messageable_id' => $oldInmateReply->id,
                'text_messageable_type' => InmateReply::class,
                'message' => $oldInmateReply->message,
                'redacted_message' => $oldInmateReply->redacted_message,
                'moderation_reason_id' => $oldInmateReply->rejection_reason_id,
                'moderation_description' => $oldInmateReply->rejection_detail,
                'rejected_at' => convertESTtoUTC($text_msg_rejected_at),
                'redacted_at' => convertESTtoUTC($redacted_at),
                'created_at' => convertESTtoUTC($oldInmateReply->created_at),
                'updated_at' => convertESTtoUTC($oldInmateReply->updated_at),
            ];
        }

        $inmateReplyData[] = [
            'id' => $oldInmateReply->id,
            'customer_id' => $oldInmateReply->user_id,
            'inmate_id' => $oldInmateReply->inmate_id,
            'is_active' => $oldInmateReply->active,
            'moderation_reason_id' => $oldInmateReply->rejection_reason_id,
            'moderation_description' => $oldInmateReply->rejection_detail,
            'reviewed_at' => convertESTtoUTC($reviewed_at),
            'rejected_at' => convertESTtoUTC($rejected_at),
            'read_at' => $oldInmateReply->status == 1 ? convertESTtoUTC($oldInmateReply->updated_at) : null,
            'created_at' => convertESTtoUTC($oldInmateReply->created_at),
            'updated_at' => convertESTtoUTC($oldInmateReply->updated_at),
        ];

        show_status($i, $total);
        $i++;
    }

    foreach(collect($inmateReplyData)->chunk(500) as $chunk)
    {
        InmateReply::insert($chunk->toArray());
    }

    foreach(collect($textMessagesData)->chunk(500) as $chunk)
    {
        TextMessage::insert($chunk->toArray());
    }

    echo "Inmate replies migrated count: " . count($oldInmateReplies) . "\n";
    echo "Migration End: Inmate replies\n\n";

}

function migrateInmateReplyFiles()
{
    echo "Migration Start: Inmate reply files\n";
    $oldInmateReplyFiles = DB::connection(OLD_DB_CONN)
        ->table('inmate_reply_files')
        ->get();

    $total = $oldInmateReplyFiles->count();
    $i = 1;

    foreach($oldInmateReplyFiles as $oldInmateReplyFile)
    {
        //Prepare Approval Status for migration
        $rejected_at = $redacted_at = null;
        if($oldInmateReplyFile->is_redacted == 1){
            $redacted_at = $oldInmateReplyFile->updated_at;
        }
        if($oldInmateReplyFile->is_rejected == 1) {
            $rejected_at = $oldInmateReplyFile->updated_at;
        }

        $inmateReplyFilesData[] = [
            'photoable_id' => $oldInmateReplyFile->inmate_reply_id,
            'photoable_type' => InmateReply::class,
            'filename' => $oldInmateReplyFile->file,
            'thumbnail' => $oldInmateReplyFile->thumnail,
            'redacted_filename' => $oldInmateReplyFile->redacted_image,
            'redacted_thumbnail' => $oldInmateReplyFile->redacted_thumbnail,
            'moderation_reason_id' => $oldInmateReplyFile->rejection_reason_id,
            'moderation_description' => $oldInmateReplyFile->rejection_detail,
            'rejected_at' => convertESTtoUTC($rejected_at),
            'redacted_at' => convertESTtoUTC($redacted_at),
            'created_at' => convertESTtoUTC($oldInmateReplyFile->created_at),
            'updated_at' => convertESTtoUTC($oldInmateReplyFile->updated_at),
        ];

        show_status($i, $total);
        $i++;
    }

    foreach(collect($inmateReplyFilesData)->chunk(500) as $chunk)
    {
        Photo::insert($chunk->toArray());
    }

    echo "Inmate reply file migrated count: " . count($oldInmateReplyFiles) . "\n";
    echo "Migration End: Inmate reply file\n\n";

}

function migrateMassCommunications(){

    echo "Migration Start: Mass Communications\n";
    $communications = DB::connection(OLD_DB_CONN)
        ->table('mass_communications as mc')
        ->select('mc.*')
        ->join('users as u', 'u.id', '=', 'mc.user_id')
        ->get();
    $total = $communications->count();
    $i = 1;

    foreach($communications as $communication)
    {
        //Prepare Approval Status for migration
        $reviewed_at = $rejected_at = $redacted_at = $text_msg_rejected_at = null;
        if ($communication->approval_status == 0 || $communication->approval_status == '0'){
            $rejected_at = $communication->approval_status_updated_at;
            $reviewed_at = $communication->approval_status_updated_at;
        } else if ($communication->approval_status == 1 || $communication->approval_status == '1') {
            $rejected_at = null;
            $reviewed_at = $communication->approval_status_updated_at;
        }

        $communicationData[] = [
            'id' => $communication->id,
            'customer_id' => $communication->user_id,
            'is_active' => $communication->is_active,
            'correctional_facility_id' => $communication->correctional_facility_id,
            'batch_id' => $communication->batch_id,
            'total_recipient_inmates' => $communication->total_recipient_inmates,
            'matched_recipient_inmates' => $communication->successful_recipient_inmates,
            'unknown_recipient_inmates' => $communication->unknown_recipient_inmates,
            'original_filename' => $communication->primary_file_name,
            'matched_inmates_filename' => $communication->matched_inmates_file_name,
            'unknown_inmates_filename' => $communication->unknown_inmates_file_name,
            'moderation_reason_id' => $communication->rejection_reason_id,
            'moderation_description' => $communication->rejection_detail,
            'reviewed_at' => convertESTtoUTC($reviewed_at),
            'rejected_at' => convertESTtoUTC($rejected_at),
            'created_at' => convertESTtoUTC($communication->created_at),
            'updated_at' => convertESTtoUTC($communication->updated_at),
        ];
        show_status($i, $total);
        $i++;
    }

    foreach(collect($communicationData)->chunk(500) as $chunk)
    {
        MassCommunication::insert($chunk->toArray());
    }

    echo "Mass communications migrated count: " . count($communications) . "\n";
    echo "Migration End: Mass communications\n\n";
}

function migrateCommunications()
{
    echo "Migration Start: Communications\n";
    $max = 100000;
    $count = DB::connection(OLD_DB_CONN)
        ->table('communications as c')
        ->select('c.*')
        ->join('inmates as i', 'c.inmate_id', '=', 'i.id')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->join('correctional_facilities as cf', 'i.correctional_facility_id', '=', 'cf.id')
        ->count();
    $pages = intval(ceil($count / $max));

    for ($i = 1; $i < ($pages + 1); $i++) {
        $offset = (($i - 1) * $max);
        echo 'Offset: ' . $offset . "\n";
        $communications = DB::connection(OLD_DB_CONN)->table('communications as c')
            ->select('c.*')
            ->join('inmates as i', 'c.inmate_id', '=', 'i.id')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->join('correctional_facilities as cf', 'i.correctional_facility_id', '=', 'cf.id')
            ->skip($offset)
            ->take($max)
            ->get();

        $total = $communications->count();
        $j = 1;

        $massCommunicationOrders = $textMessagesData = $communicationData = array();
        foreach ($communications as $communication) {
            //Prepare Approval Status for migration
            $reviewed_at = $rejected_at = $redacted_at = $text_msg_rejected_at = null;
            if ($communication->approval_status === 0) {
                $rejected_at = $communication->approval_status_updated_at;
                $reviewed_at = $communication->approval_status_updated_at;
            } else if ($communication->approval_status === 1) {
                $rejected_at = null;
                $reviewed_at = $communication->approval_status_updated_at;
            }

            //Prepare Text Message for migration
            if ($communication->message != null) {
                if ($communication->is_redacted == 1) {
                    $redacted_at = $communication->approval_status_updated_at;
                }
                if ($communication->is_complete_text_rejected == 1) {
                    $text_msg_rejected_at = $communication->approval_status_updated_at;
                }

                $textMessagesData[] = [
                    'text_messageable_id' => $communication->id,
                    'text_messageable_type' => Order::class,
                    'message' => ($communication->active && !$communication->is_draft) ? $communication->message : strip_tags($communication->message),
                    'redacted_message' => $communication->redacted_message,
                    'moderation_reason_id' => $communication->rejection_reason_id,
                    'moderation_description' => $communication->rejection_detail,
                    'rejected_at' => convertESTtoUTC($text_msg_rejected_at),
                    'redacted_at' => convertESTtoUTC($redacted_at),
                    'created_at' => convertESTtoUTC($communication->created_at),
                    'updated_at' => convertESTtoUTC($communication->updated_at),
                ];
            }

            //Prepare order type for migration
            if ($communication->attachable_type == 'text_message' || $communication->attachable_type == 'photo') {
                $order_type = OrderType::TEXT_LETTER;
            } elseif ($communication->attachable_type == 'text_card') {
                $order_type = OrderType::TEXT_CARD;
            } elseif ($communication->attachable_type == 'doodle4_kids') {
                $order_type = OrderType::DOODLE4KIDS;
            } elseif ($communication->attachable_type == 'screen_n_clean') {
                $order_type = OrderType::PHYSICAL_MAIL_STANDARD;
            }

            if ($communication->attachable_type == 'screen_n_clean' && $communication->mass_communication_id != null) {
                $massCommunicationOrders[] = [
                    'order_id' => $communication->id,
                    'mass_communication_id' => $communication->mass_communication_id,
                    'created_at' => convertESTtoUTC($communication->created_at),
                    'updated_at' => convertESTtoUTC($communication->updated_at),
                ];
            }

            $communicationData[] = [
                'id' => $communication->id,
                'customer_id' => $communication->user_id,
                'inmate_id' => $communication->inmate_id,
                'is_active' => $communication->active,
                'pdf_filename' => $communication->pdf_path,
                'order_type' => $order_type,
                'text_card_image_id' => $communication->text_card_id != 0 ? $communication->text_card_id : null,
                'moderation_reason_id' => $communication->rejection_reason_id,
                'moderation_description' => $communication->rejection_detail,
                'reviewed_at' => convertESTtoUTC($reviewed_at),
                'rejected_at' => convertESTtoUTC($rejected_at),
                'completed_at' => $communication->is_completed == 1 ? convertESTtoUTC($communication->updated_at) : null,
                'cancelled_at' => $communication->is_cancelled == 1 ? convertESTtoUTC($communication->updated_at) : null,
                'created_at' => convertESTtoUTC($communication->created_at),
                'updated_at' => convertESTtoUTC($communication->updated_at),
            ];

            show_status($j, $total);
            $j++;
        }

        foreach (collect($communicationData)->chunk(1000) as $chunk) {
            Order::insert($chunk->toArray());
        }

        foreach (collect($textMessagesData)->chunk(1000) as $chunk) {
            TextMessage::insert($chunk->toArray());
        }

        if (count($massCommunicationOrders)) {
            DB::table('mass_communication_order')->insert($massCommunicationOrders);
        }
    }

    echo "Communications migrated count: " . count($communications) . "\n";
    echo "Migration End: Communications\n\n";

}

function migrateCommunicationPhotos()
{
    echo "Migration Start: Communication photos\n";
    $max = 100000;
    $count = DB::connection(OLD_DB_CONN)
        ->table('photos')
        ->count();

    $pages = intval(ceil($count / $max));

    for ($i = 1; $i < ($pages + 1); $i++) {
        $offset = (($i - 1) * $max);
        echo 'Offset: ' . $offset . "\n";

        $oldCommunicationPhotos = DB::connection(OLD_DB_CONN)
            ->table('photos')
            ->skip($offset)
            ->take($max)
            ->get();
        $total = $oldCommunicationPhotos->count();
        $j = 1;

        $data = array();
        foreach ($oldCommunicationPhotos as $oldCommunicationPhoto) {
            //Prepare Approval Status for migration
            $rejected_at = $redacted_at = null;
            if ($oldCommunicationPhoto->is_redacted == 1) {
                $redacted_at = $oldCommunicationPhoto->updated_at;
            }
            if ($oldCommunicationPhoto->is_rejected == 1) {
                $rejected_at = $oldCommunicationPhoto->updated_at;
            }
            //Prepare sorting order for migrations
            $sorting_order = null;
            if ($oldCommunicationPhoto->indigent_step == 0){
                $sorting_order = PhotoType::COLORED_PHOTO;
            } elseif ($oldCommunicationPhoto->indigent_step == 1){
                $sorting_order = PhotoType::COLORED_TEXT_PAGE;
            } elseif ($oldCommunicationPhoto->indigent_step == 2){
                $sorting_order = PhotoType::COLORED_ENVELOPE;
            } elseif ($oldCommunicationPhoto->indigent_step == 3){
                $sorting_order = PhotoType::PHOTO_PDF;
            }

            $data[] = [
                'photoable_id' => $oldCommunicationPhoto->parent_id,
                'photoable_type' => Order::class,
                'filename' => $oldCommunicationPhoto->image,
                'thumbnail' => $oldCommunicationPhoto->thumnail_image,
                'redacted_filename' => $oldCommunicationPhoto->redacted_image,
                'redacted_thumbnail' => $oldCommunicationPhoto->redacted_thumbnail,
                'moderation_reason_id' => $oldCommunicationPhoto->rejection_reason_id,
                'moderation_description' => $oldCommunicationPhoto->rejection_detail,
                'sorting_order' => $sorting_order,
                'rejected_at' => convertESTtoUTC($rejected_at),
                'redacted_at' => convertESTtoUTC($redacted_at),
                'created_at' => convertESTtoUTC($oldCommunicationPhoto->created_at),
                'updated_at' => convertESTtoUTC($oldCommunicationPhoto->updated_at),
            ];

            show_status($j, $total);
            $j++;
        }

        foreach (collect($data)->chunk(1000) as $chunk) {
            Photo::insert($chunk->toArray());
        }
    }

    echo "Communication photos migrated count: " . count($oldCommunicationPhotos) . "\n";
    echo "Migration End: Communication photos\n\n";

}

function migrateMassCommunicationPhotos()
{
    echo "Migration Start: Mass Communication photos\n";

    $oldMassCommunicationPhotos = DB::connection(OLD_DB_CONN)
        ->table('mass_communication_photos')
        ->get();
    $total = $oldMassCommunicationPhotos->count();
    $j = 1;

    foreach ($oldMassCommunicationPhotos as $oldCommunicationPhoto) {
        //Prepare Approval Status for migration
        $rejected_at = $redacted_at = null;
        if ($oldCommunicationPhoto->is_redacted == 1) {
            $redacted_at = $oldCommunicationPhoto->updated_at;
        }
        if ($oldCommunicationPhoto->is_rejected == 1) {
            $rejected_at = $oldCommunicationPhoto->updated_at;
        }

        //Prepare sorting order for migrations
        $sorting_order = null;
        if ($oldCommunicationPhoto->indigent_step == 0){
            $sorting_order = PhotoType::COLORED_PHOTO;
        } elseif ($oldCommunicationPhoto->indigent_step == 1){
            $sorting_order = PhotoType::COLORED_TEXT_PAGE;
        } elseif ($oldCommunicationPhoto->indigent_step == 2){
            $sorting_order = PhotoType::COLORED_ENVELOPE;
        } elseif ($oldCommunicationPhoto->indigent_step == 3){
            $sorting_order = PhotoType::PHOTO_PDF;
        }

        $data[] = [
            'photoable_id' => $oldCommunicationPhoto->mass_communication_id,
            'photoable_type' => MassCommunication::class,
            'filename' => $oldCommunicationPhoto->image,
            'thumbnail' => $oldCommunicationPhoto->thumbnail_image,
            'redacted_filename' => $oldCommunicationPhoto->redacted_image,
            'redacted_thumbnail' => $oldCommunicationPhoto->redacted_thumbnail,
            'moderation_reason_id' => $oldCommunicationPhoto->rejection_reason_id,
            'moderation_description' => $oldCommunicationPhoto->rejection_detail,
            'sorting_order' => $sorting_order,
            'rejected_at' => convertESTtoUTC($rejected_at),
            'redacted_at' => convertESTtoUTC($redacted_at),
            'created_at' => convertESTtoUTC($oldCommunicationPhoto->created_at),
            'updated_at' => convertESTtoUTC($oldCommunicationPhoto->updated_at),
        ];

        show_status($j, $total);
        $j++;
    }

    foreach (collect($data)->chunk(500) as $chunk) {
        Photo::insert($chunk->toArray());
    }

    echo "Mass communication photos migrated count: " . count($oldMassCommunicationPhotos) . "\n";
    echo "Migration End: Mass communication photos\n\n";
}

function migrateVideos()
{
    echo "Migration Start:Videos\n";

    $oldVideos = DB::connection(OLD_DB_CONN)
        ->table('videos')
        ->get();
    $total = $oldVideos->count();
    $j = 1;

    foreach ($oldVideos as $oldVideo) {
        //Prepare Approval Status for migration
        $rejected_at = null;
        if ($oldVideo->is_rejected == 1) {
            $rejected_at = $oldVideo->updated_at;
        }

        $data[] = [
            'videoable_id' => $oldVideo->parent_id,
            'videoable_type' => Order::class,
            'filename' => $oldVideo->video_filename,
            'thumbnail' => $oldVideo->video_thumbnail,
            'original_filename' => $oldVideo->video_original_filename,
            'media_convert_job_id' => $oldVideo->mc_job_id,
            'media_convert_job_status' => $oldVideo->is_processed == 1 ? MediaConvertJobStatus::COMPLETE : MediaConvertJobStatus::ERROR,
            'moderation_reason_id' => $oldVideo->rejection_reason_id,
            'moderation_description' => $oldVideo->rejection_detail,
            'rejected_at' => convertESTtoUTC($rejected_at),
            'created_at' => convertESTtoUTC($oldVideo->created_at),
            'updated_at' => convertESTtoUTC($oldVideo->updated_at),
        ];

        show_status($j, $total);
        $j++;
    }

    Video::insert($data);

    echo "Videos migrated count: " . count($oldVideos) . "\n";
    echo "Migration End: Videos\n\n";
}

function migrateCustomerOrderTransactions()
{
    echo "Migration Start:Customer order transactions\n";
    $max = 100000;
    $count = DB::connection(OLD_DB_CONN)
        ->table('user_transactions as ut')
        ->select('ut.*')
        ->join('inmates as i', 'ut.inmate_id', '=', 'i.id')
        ->join('users as u', 'ut.user_id', '=', 'u.id')
        ->join('correctional_facilities as cf', 'i.correctional_facility_id', '=', 'cf.id')
        ->count();
    $pages = intval(ceil($count / $max));

    for ($i = 1; $i < ($pages + 1); $i++) {
        $offset = (($i - 1) * $max);
        echo 'Offset: ' . $offset . "\n";
        $oldTransactions = DB::connection(OLD_DB_CONN)
            ->table('user_transactions as ut')
            ->select('ut.*')
            ->join('inmates as i', 'ut.inmate_id', '=', 'i.id')
            ->join('users as u', 'ut.user_id', '=', 'u.id')
            ->join('correctional_facilities as cf', 'i.correctional_facility_id', '=', 'cf.id')
            ->skip($offset)
            ->take($max)
            ->get();

        $total = $oldTransactions->count();
        $j = 1;

        $data = array();
        foreach ($oldTransactions as $oldTransaction) {
            //Prepare Summary for migration
            $summary = array();
            if ($oldTransaction->attachable_type == 'text_message' || $oldTransaction->attachable_type == 'photo') {
                $summary[] = [
                    'name' => 'Text Letter',
                    'amount' => $oldTransaction->totalMoneyOrderPrice,
                ];
            } elseif ($oldTransaction->attachable_type == 'text_card') {
                $summary[] = [
                    'name' => 'Text Card',
                    'amount' => $oldTransaction->totalMoneyOrderPrice,
                ];
            } elseif ($oldTransaction->attachable_type == 'doodle4_kids') {
                $summary[] = [
                    'name' => 'Doodle4Kids',
                    'amount' => $oldTransaction->totalMoneyOrderPrice,
                ];
            } elseif ($oldTransaction->attachable_type == 'screen_n_clean') {
                $summary[] = [
                    'name' => 'Physical Mail',
                    'amount' => 0,
                ];
            }

            //Prepare paid_via for migration
            $paid_via = null;
            $creditCardPayment = null;
            $icsPayment = null;
            if ($oldTransaction->payment_by == 'bluepay') {
                $paid_via = OrderPaymentType::CREDIT_CARD;
                if (!empty($oldTransaction->payment_account_transaction)){
                    $creditCardPayment = CreditCardPayment::create([
                            'credit_card_number' => str_replace('x', '', $oldTransaction->payment_account_transaction),
                            'amount' => $oldTransaction->totalMoneyOrderPrice,
                            'created_at' => convertESTtoUTC($oldTransaction->created_at),
                            'updated_at' => convertESTtoUTC($oldTransaction->updated_at),
                        ]);
                }
            } elseif ($oldTransaction->payment_by == 'universal_credits' || $oldTransaction->payment_by == 'credits') {
                $paid_via = OrderPaymentType::CREDITS;
            } elseif ($oldTransaction->payment_by == 'cash') {
                $paid_via = OrderPaymentType::CASH_BALANCE;
            } elseif ($oldTransaction->payment_by == 'ics_prepaid_account') {
                $paid_via = OrderPaymentType::ICS_ACCOUNT;
                if ($oldTransaction->payment_account_transaction != 0){
                    $icsPayment = IcsPayment::create([
                        'btn' => $oldTransaction->payment_account_transaction,
                        'amount' => $oldTransaction->totalMoneyOrderPrice,
                        'created_at' => convertESTtoUTC($oldTransaction->created_at),
                        'updated_at' => convertESTtoUTC($oldTransaction->updated_at),

                    ]);
                }
            }
            $data[] = [
                'customer_id' => $oldTransaction->user_id,
                'inmate_id' => $oldTransaction->inmate_id,
                'order_id' => $oldTransaction->parent_id,
                'total_order_cost' => $oldTransaction->totalMoneyOrderPrice,
                'credit_used' => $oldTransaction->cost_in_credits,
                'paid_via' => $paid_via,
                'ics_payment_id' => isset($icsPayment) ? $icsPayment->id : null,
                'credit_card_payment_id' => isset($creditCardPayment) ? $creditCardPayment->id : null,
                'summary' => json_encode($summary),
                'created_at' => convertESTtoUTC($oldTransaction->created_at),
                'updated_at' => convertESTtoUTC($oldTransaction->updated_at),
            ];

            show_status($j, $total);
            $j++;
        }

        foreach(collect($data)->chunk(1000) as $chunk)
        {
            CustomerOrderTransaction::insert($chunk->toArray());
        }
    }

    echo "Customer order transactions migrated count: " . count($oldTransactions) . "\n";
    echo "Migration End: Customer order transactions\n\n";
}

function migrateNotes(){
    echo "Migration Start: Notes\n";

    $notes = DB::connection(OLD_DB_CONN)
        ->table('notes as n')
        ->get();

    $total = $notes->count();
    $i = 1;

    foreach($notes as $note)
    {
        if ($note->note_target_id != null){
            $noteable_id = $note->note_target_id;
            $noteable_type = Customer::class;
        } else {
            $noteable_id = $note->inmate_id;
            $noteable_type = Inmate::class;
        }
        $data[] = [
            'id' => $note->id,
            'content' => $note->note,
            'noteable_type' => $noteable_type,
            'noteable_id' => $noteable_id,
            'creator_type' => Admin::class,
            'creator_id' => $note->note_creator_id,
        ];

        show_status($i, $total);
        $i++;
    }
    Note::insert($data);

    echo "Notes migrated count: " . count($notes) . "\n";
    echo "Migration End: Notes\n\n";
}

/////////// PHP HELPER FUNCTION TO DISPLAY PROGRESS BAR ON CLI ////////////
function show_status($done, $total, $size=30) {

    static $start_time;

    // if we go over our bound, just ignore it
    if($done > $total) return;

    if(empty($start_time)) $start_time=time();
    $now = time();

    $perc=(double)($done/$total);

    $bar=floor($perc*$size);

    $status_bar="\r[";
    $status_bar.=str_repeat("=", $bar);
    if($bar<$size){
        $status_bar.=">";
        $status_bar.=str_repeat(" ", $size-$bar);
    } else {
        $status_bar.="=";
    }

    $disp=number_format($perc*100, 0);

    $status_bar.="] $disp%  $done/$total";

    $rate = ($now-$start_time)/$done;
    $left = $total - $done;
    $eta = round($rate * $left, 2);

    $elapsed = $now - $start_time;

    $status_bar.= " remaining: ".number_format($eta)." sec.  elapsed: ".number_format($elapsed)." sec.";

    echo "$status_bar  ";

    flush();

    // when done, send a newline
    if($done == $total) {
        echo "\n";
    }

}

//Utility function to convert EST timestamps to UTC timestamps
function convertESTtoUTC($timestamp)
{
    if(empty($timestamp)) return null;
    $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, '-5:00');
    $date->setTimezone('UTC');
    return $date->toDateTimeString();
}

function replaceKeys($oldKey, $newKey, array $input){
    $return = array();
    foreach ($input as $key => $value) {
        if ($key===$oldKey)
            $key = $newKey;

        if (is_array($value))
            $value = replaceKeys( $oldKey, $newKey, $value);

        $return[$key] = $value;
    }
    return $return;
}

function migrateIsIndigentColumnFromUsersToCustomers(){
    $newCustomers = Customer::all();
    $oldCustomers = DB::connection(OLD_DB_CONN)
        ->table('users as u')
        ->where('u.type', '=' , 'user')
        ->pluck('is_indigent', 'id');
    $total = $newCustomers->count();
    $i = 1;

    foreach ($newCustomers as $newCustomer)
    {
        $registrationType = null;
        if (isset($oldCustomers[$newCustomer->id]))
        {
            if ($oldCustomers[$newCustomer->id] === 1)
            {
                $registrationType = CustomerRegistrationType::PMP;
            }
            else if ($oldCustomers[$newCustomer->id] === 0)
            {
                $registrationType = CustomerRegistrationType::SELF;
            }
        }
        elseif (str_contains($newCustomer->email, 'bzmst.com'))
        {
            $registrationType = CustomerRegistrationType::PMP;
        }
        else
        {
            $registrationType = CustomerRegistrationType::SELF;
        }

        $newCustomer->update(['registration_type' => $registrationType]);

        show_status($i, $total);
        $i++;
    }
}

function reimportICSPaymentBTN(){
    $oldTransactions = DB::connection(OLD_DB_CONN)
        ->table('user_transactions as ut')
        ->join('inmates as i', 'ut.inmate_id', '=', 'i.id')
        ->join('users as u', 'ut.user_id', '=', 'u.id')
        ->join('correctional_facilities as cf', 'i.correctional_facility_id', '=', 'cf.id')
        ->where('ut.payment_by', '=', 'ics_prepaid_account')
        ->where('ut.payment_account_transaction', '<>', 0)
        ->pluck('ut.payment_account_transaction', 'ut.parent_id');

    $newTransactions = CustomerOrderTransaction::where('paid_via', OrderPaymentType::ICS_ACCOUNT)
        ->whereNotNull('ics_payment_id')
        ->with('icsPayment')
        ->get();

    foreach ($newTransactions as $newTransaction){
        if (isset($oldTransactions[$newTransaction->order_id])){
            if ($newTransaction->icsPayment){
                $newTransaction->icsPayment->update(['btn' => $oldTransactions[$newTransaction->order_id]]);
            }
        }
    }
}

function importNotesTimestamps(){
    $oldNotes = DB::connection(OLD_DB_CONN)
        ->table('notes as n')
        ->pluck('n.created_at', 'n.id');

    $newNotes = Note::all();

    foreach ($newNotes as $newNote){
        if (isset($oldNotes[$newNote->id])){
            $newNote->update([
                'created_at' => convertESTtoUTC($oldNotes[$newNote->id]),
                'updated_at' => convertESTtoUTC($oldNotes[$newNote->id])
            ]);
        }
    }
}

//TODO:Remove this function after run on production server
function migratePMPInvoicesAndClients(){
    echo "Migration Start: PMP Clients\n";
    $pmpClients = DB::connection(OLD_DB_CONN)
        ->table('snc_clients')
        ->get();
    $total = $pmpClients->count();
    $i = 1;
    foreach($pmpClients as $pmpClient)
    {
        PmpClient::create([
            'id' => $pmpClient->id,
            'name' => $pmpClient->snc_first_name . ' ' . $pmpClient->snc_middle_name . ' ' . $pmpClient->snc_last_name,
            'email' => $pmpClient->snc_email_address,
            'phone_number' => $pmpClient->snc_contact,
            'department' => $pmpClient->snc_dept_name,
            'deleted_at' => convertESTtoUTC($pmpClient->deleted_at),
            'created_at' => convertESTtoUTC($pmpClient->created_at),
            'updated_at' => convertESTtoUTC($pmpClient->updated_at),

        ]);
        show_status($i, $total);
        $i++;
    }
    echo "Notes migrated count: " . count($pmpClients) . "\n";
    echo "Migration End: PMP Clients\n\n";

    echo "Migration Start: PMP Invoices\n";
    $pmpInvoices = DB::connection(OLD_DB_CONN)
        ->table('snc_invoices')
        ->whereNull('deleted_at')
        ->get();
    $total = $pmpInvoices->count();
    $i = 1;
    foreach($pmpInvoices as $pmpInvoice)
    {
        $paymentType = null;
        if ($pmpInvoice->payment_type == 'Cash'){
            $paymentType = 1;
        } elseif($pmpInvoice->payment_type == 'Check') {
            $paymentType = 2;
        }
        PmpInvoice::create([
            'id' => $pmpInvoice->id,
            'invoice_number' => $pmpInvoice->invoice_no,
            'pmp_client_id' => $pmpInvoice->snc_client_id,
            'correctional_facility_id' => $pmpInvoice->snc_facility_id,
            'total_amount' => $pmpInvoice->total_amount,
            'payment_type' => $paymentType,
            'is_paid' => $pmpInvoice->is_paid,
            'payment_note' => $pmpInvoice->payment_note,
            'paid_at' => $pmpInvoice->paid_at,
            'from_date' => $pmpInvoice->date_from,
            'to_date' => $pmpInvoice->date_to,
            'created_at' => convertESTtoUTC($pmpInvoice->created_at),
            'updated_at' => convertESTtoUTC($pmpInvoice->updated_at),

        ]);
        show_status($i, $total);
        $i++;
    }
    echo "Notes migrated count: " . count($pmpInvoices) . "\n";
    echo "Migration End: PMP Invoice\n\n";

    echo "Migration Start: PMP Invoice Service\n";
    $pmpInvoiceServices = DB::connection(OLD_DB_CONN)
        ->table('snc_invoice_services as sis')
        ->join('snc_invoices as si', 'si.id', '=', 'sis.invoice_id')
        ->whereNull('si.deleted_at')
        ->get();
    $total = $pmpInvoiceServices->count();
    $i = 1;
    foreach($pmpInvoiceServices as $pmpInvoiceService)
    {
        PmpInvoiceService::create([
            'id' => $pmpInvoiceService->id,
            'pmp_invoice_id' => $pmpInvoiceService->invoice_id,
            'service_name' => $pmpInvoiceService->service_name,
            'quantity' => $pmpInvoiceService->quantity,
            'unit_price' => $pmpInvoiceService->unit,
            'created_at' => convertESTtoUTC($pmpInvoiceService->created_at),
            'updated_at' => convertESTtoUTC($pmpInvoiceService->updated_at),

        ]);
        show_status($i, $total);
        $i++;
    }
    echo "Notes migrated count: " . count($pmpInvoiceServices) . "\n";
    echo "Migration End: PMP Invoice Services\n\n";

    echo "Migration Start: PMP Invoice Attachment\n";
    $pmpInvoiceAttachments = DB::connection(OLD_DB_CONN)
        ->table('snc_invoice_attachments as sia')
        ->join('snc_invoices as si', 'si.id', '=', 'sia.invoice_id')
        ->whereNull('si.deleted_at')
        ->get();
    $total = $pmpInvoiceAttachments->count();
    $i = 1;
    foreach($pmpInvoiceAttachments as $pmpInvoiceAttachment)
    {
        $attachedFileName = explode('/', $pmpInvoiceAttachment->file);
        $attachedFileName = end($attachedFileName);
        $attachment = Attachment::create([
            'filename' => ATTACHMENTS_PATH . $attachedFileName,
            'original_filename' =>$attachedFileName,
            'is_active' => $pmpInvoiceAttachment->active,
            'mime_type' => $pmpInvoiceAttachment->type,
            'created_at' => convertESTtoUTC($pmpInvoiceAttachment->created_at),
            'updated_at' => convertESTtoUTC($pmpInvoiceAttachment->updated_at),

        ]);
        DB::table('pmp_invoice_attachment')
            ->insert([
                'pmp_invoice_id' => $pmpInvoiceAttachment->invoice_id,
                'attachment_id' => $attachment->id,
            ]);
        show_status($i, $total);
        $i++;
    }
    echo "Notes migrated count: " . count($pmpInvoiceAttachments) . "\n";
    echo "Migration End: PMP Invoice Attachments\n\n";

    echo "Migration Start: PMP Clients Correctional Facility\n";
    $pmpClientFacilities = DB::connection(OLD_DB_CONN)
        ->table('snc_client_facilities')
        ->get();
    $total = $pmpClientFacilities->count();
    $i = 1;
    foreach($pmpClientFacilities as $pmpClientFacility)
    {
        PmpClientCorrectionalFacility::create([
            'id' => $pmpClientFacility->id,
            'pmp_client_id' => $pmpClientFacility->snc_client_id,
            'correctional_facility_id' => $pmpClientFacility->correctional_facility_id,
            'created_at' => convertESTtoUTC($pmpClientFacility->created_at),
            'updated_at' => convertESTtoUTC($pmpClientFacility->updated_at),
        ]);
        show_status($i, $total);
        $i++;
    }
    echo "Notes migrated count: " . count($pmpClientFacilities) . "\n";
    echo "Migration End: PMP Client Correctional Facilities\n\n";
}

function migrateCustomerPhoneNumber(){
    $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
    $newCustomers = Customer::whereNull('phone_number')->get();
    $oldCustomers = DB::connection(OLD_DB_CONN)
        ->table('users as u')
        ->where('u.type', '=' , 'user')
        ->get()
        ->keyBy('id');

    $total = $newCustomers->count();
    $i = 1;

    foreach ($newCustomers as $newCustomer)
    {
        $phoneNumber = null;
        if (isset($oldCustomers[$newCustomer->id])) {
            if (!empty($oldCustomers[$newCustomer->id]->mobile_number) && $oldCustomers[$newCustomer->id]->country == 234) {
                try {
                    $phoneObj = $phoneUtil->parse($oldCustomers[$newCustomer->id], "US");
                    $phoneNumber = $phoneUtil->format($phoneObj, \libphonenumber\PhoneNumberFormat::E164);
                } catch (\libphonenumber\NumberParseException $e) {
                    $phoneNumber = $oldCustomers[$newCustomer->id]->mobile_number;
                }
            } else {
                $phoneNumber = $oldCustomers[$newCustomer->id]->mobile_number;
            }
        }

        $newCustomer->update(['phone_number' => $phoneNumber]);

        show_status($i, $total);
        $i++;
    }
}
