<?php
/**
 * @link              https://wpmanageninja.com
 * @since             1.0.0
 * @package           MRK FAQ
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
		$this->loadTextDomain();
	}
 


	public function commonHooks()
	{

		add_action('init', array('\MRK_FAQ\Classes\PostTypeClass', 'initMRKFAQPostType') );
		$shortCodeClass = new MRK_FAQ\Classes\ShortCodeClass();
		add_shortcode('mrk_faq', array($shortCodeClass, 'register') ); 

		add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
		
		add_action( 'widgets_init', function () {
			register_widget( 'MRK_FAQ\Classes\WidgetClass' );
		});

	}



	public function adminHooks()
	{	
		$postTypeName = \MRK_FAQ\Classes\PostTypeClass::$postTypeName;

		add_action('admin_menu', array('MRK_FAQ\Classes\SettingsClass', 'addSettingsFAQ') );
		add_action('wp_ajax_mrk_faq_save_settings', array('MRK_FAQ\Classes\SettingsClass ','saveSettings') );

		add_action( 'current_screen', function ( $current_screen ) use ( $postTypeName ) {
			if ( $current_screen->post_type != $postTypeName ) {
				\MRK_FAQ\Classes\TinyMceClass::registerButton();
			}
		} );

	}



	public function enqueueScripts()
	{
		wp_register_style('mrk_faq_style', MRK_FAQ_PLUGIN_URL.'assets/style.css', array(), MRK_FAQ_VERSION);
		wp_enqueue_style('mrk_faq_style');
		wp_enqueue_script('mrk_faq_custom_js', MRK_FAQ_PLUGIN_URL.'assets/custom.js', array('jquery'), MRK_FAQ_VERSION);
	}


	public function loadTextDomain()
	{
		
	}

	
}


add_action('plugins_loaded', function(){
	$MrkFaq =  new MRK_FAQ_Main_Class();
	$MrkFaq->boot();
});



