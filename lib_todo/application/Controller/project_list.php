<?php
require_once DIR_CLASS . DS . 'Members_Controller.php';
require_once DIR_LIBRARY . DS . 'JSON.php';

class Project_list extends Members_Controller {
    /**
     *
     * @var Dao_sml_projects
     */
    private $daoProjects;
    
    /**
     *
     * @var Dao_sml_tasks
     */
    private $daoTasks;
    
    private $year;
    private $month;
    
    public function __construct() {
        parent::__construct();
        
        $this->daoProjects = $this->loadModel('sml_projects');
        $this->daoTasks    = $this->loadModel('sml_tasks');
    }
    
    public function index() {
        $json = new Services_JSON();
        
        $aryProjectColumn = array('id', 'project_name', 'label_color_id', 'status');
        $aryTaskColumn    = array('id', 'schedule_date', 'task_name', 'options', 'status');
        
        $aryProject = array();
        $this->daoProjects->findFromUser($this->token->login_type, $this->token->user_id);
        while ( $this->daoProjects->hasNext() ) {
            $row = $this->daoProjects->next();
            
            $project = array();
            foreach ($aryProjectColumn as $column) {
                $project[$column] = $row->$column;
            }
            
            $aryTasks = array();
            $this->daoTasks->findFromProject_id($row->id);
            while ($this->daoTasks->hasNext()) {
                $rowTask = $this->daoTasks->next();
                
                $task = array();
                foreach ($aryTaskColumn as $column) {
                    $task[$column] = $rowTask->$column;
                }
                $aryTasks[] = $task;
            }
            $project['tasks'] = $aryTasks;
            
            $aryProject[] = $project;
        }
        
        header("Content-type: text/javascript; charset=UTF-8");
        echo $json->encode($aryProject);
    }
}