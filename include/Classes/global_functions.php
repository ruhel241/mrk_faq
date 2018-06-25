<?php

	function FAQ_NinjaRenderItems($attributes)
	{

		extract($attributes);
		
		$taxonomies = array(
			\FAQ_NINJA\Classes\PostTypeClass::$faqCatName => ( $faq_cat ) ? explode(',', $faq_cat) : array(),
			\FAQ_NINJA\Classes\PostTypeClass::$faqTagName => ( $faq_tag ) ?  explode(',', $faq_tag) : array()
		);

		$faqItems = FaqNinjaGetItems($taxonomies, $limit, $relation, $attributes, $post_type);

		if(!$display){
			$display = 'default';
		}

		return FAQ_NINJA\Classes\HelperClass::makeView($view_file, array(
			'faqs'  	=> $faqItems,
			'display'   => $display,
			'color' 	=> $color,
			'theme' 	=> $theme,
			'per_grid'  => $per_grid,
		));
	}



	function FaqNinjaGetItems($taxonomies, $limit = -1 , $tax_relation = 'AND', $attributes, $post_type )
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


		$queryArgs = apply_filters('faq_ninja_post_query_args', $queryArgs, $attributes);
		$faqs = get_posts($queryArgs);



		return $faqs;

	}


