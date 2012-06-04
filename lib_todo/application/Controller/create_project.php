<?php
require DIR_CLASS . DS . 'Members_Controller.php';
require DIR_LIBRARY . DS . 'JSON.php';

class Create_project extends Members_Controller {
    
    /**
     *
     * @var Dao_sml_projects
     */
    private $daoProjects;
    
    public function __construct() {
        parent::__construct();
        
        $this->daoProjects = $this->loadModel('sml_projects');
    }
    
    public function index() {
        $json = new Services_JSON();
        
        $aryError = array();
        
        $posts = $this->_validate();
        foreach ($posts as $key => $val) {
            if ( false === $val ) {
                switch ($key) {
                    case 'project_name':
                        $aryError[] = "プロジェクト名が正しくありません。";
                        break;
                    case 'color_id':
                        $aryError[] = "ラベルカラーが指定されていません。";
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
            $this->daoProjects->insert(array(
                'user_type'      => $this->token->login_type,
                'user_id'        => $this->token->user_id,
                'project_name'   => $posts['project_name'],
                'label_color_id' => $posts['color_id'],
                'created'        => date('Y-m-d H:i:s', time()),
                'status'         => 'alive',
            ));
            
            $aryResult['result'] = true;
            $aryResult['id']     = $this->daoProjects->getInsertId();
        }
        
        echo $json->encode($aryResult);
    }
    
    private function _validate() {
        return $this->loadRequest('post', array(
            'project_name' => 'notnull&max:100',
            'color_id'     => 'digit',
        ));
    }
}