<?php

//Guard Name Keys
define('ADMIN_GUARD', 'admins');
define('INMATE_GUARD', 'inmates');
define('CUSTOMER_GUARD', 'customers');
define('CORRECTIONAL_OFFICER_GUARD', 'correctional_officers');

//Super Admin Role key
define('SUPER_ADMIN', 'Super Admin');
define('ADMIN', 'Administrator');

// Customer Role Key
define('CUSTOMER_STANDARD', 'Standard');
define('CUSTOMER_BUSINESS', 'Business');

class CustomerRole
{
    const FRIEND_FAMILY = "Friend_Family";
    const ORGANIZATION = "Organization";
    const ATTORNEY = "Attorney";
    const PUBLIC_OFFICIAL = "Public_Official";
}

// SIMMS User/Admin Permission Keys
define('MANAGE_SIMMS_USERS', 'Manage SIMMS Users');
define('MANAGE_CUSTOMERS', 'Manage Customers');
define('MANAGE_CAMMP_USERS', 'Manage CAMMP Users');
define('MANAGE_MAIL_API_USERS', 'Manage Mail API Users');
define('MANAGE_INMATES', 'Manage Inmates');
define('MANAGE_CORRECTIONAL_FACILITIES', 'Manage Correctional Facilities');
define('MANAGE_CMS', 'Manage CMS');
define('MANAGE_CONFIGURATIONS', 'Manage Configurations');
define('MANAGE_DISCOUNT_DEALS', 'Manage Discount Deals');
define('MANAGE_PMP', 'Manage Physical Mail Process');
define('MANAGE_IR_PANEL', 'Manage IR Panel');
define('MANAGE_ADJUSTMENTS', 'Manage Adjustments');
define('MANAGE_PMP_INVOICES', 'Manage Physical Mail Processing Invoices');
define('MANAGE_BUSINESS_CENTER_CLIENTS_INVOICES', 'Manage Business Center Client Invoices');
define('MANAGE_SIMMS_AUDIT_TRAIL', 'Manage SIMMS Audit Trail');
define('MANAGE_INQUIRIES', 'Manage Inquiries');
define('MANAGE_MASS_MAILER', 'Manage Mass Mailer');
define('MANAGE_PRODUCTION_PANEL', 'Manage Production Panel');
define('MANAGE_DIMI_SERVICE_USER', 'Manage DIMI Service User');
define('MANAGE_ICS_CONFIGURATIONS', 'Manage ICS Configurations');
define('MANAGE_VEND_ENGINE_CONFIGURATION', 'Manage Vend Engine Configuration');
define('MANAGE_STATISTICS_AND_REPORTING', 'Manage Statistics & Reporting');
define('MANAGE_IMI_USER', 'Manage IMI User');
define('MANAGE_ALL_COMMUNICATIONS', 'Manage All Communications');
define('MANAGE_PMP_QA_PANEL', 'Manage PMP QA Panel');
define('MANAGE_MODERATION_REASONS', 'Manage Moderation Reasons');
