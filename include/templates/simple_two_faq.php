<div class="ninja_faq_wrapper_group">
	<div class="nf_simple_two_faq nf_<?php echo $display?>">
	<?php foreach($faqs as $faq): ?>
		<div class="nf_simple_two_single nf_simple_two_<?php echo $faq->ID;?>">
			<h2 class="faq_title"> 
				<?php echo $faq->post_title; ?> 
				<span class="nf_simple_up_icon"></span>
				<span class="nf_simple_down_icon" style="display: none;"></span>
			</h2>
			<div class="faq_content" style="display: none;"> <?php echo $faq->post_content; ?> </div>
		</div>
	<?php endforeach; ?>
	</div>
</div>

