<?php
require DIR_LIBRARY . DS . 'Facebook/facebook.php';

class Fb_login extends Controller {
    /**
     *
     * @var Facebook
     */
    private $facebook;
    
    /**
     *
     * @var Dao_sml_fb_members
     */
    private $daoFbMembers;
    
    /**
     *
     * @var Dao_sml_login_token
     */
    private $daoLoginToken;
    
    public function __construct() {
        parent::__construct();
        
        $this->daoFbMembers = $this->loadModel('sml_fb_members');
        $this->daoLoginToken = $this->loadModel('sml_login_token');
        
        $this->facebook = new Facebook(array(
            'appId'  => $this->config['facebook']['app_id'],
            'secret' => $this->config['facebook']['app_secret'],
            'cookie' => true,
        ));
    }
    
    public function index() {
        $user = $this->facebook->getUser();
        
        if ( 0 != $user ) {
            $userProfile = $this->facebook->api('/me');
            
            $this->session->set('login_type', 'fb');
            $this->session->set('user_id'   , $userProfile['id']);
            
            $member = $this->daoFbMembers->findFromUser_id($userProfile['id']);
            if ( false === $member ) {
                $this->daoFbMembers->insert( array(
                    'user_id'     => $userProfile['id'],
                    'screen_name' => $userProfile['name'],
                    'created'     => date('Y-m-d H:i:s', $this->config['now']),
                    'status'      => 't',
                ) );
            } else {
                $this->daoFbMembers->update( array(
                    'user_id'     => $userProfile['id'],
                    'screen_name' => $userProfile['name'],
                ), $member->id );
            }
            
            $token = createCode( 32 );
            $this->daoLoginToken->insert( array(
                'token'      => $token,
                'login_type' => 'fb',
                'user_id'    => $userProfile['id'],
                'created'    => date('Y-m-d H:i:s', $this->config['now']),
                'status'     => 't',
            ) );
            $this->cookie->set('sml_token', $token);
            
            location( './index.html' );
        } else {
            location( $this->facebook->getLoginUrl(array()) );
        }
    }
}
