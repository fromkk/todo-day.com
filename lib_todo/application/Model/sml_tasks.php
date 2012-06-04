<?php
class Dao_sml_tasks extends Dao {
    const TABLE = 'sml_tasks';
    const PRIMARY_KEY = 'id';
    
    public function __construct($setting = array()) {
        parent::__construct($setting);
        
        $this->setTable(self::TABLE);
        $this->setPrimaryKey(self::PRIMARY_KEY);
    }
    
    /**
     *
     * @param type $project_id
     * @param type $year
     * @param type $month
     * @param type $mode
     * @param type $order
     * @return type 
     */
    public function findFromProject_id($project_id, $year = null, $month = null, $mode = 'yet', $order = 'schedule_date ASC') {
        $aryWhere = array();
        $aryBind  = array();
        
        $aryWhere[] = "project_id = :project_id";
        $aryBind["project_id"]  = $project_id;
        
        if ( null !== $year && null !== $month ) {
            $lastDay = date('t', mktime(0, 0, 0, $month, 1, $year));
            
            $aryWhere[] = sprintf("schedule_date >= '%04d-%02d-01'", $year, $month);
            $aryWhere[] = sprintf("schedule_date <= '%04d-%02d-%02d'", $year, $month, $lastDay);
        }
        
        if ( 'all' === $mode ) {
            $aryWhere[] = "status != 'del'";
        } else {
            $aryWhere[] = "status = :status";
            $aryBind['status'] = $mode;
        }
        
        return $this->query( sprintf("SELECT * FROM %s WHERE " . implode(' AND ', $aryWhere) . " ORDER BY {$order}", self::TABLE), $aryBind );
    }
    
    public function findFromId($id) {
        $this->query(sprintf("SELECT * FROM %s WHERE id = :id AND status != 'del'", self::TABLE), array('id' => $id));
        
        return $this->hasNext() ? $this->next() : false;
    }
}