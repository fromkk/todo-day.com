<?php
multiRequire(DIR_LIBRARY, array('twitteroauth/twitteroauth.php'));

class Tw_login extends Controller {
    /**
     *
     * @var TwitterOAuth
     */
    private $tw_oauth;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        if ( false === $this->session->get('oauth_token') && false === $this->session->get('oauth_token_secret') ) {
            $this->tw_oauth = new TwitterOAuth($this->config['twitter']['consumer_key'], $this->config['twitter']['consumer_secret']);
            
            $token = $this->tw_oauth->getRequestToken();
            
            if ( false !== $token ) {
                $this->session->set('oauth_token'       , $token['oauth_token']);
                $this->session->set('oauth_token_secret', $token['oauth_token_secret']);
                
                $url = $this->tw_oauth->getAuthorizeURL($token);
                location($url);
                exit;
            }
        } else {
            location('./index.html');
        }
    }
}