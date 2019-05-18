<?php

/*
	It is recommended for you to change 'auth_login_incorrect_password' and 'auth_login_username_not_exist' into something vague.
	For example: Username and password do not match.
*/

/*Common Language key start*/
$lang['save'] = "সংরক্ষণ";
$lang['cancel'] = "মুছুন";
$lang['update'] = "আপডেট";
$lang['action'] = "অ্যাকশন";
$lang['serial'] = "ক্রমিক";
$lang['gender'] = "লিঙ্গ";
$lang['add_new'] = "নতুন তৈরি করুন";
$lang['ho'] = "হেড অফিস";
$lang['ward'] = "ওয়ার্ড";
$lang['zone'] = "জোন";
$lang['unit'] = "ইউনিট";
$lang['dept'] = "বিভাগ";
$lang['section'] = "সেকশন";
$lang['job_location'] = "চাকুরি স্থান";
$lang['manage_attendence'] = "উপস্থিতি পরিচালনা করুন";
$lang['manual_attendence'] = "ম্যানুয়াল উপস্থিতি";
$lang['all'] = "সব";
$lang['date'] = "তারিখ";
$lang['submit'] = "সাবমিট";
$lang['daily_att_report'] = "দৈনিক উপস্থিতির রিপোর্ট";
$lang['daily_attendence_report'] = "দৈনিক উপস্থিতি প্রতিবেদন";
$lang['date_wise_attendence_report'] = "তারিখ অনুযায়ী উপস্থিতি রিপোর্ট";
$lang['sdate'] = "শুরুর তারিখ";
$lang['edate'] = "শেষ তারিখ";
$lang['employee_id'] = "কর্মচারীর আই ডি";
$lang['employee_name'] = "কর্মচারীর নাম";
$lang['weekend'] = "সপ্তাহান্তিক ছুটি";
$lang['holiday'] = "ছুটির দিন";
$lang['present'] = "উপস্থিত";
$lang['late'] = "বিলম্বে";
$lang['absent'] = "অনুপস্থিত";
$lang['leave'] = "ছুটি";
$lang['attendece_summary'] = "এ্যাটেনডেন্স সারাংশ";
/*Common Language key End*/

$lang['copyright_message'] = "আমারে কেউ ধর";
$lang['auth_login_username_not_exist'] = "Username not exist.";
$lang['auth_username_or_email_not_exist'] = "Username or email address not exist.";
$lang['auth_not_activated'] = "Your account hasn't been activated yet. Please check your email.";
$lang['auth_request_sent'] = "Your request to change password is already sent. Please check your email.";
$lang['auth_incorrect_old_password'] = "Your old password is incorrect.";
$lang['auth_incorrect_password'] = "Your password is incorrect.";


/*Leave Language Key Start*/
$lang['leave_type'] = "অনুপস্থিতির প্রকার";
$lang['type_name'] = "টাইপ নাম";
$lang['days'] = "দিন";
$lang['count_working_days'] = "একদিনের ছুটির জন্য কাজের দিন গণনা";
/*Leave Language Key End*/


/*Department Language Key Start*/
$lang['department_name'] = "বিভাগের নাম";
$lang['department_page_title'] = "নতুন বিভাগ যোগ করুন";
$lang['department_list'] = "বিভাগ সমূহ";
/*Department Language Key End*/

/*Designation Language Key Start*/
$lang['designation_name'] = "পদবীর নাম";
$lang['designation_page_title'] = "নতুন পদবী যোগ করুন";
$lang['designation_list'] = "পদবী সমূহ";
/*Designation Language Key End*/

/*Section Language Key Start*/
$lang['section_name'] = "সেকশন নাম";
$lang['section_page_title'] = "নতুন সেকশন যোগ করুন";
$lang['section_list'] = "সেকশন সমূহ";
/*Section Language Key End*/

/*Unit Language Key Start*/
$lang['unit_list'] = "ইউনিট সমূহ";
$lang['master_unit'] = "মাস্টার ইউনিট";
$lang['unit_name'] = "ইউনিট নাম";
/*Unit Language Key End*/

/*Ward Language Key Start*/
$lang['ward_list'] = "ওয়ার্ড সমূহ";
$lang['master_ward'] = "মাস্টার ত্তয়ার্ড";
$lang['ward_name'] = "ত্তয়ার্ড  নাম";
/*Ward Language Key End*/

/*Zone Language Key Start*/
$lang['zone_list'] = "জোন সমূহ";
$lang['master_zone'] = "মাস্টার জোন";
$lang['zone_name'] = "জোন নাম";
$lang['add_zone'] = "অ্যাড জোন";
/*Zone Language Key End*/

/*Employee Job Language Key Start*/
$lang['employee_job_list'] = "কর্মচারী কাজের ধরন সমূহ";
$lang['job_type'] = "কাজের ধরন";
$lang['employee_job_type'] = "কর্মচারী কাজের ধরন";
/*Employee Job Language Key End*/

/*report attendance */

$lang['in_time'] = "ইন টাইম";
$lang['out_time'] = "আউট টাইম";
$lang['status'] = "অবস্থা";
//$lang['absent'] = "আউট টাইম";
//$lang['holiday'] = "আউট টাইম";

/*report attendance */
// Email subject
$lang['auth_account_subject'] = "%s account details";
$lang['auth_activate_subject'] = "%s activation";
$lang['auth_forgot_password_subject'] = "New password request";

// Email content
$lang['auth_account_content'] = "Welcome to %s,

Thank you for registering. Your account was successfully created.

You can login with either your username or email address:

Login: %s
Email: %s
Password: %s

You can try logging in now by going to %s

We hope that you enjoy your stay with us.

Regards,
The %s Team";

// Admin Subject
$lang['admin_account_subject'] = "Admin account details";

// Admin Email content
$lang['admin_account_content'] = "Welcome to %s,

Thank you for registering as admin. Your account was successfully created.

Now, the super admin will moderate your account, and you cannot be able to use your account untill super admin active your account after moderation. If account is not activated within %s hours, please inform the super admin about your account, otherwise your registration will become invalid and you will have to register again.

We hope that you enjoy your stay with us.

Regards,
The %s Super Admin";

/////////////
$lang['auth_activate_content'] = "Welcome to %s,

To activate your account, you must follow the activation link below:
%s

Please activate your account within %s hours, otherwise your registration will become invalid and you will have to register again.

You can use either you username or email address to login.
Your login details are as follows:

Login: %s
Email: %s
Password: %s

We hope that you enjoy your stay with us :)

Regards,
The %s Team";

$lang['auth_forgot_password_content'] = "%s,

You have requested your password to be changed, because you forgot the password.
Please follow this link in order to complete change password process:
%s

Your New Password: %s
Key for Activation: %s

After you successfully complete the process, you can change this new password into password that you want.

If you have any more problems with gaining access to your account please contact %s.

Regards,
The %s Team";

/* End of file dx_auth_lang.php */
/* Location: ./application/language/english/dx_auth_lang.php */