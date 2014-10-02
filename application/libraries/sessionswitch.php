<?php
/**
 * Description of sessionswitch
 *
 * @author Seb
 */
class sessionswitch {
    
    private $oCI = null;    
    
    private $bLogged = false;
    
    public function __construct() {
        $this->oCI =& get_instance();
        $this->bLogged = $this->oCI->session->userdata('logged');
    }
    
    public function loginBereich(){
        
        if($this->bLogged === true){
        
            return $this->oCI->parser->parse('sessionswitch/eingeloggt/loginbereich_view',
                                        array('profil' => site_url('mitglieder/profil/'.urlencode(underscore($this->oCI->session->userdata('name')))),
                                              'url' => site_url('logout')),
                                        true);
        }
        
        return $this->oCI->parser->parse('sessionswitch/loginbereich_view',
                                    array('url' => site_url('login'),
                                          'aktiv_'.$this->oCI->uri->segment(1) => 'active'),
                                    true);
    }
    
}

?>
