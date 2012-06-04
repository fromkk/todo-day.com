<?php
class Dao_sml_label_color extends Dao {
    const TABLE = 'sml_label_color';
    const PRIMARY_KEY = 'id';
    
    public function __construct($setting = array()) {
        parent::__construct($setting);
        
        $this->setTable(self::TABLE);
        $this->setPrimaryKey(self::PRIMARY_KEY);
    }
    
    public function findAll($order = 'ASC') {
        return $this->query(sprintf("SELECT * FROM %s WHERE status = 't' ORDER BY id {$order}", self::TABLE));
    }
    
    public function findFromId($id) {
        $this->query( sprintf("SELECT * FROM %s WHERE id = :id AND status = 't'", self::TABLE), array('id' => $id) );
        
        return $this->hasNext() ? $this->next() : false;
    }
}