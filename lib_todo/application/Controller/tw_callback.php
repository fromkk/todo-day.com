<?php
multiRequire(DIR_LIBRARY, array('twitteroauth/twitteroauth.php'));

class Tw_callback extends Controller {
    /**
     *
     * @var Dao_sml_tw_members
     */
    private $daoTwMembers;
    
    private $verifier;
    
    /**
     *
     * @var TwitterOAuth
     */
    private $tw_oauth;
    
    /**
     *
     * @var Dao_sml_login_token
     */
    private $daoLoginToken;
    
    public function __construct() {
        parent::__construct();
        
        $this->verifier = $this->loadRequest('request', 'oauth_verifier', 'notnull');
        
        $this->daoTwMembers = $this->loadModel('sml_tw_members');
        $this->daoLoginToken = $this->loadModel('sml_login_token');
    }
    
    public function index() {
        if ( false !== $this->verifier && false !== $this->session->get('oauth_token') && false !== $this->session->get('oauth_token_secret') ) {
            $this->tw_oauth = new TwitterOAuth(
                    $this->config['twitter']['consumer_key'],
                    $this->config['twitter']['consumer_secret'],
                    $this->session->get('oauth_token'),
                    $this->session->get('oauth_token_secret'));
            
            $accessToken = $this->tw_oauth->getAccessToken($this->verifier);
            
            $members = $this->daoTwMembers->findFromUser_id($accessToken['user_id']);
            if ( false === $members ) {
                $this->daoTwMembers->insert(array(
                    'user_id'            => $accessToken['user_id'],
                    'screen_name'        => $accessToken['screen_name'],
                    'oauth_token'        => $accessToken['oauth_token'],
                    'oauth_token_secret' => $accessToken['oauth_token_secret'],
                    'created'            => date('Y-m-d H:i:s', time()),
                    'status'             => 't',
                ));
            } else {
                $this->daoTwMembers->update(array(
                    'screen_name'        => $accessToken['screen_name'],
                    'oauth_token'        => $accessToken['oauth_token'],
                    'oauth_token_secret' => $accessToken['oauth_token_secret'],
                ), $members->id);
            }
            
            $this->session->set('login_type', 'tw');
            $this->session->set('user_id'   , $accessToken['user_id']);
            
            $token = createCode( 32 );
            $this->daoLoginToken->insert( array(
                'token'      => $token,
                'login_type' => 'tw',
                'user_id'    => $accessToken['user_id'],
                'created'    => date('Y-m-d H:i:s', $this->config['now']),
                'status'     => 't',
            ) );
            $this->cookie->set('sml_token', $token);
            
            location('./index.html');
        }
        
        trigger_error('Twitter Login Error', E_USER_ERROR);
    }
}