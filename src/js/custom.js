jQuery(document).ready(function(){
	jQuery('.faq_title').on('click', function(e){
		jQuery(this).parent().find('.faq_content').slideToggle(300);

		jQuery(this).find(".faq_add_icon").toggle();
		jQuery(this).find(".faq_minus_icon").toggle();

		jQuery(this).find(".nf_simple_up_icon").toggle();
		jQuery(this).find(".nf_simple_down_icon").toggle();

	});
});