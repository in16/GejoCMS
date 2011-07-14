<?php
	function &make_class(&$class_object)
	{
		return $class_object;
	}
	
	function pre_print(&$arg)
	{
		echo '<PRE>'; print_r($arg); echo '</PRE>';
		return true;
	}	
	
	function log_error($message, $dodie = FALSE, $html_formated = FALSE)
	{
		global $T;
		if($T['config']->InterfaceMessaging['debug'] === TRUE):
			if($T['config']->InterfaceMessaging['tofile']['flag'] === TRUE):
				$filename = $T['config']->InterfaceMessaging['filename'];
				file_put_contents($filename, date('d-m-Y H:m: ') . strip_tags($message) . "\r\n", FILE_APPEND);
				if($dodie === TRUE):
					die();
				endif;
			else:
				if($html_formated === TRUE):
					echo 
<<<HTMLFORMATEDSTRING
						<div style="position:relative; width:980px; margin:0 auto; text-align:center;">
							$message
						</div>
HTMLFORMATEDSTRING;
					if($dodie === TRUE):
						die();
					endif;
				else:
					echo '<br />' . $message . '<br />';
					if($dodie === TRUE)die();
				endif;
			endif;
		endif;
	}
	
	function mysql_log_error($dodie = FALSE, $html_formated = FALSE)
	{
		$message = '<strong>Произошла ошибка в работе базы данных:</strong><br />' .
			'(#' . mysql_errno() . ') ' . mysql_error();
		log_error($message, $dodie, $html_formated);
	}
?>
