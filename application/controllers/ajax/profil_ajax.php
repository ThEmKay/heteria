<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profil
 *
 * @author Seb
 */
class Profil_ajax extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('logged') !== true){
            exit;
        }
    }
    
    public function speichern(){
        
        $this->form_validation->set_rules('inhalt', 'Inhalt', 'required|trim|min_length[1]');
        
        if($this->form_validation->run()){
            $this->db->where('basis_id', $this->session->userdata('basis_id'));
            $this->db->update('genossenschaft_profil', array($this->input->post('feld') => $this->input->post('inhalt')));
            
            echo "true";
        }
        else{
            echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
        }
        

    }
            
            
}

?>
