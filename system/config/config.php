<?php
	class Config {
		public $DataBase = array();
		public $InterfaceMessaging = array();
		
		function Config()
		{
			$this->DataBase = array(
				'hostname' => 'localhost',
				'username' => 'cms',
				'password' => '123456',
				'database' => 'albert',
				'dbdriver' => 'mysql',
				'dbprefix' => 'cms',			
				'char_set' => 'utf8',
				'dbcollat' => 'utf8_general_ci' );
				
			$this->InterfaceMessaging = array(
				'debug'=>TRUE,
				'tofile'=>array(
					'flag'=>FALSE,
					'filename'=>BASEPATH . 'logfiles/debug.log'
				),
				'filename'=>BASEPATH . 'logfiles/debug.log'
			);
		}
	}
	
	$T['config'] = new Config();
?>
