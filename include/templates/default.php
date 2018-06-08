<div class="faq_wrapper">
	
<?php foreach($faqs as $faq): ?>
	<div class="single_faq">
		<h2 class="faq_title" data-faq_id="faq_<?php echo $faq->ID;?>"> <?php echo $faq->post_title; ?> </h2>
		<div class="faq_content" id="faq_<?php echo $faq->ID;?>" style="display: none;"> <?php echo $faq->post_content; ?> </div>
	</div>
<?php endforeach; ?>


</div>



