<?php
class Style extends Controller {
    const TPL_PATH = 'style.tpl';
    
    /**
     *
     * @var Dao_sml_label_color
     */
    private $daoLabelColor;
    
    public function __construct() {
        parent::__construct();
        
        $this->daoLabelColor = $this->loadModel('sml_label_color');
    }
    
    public function index() {
        $aryColorList = array();
        
        $this->daoLabelColor->findAll();
        while ( $this->daoLabelColor->hasNext() ) {
            $row = $this->daoLabelColor->next();
            
            $aryColorList[$row->id] = $row->color_code;
        }
        $this->assign('colorList', $aryColorList);
        
        $this->display(self::TPL_PATH);
    }
    
    public function display($template = null, $cache_id = null, $compile_id = null, $parent = null) {
        header("Content-type:text/css");
        
        parent::display($template, $cache_id, $compile_id, $parent);
    }
}