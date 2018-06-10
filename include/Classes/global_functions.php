<?php

	function MRK_FAQRenderItems($attributes)
	{

		extract($attributes);
		
		$taxonomies = array(
			\MRK_FAQ\Classes\PostTypeClass::$faqCatName => ( $faq_cat ) ? explode(',', $faq_cat) : array(),
			\MRK_FAQ\Classes\PostTypeClass::$faqTagName => ( $faq_tag ) ?  explode(',', $faq_tag) : array()
		);

		$faqItems = mrkFaqGetItems($taxonomies, $limit, $relation, $attributes, $post_type);

		if(!$display){
			$display = 'default';
		}

		return MRK_FAQ\Classes\HelperClass::makeView($view_file, array(
			'faqs'  	=> $faqItems,
			'display'   => $display,
			'color' 	=> $color,
			'theme' 	=> $theme,
			'per_grid'  => $per_grid,
		));
	}



	function mrkFaqGetItems($taxonomies, $limit = -1 , $tax_relation = 'AND', $attributes, $post_type )
	{
		$taxQuery = array(
			'relation' => $tax_relation,
		);

		foreach ($taxonomies as $tax_name => $cat_taxonomies) {
			if($cat_taxonomies){
				$taxQuery[] = array(
					'taxonomy' => $tax_name,
					'field'    => 'slug',
					'terms'    => $cat_taxonomies
				);
			}
		}

		if($limit == -1){
			$limit = 9999;
		}


		$queryArgs = array(
			'posts_per_page' => $limit,
			'post_type' =>  $post_type,
			'offset' => intval($attributes['offset'])
		);


		if(count($taxQuery) > 1){
			$queryArgs['tax_query'] = $taxQuery;
		}


		$queryArgs = apply_filters('mrk_faq_post_query_args', $queryArgs, $attributes);
		$faqs = get_posts($queryArgs);



		return $faqs;

	}


