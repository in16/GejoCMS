<?php
	include_once(BASEPATH . 'database.classes.php');
	include_once(BASEPATH . 'load.classes.php');
	include_once(BASEPATH . 'url.classes.php');

	class Controller {
		private $local_T;
		public $db;
		
		function Controller ()
		{	global $T;
			$this->local_T = &$T;
			$this->db = new DataBase($this->local_T['config']->DataBase);
			pre_print(get_declared_classes());
		}
	}
	
	$a = new Controller();
?>
