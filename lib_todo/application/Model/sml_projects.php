<?php
class Dao_sml_projects extends Dao {
    const TABLE       = 'sml_projects';
    const PRIMARY_KEY = 'id';
    
    public function __construct($setting = array()) {
        parent::__construct($setting);
        
        $this->setTable(self::TABLE);
        $this->setPrimaryKey(self::PRIMARY_KEY);
    }
    
    public function findFromUser($user_type, $user_id, $mode = 'alive') {
        $aryBind  = array();
        
        $aryWhere = array();
        $aryWhere[] = "user_type = :user_type";
        $aryBind['user_type'] = $user_type;
        
        $aryWhere[] = "user_id = :user_id";
        $aryBind['user_id'] = $user_id;
        
        if ( 'all' === $mode ) {
            $aryWhere[] = "status != 'del'";
        } else {
            $aryWhere['status'] = "status = :status";
            $aryBind['status']  = $mode;
        }
        
        $this->query( sprintf("SELECT * FROM %s WHERE " . implode(' AND ', $aryWhere), self::TABLE), $aryBind );
    }
    
    public function findFromId( $id ) {
        $this->query( sprintf("SELECT * FROM %s WHERE id = :id AND status != 'del'", self::TABLE), array('id' => $id) );
        
        return $this->hasNext() ? $this->next() : false;
    }
}