<?php
require DIR_CLASS . DS . 'Members_Controller.php';
require DIR_LIBRARY . DS . 'JSON.php';

class Create_task extends Members_Controller {
    
    /**
     *
     * @var Dao_sml_tasks
     */
    private $daoTask;
    
    /**
     *
     * @var Dao_sml_projects
     */
    private $daoProject;
    
    public function __construct() {
        parent::__construct();
        
        $this->daoTask = $this->loadModel('sml_tasks');
        
        $this->daoProject = $this->loadModel('sml_projects');
    }
    
    public function index() {
        $json = new Services_JSON();
        
        $aryError = array();
        
        $posts = $this->_validate();
        if ( false === $posts['project_id'] ) {
            $aryError[] = "プロジェクトが指定されていません。";
        } else {
            $project = $this->daoProject->findFromId( $posts['project_id'] );
            if ( false === $project ) {
                $aryError[] = "プロジェクトが存在しません。";
            } else if ( $project->user_type != $this->token->login_type || $project->user_id != $this->token->user_id ) {
                $aryError[] = "アクセスが正しくありません。";
            }
        }
        
        if ( 0 === count($aryError) ) {
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
        }
        
        header("Content-type:text/javascript; charset=UTF-8");
        $aryResult = array();
        if ( 0 !== count($aryError) ) {
            $aryResult['result'] = false;
            $aryResult['reason'] = $aryError;
        } else {
            $this->daoTask->insert(array(
                'project_id'     => $posts['project_id'],
                'task_name'      => $posts['task_name'],
                'schedule_date'  => sprintf('%04d-%02d-%02d', $posts['schedule_year'], $posts['schedule_month'], $posts['schedule_day']),
                'options'        => $posts['options'],
                'created'        => date('Y-m-d H:i:s', time()),
                'status'         => 'yet',
            ));
            
            $aryResult['result'] = true;
            $aryResult['id']     = $this->daoTask->getInsertId();
        }
        
        echo $json->encode($aryResult);
    }
    
    private function _validate() {
        return $this->loadRequest('post', array(
            'project_id'     => 'digit',
            'task_name'      => 'notnull&max:100',
            'options'        => 'notnull|null',
            'schedule_year'  => 'year',
            'schedule_month' => 'month',
            'schedule_day'   => 'day',
        ));
    }
}