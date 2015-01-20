<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settings
 *
 * @author Seb
 */
class Settings {
    
    public function __construct() {
        
        $oCI =& get_instance();
        
        
        if(!$oCI->session->userdata('set_init')){
            $oCI->session->set_userdata('set_init', true);
            $oCI->session->set_userdata('set_hilfe', true);
        }
        
        
    }
    
    
}

?>
