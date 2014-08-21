<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registrieren
 *
 * @author Seb
 */
class Registrieren extends CI_Controller {
    
    public function index(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
        
        $this->form_validation->set_rules('fldEmail', 'E-Mail Adresse', 'max_length[150]|trim|required|valid_email');
        $this->form_validation->set_rules('fldName',
                                          'Name',
                                          'max_length[150]|trim|required|is_unique[tbl_genossenschaft.name]');
        $this->form_validation->set_rules('fldPerson', 'Ansprechpartner', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('chkAGB', 'AGBs', 'required');
        
        if($this->form_validation->run()){
            $this->load->library('generator');

            $this->load->model('registrieren_model');
            $sPasswort = sha1($this->generator->passwort(8));
            if($this->registrieren_model->genossenschaftRegistrieren(array('name' => mysql_real_escape_string($this->input->post('fldName')),
                                                                           'email' => mysql_real_escape_string($this->input->post('fldEmail')),
                                                                           'passwort' => $sPasswort))){
                $this->load->library('email');
                
                $this->email->from('noreply@genossenschaftscluster.de', 'Genossenschaftscluster');
                $this->email->to($this->input->post('fldEmail')); 

                $this->email->subject('Registrierungsbestätigung');
                $this->email->message('Registriert! Kennung:'.$this->registrieren_model->genossenschaftKennung($this->input->post('fldEmail')).
                                                   'Passwort:'.$sPasswort);	
                $this->email->send();
                
                $this->load->view('registrieren/registrieren_success');
                
                return;
            }   
        }
        
        $this->load->view('registrieren/registrieren_view');
    }
    
    
}

?>
