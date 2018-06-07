<?php


function MRK_FAQRenderItems($attributes)
{

	extract($attributes);
	
	$taxonomies = array(
		\MRK_FAQ\Classes\PostTypeClass::$faqCatName => ( $taxonomy ) ? explode(',', $taxonomy) : array() ;
		\MRK_FAQ\Classes\PostTypeClass::$faqTagName => ( $category ) ?  explode(',', $category) : array() ;
	);

	$faqItems = mrkFaqGetItems($taxonomies, $limit, $relation, $attributes);

	if(!$display){
		$display = 'default';
	}


	return MRK_FAQ\Classes\HelperClass::makeView($view_filem, array(
		'faqs'  => $faqItems,
		'display' => $display,
	));



	
}