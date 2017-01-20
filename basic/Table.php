<?php
/**
* 
*/


require 'Queries.php';

class Table extends Connection{
 	
	function __construct() {
		parent::__construct();
		$this->install();
	}
	public function install(){		
		if (!is_null($data = $this->get_table_list())) {
			foreach ($data as $key => $value) {
				$this->{$value} = new Queries($value);
			}
		}
	}
}