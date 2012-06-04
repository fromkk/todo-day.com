<?php
require DIR_CLASS . DS . 'Members_Controller.php';

class Index extends Members_Controller {
    const TPL_PATH   = 'index.tpl';
    const TPL_MEMBER = 'members_index.tpl';
    
    /**
     *
     * @var Dao_sml_tw_members
     */
    private $daoTwMembers;
    
    /**
     *
     * @var Dao_sml_fb_members
     */
    private $daoFbMembers;
    
    /**
     *
     * @var Dao_sml_label_color
     */
    private $daoLabelColor;
    
    /**
     *
     * @var Dao_sml_projects
     */
    private $daoProjects;
    
    private $aryError = array();
    
    public function __construct() {
        $this->flgAutoLogin = false;
        
        parent::__construct();
        
        $this->daoTwMembers  = $this->loadModel('sml_tw_members');
        $this->daoFbMembers  = $this->loadModel('sml_fb_members');
        $this->daoLabelColor = $this->loadModel('sml_label_color');
        $this->daoProjects   = $this->loadModel('sml_projects');
        
        $this->_login();
        
        $this->assign('errorList', $this->aryError);
    }
    
    public function index() {
        if ( $this->isMember ) {
            $this->members();
        } else {
            $this->display(self::TPL_PATH);
        }
    }

    private function members() {
        $year  = $this->loadRequest('request', 'year', 'year');
        $month = $this->loadRequest('request', 'month', 'month');
        
        if ( false === $year || false === $month ) {
            $year  = $this->config['year'];
            $month = $this->config['month'];
        }
        
        $this->assign( array(
            'year'  => $year,
            'month' => $month,
        ) );
        
        $lastDay = date('t', mktime(0, 0, 0, $month, 1, $year));
        
        list($back_year, $back_month,) = sscanf(date('Y-m-d', mktime(0, 0, 0, $month - 1, 1, $year)), '%04d-%02d-%02d');
        list($next_year, $next_month,) = sscanf(date('Y-m-d', mktime(0, 0, 0, $month + 1, 1, $year)), '%04d-%02d-%02d');
        $this->assign( array(
            'back_year'  => $back_year,
            'back_month' => $back_month,
            'next_year'  => $next_year,
            'next_month' => $next_month,
        ) );
        
        $aryCalendar = array();
        $line        = 0;
        for ( $i = 1; $i <= $lastDay; $i++ ) {
            $week = date('w', mktime(0, 0, 0, $month, $i, $year));
            
            if ( 1 === $i ) {
                for ( $n = 0; $n < $week; $n++ ) {
                    $aryCalendar[$line][] = null;
                }
            }
            
            $aryCalendar[$line][] = $i;
            
            if ( $i == $lastDay ) {
                for ( $n = $week; $n < 6; $n++ ) {
                    $aryCalendar[$line][] = null;
                }
            }
            
            if ( 6 == $week ) {
                $line++;
            }
        }
        $this->assign('calendar', $aryCalendar);
        
        //色一覧
        $aryColorList = array();
        $this->daoLabelColor->findAll();
        while ( $this->daoLabelColor->hasNext() ) {
            $row = $this->daoLabelColor->next();
            
            $aryColorList[$row->id] = $row->color_code;
        }
        $this->assign('colorList', $aryColorList);
        
        $this->display(self::TPL_MEMBER);
    }
}