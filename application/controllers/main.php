<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Seb
 */
class Main extends CI_Controller {
    
    
    public function index(){
        
        $this->parser->parse('layout', array('content' => $this->parser->parse('start_view.php', array(), true)));
        
    }
    
    
}

?>
