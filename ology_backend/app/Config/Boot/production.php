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
// define('DB_USERNAME','root');
// define('DB_PASSWORD','');
// define('MASTER_DB_NAME','ssamtorg_iaoi');
// define('MAIL_DB_NAME','');
// define('MAIL_HOST', '');
// define('MAIL_USER','');
// define('MAIL_FROM_USER','');
// define('MAIL_FROM_USER_NAME',' Admin');
// define('MAIL_PASSWORD', '');
// define('MAIL_PORT', 465);
// define('MAIL_PROTOCOL','smtp');
// define('API','https://admin.sharethelightug.org/api/api/v1');