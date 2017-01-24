<?php
require 'Connection.php';

Class Queries extends Connection{
	
	protected $table_name;
	public $syntax;
	private $fields;
	public function __construct($name){
		parent::__construct();
		$this->set_table($name);
		$this->set_fields();
	}
	public function set_table($table_name)
	{
		$this->table_name = $table_name;
	}
	private function set_fields(){
		$columns 	= array();
		$this->set_syntax("DESC {$this->table_name}");
		$result		= $this->execute();
		while ($row = $result->fetch_assoc()) {
			$columns[]=$row['Field'];
		}
		$this->fields = $columns;
	}
	public function set_syntax($sql){
		$this->syntax = $sql;
	}
	public function get_syntax(){
		return $this->syntax;
	}
	public function execute()
	{
		if (!is_null($this->get_syntax())) {
			try {
				return $this->conn->query($this->get_syntax());
			} catch (Exception $e) {
				return $e;
			}
		}
	}
	public function success_execute(){
		$result = $this->execute();
		if (isset($result->num_rows) && $result->num_rows > 0) {
			return true;
		}
		return false;
	}

	public function get_list_fields(){
		return $this->fields;
	}

	public function get_all(){
		$this->set_syntax("SELECT * FROM {$this->table_name}");
		return $this->execute();
	}

	public function get_where($condition=array())
	{

		if ($condition) {
			$sql 	='SELECT * FROM '.$this->table_name;
			$where 	=' where ';
			$index	=0;
			foreach ($condition as $key => $value) {
				if (in_array($key, $this->get_list_fields())) {
					if ($index == 0) {
						$where .=$key.' = '.'"'.$value.'"';
					}else{
						$where .=' AND '.$key.'="'.$value.'"';
					}
					
				}
				$index++;
			}
			$sql 	= $sql.$where;
			$this->set_syntax($sql);
			return $this->success_execute();
		}else{
			return false;
		}

	}

	public function verify($user=false,$pass=false){
		$stmt = $this->conn->prepare(" SELECT * FROM {$this->table_name} WHERE user_email = ? AND user_pass = ? ");
		$stmt->bind_param('ss',$user,$pass);
		$stmt->execute();
		$result = $stmt->get_result();
		return ($result->num_rows > 0)? $result->fetch_assoc() : false;
	}

	public function insert($data=array())
	{
		
		if ($data) {
			$x = 0;
			$n = count($data);
			$column ='';
			$val 	='';
			foreach ($data as $key => $value) {
				if ($x == 0) {
					$column .= '('.$key;
					$val 	.='"'.$value.'"';
				}else{
					$column .=",".$key;
					$val 	.=',"'.$value.'"';
				}
				if ($n-1 == $x) {
					$column .=')';
				}	
				$x++;
			}
			$sql ="INSERT INTO {$this->table_name}".$column.' VALUES('.$val.')';
		}
		$this->set_syntax($sql);
		return $this->success_execute();
	}

	public function get_enum_values($field){
    	$type = $this->conn->query( "SHOW COLUMNS FROM {$this->table_name} WHERE Field = '{$field}'" )->fetch_assoc();
    	preg_match("/^enum\(\'(.*)\'\)$/", $type['Type'], $matches);
    	$enum = explode("','", $matches[1]);
    	return $enum;
	}

}
