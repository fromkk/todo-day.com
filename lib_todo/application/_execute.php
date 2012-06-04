<?php
    require_once dirname(__FILE__) . DS . 'common/func/require.php';
    require_once dirname( dirname(__FILE__) ) . DS . 'config' . DS . 'config.php';
    
    multiRequire(DIR_FUNC , array(
        'general.php'
    ));
    multiRequire(DIR_CLASS, array(
        'Controller.php'
      , 'Dao.php'
      , 'Cookie.php'
      , 'Session.php'
    ));
    
    $aryController = makeControllerName();
    
    if ( ! is_file($aryController['path']) ) {
        disp404();
    }
    
    require_once $aryController['path'];
    if ( ! class_exists($aryController['class']) ) {
        disp404();
    }
    
    $_config['action'] = isset($_REQUEST['action']) ? trim($_REQUEST['action']) : 'index';
    $_config['class']  = $aryController['class'];
    $_config['method'] = $aryController['method'];
    $_config['self']   = basename($_config['action']) . '.html';
    $controller = new $aryController['class'];
    if ( ! method_exists($controller, $aryController['method']) ) {
        disp404();
    }
    
    $method = $aryController['method'];
    $controller->$method();