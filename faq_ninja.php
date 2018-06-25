<?php
/**
 * @link              https://wpmanageninja.com
 * @since             1.0.0
 * @package           FAQ Ninja
 *
 * @wordpress-plugin
 * Plugin Name:       FAQ Ninja
 * Plugin URI:        https://wpmanageninja.com/products
 * Description:       The Best FAQ Plugin in WordPress.
 * Version:           1.0.0
 * Author:            WPManageNinja
 * Author URI:        https://wpmanageninja.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       faq_ninja
 * Domain Path:       /languages
 */
defined( 'ABSPATH' ) or die();

define('FAQ_NINJA_PLUGIN_URL', plugin_dir_url(__FILE__) );
define('FAQ_NINJA_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__) );
define('FAQ_NINJA_VERSION','1.0.0');

include 'load.php';


class faqNinjaClass
{
	public function boot()
	{
		$this->commonHooks();
		$this->adminHooks();
		$this->loadTextDomain();
	}
 


	public function commonHooks()
	{

		add_action('init', array('\FAQ_NINJA\Classes\PostTypeClass', 'initFaqNinjaPostType') );
		$shortCodeClass = new FAQ_NINJA\Classes\ShortCodeClass();
		add_shortcode('faq_ninja', array($shortCodeClass, 'register') ); 

		add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
		
		add_action( 'widgets_init', function () {
			register_widget( 'FAQ_NINJA\Classes\WidgetClass' );
		});

	}



	public function adminHooks()
	{	
		$postTypeName = \FAQ_NINJA\Classes\PostTypeClass::$postTypeName;

		add_action('admin_menu', array('FAQ_NINJA\Classes\SettingsClass', 'addSettingsFAQ') );
		add_action('wp_ajax_faq_ninja_save_settings', array('FAQ_NINJA\Classes\SettingsClass ','saveSettings') );

		add_action( 'current_screen', function ( $current_screen ) use ( $postTypeName ) {
			if ( $current_screen->post_type != $postTypeName ) {
				\FAQ_NINJA\Classes\TinyMceClass::registerButton();
			}
		} );

	}



	public function enqueueScripts()
	{
		wp_register_style('faq_ninja_style', FAQ_NINJA_PLUGIN_URL.'assets/style.css', array(), FAQ_NINJA_VERSION);
		wp_enqueue_style('faq_ninja_style');
		wp_enqueue_script('faq_ninja_custom_js', FAQ_NINJA_PLUGIN_URL.'assets/custom.js', array('jquery'), FAQ_NINJA_VERSION);
	}


	public function loadTextDomain()
	{
		
	}

	
}


add_action('plugins_loaded', function(){
	$FaqNinja =  new faqNinjaClass();
	$FaqNinja->boot();
});



