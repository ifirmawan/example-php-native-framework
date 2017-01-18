<?php
require 'Connection.php';

Class Queries extends Connection{
	
	protected $table_name;
	private $syntax;
	private $fields;
	public function __construct($name){
		parent::__construct('root','jvmdev-123','rpl_siapmas');
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
	private function set_syntax($sql){
		$this->syntax = $sql;
	}
	private function get_syntax(){
		return $this->syntax;
	}
	private function execute()
	{
		if (!is_null($this->get_syntax())) {
			try {
				return $this->conn->query($this->get_syntax());
			} catch (Exception $e) {
				return $e;
			}
		}
	}
	private function success_execute(){
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

	public function verify($table=false,$user=false,$pass=false){
		$stmt = $this->conn->prepare(" SELECT * FROM {$table} WHERE user_name = ? AND user_pass = ? ");
		$stmt->bind_param('ss',$user,$pass);
		$stmt->execute();
		$result = $stmt->get_result();
		return ($result->num_rows > 0)? true : false;
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
		return $this->execute();
	}


}
