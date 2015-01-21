<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of util_ajax
 *
 * @author Seb
 */
class Util_ajax extends CI_Controller {
    
    public function autocomplete_lokalisierung(){
        
        
        $this->db->select(array('stadt', 'kreis', 'land'))
                 ->from('db_lokalisierung')
                 ->like('stadt', $this->input->get('term'), 'after')
                 ->limit(10);
        $oResult = $this->db->get();
        $aResult = $oResult->result_array();
        
        $aReturn = array();
        if(!empty($aResult)){
            foreach($aResult as $aRes){
                
                if($aRes['stadt'] == $aRes['kreis']){
                    $aReturn[] = $aRes['stadt'].' '.$aRes['land'];   
                }else{
                    $aReturn[] = $aRes['stadt'].' '.$aRes['kreis'].' '.$aRes['land'];
                }
            }
        }
        
        echo json_encode(array('results' => $aReturn));
    }
    
}

?>
