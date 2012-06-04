<?php
class Privacy extends Controller {
    const TPL_PATH = 'privacy.tpl';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->display(self::TPL_PATH);
    }
}