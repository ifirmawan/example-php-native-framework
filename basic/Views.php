<?php
/**
* 
*/

class Views{
	private 	$template;
	public 		$data = array();
	private 	$menu = array('Beranda'=>'home','explore'=>'acara');
	protected 	$glob;

	function __construct(){
		$this->glob =& $GLOBALS;
	}
	public function set_template($tpl){
		$this->template = templates_path.$tpl.'.php';
	}
	private function get_template()
	{
		return $this->template;
	}
	
	public function set_content($file_name=''){
		$file_path = pages_path.$file_name.'.php'; 
		if (file_exists($file_path)) {
			extract($this->data);
			include $file_path;
			$this->data['content'] = ob_get_clean();
		}
	}

	public function change_menu($menu=array())
	{
		if ($menu) {
			$this->menu = $menu;
		}
	}

	public function add_item_menu($custom=array())
	{
		$n_data = count($this->menu);
		if ($custom && $n_data > 0) {
			$this->menu = array_merge($this->menu,$custom);
		}
	}

	public function render(){
		$this->data['title'] 	= $this->glob['title'];
		$this->data['menu'] 	= $this->menu;
		extract($this->data);
		ob_start();
		require($this->get_template());
		echo ob_get_clean();
	}
	public function string_view($file_name)
	{
		$file_path = getcwd().'/'.$file_name.'.php'; 
		if (file_exists($file_path)) {
			extract($this->data);
			include $file_path;
			return ob_get_clean();
		}
	}
}
?>