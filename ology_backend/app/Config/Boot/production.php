<?php

/*
 |--------------------------------------------------------------------------
 | ERROR DISPLAY
 |--------------------------------------------------------------------------
 | Don't show ANY in production environments. Instead, let the system catch
 | it and display a generic error message.
 */
ini_set('display_errors', '0');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);

/*
 |--------------------------------------------------------------------------
 | DEBUG MODE
 |--------------------------------------------------------------------------
 | Debug mode is an experimental flag that can allow changes throughout
 | the system. It's not widely used currently, and may not survive
 | release of the framework.
 */
defined('CI_DEBUG') || define('CI_DEBUG', false);
define('DB_HOST','15.207.55.106');
define('DB_USERNAME', 'agoo_dev');
define('DB_PASSWORD', 'AgooAdmin@321');
define('MASTER_DB_NAME', 'ology_db');
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_USER', 'itoitesting01@gmail.com');
define('MAIL_FROM_USER_NAME', 'OLOGYGIRLS');
define('MAIL_FROM_USER', 'OLOGYGIRLS');
define('MAIL_PASSWORD', 'zakemtyiwhafbnlb');
define('MAIL_PORT', 465);
define('MAIL_PROTOCOL', 'smtp');
define('TEST_EMAIL', 'agootechnology@gmail.com');