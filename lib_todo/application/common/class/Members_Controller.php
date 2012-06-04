<?php
class Members_Controller extends Controller {
    
    /**
     *
     * @var Dao_sml_tw_members
     */
    private $daoTwMembers;
    
    /**
     *
     * @var Dao_sml_fb_members
     */
    private $daoFbMembers;
    
    /**
     *
     * @var bool
     */
    protected $isMember = false;
    
    protected $members;
    
    protected $flgAutoLogin = true;
    
    protected $token;
    
    /**
     *
     * @var Dao_sml_login_token
     */
    private $daoLoginToken;
    
    public function __construct() {
        parent::__construct();
        
        $this->daoTwMembers  = $this->loadModel('sml_tw_members');
        $this->daoFbMembers  = $this->loadModel('sml_fb_members');
        $this->daoLoginToken = $this->loadModel('sml_login_token');
        
        $this->token = $this->daoLoginToken->findFromToken($this->cookie->get('sml_token'));
        
        if ( true === $this->flgAutoLogin ) {
            if ( false === $this->_login() ) {
                location( $this->config['top'] );
                exit;
            }
        }
    }
    
    protected function _login() {
        if ( false !== $this->token ) {
            $this->isMember = true;
            
            return $this->isMember;
        } else {
            if ( false !== $this->session->get('login_type') && false !== $this->session->get('user_id') ) {
                switch ($this->session->get('login_type')) {
                    case 'tw':
                        $this->members = $this->daoTwMembers->findFromUser_id($this->session->get('user_id'));

                        if ( false === $this->members ) {
                            $this->session->del('login_type');
                            $this->session->del('user_id');

                            $this->isMember = false;
                        } else {
                            $this->assign('user_name', isset($this->members->screen_name) ? $this->members->screen_name : null);
                            $this->isMember = true;
                            
                            
                        }
                        break;
                    case 'fb':
                        $this->members = $this->daoFbMembers->findFromUser_id($this->session->get('user_id'));

                        if ( false === $this->members ) {
                            $this->session->del('login_type');
                            $this->session->del('user_id');

                            $this->isMember = false;
                        } else {
                            $this->assign('user_name', isset($this->members->screen_name) ? $this->members->screen_name : null);
                            $this->isMember = true;
                        }
                        break;
                    default:
                        $this->session->del('login_type');
                        $this->session->del('user_id');

                        $this->isMember = false;
                        break;
                }
            }
        }
        
        return $this->isMember;
    }
    
    public function logout()
    {
        $this->session->del('login_type');
        $this->session->del('user_id');
        
        location( $this->config['top'] );
        exit;
    }
}