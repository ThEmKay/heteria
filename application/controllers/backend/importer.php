<?php

class Importer extends CI_Controller {
	
	/**
	 * Quick and dirty, aber funktioniert :)
	 */
	public function index(){
		
        delete_files('./data/', true);
		$this->db->query('DELETE FROM genossenschaft');
        $this->db->query('DELETE FROM genossenschaft_basis');
		$this->db->query('DELETE FROM genossenschaft_adresse');
        $this->db->query('DELETE FROM genossenschaft_profil');
		
		$file = fopen(base_url('import20140822.csv'), 'r');
		
		// Übrspringt den ersten Datensatz (Tabellenkopf)
		fgetcsv($file);
        
        $iSets = 0;
		while(!feof($file)){

			$csv = fgetcsv($file, 0, ';');
			$insert = array();

			if($csv[0] != ''){
				
                if($iSets > 0){
                    $this->db->select('id')->from('genossenschaft_basis')->order_by('id desc')->limit(1);
                    $id = $this->db->get()->row()->id+1;
                }else{
                    $id = 1;
                }
				
                /*
                 * IMPORTERANPASSUNGEN FOLGEN IN NEUEM BRANCH
                 * 
                 * 
                 */
                
                // Neuer Basisdatensatz
				$insert['id'] = $id;
				$insert['name'] = trim(utf8_encode($csv[0]));
				$insert['land'] = 'de';
                $insert['branche'] = utf8_encode($csv[9]);
				$this->db->insert('genossenschaft_basis', $insert);
                
                // Genossenschaftstabelle füllen (Login-Daten)
                $login['passwort'] = sha1('changeme'.$id);
                $login['registriert_am'] = date('Y-m-d H:i:s');
                $login['basis_id'] = $id;
                $this->db->insert('genossenschaft', $login);
				
                // Adressdaten befüllen
				$meta['genossenschaft_id'] = $id;
				$meta['strasse'] = utf8_encode($csv[1]);
				$meta['hausnummer'] = 3;
				$meta['plz'] = $csv[2];
				$meta['ort'] = utf8_encode($csv[3]);
                $meta['bundesland'] = utf8_encode($csv[10]);
				$this->db->insert('genossenschaft_adresse', $meta);
                
                // Leeres Genossenschaftsprofil anlegen
                $prof['basis_id'] = $id;
                $prof['titel'] = $insert['name'];
                $prof['text'] = utf8_encode('Kurzer Einleitungstext über diese tolle Genossenschaft.');
                $this->db->insert('genossenschaft_profil', $prof);
                
                mkdir('./data/'.underscore(utf8_decode($insert['name'])));
                mkdir('./data/'.underscore(utf8_decode($insert['name'])).'/bilder');
                mkdir('./data/'.underscore(utf8_decode($insert['name'])).'/logo');
                mkdir('./data/'.underscore(utf8_decode($insert['name'])).'/mood');
                mkdir('./data/'.underscore(utf8_decode($insert['name'])).'/temp');
                copy('./gfx/default.png', './data/'.underscore(utf8_decode($insert['name'])).'/logo/default.png');
                copy('./gfx/default_mood.jpg', './data/'.underscore(utf8_decode($insert['name'])).'/mood/default_mood.jpg');
                                
                $iSets++;
			}
		
			
		}
        
        echo $iSets;
	}
	
	public function indizieren(){
		
		$this->load->helper('text');
		
		$this->db->query('DELETE FROM suche_match');
		$this->db->query('DELETE FROM suche_suchwort');
		
		// Alle Genossenschaftsdaten auslesen
		$this->db->select(array('gb.id', 'gb.name', 'gb.branche', 'ga.plz', 'ga.ort', 'ga.strasse', 'ga.bundesland'))
				 ->from('genossenschaft_basis gb')
				 ->join('genossenschaft_adresse ga', 'gb.id = ga.genossenschaft_id');
		
		$result = $this->db->get()->result_array();
		
		$wort = 0;
		$con = 0;
		$gesamt = 0;
		
		// Indizierungsalgorithmus
		if(!empty($result)){
			$gesamt = count($result);
			// Für jeden Genossenschaftsdatensatz
			foreach($result as $res){
				
				// Wortliste aktualisieren
				$this->db->select(array('id', 'wort'))->from('suche_suchwort');
				$words = $this->db->get()->result_array();
				$wortindex = array();
				foreach($words as $word){
					$wortindex[utf8_decode($word['wort'])] = $word['id'];
				}

				// Name der Genossenschaft auftrennen (Keywords erstellen)
				$split = str_replace(array('-', '_', '.'), ' ', strtolower(utf8_decode($res['name'])));
				$parts = explode(' ', $split);
				
				// Weitere Felder hinzufügen
				$parts[count($parts)] = $res['plz'];
				$parts[count($parts)] = strtolower(utf8_decode($res['ort']));
				$parts[count($parts)] = strtolower(utf8_decode($res['strasse']));
                $parts[count($parts)] = strtolower(utf8_decode($res['bundesland']));
                $parts[count($parts)] = strtolower(utf8_decode($res['branche']));
				
				// Falls Doppelte Einträge vorhanden sind, werden diese entfernt
				$parts = array_unique($parts);
				
				// Für jedes Keword
				foreach($parts as $part){
					// Falls ein Keyword leer ist - Warum auch immer...?
					if($part != '' ){
						// Falls das Keyword indexiert wurde						
						if(array_key_exists(substr($part, 0, 32), $wortindex))
						{
							$id = $wortindex[substr($part, 0, 32)];
							
							// Ist der Inhalt bereits verknüpft?
							$this->db->select('*')->from('suche_match')->where(array('suchwort_id' => $id,
									'genossenschaft_id' => intval($res['id'])));
							$test = $this->db->get()->row_array();
							if(empty($test))
							{
								// Verknüpfung zum Inhalt herstellen
								$this->db->insert('suche_match', array('suchwort_id' => $id, 'genossenschaft_id' => intval($res['id'])));
								$con++;
							}
						}
						else
						{							
							// Das Keyword ist NOCH NICHT indexiert
							// Aktuelle KeywordId lesen
							$this->db->select('id')->from('suche_suchwort')->order_by('id desc')->limit(1);
							// Id um 1 erhöhen
							$id = $this->db->get()->row()->id+1;
							
							// Neues Keyword speichern
							$this->db->insert('suche_suchwort', array('id' => $id, 'wort' => utf8_encode($part)));
							// Verknüpfung zum Inhalt herstellen
							$this->db->insert('suche_match', array('suchwort_id' => $id, 'genossenschaft_id' => intval($res['id'])));	
							$con++;
							$wort++;
						}
						
					}

				}


				
			}
		}
		
		echo "<hr />".$gesamt." Datensätze verarbeitet <br />
			 ".$wort." Suchwörter <br />
			 ".$con." Verknüpfungen <br />";
			
	}
	
}

?>