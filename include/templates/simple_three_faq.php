<div class="ninja_faq_wrapper_group">
	<div class="nf_simple_three_faq nf_<?php echo $display?>">
	<?php foreach($faqs as $faq): ?>
		<div class="nf_simple_three_single nf_simple_three_<?php echo $faq->ID;?>">
			<h3 class="faq_three_title"> 
				<?php echo $faq->post_title; ?> 
			</h3>
			<div class="faq_three_content"> <p><?php echo $faq->post_content; ?></p> </div>
		</div>
	<?php endforeach; ?>
	</div>
</div>

