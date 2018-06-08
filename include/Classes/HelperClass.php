<?php

/**
 * @package MRK FAQ
 */
namespace MRK_FAQ\Classes;

class HelperClass
{

		public static function makeView($file, $data = array())
		{
			$file = sanitize_file_name($file);
			$file  = str_replace('.', DIRECTORY_SEPARATOR, $file);
			extract($data);
			$filePath = MRK_FAQ_PLUGIN_DIR_PATH . 'include/templates/' .$file. '.php'; 
			if(!file_exists($filePath)){
				return '';
			}
			ob_start();
			include $filePath;
			return ob_get_clean();
		}	


		public static function renderView($file, $data)
		{
			echo self::makeView($file, $data);
		}
	



}