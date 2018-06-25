<?php namespace FAQ_NINJA\Classes;

/**
 * @package FAQ NINJA 
 */

 

class WidgetClass extends \WP_Widget
{
	
	public function __construct()
	{
		parent::__construct( 'faq_ninja_widget', 
			esc_html__('Ninja FAQ Widget','faq_ninja'), 
			array(
				'classname' => 'faq_ninja_widget',
				'description' => esc_html__('Ninja FAQ, You can add your website', 'faq_ninja')
			)
		);
	}



	public function widget($args, $instance)
	{
		$title  = apply_filters('fn_widget_title', $instance['title']);
		$_fn_display_widget   = ! empty( $instance['_fn_display_widget'] ) ? $instance['_fn_display_widget'] : "";
		$_fn_category_widget  = ! empty( $instance['_fn_category_widget'] ) ? $instance['_fn_category_widget'] : [];
		$_fn_tag_widget   	  = ! empty( $instance['_fn_tag_widget'] ) ? $instance['_fn_tag_widget'] : [];
		$_fn_limit_widget     = ! empty( $instance['_fn_limit_widget'] ) ? $instance['_fn_limit_widget'] : "5";

		echo $args['before_widget'];
		if( ! empty($title) ) {
			echo $args['before_title'] . $title .$args['after_title'];
		}
		$shortcode = "[faq_ninja display='".$_fn_display_widget."' per_grid=1 faq_cat='".implode(',', $_fn_category_widget)."' faq_tag='".implode(',', $_fn_tag_widget)."'  limit=".$_fn_limit_widget." ]";
		echo do_shortcode( $shortcode );
		echo $args['after_widget'];
	}



	public function form($instance)
	{
		$title                = ! empty( $instance['title'] ) ? $instance['title'] : "";
		$_fn_display_widget   = ! empty( $instance['_fn_display_widget'] ) ? $instance['_fn_display_widget'] : "";
		$_fn_category_widget  = ! empty( $instance['_fn_category_widget'] ) ? $instance['_fn_category_widget'] : [];
		$_fn_tag_widget   	  = ! empty( $instance['_fn_tag_widget'] ) ? $instance['_fn_tag_widget'] : [];
		$_fn_limit_widget     = ! empty( $instance['_fn_limit_widget'] ) ? $instance['_fn_limit_widget'] : "5";

		$fndisplayTypes = HelperClass::getFaqNinjaWidgetDisplay(); 
		
		$fnCategories    = HelperClass::getFaqNinjaTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$faqCatName,
			'hide_empty' => true,
		) );

		$fnTags    = HelperClass::getFaqNinjaTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$faqTagName,
			'hide_empty' => true,
		) );

		include FAQ_NINJA_PLUGIN_DIR_PATH . "include/templates/widgets/ninja_faq_widget.php";
	}




}


