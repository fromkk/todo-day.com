<?php
    require_once DIR_SMARTY . DS . 'Smarty.class.php';
    require_once DIR_CLASS . DS . 'Request.php';
    require_once DIR_CLASS . DS . 'Pager.php';

    /**
     * Description of Controller
     *
     * @author KazuyaUeoka
     */
    class Controller extends Smarty {
        protected $model = array();
        
        /**
         *
         * @var Session
         */
        protected $session;
        
        /**
         *
         * @var Cookie
         */
        protected $cookie;
        
        /**
         *
         * @var array
         */
        protected $config;
        
        /**
         *
         * @var string
         */
        protected $action;
        
        /**
         *
         * @var string
         */
        protected $mode;
        
        /**
         *
         * @var Pager
         */
        protected $pager;

        public function __construct() {
            global $_config;
            parent::__construct();
            
            $this->template_dir = DIR_VIEW . DS;
            $this->compile_dir  = DIR_SMARTY . DS . 'templates_c' . DS;
            $this->config_dir   = DIR_SMARTY . DS . 'configs' . DS;
            $this->cache_dir    = DIR_SMARTY . DS . 'cache' . DS;
            
            $this->session = Session::getInstance();
            $this->cookie  = Cookie::getInstance();
            
            $this->config = $_config;
            $this->assign('config', $this->config);
            
            $this->pager = new Pager();
            
            $this->mode = $this->loadRequest('request', 'mode', 'notnull');
        }
        
        protected function loadModel( $model )
        {
            $pathModel = DIR_MODEL . DS . $model . '.php';
            if ( !is_file($pathModel) ) {
                trigger_error("Model not found : {$model}", E_USER_WARNING);
            } else {
                require_once $pathModel;
                
                $modelName = ucfirst('dao_' . $model);
                $this->model[$model] = new $modelName();
                
                return $this->model[$model];
            }
        }
        
        protected function loadRequest($type, $name, $validate = 'notnull')
        {
            $req = Request::getInstance();
            
            if ( 2 == func_num_args() && is_array($name) ) {
                switch ( strtolower($type) ) {
                    case 'get':
                        return $req->get($name);
                        break;
                    case 'post':
                        return $req->post($name);
                        break;
                    case 'request':
                        return $req->req($name);
                        break;
                }
            } else {
                switch ( strtolower($type) ) {
                    case 'get':
                        return $req->get($name, $validate);
                        break;
                    case 'post':
                        return $req->post($name, $validate);
                        break;
                    case 'request':
                        return $req->req($name, $validate);
                        break;
                }
            }
        }
    }