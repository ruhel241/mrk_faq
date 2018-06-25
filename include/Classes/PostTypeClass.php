<?php namespace FAQ_NINJA\Classes;

/**
 * @package FAQ NINJA
 */


class PostTypeClass 
{

	public static $postTypeName = 'faq_ninja';
	public static $faqCatName = 'faq_ninja_cat';
	public static $faqTagName = 'faq_ninja_tag';
	

	public static function initFaqNinjaPostType()
	{
		self::registerFaqNinjaCPT();
		self::registerFaqNinjaCat();
		self::registerFaqNinjaTag();
	}


	private static function registerFaqNinjaCPT() {
		$urlSlug = apply_filters( 'faq_ninja_url_slug', 'faq_ninja' );
		$labels  = array(
			'name'               => _x( 'FAQ', 'post type general name', 'faq_ninja' ),
			'singular_name'      => _x( 'FAQ', 'post type singular name', 'faq_ninja' ),
			'menu_name'          => _x( 'FAQ', 'admin menu', 'faq_ninja' ),
			'name_admin_bar'     => _x( 'FAQ', 'add new on admin bar', 'faq_ninja' ),
			'add_new'            => _x( 'Add New', 'menu', 'faq_ninja' ),
			'add_new_item'       => __( 'Add New FAQ', 'faq_ninja' ),
			'new_item'           => __( 'New FAQ', 'faq_ninja' ),
			'edit_item'          => __( 'Edit FAQ', 'faq_ninja' ),
			'view_item'          => __( 'View FAQ', 'faq_ninja' ),
			'all_items'          => __( 'All FAQs', 'faq_ninja' ),
			'search_items'       => __( 'Search FAQs', 'faq_ninja' ),
			'parent_item_colon'  => __( 'Parent FAQ:', 'faq_ninja' ),
			'not_found'          => __( 'No faq found.', 'faq_ninja' ),
			'not_found_in_trash' => __( 'No faq found in Trash.', 'faq_ninja' ),
		);
		$args    = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'faq_ninja' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $urlSlug ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 21,
			'menu_icon'          => 'dashicons-edit',
			'supports'           => array( 'title', 'thumbnail', 'editor' )
		);
		register_post_type( self::$postTypeName, $args );
	}


	private static function registerFaqNinjaCat() {
		$faqCatSlug   = apply_filters( 'faq_ninja_cat_url_slug', 'faq_ninja_cats' );
		$faqCatLabels = array(
			'name'              => _x( 'FAQ Categories', 'taxonomy general name', 'faq_ninja' ),
			'singular_name'     => _x( 'FAQ Category', 'taxonomy singular name', 'faq_ninja' ),
			'search_items'      => __( 'Search FAQ Category', 'faq_ninja' ),
			'all_items'         => __( 'All FAQ Categories', 'faq_ninja' ),
			'parent_item'       => __( 'Parent FAQ Category', 'faq_ninja' ),
			'parent_item_colon' => __( 'Parent FAQ Category:', 'faq_ninja' ),
			'edit_item'         => __( 'Edit FAQ Category', 'faq_ninja' ),
			'update_item'       => __( 'Update FAQ Category', 'faq_ninja' ),
			'add_new_item'      => __( 'Add New FAQ Category', 'faq_ninja' ),
			'new_item_name'     => __( 'New FAQ Category Name', 'faq_ninja' ),
			'menu_name'         => __( 'FAQ Categories', 'faq_ninja' ),
		);
		$faqCatArgs   = array(
			'hierarchical'      => true,
			'labels'            => $faqCatLabels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $faqCatSlug ),
		);
		register_taxonomy( self::$faqCatName, array( self::$postTypeName ), $faqCatArgs );
	}
	
	private static function registerFaqNinjaTag() {
		$faqTagSlug   = apply_filters( 'faq_ninja_tag_url_slug', 'faq_ninja_tags' );
		$faqTagLabels = array(
			'name'              => _x( 'FAQ Tags', 'taxonomy general name', 'faq_ninja' ),
			'singular_name'     => _x( 'FAQ Tag', 'taxonomy singular name', 'faq_ninja' ),
			'search_items'      => __( 'Search FAQ Tag', 'faq_ninja' ),
			'all_items'         => __( 'All FAQ Tags', 'faq_ninja' ),
			'parent_item'       => __( 'Parent FAQ Tag', 'faq_ninja' ),
			'parent_item_colon' => __( 'Parent FAQ Tag:', 'faq_ninja' ),
			'edit_item'         => __( 'Edit FAQ Tag', 'faq_ninja' ),
			'update_item'       => __( 'Update FAQ Tag', 'faq_ninja' ),
			'add_new_item'      => __( 'Add New FAQ Tag', 'faq_ninja' ),
			'new_item_name'     => __( 'New FAQ Tag Name', 'faq_ninja' ),
			'menu_name'         => __( 'FAQ Tags', 'faq_ninja' ),
		);
		$faqTagArgs   = array(
			'hierarchical'      => false,
			'labels'            => $faqTagLabels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $faqTagSlug ),
		);
		register_taxonomy( self::$faqTagName, array( self::$postTypeName ), $faqTagArgs );
	}




	
}

