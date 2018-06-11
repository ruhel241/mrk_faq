<?php

/**
 * @package MRK FAQ
 */
namespace MRK_FAQ\Classes;

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
		
		wp_enqueue_style( 'mrk_faq_mce_css', MRK_FAQ_PLUGIN_URL . 'assets/tinymce-button.css' );
		wp_enqueue_script( 'mrk_faq_moonjs', MRK_FAQ_PLUGIN_URL . 'assets/libs/moon.min.js', array( 'jquery' ),
			'0.11.0' );

		$plugin_array['mrk_faq_mce_class'] = MRK_FAQ_PLUGIN_URL . 'assets/tinymce-button.js';
		add_action( 'admin_footer', array( self::class, 'localizeVars' ) );
		return $plugin_array;
	}



	public static function addToolbarButton($buttons)
	{
		array_push( $buttons, 'mrk_faq_mce_class' );
		return $buttons;
	}



	public static function localizeVars() {
	
		$nfdisplayTypes = HelperClass::getNFDisplayTypes(); 
		
		$nfCategories    = HelperClass::getNFTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$faqCatName,
			'hide_empty' => false,
		) );

		$nfTags    = HelperClass::getNFTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$faqTagName,
			'hide_empty' => false,
		) );

		?>
        <script type="text/javascript">
          var nf_MceVars = {
                nfdisplayTypes: <?php echo json_encode( $nfdisplayTypes ); ?>,
                nfCategories: <?php echo json_encode($nfCategories); ?>,
                nfTags: <?php echo json_encode($nfTags); ?>,
            } 
        </script>
		<?php
	}








}