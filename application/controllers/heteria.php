<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of heteria
 *
 * @author Seb
 */
class Heteria extends CI_Controller{
    
    public function index(){
        
        
        $this->parser->parse('heteria_view', array());
        
    }
    
    
    
}

?>
