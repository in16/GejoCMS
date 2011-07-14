<?php
	class Database {
		private $query_string;
		private $where_string;
		 function Database($db_params)
		 {
		 	@mysql_connect($db_params['hostname'], $db_params['username'], $db_params['password'])
		 		or mysql_log_error(TRUE);
		 	@mysql_select_db($db_params['database'])
		 		or mysql_log_error(TRUE);
		 	
		 	@mysql_query("SET NAMES '".$db_params['char_set']."' COLLATE '".$db_params['dbcollat'])
		 		or mysql_log_error();
		 }
		 
		 function reset()
		 {
		 	$this->query_string = ''; $this->where_string = '';
		 	$this->limit_string = ''; $this->order_by_string = '';
		 }
		 
		 function exec($qstr = FALSE)
		 {
		 	if((bool)$qstr)$this->query_string = $qstr;
		 	if(trim($this->query_string) === '')return false;
		 	$res = mysql_query($this->query_string);
		 	$this->reset();
		 	return $res;
		 }
		 
		 function &where($where_conditions, $delimer = 'AND')
		 {
		 	$where_pairs = array(); where_delimer = '=';
		 	if(is_array($where_conditions):
		 		foreach($where_conditions as $key=>$value):
		 			if(strpos($value, '>') !== FALSE):
		 				$where_delimer = '>';
		 			elseif(strpos($value, '<') !== FALSE):
		 				$where_delimer = '<';
		 			else:
		 				$where_delimer = '=';
		 			endif;
		 			$where_pairs[] = '`' . $key . "` " . $where_delimer . " '" . mysql_real_escape_string($value) . "'";
		 		endforeach;
		 		$where_string = 'WHERE ' . implode(' ' . $delimer . ' ', $where_pairs);
		 	else:
		 		log_error('Ошибка при формировании запроса WHERE. Ожидается массив данных.');
		 	endif;
		 	return &$this;
		 }
		 
		 function &where_or($where_conditions)
		 {
		 	return &where($where_conditions, 'OR');
		 }
		 
		 function get($table_name)
		 {
		 	$this->query_string = trim('SELECT * FROM ' . $table_name . ' ' . $this->where_string . ' ' . $this->order_by_string . ' ' . $this->limit_string);
		 	return $this->exec();
		 }
		 
		 function get_where($table_name, $where_conditions)
		 {
		 	return $this->where($where_conditions)->get($table_name);
		 }
	}
?>
