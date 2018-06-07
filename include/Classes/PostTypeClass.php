<?php

/**
 * @package MRK FAQ
 */
namespace MRK_FAQ\Classes;

class PostTypeClass 
{

	public static $postTypeName = 'mrk_faq';
	public static $faqCatName = 'mrk_faq_cat';
	public static $faqTagName = 'mrk_faq_tag';
	

	public static function initMRKFAQPostType()
	{
		self::registerMrkFAQCPT();
		self::registerFAQCat();
		self::registerFAQTag();
	}


	private static function registerMrkFAQCPT() {
		$urlSlug = apply_filters( 'mrk_faq_url_slug', 'mrk_faq' );
		$labels  = array(
			'name'               => _x( 'FAQ', 'post type general name', 'mrk_faq' ),
			'singular_name'      => _x( 'FAQ', 'post type singular name', 'mrk_faq' ),
			'menu_name'          => _x( 'FAQ', 'admin menu', 'mrk_faq' ),
			'name_admin_bar'     => _x( 'FAQ', 'add new on admin bar', 'mrk_faq' ),
			'add_new'            => _x( 'Add New', 'menu', 'mrk_faq' ),
			'add_new_item'       => __( 'Add New FAQ', 'mrk_faq' ),
			'new_item'           => __( 'New FAQ', 'mrk_faq' ),
			'edit_item'          => __( 'Edit FAQ', 'mrk_faq' ),
			'view_item'          => __( 'View FAQ', 'mrk_faq' ),
			'all_items'          => __( 'All FAQs', 'mrk_faq' ),
			'search_items'       => __( 'Search FAQs', 'mrk_faq' ),
			'parent_item_colon'  => __( 'Parent FAQ:', 'mrk_faq' ),
			'not_found'          => __( 'No faq found.', 'mrk_faq' ),
			'not_found_in_trash' => __( 'No faq found in Trash.', 'mrk_faq' ),
		);
		$args    = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'mrk_faq' ),
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


	private static function registerFAQCat() {
		$faqCatSlug   = apply_filters( 'mrk_faq_cat_url_slug', 'mrk_faq_cats' );
		$faqCatLabels = array(
			'name'              => _x( 'FAQ Categories', 'taxonomy general name', 'mrk_faq' ),
			'singular_name'     => _x( 'FAQ Category', 'taxonomy singular name', 'mrk_faq' ),
			'search_items'      => __( 'Search FAQ Category', 'mrk_faq' ),
			'all_items'         => __( 'All FAQ Categories', 'mrk_faq' ),
			'parent_item'       => __( 'Parent FAQ Category', 'mrk_faq' ),
			'parent_item_colon' => __( 'Parent FAQ Category:', 'mrk_faq' ),
			'edit_item'         => __( 'Edit FAQ Category', 'mrk_faq' ),
			'update_item'       => __( 'Update FAQ Category', 'mrk_faq' ),
			'add_new_item'      => __( 'Add New FAQ Category', 'mrk_faq' ),
			'new_item_name'     => __( 'New FAQ Category Name', 'mrk_faq' ),
			'menu_name'         => __( 'FAQ Categories', 'mrk_faq' ),
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
	
	private static function registerFAQTag() {
		$faqTagSlug   = apply_filters( 'mrk_faq_tag_url_slug', 'mrk_faq_tags' );
		$faqTagLabels = array(
			'name'              => _x( 'FAQ Tags', 'taxonomy general name', 'mrk_faq' ),
			'singular_name'     => _x( 'FAQ Tag', 'taxonomy singular name', 'mrk_faq' ),
			'search_items'      => __( 'Search FAQ Tag', 'mrk_faq' ),
			'all_items'         => __( 'All FAQ Tags', 'mrk_faq' ),
			'parent_item'       => __( 'Parent FAQ Tag', 'mrk_faq' ),
			'parent_item_colon' => __( 'Parent FAQ Tag:', 'mrk_faq' ),
			'edit_item'         => __( 'Edit FAQ Tag', 'mrk_faq' ),
			'update_item'       => __( 'Update FAQ Tag', 'mrk_faq' ),
			'add_new_item'      => __( 'Add New FAQ Tag', 'mrk_faq' ),
			'new_item_name'     => __( 'New FAQ Tag Name', 'mrk_faq' ),
			'menu_name'         => __( 'FAQ Tags', 'mrk_faq' ),
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

