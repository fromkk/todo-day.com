<?php
require DIR_CLASS . DS . 'Author_Controller.php';

class Index extends Author_Controller {
    const TPL_PATH = 'author/index.tpl';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->display(self::TPL_PATH);
    }
}