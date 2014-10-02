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
        $this->load->library('protector');
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

                }
            }              
            
            $parse['suchergebnis'] = $res;
            
            $parse['statistik'] = array(array('x' => count($res)));
            
    	}
    	

               
    	$this->parser->parse('mitglieder/mitglieder_view', $parse);
    	
    	
        /*
    	$aGeno = $this->mm->getGenossenschaften();
        
        foreach($aGeno as &$aGen){
            $aGen['shaid'] = sha1($aGen['id']);
            $dir = directory_map('data/'.$aGen['shaid']);
            $aGen['logo'] = $dir['logo'][0];
            $aGen['permalink'] = underscore($aGen['name']);
        }*/

        //$this->parser->parse('mitglieder/mitglieder_view', array('genossenschaften' => $aGeno));
    }
    
    public function profil($sPermalink = ''){
                
        $aGeno = $this->mm->getGenossenschaft(humanize($sPermalink));
        
                
        if(!empty($aGeno)){
            
            foreach($aGeno as &$aGen){
                $aGen['shaid'] = sha1($aGen['id']);
                $dir = directory_map('data/'.$aGen['shaid']);
                
                if($dir !== false){
                    $aGen['logo'] = 'data/'.$aGen['shaid'].'/logo/'.$dir['logo'][0];  
                }else{
                    $aGen['logo'] = 'gfx/blank.gif'; 
                }
            }
                 
            echo "<pre>";
            var_dump($this->mm->getProfilinhalte($aGeno[0]['basis_id']));
            echo "</pre>";
            
            $this->parser->parse('mitglieder/profil_view', array('profil' => $aGeno));
                
        }else{
            redirect('mitglieder');
        }
    }
    
}

?>