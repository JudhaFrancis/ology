<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class AppConstant extends BaseConfig
{

	public $password_encrept_key = 'abcdefghtjklmnopqrstuvwxyz1234567890';
	public $jwt_key = 'ddfgdjgjiodniduo';
	public $expireTimeInteravel = 4 * 3600; // 4h
	public $paginationPerPage = 15;
	public $app_name = ['ADMIN_APP_WEB', 'MOBILE_APP_STAFF', 'MOBILE_APP_SPONSOR', 'API', 'CLIENT_SERVER'];
	public $trustLogoUploadPath = 'uploads/trust/logo';
	public $blogImgPath = 'uploads/blog/';
	public $galleryImgPath = 'uploads/gallery/';
	public $galleryMultiImgPath = 'uploads/event/img';
	public $eventImgPath = 'uploads/event/';
	public $activityPath = 'uploads/activity/';
	public $serverPathUpload;
	public $TEM_PATH = 'uploads/temp/';
	public $TOKEN_REMOTE_ACCESS = 'YMsIVVsthyRIknXFpOnqkxnqqOYxW6nv_duANIEdB_g';
	public $LOG_STATUS = array('ERROR' => '0', 'INFO' => '1', 'CRITICAL_ERROR' => '4', 'ALERT' => '3', 'WARNING' => '2');
	public $ERROR_LOG_ENABLE = true;
	public $INFO_LOG_ENABLE = true;
	public $WARNING_LOG_ENABLE = true;
	public $OTP_TRIES = 3;
	public $OTP_VALID = 5; // 5mints
	public $mobileAppPath = 'uploads/app/apk';

	// payroll
	public $staffLeaveUploadPath = 'uploads/staff/leave/';
	public $headConstValue = ['basic', 'is_epf', 'is_esi', 'saving', 'allowance', 'loan', 'slot', 'increment', 'is_welfare', 'hra_percentage_value', 'deduction', 'year_of_experience'];
}
define('APPKEY', 'ae5ead48-a87e-4b54-9489-5540605ff2a6');
define('AUTHKEY', 'e6cQDjQT6v73YazavPBIkjOXjRnocMlFv2CFpqxi9e15EuWg8y');
