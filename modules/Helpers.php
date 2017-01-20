<?php

function unset_key_number($larik=array(),$unset=false) {
	$send = $larik;
	if ($larik && $unset) {		
		foreach ($larik as $key => $value) {
			if (in_array($value, $unset)) {
				unset($larik[$key]);
			}
		}
	}
	return $larik;
}


function method_dari($kelas=''){
	$semua 	= get_class_methods($kelas);
	$anti	= array('__construct','show_page');
	if ($semua) {
		$semua = unset_key_number($semua,$anti);		
	}
	return $semua;
}


?>