<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * For page redirect to index when after save.
 *
 * Copyright (c) 2016, Astian Foundation
 *
 * @author	CSKAZA
 * @copyright   Copyright (c) 2016, Astian Foundation.
 * @license	https://astian.org/APL/1.0/	APL License
 * @link	https://www.cszcms.com
 * @since	Version 1.0.0
 */

class Csz_referrer {
    
    /**
     * setIndex
     *
     * Function for set the session for page when redirect after save
     *
     * @param	string	$index    Session name
     */
    public function setIndex($index = '') {
        if(!$index){
            $key = 'referred_index';
        }else{
            $key = 'referred_'.$index;
        }
        $paramiter_url = basename(str_replace('index.php', '', $_SERVER['REQUEST_URI']));
        if(strpos($paramiter_url, '?') !== false){ /* Find ? in string */
            $param = strstr($paramiter_url,'?'); /* Remove string before ? */
        }else{
            $param = '';
        }
        $_SESSION[$key] = current_url().$param;
    }
    
    /**
     * getIndex
     *
     * Function for get page from session
     *
     * @param	string	$index    session name
     * @return	string
     */
    public function getIndex($index = '') {
        if(!$index){
            $key = 'referred_index';
        }else{
            $key = 'referred_'.$index;
        }
        if(isset($_SESSION[$key])){
            $referred_from = $_SESSION[$key];
        }else{
            $referred_from = current_url();
        }
        return $referred_from;
    }
    
}