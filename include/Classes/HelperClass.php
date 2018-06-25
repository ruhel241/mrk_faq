<?php namespace FAQ_NINJA\Classes;


/**
 * @package FAQ NINJA
 */

class HelperClass
{

		public static function makeView($file, $data = array())
		{
			$file = sanitize_file_name($file);
			$file  = str_replace('.', DIRECTORY_SEPARATOR, $file);
			extract($data);
			$filePath = FAQ_NINJA_PLUGIN_DIR_PATH . 'include/templates/' .$file. '.php'; 
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
	


		public static function getFaqNinjaDisplayTypes()
		{	
			return array(
				'default' 	=> array(
					'label' => 'Default'
				),

				'simple_one' => array(
					'label'  => 'Simple One'
				),

				'simple_two' => array(
					'label'  => 'Simple Two'
				),

				'simple_three' => array(
					'label'    => 'Simple Three'
				),
				'grid' 		=> array(
					'label' => 'Multiple Grid Style'
				)
			);
		}

	// Widget Display Types 
		public static function getFaqNinjaWidgetDisplay()
		{	
			return array(
				'default' 	=> array(
					'label' => 'Default'
				),

				'simple_one' => array(
					'label'  => 'Simple One'
				),

				'simple_two' => array(
					'label'  => 'Simple Two'
				),

				'simple_three' => array(
					'label'    => 'Simple Three'
				),
				
			);
		}



		public static function getFaqNinjaTermsFormatted($args = array())
		{
			$terms = get_terms($args);
			$formatted = array();

			if(is_wp_error($terms) ){
			  return $formatted;
			}

			foreach ($terms as $term) {
				$formatted[$term->slug] = $term->name;
			}

			return $formatted; 
		}






}