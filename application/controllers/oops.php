<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of oops
 *
 * @author Seb
 */
class Oops extends CI_Controller {
    
    public function index(){
        
        $this->parser->parse('404_view', array());
        
    }
    
}

?>
