<?php
require DIR_CLASS . DS . 'Members_Controller.php';
require DIR_LIBRARY . DS . 'JSON.php';

class Edit_task extends Members_Controller {
    
    private $id;
    
    /**
     *
     * @var Dao_sml_tasks
     */
    private $daoTasks;
    
    /**
     *
     * @var Dao_sml_projects
     */
    private $daoProject;
    
    private $task;
    
    private $post;
    
    public function __construct() {
        parent::__construct();
        
        $this->id = $this->loadRequest('request', 'id', 'digit');
        
        if ( false === $this->id ) {
            disp404();
        }
        
        $this->daoTasks = $this->loadModel('sml_tasks');
        $this->task = $this->daoTasks->findFromId( $this->id );
        if ( false === $this->task ) {
            disp404();
        }
        
        $this->daoProject = $this->loadModel('sml_projects');
        $project = $this->daoProject->findFromId($this->task->project_id);
        
        if ( false === $project
                || $project->user_type != $this->token->login_type
                || $project->user_id != $this->token->user_id ) {
            disp404();
        }
    }
    
    public function index() {
        
    }
    
    public function edit() {
        $json  = new Services_JSON();
        $posts = $this->_validateEdit();
        
        $aryError = array();
        
        foreach ($posts as $key => $val) {
            if ( false === $val ) {
                switch ($key) {
                    case 'task_name':
                        $aryError[] = "タスク名が正しくありません。";
                        break;
                }
            }
        }

        if ( false === checkdate($posts['schedule_month'], $posts['schedule_day'], $posts['schedule_year']) ) {
            $aryError[] = "タスク実行日が正しくありません。";
        }
        
        header("Content-type:text/javascript; charset=UTF-8");
        $aryResult = array();
        if ( 0 !== count($aryError) ) {
            $aryResult['result'] = false;
            $aryResult['reason'] = $aryError;
        } else {
            $this->daoTasks->update(array(
                'task_name'      => $posts['task_name'],
                'schedule_date'  => sprintf('%04d-%02d-%02d', $posts['schedule_year'], $posts['schedule_month'], $posts['schedule_day']),
                'options'        => $posts['options'],
            ), $this->id);
            
            $aryResult['result'] = true;
        }
        
        echo $json->encode($aryResult);
    }
    
    public function delete() {
        $json = new Services_JSON();
        
        $this->daoTasks->update(array('status' => 'del'), $this->id);
        
        header("Content-type:text/javascript; charset=UTF-8");
        echo $json->encode(array('result' => true));
    }
    
    public function done() {
        $json = new Services_JSON();
        
        $this->daoTasks->update(array('status' => 'done'), $this->id);
        
        header("Content-type:text/javascript; charset=UTF-8");
        echo $json->encode(array('result' => true));
    }
    
    public function yet() {
        $json = new Services_JSON();
        
        $this->daoTasks->update(array('status' => 'yet'), $this->id);
        
        header("Content-type:text/javascript; charset=UTF-8");
        echo $json->encode(array('result' => true));
    }
    
    public function tomorrow() {
        $json = new Services_JSON();
        
        list($year, $month, $day) = sscanf($this->task->schedule_date, '%04d-%02d-%02d');
        $date = date('Y-m-d', mktime(0, 0, 0, $month, $day + 1, $year));
        
        $this->daoTasks->update(array('schedule_date' => $date), $this->id);
        
        header("Content-type:text/javascript; charset=UTF-8");
        echo $json->encode(array('result' => true));
    }
    
    private function _validateEdit() {
        return $this->loadRequest('post', array(
            'task_name'      => 'notnull&max:100',
            'options'        => 'notnull|null',
            'schedule_year'  => 'year',
            'schedule_month' => 'month',
            'schedule_day'   => 'day',
        ));
    }
}