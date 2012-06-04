<?php
class About extends Controller {
    const TPL_PATH = 'about.tpl';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->display(self::TPL_PATH);
    }
}