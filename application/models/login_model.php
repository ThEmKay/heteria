<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author Seb
 */
class Login_model extends CI_Model {
    
    public function pruefen($iMitgliedsnummer, $sPasswort){
        
        if(intval($iMitgliedsnummer) >= 10000 && $sPasswort != ''){
            
            $this->db->select(array('passwort'))
                     ->from('genossenschaft')
                     ->where('nummer', intval($iMitgliedsnummer));
            
            $oResult = $this->db->get()->row();
            
            if(!empty($oResult)){
                if($oResult->passwort === sha1($sPasswort)){
                    return true;
                }
            }
        }
        
        return false;
    }
    
    public function daten($iMitgliedsnummer){
        
        if(intval($iMitgliedsnummer) >= 10000){
            
            $this->db->select(array('g.nummer',
                                    'g.registriert_am',
                                    'gb.name',
                                    'gb.branche',
                                    'gb.land',
                                    'g.basis_id'))
                     ->from('genossenschaft g')
                     ->join('genossenschaft_basis gb', 'g.basis_id = gb.id', 'inner')
                     ->where('g.nummer', intval($iMitgliedsnummer));
            
            $oResult = $this->db->get()->row();
                        
            if(!empty($oResult)){
                return $oResult;
            }
        }
        
        return false;
    }
    
    public function refresh($iMitgliedsnummer){
        
        if(intval($iMitgliedsnummer >= 10000)){
            $this->db->where('nummer', $iMitgliedsnummer);
            $this->db->update('genossenschaft', array('letzer_login' => date('d-m-Y H:i:s')));
        }
    }
   
}

?>