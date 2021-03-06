<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mitglieder_model
 *
 * @author Seb
 */
class Mitglieder_model extends CI_Model {
        
    public function getGenossenschaft($sName = ''){        
        
        // So soll es egtl sein. Anzeige des Profils nur, wenn die Genossenschaft auch teilnimmt
        //$oQry = $this->db->select('*')->from('tbl_genossenschaft')->where('LOWER(name)', mysql_real_escape_string(strtolower(urldecode($sName))));
        
        // L�sung zum Zeigen
        $oQry = $this->db->select('*')
                         ->from('genossenschaft_basis gb')
                         ->join('genossenschaft_profil gp', 'gp.basis_id = gb.id', 'left')
                         ->where('LOWER(gb.name)', mysql_real_escape_string(strtolower(urldecode($sName))));
                
        return $oQry->get()->result_array();
    }
    
    public function getProfilinhalte($iBasisId){
    
        $this->db->select(array('inhalt', 'id AS inhalt_id'))
                 ->from('genossenschaft_profil_inhalt')
                 ->where('basis_id', intval($iBasisId));
        
        return $this->db->get()->result_array();
    }
    
}

?>
