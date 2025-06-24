<?php

/*
|--------------------------------------------------------------------------
| ERROR DISPLAY
|--------------------------------------------------------------------------
| In development, we want to show as many errors as possible to help
| make sure they don't make it to production. And save us hours of
| painful debugging.
 */
error_reporting(-1);
ini_set('display_errors', '1');

/*
|--------------------------------------------------------------------------
| DEBUG BACKTRACES
|--------------------------------------------------------------------------
| If true, this constant will tell the error screens to display debug
| backtraces along with the other error information. If you would
| prefer to not see this, set this value to false.
 */
defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', true);

/*
|--------------------------------------------------------------------------
| DEBUG MODE
|--------------------------------------------------------------------------
| Debug mode is an experimental flag that can allow changes throughout
| the system. This will control whether Kint is loaded, and a few other
| items. It can always be used within your own application too.
 */
defined('CI_DEBUG') || define('CI_DEBUG', true);
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