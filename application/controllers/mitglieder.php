<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mitglieder
 *
 * @author Seb
 */
class Mitglieder extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        //$this->load->library('protector');
        $this->load->model('mitglieder_model', 'mm');
        $this->load->helper(array('inflector', 'directory'));
    }
    
    public function index(){

        $qry = $this->db->query('SELECT count(id) AS genos FROM genossenschaft_basis');
        $res = $qry->result();
        if(!empty($res)){
            $genos = intval($res[0]->genos)-(intval($res[0]->genos)%10);
        }
        
        $parse['genos'] = $genos;
        $parse['suchergebnis'] = array();        
        $parse['statistik'] = array();
        
    	$this->form_validation->set_rules('fldSuche', 'Suche', 'required|trim');
    	
    	if($this->form_validation->run()){

    		$res = array();
            $suchstring = $this->input->post('fldSuche');
    		$parts = explode(' ', $suchstring);    		
    		
	    	if(count($parts) > 1){
	
	    		$sqlWhere = 'WHERE ';
	    		foreach($parts as $key => $part){
	    			
	    			if($key+1 < count($parts)){
	    				$sqlWhere.= 'wort REGEXP \''.strtolower($part).'\' OR ';
	    			}else{
	    				$sqlWhere.= 'wort REGEXP \''.strtolower($part).'\'';
	    			}	
	    		}
	    		
	    		$qry = $this->db->query('SELECT
	    									count(sm.genossenschaft_id) AS bestmatch,
	    									sw.id,
	    									gb.name,
	    									ga.plz,
	    									ga.ort,
	    									ga.strasse,
                                            gb.branche
	    								 FROM
	    									suche_suchwort sw
		    							 INNER JOIN suche_match sm ON sw.id = sm.suchwort_id
		    							 INNER JOIN genossenschaft_basis gb ON gb.id = sm.genossenschaft_id
	    								 INNER JOIN genossenschaft_adresse ga ON gb.id = ga.genossenschaft_id 
		    							 '.$sqlWhere.'
		    							 GROUP BY sm.genossenschaft_id
	    	    						 ORDER BY bestmatch DESC');    		
	    		
	    	}else{
		    	$qry = $this->db->query('SELECT
		    								count(sm.genossenschaft_id),
		    								sw.id,
		    								gb.name,
	    									ga.plz,
	    									ga.ort,
	    									ga.strasse,
                                            gb.id,
                                            gb.branche
		    							 FROM
		    								suche_suchwort sw
		    							 INNER JOIN suche_match sm ON sw.id = sm.suchwort_id
		    							 INNER JOIN genossenschaft_basis gb ON gb.id = sm.genossenschaft_id
		    							 INNER JOIN genossenschaft_adresse ga ON gb.id = ga.genossenschaft_id
		    							 WHERE
		    								wort REGEXP \''.mysql_real_escape_string($this->input->post('fldSuche')).'\'
		    							 GROUP BY sm.genossenschaft_id');
	    	}
            
	    	$res = $qry->result_array();
                        
            if(!empty($res)){
                foreach($res as $key => &$r){

                    $r['alt'] = $key%2;
                    $r['link'] = site_url('mitglieder/profil').'/'.urlencode(underscore($r['name']));
                                        
                    $dir = directory_map('data/'.underscore(umlaute(utf8_decode($r['name']))).'/logo');
                    $r['logo'] = base_url('data/'.underscore(umlaute(utf8_decode($r['name']))).'/logo/'.$dir[0]);
                }
            }              
            
            

            
            $parse['suchergebnis'] = $res;
            
            $parse['statistik'] = array(array('x' => count($res)));
            
    	}
    	   
    	$this->parser->parse('mitglieder/mitglieder_view', $parse);
    	
    }
    
    public function profil($sPermalink = ''){
        
        // Genossenschaftsdaten werden ermittelt        
        $aGeno = $this->mm->getGenossenschaft(humanize($sPermalink));
        
        // Wenn die Datenbankabfrage erfolgreich war, gehts weiter
        if(!empty($aGeno)){
            
            $this->load->library('user_agent');
            // Prüfen, ob die aufgerufene Profilseite die eigene ist (Session) UND nicht von einem
            // mobilen Endgerät betrachtet wird
            if($aGeno[0]['id'] === $this->session->userdata('basis_id') &&
               !$this->agent->is_mobile()){
                $aGeno[0]['admin'] = true;
                // Token für Ajax Requests wird erzeugt
                $aGeno[0]['token'] = sha1($this->session->userdata('basis_id').'heera1379aFgH');
                // Parsing der einzelnen Komponenten zum Bearbeiten der Profilseite
                $aGeno[0]['admin_javascript'] = $this->parser->parse('mitglieder/profil_admin_javascript_view',
                                                                     array('token' => $aGeno[0]['token'],
                                                                           'permaname' => underscore(umlaute(utf8_decode($aGeno[0]['name'])))), true);
                $aGeno[0]['admin_panels'] = $this->parser->parse('mitglieder/profil_admin_panels_view', array(), true);;
            }else{
                $aGeno[0]['admin'] = false;
                $aGeno[0]['admin_javascript'] = '';
                $aGeno[0]['admin_panels'] = '';
            }
            
            //
            foreach($aGeno as &$aGen){
                $aGen['shaid'] = sha1($aGen['id']);
                $dir = directory_map('data/'.underscore(umlaute(utf8_decode($aGeno[0]['name']))).'/logo');
                $aGen['logo'] = base_url('data/'.underscore(umlaute(utf8_decode($aGeno[0]['name']))).'/logo/'.$dir[0]);

                $dir = directory_map('data/'.underscore(umlaute(utf8_decode($aGeno[0]['name']))).'/mood/');
                $aGen['mood'] = base_url('data/'.underscore(umlaute(utf8_decode($aGeno[0]['name']))).'/mood/'.$dir[0]);
            }
            
            $aInhalte = $this->mm->getProfilinhalte($aGeno[0]['basis_id']);
            
            $aGeno[0]['inhalte'] = $aInhalte;
            
            $this->parser->parse('mitglieder/profil_view', array('profil' => $aGeno));
                
        }else{
            // Wenn nicht erfolgt automatische Weiterleitung
            redirect('oops');
        }
    }
    
}

?>