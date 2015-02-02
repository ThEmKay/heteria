<?php
/**
 * Description of logout
 *
 * @author Seb
 */
class Logout extends CI_Controller {
    
    public function index(){
        $this->session->set_userdata('logged', false);
        redirect('login');
    }
   
}

?>