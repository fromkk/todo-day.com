<?php
/**
 * Description of Author_Controller
 *
 * @author KazuyaUeoka
 */
class Author_Controller extends Controller {
    const TPL_LOGIN = 'author/login.tpl';
    
    private $author_user = false;
    private $author_pass = false;
    
    protected $active;

    public function __construct() {
        parent::__construct();
        
        $auth = $this->_login();
        if ( false === $auth ) 
        {
            $this->session->del('author_user');
            $this->session->del('author_pass');
            $this->login();
        } else {
            $this->assign('auth', $auth);
            
            $this->session->set( 'author_user', $this->author_user );
            $this->session->set( 'author_pass', $this->author_pass );
        }
    }
    
    private function _login()
    {
        if ( false !== $this->session->get('author_user') && false !== $this->session->get('author_pass') ) {
            $this->author_user = $this->session->get('author_user');
            $this->author_pass = $this->session->get('author_pass');
        } else {
            $this->author_user = $this->loadRequest('post', 'user_name', 'half');
            $this->author_pass = $this->loadRequest('post', 'passwd', 'half');
            if ( false !== $this->author_pass ) {
                $this->author_pass = sha1($this->author_pass);
            }
        }
        
        if ( false === $this->author_user || false === $this->author_pass ) {
            return false;
        }
        
        $this->loadModel('sml_author');
        $auth = $this->model['sml_author']->auth( $this->author_user, $this->author_pass );
        
        return $auth;
    }
    
    public function login()
    {
        $this->assign( array(
            'user_name' => $this->author_user
          , 'passwd'    => null
        ) );
        
        $this->display(self::TPL_LOGIN);
        exit;
    }
    
    public function logout()
    {
        $this->session->del('author_user');
        $this->session->del('author_pass');
        
        $this->login();
    }
    
    public function display($template = null, $cache_id = null, $compile_id = null, $parent = null) {
        $this->assign('active', $this->active);
        
        parent::display($template, $cache_id, $compile_id, $parent);
    }
}