<div class="ninja_faq_wrapper_group">
	<div class="nf_grid_faq nf_<?php echo $display?>">
	<?php foreach($faqs as $faq): ?>
		<?php setup_postdata($faq);?>
		<div class="nf_grid nf_grid_<?php echo $per_grid; ?> nf_<?php echo $faq->ID;?>">
			<h4 class="faq_grid_title"> 
				<?php echo $faq->post_title; ?> 
			</h4>
			<div class="faq_grid_content"> <p><?php echo $faq->post_content; ?></p> </div>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endforeach; ?>
	</div>
</div>

