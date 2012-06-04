<?php
class Dao_sml_login_token extends Dao {
    const TABLE = 'sml_login_token';
    const PRIMARY_KEY = 'id';
    
    public function __construct($setting = array()) {
        parent::__construct($setting);
        
        $this->setTable(self::TABLE);
        $this->setPrimaryKey(self::PRIMARY_KEY);
    }
    
    public function findFromToken($token) {
        $this->query( sprintf("SELECT * FROM %s WHERE token = :token AND status = 't'", self::TABLE), array('token' => $token) );
        
        return $this->hasNext() ? $this->next() : false;
    }
}