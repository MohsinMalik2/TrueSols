<?php

// Country Table Keys
define('UNITED_STATES', 1);

//Discount Deal
define('DEFAULT_DISCOUNT_DEAL_ID', 1000);

// Video Duration Buffer
define('VIDEO_DURATION_BUFFER', 1);

// Mass Mailer Correctional Officer Key
define('CORRECTIONAL_OFFICER', 'Correctional Officer');

// adjustment key
define('CREDIT_FORM_BUTTON', 'Credit form button');

// Cammp watch list
define('WATCH_LIST_COMMUNICATIONS', 1);

// State Table Key
define('WISCONSIN', 51);


class InquiryCategory
{
    const GENERAL = 1;
    const CAMMP = 1;
}

class CreatedVia
{
    const SIMMS_IR_PANEL = 1;
    const DIMI_SYSTEM = 2;
}

class ExportType
{
    const XLSX = 1;
    const CSV = 1;
}

class CorrectionalFacilityType
{
    const NON_PARTNERED = 1;
    const PARTNERED = 2;
}

class AdjustmentType
{
    const GIVE = 1;
    const REMOVE = 2;
}

class PDFMergeType
{
    const MULTIPLE = 1;
    const SINGLE = 2;
}

class MessageType
{
    const CUSTOMER = 1;
    const INMATE = 2;
}

class ModerationReasonType
{
    const CUSTOMER = 1;
    const INMATE = 2;
    const QA = 3;
}

class InquiryStatus
{
   const OLD = 'old';
   const NEW = 'new';
}

class TransactionType
{
    const DISCOUNT_DEAL = 1;
    const GIFT_SENT = 2;
    const GIFT_RECEIVED = 3;
    const ORDER = 4;
    const MASS_COMM_ORDER = 5;
}

class OrderType
{
    const TEXT_LETTER = 1;
    const TEXT_CARD = 2;
    const DOODLE4KIDS = 3;
    const PHYSICAL_MAIL_STANDARD = 4;
    const PHYSICAL_MAIL_MASS_COMM = 5;
    const DOCUMENT_STANDARD = 6;
    const DOCUMENT_MASS_COMM = 7;
    const DOCUMENT_LEGAL = 8;
}

class CorrectionalFacilityCategory
{
    const FEDERAL = 1;
    const STATE = 2;
    const COUNTY = 3;
}

class ApprovalStatus
{
    const UN_REVIEWED = 1;
    const REJECTED = 2;
    const ACCEPTED = 3;
    const ALL = 4;
    const MODERATED = 5;
}

class OrderProcessingType
{
    const PENDING = 1;
    const COMPLETED = 2;
}

class PhotoType
{
    const COLORED_ENVELOPE = 1;
    const GRAYSCALE_ENVELOPE = 2;
    const COLORED_TEXT_PAGE = 3;
    const GRAYSCALE_TEXT_PAGE = 4;
    const COLORED_PHOTO = 5;
    const PHOTO_PDF = 6;
    const DOODLE_4_KIDS = 7;
}

class AddedViaType
{
    const ROSTER_INGESTION = 1;
    const PHYSICAL_MAIL_PROCESSING = 2;
    const CUSTOMER_REQUEST = 3;
    const ADMIN = 4;
}

class Modules
{
    const CUSTOMER = 1;
    const SIMMS = 2;
    const CAMMP = 3;
    const DIMI = 4;
    const CORPORATE = 5;
}

Class OrderPaymentType
{
    const CASH_BALANCE = 1;
    const CREDITS = 2;
    const CREDIT_CARD = 3;
    const ICS_ACCOUNT = 4;
}

Class InvoicePaymentType
{
    const CASH = 1;
    const CHECK = 2;
    const CREDIT_CARD = 3;
}

class OrderTransactionStatus
{
    const PROCESSED = 'Processed';
    const PROCESSING = 'Processing';
    const CANCELLED = 'Cancelled';
    const COMPLETED = 'Completed';
    const REFUNDED = 'Refunded';
}

class InquiryType
{
    const GUEST = 'App\Models\Guest';
    const CUSTOMER = 'App\Models\Customer';
    const DIMI = 'App\Models\Inmate';
    const CAMMP = 'App\Models\CorrectionalOfficer';
}

class NotificationType
{
    const EMAIL = 1;
    const PUSH = 2;
    const SMS = 3;
}

class MailReviewType
{
    const INCOMING = 1;
    const OUTGOING = 2;
    const MASS_COMMUNICATION = 3;
}

class ModerationType
{
    const REJECT = 'reject';
    const REDACT = 'redact';
    const PARTIAL = 'partial'; //for Mass Comm Inmates Rejection/Acceptance
}

class MailContentType
{
    const TEXT = 'text';
    const PHOTO = 'photo';
    const DOCUMENT = 'document';
    const TEXT_CARD = 'text_card';
    const VIDEO = 'video';
    const MAIL = 'mail';
    const MASS_COMM_MAIL = 'mass comm mail';
}

//AWS MediaConvert Job Status, used with AWS Cloudwatch Notifications
class McJobStatus{
    const PROGRESSING = 'PROGRESSING';
    const COMPLETE = 'COMPLETE';
    const ERROR = 'ERROR';
}

//System Media Convert Job Status
class MediaConvertJobStatus{
    const ERROR = 0;
    const COMPLETE = 1;
}

class ANetCreditCardTypes{
    const VISA = "VISA";
    const MASTERCARD = "MASTERCARD";
    const DISCOVER = "DISCOVER";
    const JCB = "JCB";
    const DINERSCLUB = "DINERSCLUB";
    const AMERICANEXPRESS = "AMERICANEXPRESS";
    const PAYPAL = "PAYPAL";
}

//Customer Inmate Relation Added Via Keys For 'added_via' column in customer_inmate table
class CustomerInmateRelation{
    const ESTABLISHED_VIA_SEARCH = 1;
    const ESTABLISHED_VIA_MANUALLY = 2;
    const ESTABLISHED_VIA_PMP = 3;
}

//Queue's constants
class TXBQueue{
    const PDF_GENERATION = 'pdf_generation';
}

class CustomerRegistrationType{
    const SELF = 1;
    const PMP = 2;
    const SIMMS = 3;
}

class DocumentType
{
    const IMAGE = 'image';
    const PDF = 'pdf';
}
class ICSActionType{
    const BALANCE = 'balance';
    const SALE = 'sale';
    const DEPOSIT = 'deposit';
}

const CPC_SITES_MAPPING = [
    2879 => 'S001007174',       //Mapping for Meade County Prison, Kentucky on Production Server
];
class AutoContentDiscoveryType {
    const OWN = 1;
    const ALL = 2;
}
