<?php

class Dao_sml_author extends Dao {
    const TABLE = 'sml_author';
    const PRIMARY_KEY = 'id';
    
    public function __construct($setting = array()) {
        parent::__construct($setting);
    }
    
    /**
     *
     * @param string $user
     * @param string $passwd 
     */
    public function auth($user_name, $passwd)
    {
        $bind = array(
            'user_name' => $user_name
          , 'passwd'    => $passwd
        );
        
        $this->query( sprintf("SELECT * FROM %s WHERE user_name = :user_name AND passwd = :passwd AND status = 't'", self::TABLE)
                , $bind );
        
        return $this->hasNext() ? $this->next() : false;
    }
}