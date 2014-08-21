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
        $oQry = $this->db->select('*')->from('tbl_genossenschaft')->where('LOWER(name)', mysql_real_escape_string(strtolower(urldecode($sName))));
        return $oQry->get()->result_array();
    }
    
}

?>
