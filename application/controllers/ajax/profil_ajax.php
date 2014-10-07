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
    
    /**
     * Contructor �berpr�ft direkt, ob eine Session existiert UND ob der
     * Controller als AJAX-Request aufgerufen wurde.
     */
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('logged') !== true || !$this->input->is_ajax_request() ){
            redirect('oops');
        }
    }
    
    public function neu(){
        
        // Pr�fung auf g�ltiges Sicherheits-Token
        $this->form_validation->set_rules('token', 'Token', 'required|trim|exact_length[40]|callback_token_check');        
        
        if($this->form_validation->run()){
            $this->db->insert('genossenschaft_profil_inhalt', array('basis_id' => $this->session->userdata('basis_id'),
                                                                    'inhalt' => 'Standardtext',
                                                                    'typ' => 1,
                                                                    'sort' => 1));
            $this->db->select('id')
                     ->from('genossenschaft_profil_inhalt')
                     ->where('basis_id', $this->session->userdata('basis_id'))
                     ->order_by('id', 'DESC');
            $oResult = $this->db->get();
            $aResult = $oResult->row_array();
            
            echo $aResult['id'];
        }
        else{
            echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
        }        
        
        
    }
    
    public function speichern(){
        
        // Pr�fung auf g�ltiges Sicherheits-Token
        $this->form_validation->set_rules('token', 'Token', 'required|trim|exact_length[40]|callback_token_check');
        // Regeln f�r den �bermittelten Inhalt
        $this->form_validation->set_rules('inhalt', 'Inhalt', 'required|trim|min_length[1]|max_length[5000]');

        if($this->form_validation->run()){
            if(strpos($this->input->post('feld'), 'inhalt') === 0){
               $this->db->where('id', intval(substr($this->input->post('feld'), 6)));
               $this->db->update('genossenschaft_profil_inhalt', array('inhalt' => $this->input->post('inhalt')));
            }else{
               $this->db->where('basis_id', $this->session->userdata('basis_id'));
               $this->db->update('genossenschaft_profil', array($this->input->post('feld') => $this->input->post('inhalt'))); 
            }
            echo 'true';
        }
        else{
            echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
        }
    }
    
    public function entfernen(){
        
        // Pr�fung auf g�ltiges Sicherheits-Token
        $this->form_validation->set_rules('token', 'Token', 'required|trim|exact_length[40]|callback_token_check');

        if($this->form_validation->run()){
            if(strpos($this->input->post('feld'), 'inhalt') === 0){
               $this->db->where('id', intval(substr($this->input->post('feld'), 6)));
               $this->db->delete('genossenschaft_profil_inhalt');
            }
            echo 'true';
        }
        else{
            echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
        }        
    }
        
    /**
     * Hilfsfunktion des Form-Validators zum Pr�fen auf korrektes Sicherheitstoken
     * 
     * @param string $sToken �bermitteltes Sicherheitstoken
     * @return boolean
     */
    public function token_check($sToken){
        if($sToken === sha1($this->session->userdata('basis_id').'heera1379aFgH')){
            return true;
        }
        $this->form_validation->set_message('token_check', 'Ung&uuml;ltiges Sicherheits-Token.');
        return false;
    }
    
    public function logo(){
          
        if($this->token_check($this->input->post('token'))){
          
            $config['upload_path'] = './data/'.$this->session->userdata('permaname').'/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;
            $config['max_size']	= '10000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);            
            
            delete_files('data/'.$this->session->userdata('permaname').'/');
            
            if(!$this->upload->do_upload('input-logo-upload') ||
               !$this->token_check($this->input->post('token'))){

                echo json_encode(array('success' => false,
                                       'message' => $this->upload->display_errors('<div class="alert alert-danger" role="alert">', '</div>')));
            }
            else{
                
                $aUploaded = $this->upload->data();
                echo json_encode(array('success' => true,
                                       'message' => 'easy',
                                       'file' => $aUploaded['file_name']));            
            }
        }else{
        
            echo json_encode(array('success' => false,
                                   'message' => 'Ung&uuml;ltiges Sicherheits-Token.'));             
        }
        
    }
            
            
}

?>
