<?php
require DIR_CLASS . DS . 'Author_Controller.php';

class Edit extends Author_Controller {
    const TOKEN_NAME  = 'label_token';
    
    const TPL_INPUT   = 'author/label/input.tpl';
    const TPL_CONFIRM = 'author/label/confirm.tpl';
    
    /**
     *
     * @var Dao_sml_label_color
     */
    private $daoLabelColor;
    
    /**
     *
     * @var array
     */
    private $aryError = array();
    
    /**
     *
     * @var mixed
     */
    private $id = false;
    
    /**
     *
     * @var array
     */
    private $posts = array(
        'name'       => null,
        'color_code' => null,
    );
    
    public function __construct() {
        parent::__construct();
        
        $this->daoLabelColor = $this->loadModel('sml_label_color');
        
        $this->id = $this->loadRequest('request', 'id', 'digit');
        $this->assign('id', $this->id);
        
        $this->assign('token_name', self::TOKEN_NAME);
        
        if ( false !== $this->mode ) {
            $this->posts = $this->_validate();
        }
        $this->assign($this->posts);
    }
    
    public function index() {
        $token = createCode(32);
        $this->assign('errorList', $this->aryError);
        $this->assign('token'    , $token);
        $this->session->set(self::TOKEN_NAME, $token);
        
        if ( false === $this->mode && false !== $this->id ) {
            $labelColor = $this->daoLabelColor->findFromId( $this->id );
            
            $this->assign( array(
                'name' => $labelColor->name,
                'color_code' => $labelColor->color_code,
            ) );
        }
        
        $this->display(self::TPL_INPUT);
    }
    
    public function confirm() {
        $this->_checkError();
        
        $this->display(self::TPL_CONFIRM);
    }
    
    public function back() {
        $this->mode = 'back';
        
        $this->index();
        exit;
    }
    
    public function exe() {
        $this->_checkError();
        
        if ( false === $this->id ) {
            $this->daoLabelColor->insert( array(
                'name'       => $this->posts['name'],
                'color_code' => $this->posts['color_code'],
                'created'    => date('Y-m-d H:i:s', $this->config['now']),
                'status'     => 't'
            ) );
        } else {
            $this->daoLabelColor->update( array(
                'name'       => $this->posts['name'],
                'color_code' => $this->posts['color_code'],
            ), $this->id );
        }
        $this->session->del(self::TOKEN_NAME);
        
        location( './index.html' );
    }
    
    private function _validate() {
        return $this->loadRequest('post', array(
            'name'       => 'notnull',
            'color_code' => '/^[a-fA-F0-9]{,6}$|^[a-zA-Z0-9]+$/',
        ));
    }
    
    private function _checkError() {
        $token = $this->loadRequest('request', self::TOKEN_NAME, 'alnum');
        if ( false === $token || $token !== $this->session->get(self::TOKEN_NAME) ) {
            trigger_error('Access incorrect', E_USER_ERROR);
        } else {
            $this->assign('token'    , $token);
            $this->session->set(self::TOKEN_NAME, $token);
        }
        
        foreach ( $this->posts as $column => $value ) {
            if ( false === $value ) {
                switch ($column) {
                    case 'name':
                        $this->aryError[] = "色名が入力されていません。";
                        break;
                    case 'color_code':
                        $this->aryError[] = "カラーコードが正しくありません。";
                        break;
                }
            }
        }
        
        if ( 0 !== count($this->aryError) ) {
            $this->back();
        }
    }
}