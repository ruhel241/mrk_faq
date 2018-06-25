<?php namespace FAQ_NINJA\Classes;

/**
 * @package FAQ NINJA
 */



class SettingsClass 
{

	public static function addSettingsFAQ()
	{
		add_submenu_page( 'edit.php?post_type=faq_ninja',  __('FAQ Settings', 'faq_ninja'),  __('Settings','faq_ninja'),  'manage_options',  'faq_ninja_settings', array(self::class, 'renderSettings') );
	}


	public static function renderSettings() {
		// self::loadAssets();
		// HelperClass::renderView( 'settings.settings', array() );
	}

	public static function loadAssets() {
		// 
		wp_enqueue_style( 'faq_ninja_settings_styles', FAQ_NINJA_PLUGIN_URL . 'assets/admin_settings.css', array() );
	}


	public static function saveSettings()
	{
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		// $currencySign = sanitize_text_field( $_REQUEST['currency_sign'] );
		// update_option( '_faq_ninja_currency_sign', $currencySign );
		// wp_send_json_success( array(
		// 	'message' => __( 'Settings successfully saved', 'faq_ninja' )
		// ), 200 );

	}
	
}
