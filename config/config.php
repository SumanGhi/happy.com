<?php
    ob_start();
    session_start();


    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PWD', '');
    define('DB_NAME', 'matrimony');

    define('SITE_URL', 'http://happywedding.com');
    define('SITE_NAME', 'happywedding'); 

    define('CLASS_PATH', $_SERVER['DOCUMENT_ROOT'].'/class');   //

    define('ADMIN_URL', SITE_URL.'/cms');
    

    /** Admin ASSETS */
    define('ASSETS_URL', SITE_URL.'/assets');
    define('CMS_ASSETS_URL', ASSETS_URL.'/cms');
    define('CMS_DIST_URL', CMS_ASSETS_URL.'/dist/');
    define('CMS_VENDOR_URL', CMS_ASSETS_URL.'/vendor/');


    define('LOG_PATH', $_SERVER['DOCUMENT_ROOT'].'/logs');
    define('UPLOAD_DIR', $_SERVER['DOCUMENT_ROOT'].'/uploads/');
    define('UPLOAD_URL',SITE_URL.'/uploads/');
    //
    define('ALLOWED_EXTENSIONS', array('jpg','jpeg','png','gif','bmp'));
    // $allowed_extensionts =  array('jpg','jpeg','png','gif','bmp');