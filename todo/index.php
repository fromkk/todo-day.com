<?php
    define( 'DS', DIRECTORY_SEPARATOR );
    
    define( 'DOCUMENT_ROOT', dirname(__FILE__) );
    
    /**
     * develop | release
     */
    define( 'DEVELOP_MODE', 'develop' );
    
    switch ( DEVELOP_MODE ) {
        case 'develop':
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            break;
        case 'release':
            ini_set('display_errors', 0);
            break;
    }
    
    define( 'DIR_APPLICATION', dirname(dirname(__FILE__)) . DS . 'lib_todo/application' );
    $exePath = DIR_APPLICATION . DS . '_execute.php';
    if (is_file($exePath) ) {
        require $exePath;
    } else {
        trigger_error("Install error", E_USER_ERROR);
    }
    