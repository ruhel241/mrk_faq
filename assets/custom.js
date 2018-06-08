jQuery(document).ready(function(){
	jQuery('.faq_title').on('click', function(e){
		var faqID = jQuery(this).data('faq_id');
		jQuery("#"+faqID).slideToggle(300);

	})
})