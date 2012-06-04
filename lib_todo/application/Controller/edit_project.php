<?php
require DIR_CLASS . DS . 'Members_Controller.php';
require DIR_LIBRARY . DS . 'JSON.php';

class Edit_project extends Members_Controller {
    
    private $id;
    
    /**
     *
     * @var Dao_sml_projects
     */
    private $daoProject;
    
    private $project;
    
    public function __construct() {
        parent::__construct();
        
        $this->id = $this->loadRequest('request', 'id', 'digit');
        
        if ( false === $this->id ) {
            disp404();
        }
        
        $this->daoProject = $this->loadModel('sml_projects');
        $this->project    = $this->daoProject->findFromId( $this->id );
        if ( false === $this->project ) {
            disp404();
        }
        
        if ( false === $this->project
                || $this->project->user_type != $this->token->login_type
                || $this->project->user_id != $this->token->user_id ) {
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
                    case 'project_name':
                        $aryError[] = "プロジェクト名が正しくありません。";
                        break;
                    case 'color_id':
                        $aryError[] = "カラーラベルが正しくありません。";
                        break;
                }
            }
        }

        header("Content-type:text/javascript; charset=UTF-8");
        $aryResult = array();
        if ( 0 !== count($aryError) ) {
            $aryResult['result'] = false;
            $aryResult['reason'] = $aryError;
        } else {
            $this->daoProject->update(array(
                'project_name'      => $posts['project_name'],
                'label_color_id'    => $posts['color_id'],
            ), $this->id);
            
            $aryResult['result'] = true;
        }
        
        echo $json->encode($aryResult);
    }
    
    public function delete() {
        $json = new Services_JSON();
        
        $this->daoProject->update(array('status' => 'del'), $this->id);
        
        header("Content-type:text/javascript; charset=UTF-8");
        echo $json->encode(array('result' => true));
    }
    
    public function done() {
        $json = new Services_JSON();
        
        $this->daoProject->update(array('status' => 'finish'), $this->id);
        
        header("Content-type:text/javascript; charset=UTF-8");
        echo $json->encode(array('result' => true));
    }
    
    public function alive() {
        $json = new Services_JSON();
        
        $this->daoProject->update(array('status' => 'alive'), $this->id);
        
        header("Content-type:text/javascript; charset=UTF-8");
        echo $json->encode(array('result' => true));
    }
    
    private function _validateEdit() {
        return $this->loadRequest('post', array(
            'project_name'      => 'notnull&max:100',
            'color_id'          => 'digit',
        ));
    }
}