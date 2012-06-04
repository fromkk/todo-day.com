<?php
require DIR_CLASS . DS . 'Author_Controller.php';

class Index extends Author_Controller {
    const TPL_LIST = 'author/label/list.tpl';
    
    /**
     *
     * @var Dao_sml_label_color
     */
    private $daoLabelColor;
    
    /**
     *
     * @var array
     */
    private $aryLabelColor = array();
    
    public function __construct() {
        parent::__construct();
        
        $this->daoLabelColor = $this->loadModel('sml_label_color');
    }
    
    public function index() {
        $this->daoLabelColor->findAll();
        while ( $this->daoLabelColor->hasNext() ) {
            $row = $this->daoLabelColor->next();
            
            $this->aryLabelColor[] = $row;
        }
        $this->assign('colorList', $this->aryLabelColor);
        
        $this->display(self::TPL_LIST);
    }
}