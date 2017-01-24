<?php


Class Connection{
	
	protected $conn;
	protected $table_list;
	protected $glob;

	public function __construct(){
		global $GLOBALS;
        $this->glob =& $GLOBALS;
		$this->setup();
		$this->set_table_list();
	}

	protected function set_table_list(){
		$send = array();
		$query =$this->conn->query('show tables');
		 if ($query && $query->num_rows > 0) {

		 	while ($row = $query->fetch_assoc()) {
		 		$send[] = $row['Tables_in_'.$this->glob['db_name']];
		 	}
		 }
		 $this->table_list = $send;
	}

	public function get_table_list(){
		return $this->table_list;
	}
	private function setup()
	{
		$this->conn = new mysqli($this->glob['db_host'],$this->glob['db_user'],$this->glob['db_pass'],$this->glob['db_name']);
	}
}
