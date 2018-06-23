<?php
/**
 * @package MRK FAQ 
 */

namespace MRK_FAQ\Classes; 

class WidgetClass extends \WP_Widget
{
	
	public function __construct()
	{
		parent::__construct( 'mrk_faq_widget', 
			esc_html__('Ninja FAQ Widget','mrk_faq'), 
			array(
				'description' => esc_html__('Ninja FAQ, You can add your website', 'mrk_faq')
			)
		);
	}



	public function widget($args, $instance)
	{
		$title  = apply_filters('nf_widget_title', $instance['title']);
		$_nf_display_widget   = ! empty( $instance['_nf_display_widget'] ) ? $instance['_nf_display_widget'] : "";
		$_nf_category_widget  = ! empty( $instance['_nf_category_widget'] ) ? $instance['_nf_category_widget'] : [];
		$_nf_tag_widget   	  = ! empty( $instance['_nf_tag_widget'] ) ? $instance['_nf_tag_widget'] : [];
		$_nf_limit_widget     = ! empty( $instance['_nf_limit_widget'] ) ? $instance['_nf_limit_widget'] : "5";

		echo $args['before_widget'];
		if( ! empty($title) ) {
			echo $args['before_title'] . $title .$args['after_title'];
		}
		$shortcode = "[mrk_faq display='".$_nf_display_widget."' per_grid=1 faq_cat='".implode(',', $_nf_category_widget)."' faq_tag='".implode(',', $_nf_tag_widget)."'  limit=".$_nf_limit_widget." ]";
		echo do_shortcode( $shortcode );
		echo $args['after_widget'];
	}



	public function form($instance)
	{
		$title                = ! empty( $instance['title'] ) ? $instance['title'] : "";
		$_nf_display_widget   = ! empty( $instance['_nf_display_widget'] ) ? $instance['_nf_display_widget'] : "";
		$_nf_category_widget  = ! empty( $instance['_nf_category_widget'] ) ? $instance['_nf_category_widget'] : [];
		$_nf_tag_widget   	  = ! empty( $instance['_nf_tag_widget'] ) ? $instance['_nf_tag_widget'] : [];
		$_nf_limit_widget     = ! empty( $instance['_nf_limit_widget'] ) ? $instance['_nf_limit_widget'] : "5";

		$nfdisplayTypes = HelperClass::getNFDisplayTypes(); 
		
		$nfCategories    = HelperClass::getNFTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$faqCatName,
			'hide_empty' => false,
		) );

		$nfTags    = HelperClass::getNFTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$faqTagName,
			'hide_empty' => false,
		) );

		include MRK_FAQ_PLUGIN_DIR_PATH . "include/templates/widgets/ninja_faq_widget.php";
	}




}


