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
class Registrieren_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
    }

    public function genossenschaftRegistrieren($aData){
        $this->db->trans_begin();
        $this->db->insert('tbl_genossenschaft', $aData);
        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }
    
    public function genossenschaftKennung($sEmail){
        $this->db->select('id')
                 ->from('tbl_genossenschaft')
                 ->where('email', $sEmail);
        $oResult = $this->db->get();
        
        return $oResult->row()->id;
    }
            
            
}

?>
