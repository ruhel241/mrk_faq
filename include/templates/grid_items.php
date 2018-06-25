<div class="faq_ninja_wrapper_group">
	<div class="fn_grid_faq fn_<?php echo $display?>">
	<?php foreach($faqs as $faq): ?>
		<?php setup_postdata($faq);?>
		<div class="fn_grid fn_grid_<?php echo $per_grid; ?> fn_<?php echo $faq->ID;?>">
			<h4 class="faq_grid_title"> 
				<?php echo $faq->post_title; ?> 
			</h4>
			<div class="faq_grid_content"> <p><?php echo $faq->post_content; ?></p> </div>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endforeach; ?>
	</div>
</div>

