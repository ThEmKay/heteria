<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of layout
 *
 * @author Seb
 */
class layout {
    
    public function parse()
    {
        $oCI =& get_instance();       
        if(($oCI->uri->segment(1) != 'backend') && ($oCI->uri->segment(1) != 'ajax')){
	        $oCI->output->_display($oCI->parser->parse('layout',
	                                                   array('aktiv_'.$oCI->uri->segment(1) => 'active', 
	                                                         'content' => $oCI->output->get_output(),
                                                             'login_bereich' => $oCI->sessionswitch->loginBereich()),
	                                                   true));
        }
    }
}

?>
