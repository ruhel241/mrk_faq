<?php
/**
 * @link              https://wpmanageninja.com
 * @since             1.0.0
 * @package           mrk_faq
 *
 * @wordpress-plugin
 * Plugin Name:       MRK FAQ
 * Plugin URI:        https://wpmanageninja.com/products
 * Description:       The Best FAQ Plugin in WordPress.
 * Version:           1.0.0
 * Author:            WPManageNinja
 * Author URI:        https://wpmanageninja.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mrk_faq
 * Domain Path:       /languages
 */
defined( 'ABSPATH' ) or die();

define('MRK_FAQ_PLUGIN_URL', plugin_dir_url(__FILE__) );
define('MRK_FAQ_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__) );
define('MRK_FAQ_VERSION','1.0.0');

include 'load.php';


class MRK_FAQ_Main_Class
{
	public function boot()
	{
		$this->commonHooks();
		$this->adminHooks();
		$this->enqueueScripts();
		$this->loadTextDomain();
	}



	public function commonHooks()
	{
		# code...
	}



	public function adminHooks()
	{
		# code...
	}



	public function enqueueScripts()
	{
		# code...
	}


	public function loadTextDomain()
	{
		# code...
	}

	
}


add_action('plugins_loaded', function(){
	$MrkFaq =  new MRK_FAQ_Main_Class();
	$MrkFaq->boot();
});



