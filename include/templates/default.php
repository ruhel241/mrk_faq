<div class="faq_ninja_wrapper_group faq_ninja_<?php echo $display; ?>">
	<?php foreach($faqs as $faq): ?>
		<?php setup_postdata($faq); ?>
		<div class="fn_single_faq fn_single_faq_<?php echo $faq->ID;?>">
			<h3 class="faq_title"> 
				<span class="faq_add_icon"></span>
				<span class="faq_minus_icon" style="display: none;"></span>
				<?php echo $faq->post_title; ?> 
			</h3>
			<div class="faq_content" style="display: none;"><?php echo $faq->post_content; ?> </div>
		</div>
	  <?php wp_reset_postdata(); ?>
	<?php endforeach; ?>
</div>


