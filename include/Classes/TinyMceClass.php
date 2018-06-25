<?php namespace FAQ_NINJA\Classes;

/**
 * @package FAQ NINJA
 */


class TinyMceClass 
{
	
	public static function registerButton()
	{
		// Check if the logged in WordPress User can edit Posts or Pages
		// If not, don't register our TinyMCE plugin
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}
		// Check if the logged in WordPress User has the Visual Editor enabled
		// If not, don't register our TinyMCE plugin
		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}
		
		// Load the TinyMCE plugin : editor_plugin.js 
		add_filter( 'mce_external_plugins', array( self::class, 'addTinymcePlugin' ) );
		// add new buttons
		add_filter( 'mce_buttons', array( self::class, 'addToolbarButton')  );
	}

	
	public static function addTinymcePlugin($plugin_array)
	{
		
		wp_enqueue_style( 'faq_ninja_mce_css', FAQ_NINJA_PLUGIN_URL . 'assets/tinymce-button.css' );
		wp_enqueue_script( 'faq_ninja_moonjs', FAQ_NINJA_PLUGIN_URL . 'assets/libs/moon.min.js', array( 'jquery' ), '0.11.0' );

		$plugin_array['faq_ninja_mce_class'] = FAQ_NINJA_PLUGIN_URL . 'assets/tinymce-button.js';
		add_action( 'admin_footer', array( self::class, 'localizeVars' ) );
		return $plugin_array;
	}



	public static function addToolbarButton($buttons)
	{
		array_push( $buttons, 'faq_ninja_mce_class' );
		return $buttons;
	}



	public static function localizeVars() {
	
		$fndisplayTypes = HelperClass::getFaqNinjaDisplayTypes(); 
		
		$fnCategories    = HelperClass::getFaqNinjaTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$faqCatName,
			'hide_empty' => true,
		) );

		$fnTags    = HelperClass::getFaqNinjaTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$faqTagName,
			'hide_empty' => true,
		) );

		?>
        <script type="text/javascript">
          var fn_MceVars = {
                fndisplayTypes: <?php echo json_encode( $fndisplayTypes ); ?>,
                fnCategories: <?php echo json_encode($fnCategories); ?>,
                fnTags: <?php echo json_encode($fnTags); ?>,
            } 
        </script>
		<?php
	}


}