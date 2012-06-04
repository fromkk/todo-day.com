<?php
class Dao_sml_fb_members extends Dao {
    const TABLE = 'sml_fb_members';
    const PRIMARY_KEY = 'id';
    
    public function __construct($setting = array()) {
        parent::__construct($setting);
        
        $this->setTable(self::TABLE);
        $this->setPrimaryKey(self::PRIMARY_KEY);
    }
    
    public function findFromUser_id($user_id) {
        $this->query( sprintf("SELECT * FROM %s WHERE user_id = :user_id AND status = 't'", self::TABLE), array('user_id' => $user_id) );
        
        return $this->hasNext() ? $this->next() : false;
    }
}