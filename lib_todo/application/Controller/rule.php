<?php
class Rule extends Controller {
    const TPL_PATH = 'rule.tpl';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->display(self::TPL_PATH);
    }
}