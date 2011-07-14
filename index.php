<?php
	echo "<PRE>"; print_r($_SERVER); echo "</PRE>";
	
	$system_folder = "system";	//	Обозначение системной папки
	if (strpos($system_folder, '/') === FALSE)
		if (function_exists('realpath') AND @realpath(dirname(__FILE__)) !== FALSE)
			$system_folder = realpath(dirname(__FILE__)).'/'.$system_folder;
	else //	Приведем к унифицированному виду в стиле UNIX
		$system_folder = str_replace("\\", "/", $system_folder);
	
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));	//	Базовый путь к текущему скрипту
	define('BASEPATH', $system_folder.'/');	//	Путь к системной папке
	$T = array();
	
	include_once(BASEPATH . 'lib/functions.lib.php');	//	Подключение служебных функций
	include_once(BASEPATH . 'config/config.php');
	include_once(BASEPATH . 'main.classes.php');	//	Подключение основных классов
?>
