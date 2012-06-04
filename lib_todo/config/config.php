<?php
    $_config = array();
    
    //SITE SETTING
    $_config['site_title'] = "Today";
    $_config['domain']     = $_SERVER['SERVER_NAME'];
    
    $_config['scheme'] = 'http';
    if ( isset($_SERVER['HTTPS']) ) {
        $_config['scheme'] = 'https';
    }
    
    $_config['url']        = $_config['scheme'] . '://' . $_config['domain'];
    $_config['top']        = $_config['url'];
    $_config['author']     = $_config['top'] . '/author';
    
    $_config['mail']       = 'iueokakkun@gmail.com';
    
    //DB SETTING
    $_config['db_type'] = 'mysql';
    $_config['db_host'] = 'mysql114.db.sakura.ne.jp';
    $_config['db_user'] = 'evedoko';
    $_config['db_pass'] = 'bgpDWpRm';
    $_config['db_port'] = '';
    $_config['db_name'] = 'evedoko';
    
    //日付
    $_config['now'] = time();
    $_config['start_year'] = 2012;
    list( $_config['year']
        , $_config['month']
        , $_config['day']
        , $_config['hour']
        , $_config['minute']
        , $_config['second'] ) = sscanf( date('Y-m-d H:i:s', $_config['now']), '%04d-%02d-%02d %02d:%02d:%02d' );
    $_config['weeks']['jp'] = array(
        0 => '日',
        1 => '月',
        2 => '火',
        3 => '水',
        4 => '木',
        5 => '金',
        6 => '土',
    );
    $_config['weeks']['en'] = array(
        0 => 'Sun',
        1 => 'Mon',
        2 => 'Tue',
        3 => 'Wed',
        4 => 'Thu',
        5 => 'Fri',
        6 => 'Sat',
    );
    
    //マスターテーブル
//    $_config['master_tbl']['cr_club']  = "クラブ";
//    $_config['master_tbl']['cr_house'] = 'シェアハウス';
    //$_config['master_tbl']['cr_state'] = '都道府県';
    
    //固定データ
    $_config['master']['sex'] = array('m' => '男性'
                                    , 'f' => '女性');
    $_config['master']['start_year'] = 2012;
    $_config['master']['year']  = range(1950, $_config['year']);
    $_config['master']['month'] = range(1, 12);
    $_config['master']['day']   = range(1, 31);
    $_config['master']['schedule_year'] = range($_config['master']['start_year'], $_config['year'] + 1);
    
    //Twitter設定
    $_config['twitter']['consumer_key']    = 'hWwkFfSxY2H1Ljyc1nnGFg';
    $_config['twitter']['consumer_secret'] = 'VcHJLeJuLzKsLmOSUB5JZa2Iq2a5UtN7Gj1VBewRw';
    
    //Facebook設定
    $_config['facebook']['app_id']     = '206151349492731';
    $_config['facebook']['app_secret'] = '9c82310723a041162ffc5e7becf3e533';
    
    //アップロード
    $_config['image']['upload']  = DOCUMENT_ROOT . DS . 'img/upload';
    $_config['image']['icon']    = DOCUMENT_ROOT . DS . 'img/icon';
    $_config['image']['comment'] = DOCUMENT_ROOT . DS . 'img/comment';
    $_config['image']['thumb']   = DOCUMENT_ROOT . DS . 'img/thumb';
    
    define( 'DIR_CONFIG'    , dirname(__FILE__) );
    
    define( 'DIR_CONTROLLER', DIR_APPLICATION . DS . 'Controller');
    define( 'DIR_MODEL'     , DIR_APPLICATION . DS . 'Model' );
    define( 'DIR_VIEW'      , DIR_APPLICATION . DS . 'View' );
    
    define( 'DIR_COMMON'    , DIR_APPLICATION . DS . 'common' );
    define( 'DIR_CLASS'     , DIR_COMMON . DS . 'class' );
    define( 'DIR_FUNC'      , DIR_COMMON . DS . 'func');
    define( 'DIR_LIBRARY'   , DIR_COMMON . DS . 'library' );
    
    define( 'DIR_SMARTY'    , DIR_LIBRARY . DS . 'Smarty' );
    
    define( 'DOMAIN'        , '' !== $_config['domain'] ? $_config['domain'] : $_SERVER['SERVER_NAME'] );