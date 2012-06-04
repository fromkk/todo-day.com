<?php
    /**
     *
     * @return array
     */
    function makeControllerName()
    {
        $array = array(
            'path'   => null
          , 'class'  => null
          , 'method' => null
        );
        
        if ( !isset($_REQUEST['action']) ) {
            $array['path']  = DIR_CONTROLLER . DS . 'index.php';
            $array['class'] = 'Index';
        } else {
            $array['path']  = DIR_CONTROLLER . DS . $_REQUEST['action'] . '.php';
            $array['class'] = ucfirst( basename($_REQUEST['action']) );
        }
        
        if ( !isset($_REQUEST['mode']) ) {
            $array['method'] = 'index';
        } else {
            $array['method'] = $_REQUEST['mode'];
        }
        
        return $array;
    }
    
    /**
     * 
     */
    function disp404()
    {
        header( "HTTP/1.0 404 Not Found" );
        exit;
    }
    
    /**
     *
     * @param string $url 
     */
    function location($url)
    {
        header( "Location: {$url}" );
        exit;
    }
    
    function createCode( $length ) {
        $allAlnum = "abcdefghijklmnopqrstuvwxyzABCDEFHIJKLMNOPQRSTUVWXYZ0123456789";
        
        $aryAlnum = str_split($allAlnum, '1');
        $cntAlnum = count( $aryAlnum );
        
        $code = '';
        for ( $i = 0; $i < $length; $i++ ) {
            $key = array_rand($aryAlnum);
            $code .= $aryAlnum[$key];
        }
        
        return $code;
    }
    
    function getQuery()
    {
        $query = '';
        
        if ( false !== strpos($_SERVER['REQUEST_URI'], '?' ) ) {
            list($path, $query) = explode('?', $_SERVER['REQUEST_URI']);
            
            $query = '?' . $query;
        }
        
        return $query;
    }
    
    function objectToArray($arg) {
        if ( is_object($arg) ) {
            $arg = get_object_vars($arg);
            $arg = objectToArray($arg);
        } else if ( is_array($arg) ) {
            foreach ( $arg as $key => $val ) {
                $arg[$key] = objectToArray($val);
            }
        }
        
        return $arg;
    }
    
    function age($year, $month = null, $day = null) {
        if ( 1 == func_num_args() ) {
            $delimiter = '';
            
            if ( false !== strpos($year, '-') ) {
                $delimiter = '-';
            } else if ( false !== strpos($year, '/') ) {
                $delimiter = '/';
            }
            
            list($year, $month, $day) = explode($delimiter, $year);
        }
        
        $curYear = date('Ymd', time());
        $getYear = sprintf('%04d%02d%02d', $year, $month, $day);
        
        return (int)(($curYear - $getYear) / 10000);
    }
    
    function escape($arg) {
        if (is_array($arg) ) {
            foreach ( $arg as $key => $val ) {
                $arg[$key] = escape($val);
            }
        } else if (is_string($arg) ) {
            $arg = nl2br(htmlspecialchars($arg, ENT_QUOTES, 'UTF-8'));
        }
        
        return $arg;
    }
    
    function wareki($year, $flg_kanji = true) {
        $aryTiming = array(
            '平成' => 1988,
            '昭和' => 1925,
            '大正' => 1911,
            '明治' => 1867,
        );
        
        foreach ( $aryTiming as $wareki => $y ) {
            if ( $y <= $year ) {
                $resut = ($year == $y) ? '元' : $year - $y;
                
                return $flg_kanji ? $wareki . $resut : $resut;
            }
        }
        
        return false;
    }
    