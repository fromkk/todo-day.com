<?php
    /**
     * 
     *
     * @param string $dir
     * @param array $files 
     */
    function multiRequire($dir, $files = array())
    {
        if ( !is_dir($dir) ) {
            trigger_error("Directory not found : {$dir}", E_USER_WARNING);
            return false;
        }
        
        $cntFiles = count($files);
        if ( 0 === $cntFiles ) {
            trigger_error("Files is empty", E_USER_WARNING);
            return false;
        }
        
        for ( $i = 0; $i < $cntFiles; $i++ ) {
            $currentPath = $dir . DS . $files[$i];
            
            if ( !is_file($currentPath) ) {
                trigger_error("Require file not found : {$currentPath}", E_USER_WARNING);
            } else {
                require_once $currentPath;
            }
        }
    }