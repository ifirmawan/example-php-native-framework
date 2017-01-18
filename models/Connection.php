<?php

Class Connection{
	
	protected $conn;
	public function __construct($user,$pass,$dbname){
		$this->conn = new mysqli('localhost', $user, $pass, $dbname);
	}

}
