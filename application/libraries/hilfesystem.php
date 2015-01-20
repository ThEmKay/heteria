<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hilfesystem
 *
 * @author Seb
 */
class Hilfesystem {
    
    private $oCI = null;
    
    public function __construct() {
    
        $this->oCI =& get_instance();
    }
    
    public function load(){
        // Nur laden, wenn Hilfesystem in den eigenen Einstellungen aktiviert wurde
        if($this->oCI->session->userdata('set_hilfe')){
            if($this->oCI->uri->segment(1) != false){
                $sCtrl = $this->oCI->uri->segment(1);
                if($this->oCI->uri->segment(2) != false){
                    $sCtrl.= $this->oCI->uri->segment(2);
                }
                $this->oCI->db->select('*')->from('hilfe')->where('controller', $sCtrl);    
                $oResult = $this->oCI->db->get();
                $aResult = $oResult->row_array();
            }else{
                $this->oCI->db->select('*')->from('hilfe')->where('controller', '');    
                $oResult = $this->oCI->db->get();
                $aResult = $oResult->row_array();            
            }

            if(!empty($aResult)){
                return $this->oCI->parser->parse('hilfe/hilfe_view', $aResult, true);
            }
            }
        
        return '';
    }
    
    
}

?>
