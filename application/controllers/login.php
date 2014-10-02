<?php
/**
 * Description of login
 *
 * @author Seb
 */
class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if($this->session->userdata('logged') === true){
            redirect();
        }
    }
    
    public function index(){
    
        $this->form_validation->set_rules('fld_mitgliedsnr', 'Mitgliedsnummer', 'trim|required|numeric|min_length[5]');
        $this->form_validation->set_rules('fld_passwort', 'Passwort', 'trim|required');
        
        $sError = '';
        if($this->form_validation->run()){
            
            $this->load->model('login_model');
            if($this->login_model->pruefen($this->input->post('fld_mitgliedsnr'),
                                           $this->input->post('fld_passwort'))){
            
                // Daten der Genossenschaft ranholen
                $oData = $this->login_model->daten($this->input->post('fld_mitgliedsnr'));
                
                if($oData !== false){
                    // Session erzeugen                    
                    $this->session->set_userdata('logged', true);
                    $this->session->set_userdata('mitgliedsnr', $oData->nummer);
                    $this->session->set_userdata('name', $oData->name);
                    $this->session->set_userdata('branche', $oData->branche);
                    $this->session->set_userdata('land', $oData->land);
                    $this->session->set_userdata('basis_id', $oData->basis_id);
                    
                    $this->login_model->refresh($oData->nummer);
                    
                    redirect(site_url('mitglieder/profil/'.urlencode(underscore($oData->name))));
                }
                else{
                    $sError = '<div class="alert alert-danger" role="alert">Datenbankfehler!</div>';    
                }
                
                
                
                
                
            }else{
                $sError = '<div class="alert alert-danger" role="alert">Mitgliedsnummer oder Passwort falsch!</div>';
            };
        }
        
        $this->parser->parse('login_view', array('custom_error' => $sError));
    }
    
}
?>
