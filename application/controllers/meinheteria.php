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
        
        $aParse['msg'] = '';
        if($this->input->post('btnSpeichern')){
            
            if($this->input->post('chkHilfe')){
                $this->session->set_userdata('set_hilfe', true);
            }else{
                $this->session->set_userdata('set_hilfe', false);
            }
            
            if($this->input->post('fldLokal')){
                $this->session->set_userdata('set_lokal', $this->input->post('fldLokal'));
            }else{
                $this->session->set_userdata('set_lokal', false);
            }
            
            $aParse['msg'] = '<div id="msg" class="alert alert-success" role="alert">Einstellungen wurden erfolgreich gespeichert!</div>';
        }

        if($this->session->userdata('set_hilfe') === true){
            $aParse['hilfe_checked'] = 'checked';
        }else{
            $aParse['hilfe_checked'] = ''; 
        }
        if($this->session->userdata('set_lokal') === false){
            $aParse['set_lokal'] = '';
            $aParse['lokal_readonly'] = '';
            
        }else{
            $aParse['set_lokal'] = $this->session->userdata('set_lokal');
            $aParse['lokal_readonly'] = 'readonly';
        }        
        
        
        $this->parser->parse('meinheteria_view', $aParse);
    }
    
    
}

?>
