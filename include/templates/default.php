<div class="ninja_faq_wrapper_group ninja_faq_<?php echo $display; ?>">
	<?php foreach($faqs as $faq): ?>
		<div class="nf_single_faq nf_single_faq_<?php echo $faq->ID;?>">
			<h3 class="faq_title"> 
				<span class="faq_add_icon"></span>
				<span class="faq_minus_icon" style="display: none;"></span>
				<?php echo $faq->post_title; ?> 
			</h3>
			<div class="faq_content" style="display: none;"><?php echo $faq->post_content; ?> </div>
		</div>
	<?php endforeach; ?>
</div>


