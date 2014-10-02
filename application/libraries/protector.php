<?php
/**
 * Diese Klasse pr�ft ob eine g�ltige Session MIT korrektem Login besteht.
 * Jeder Controller, der nur von eingeloggten Mitgliedern aufgerufen werden soll
 * muss im Constructor diese Klasse (Library) laden und ist dann vor unbefugten
 * Zugriffen gesch�tzt
 *
 * @author Seb
 * @version 29.09.2014
 * @package Framework
 */
class Protector {
    public function __construct() {
        $oCI =& get_instance(); 
        if($oCI->session->userdata('logged') !== true){
            redirect('login');
        }
    }   
}
?>