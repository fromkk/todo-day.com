<?php
require DIR_CLASS . DS . 'Members_Controller.php';

class Logout extends Members_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        switch ($this->session->get('login_type')) {
            case 'tw':
                break;
            case 'fb':
                $this->cookie->del('fbs_' . $this->config['facebook']['app_id']);
                break;
        }
        session_destroy();
        $this->cookie->del('sml_token');
        
        location('./index.html');
    }
}