<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of impressum
 *
 * @author Seb
 */
class Impressum extends CI_Controller {
    
    public function index(){
        
        $this->parser->parse('impressum_view', array());
    }
}

?>
