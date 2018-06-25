<div class="faq_ninja_wrapper_group">
	<div class="fn_simple_two_faq fn_<?php echo $display?>">
	<?php foreach($faqs as $faq): ?>
		<?php setup_postdata($faq); ?>
		<div class="fn_simple_two_single fn_simple_two_<?php echo $faq->ID;?>">
			<h3 class="faq_title"> 
				<?php echo $faq->post_title; ?> 
				<span class="fn_simple_up_icon"></span>
				<span class="fn_simple_down_icon" style="display: none;"></span>
			</h3>
			<div class="faq_content" style="display: none;"> <?php echo $faq->post_content; ?> </div>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endforeach; ?>
	</div>
</div>

