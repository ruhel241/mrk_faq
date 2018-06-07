<?php

/**
 * @package MRK FAQ
 */

namespace MRK_FAQ\Classes;

class SettingsClass 
{

	public static function addSettingsFAQ()
	{
		add_submenu_page( 'edit.php?post_type=mrk_faq',  __('FAQ Settings', 'mrk_faq'),  __('Settings','mrk_faq'),  'manage_options',  'mrk_faq_settings', array(self::class, 'renderSettings') );
	}


	public static function renderSettings() {
		// self::loadAssets();
		// HelperClass::renderView( 'settings.settings', array() );
	}

	public static function loadAssets() {
		// 
		wp_enqueue_style( 'mrk_faq_settings_styles', MRK_FAQ_PLUGIN_URL . 'assets/admin_settings.css', array() );
	}


	public static function saveSettings()
	{
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		// $currencySign = sanitize_text_field( $_REQUEST['currency_sign'] );
		// update_option( '_mrk_faq_currency_sign', $currencySign );
		// wp_send_json_success( array(
		// 	'message' => __( 'Settings successfully saved', 'mrk_faq' )
		// ), 200 );

	}
	
}
