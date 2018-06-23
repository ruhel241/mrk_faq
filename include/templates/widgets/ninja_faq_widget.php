<div class="nf_widget_item"> 
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"> <?php esc_attr_e( 'Title:', 'mrk_faq' ); ?> </label> 
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo $title ; ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
</div>


<div class="nf_widget_item">
<label for="<?php echo esc_attr( $this->get_field_id( '_nf_display_widget' ) ); ?>"> <?php esc_attr_e( 'Display:', 'mrk_faq' ); ?> </label>
	<select name="<?php echo esc_attr( $this->get_field_name( '_nf_display_widget' ) ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( '_nf_display_widget' ) ); ?>">
		<?php foreach ($nfdisplayTypes as $display_key => $display): ?>
            <option value="<?php echo $display_key; ?>" <?php selected($_nf_display_widget,$display_key); ?>> <?php echo $display['label']; ?> </option>
        <?php endforeach; ?>
	</select>
</div>


<div class="nf_widget_item">
	<h4> <?php esc_attr_e( 'FAQ Categories:', 'mrk_faq' ); ?> </h4>
	<p><small><?php esc_attr_e( 'Don\'t select any if you want to show all types', 'mrk_faq' );?></small></p>
	<?php foreach ($nfCategories as $CategoryKey => $Category ) : ?>
		<label>
            <input class="checkbox" name="<?php echo $this->get_field_name("_nf_category_widget");?>[]" type="checkbox" value="<?php echo $CategoryKey;?>"<?php checked(in_array($CategoryKey, $_nf_category_widget));?>><?php echo $Category; ?>  
        </label>
	<?php endforeach; ?>
</div>

<div class="nf_widget_item">
	<h4> <?php esc_attr_e( 'FAQ Tags:', 'mrk_faq' ); ?> </h4>
	<p><small><?php esc_attr_e( 'Don\'t select any if you want to show all types', 'mrk_faq' );?></small></p>
	<?php foreach ($nfTags as $TagKey => $Tag ) : ?>
		<label>
            <input class="checkbox" name="<?php echo $this->get_field_name("_nf_tag_widget");?>[]" type="checkbox" value="<?php echo $TagKey;?>" <?php checked(in_array($TagKey, $_nf_tag_widget));?>><?php echo $Tag; ?> 
        </label>
	<?php endforeach; ?>
</div>


<div class="nf_widget_item">
	<label>
        <?php esc_attr_e( 'Number of posts to show:', 'mrk_faq' ); ?> 
    </label> 
	<input type="number" name="<?php echo esc_attr( $this->get_field_name( '_nf_limit_widget' ) ); ?>" class="tiny-text" step="1" min="1" size="3" value="<?php echo esc_attr( $_nf_limit_widget ); ?>">
</div>


<style type="text/css">
    .nf_widget_item {
        margin-bottom: 10px;
    }

    /*.nf_widget_item label {
        margin-bottom: 7px;
        display: block;
    }*/

    .nf_widget_item h4 {
        margin: 10px 0px 0px;
    }

    .nf_widget_item p {
        margin: 5px 0px !important;
    }
</style> 


