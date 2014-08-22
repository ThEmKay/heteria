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
    
    public function getGenossenschaften(){ 
        $oQry = $this->db->select(array('id', 'name'))->from('tbl_genossenschaft');
        return $oQry->get()->result_array();   
    }
    
    public function getGenossenschaft($sName = ''){        
        
        // So soll es egtl sein. Anzeige des Profils nur, wenn die Genossenschaft auch teilnimmt
        //$oQry = $this->db->select('*')->from('tbl_genossenschaft')->where('LOWER(name)', mysql_real_escape_string(strtolower(urldecode($sName))));
        
        // Lösung zum Zeigen
        $oQry = $this->db->select('*')->from('genossenschaft_basis')->where('LOWER(name)', mysql_real_escape_string(strtolower(urldecode($sName))));
                
        return $oQry->get()->result_array();
    }
    
}

?>
