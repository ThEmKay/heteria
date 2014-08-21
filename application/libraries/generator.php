<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of generator_lib
 *
 * @author Seb
 */
class Generator {
    
    private $aZeichen = array('a','b','c','d','e','f','g','h','j','k',
                              'm','n','p','q','r','s','t','u','v','w','x',
                              'y','z','!','%','$','&','?',1,2,3,4,5,6,7,8,9);
    
    public function passwort($iLaenge){
        if($iLaenge == 0){
            $iLaenge = 1;
        }
        
        $sPasswort = '';
        for($i=0; $i<=abs($iLaenge); $i++){
        
            if(rand(1,2) == 1){
                $sPasswort.= strtoupper($this->aZeichen[rand(0, count($this->aZeichen)-1)]);    
            }
            else{
                $sPasswort.= $this->aZeichen[rand(0, count($this->aZeichen)-1)];  
            }   
        }
        return $sPasswort;
    }
    
}

?>
