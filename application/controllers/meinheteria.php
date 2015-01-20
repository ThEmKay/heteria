<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meinheteria
 *
 * @author Seb
 */
class Meinheteria extends CI_Controller{
    
    public function index(){
        
        if($this->input->post('btnSpeichern')){
            
            if($this->input->post('chkHilfe')){
                $this->session->set_userdata('set_hilfe', true);
            }else{
                $this->session->set_userdata('set_hilfe', false);
            }
            
      
        }
        
        
        
        
        $aParse = array();
        if($this->session->userdata('set_hilfe') === true){
            $aParse['hilfe_checked'] = 'checked';
        }else{
            $aParse['hilfe_checked'] = ''; 
        }
          
        $this->parser->parse('meinheteria_view', $aParse);
    }
    
    
}

?>
