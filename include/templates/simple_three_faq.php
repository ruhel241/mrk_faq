<div class="faq_ninja_wrapper_group">
	<div class="fn_simple_three_faq fn_<?php echo $display?>">
	<?php foreach($faqs as $faq): ?>
		<?php setup_postdata($faq);?>
		<div class="fn_simple_three_single fn_simple_three_<?php echo $faq->ID;?>">
			<h3 class="faq_three_title"> 
				<?php echo $faq->post_title; ?> 
			</h3>
			<div class="faq_three_content"> <p><?php echo $faq->post_content; ?></p> </div>
		</div>
		<?php wp_reset_postdata();?>
	<?php endforeach; ?>
	</div>
</div>

