<div class="fn_widget_item"> 
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"> <?php esc_attr_e( 'Title:', 'faq_ninja' ); ?> </label> 
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo $title ; ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
</div>

<div class="fn_widget_item">
<label for="<?php echo esc_attr( $this->get_field_id( '_fn_display_widget' ) ); ?>"> <?php esc_attr_e( 'Display:', 'faq_ninja' ); ?> </label>
	<select name="<?php echo esc_attr( $this->get_field_name( '_fn_display_widget' ) ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( '_fn_display_widget' ) ); ?>">
		<?php foreach ($fndisplayTypes as $display_key => $display): ?>
            <option value="<?php echo $display_key; ?>" <?php selected($_fn_display_widget,$display_key); ?>> <?php echo $display['label']; ?> </option>
        <?php endforeach; ?>
	</select>
</div>

<div class="fn_widget_item">
	<h4> <?php esc_attr_e( 'FAQ Categories:', 'faq_ninja' ); ?> </h4>
	<p><small><?php esc_attr_e( 'Don\'t select any if you want to show all types', 'faq_ninja' );?></small></p>
	<?php foreach ($fnCategories as $CategoryKey => $Category ) : ?>
		<label>
            <input class="checkbox" name="<?php echo $this->get_field_name("_fn_category_widget");?>[]" type="checkbox" value="<?php echo $CategoryKey;?>"<?php checked(in_array($CategoryKey, $_fn_category_widget));?>><?php echo $Category; ?>  
        </label>
	<?php endforeach; ?>
</div>

<div class="fn_widget_item">
	<h4> <?php esc_attr_e( 'FAQ Tags:', 'faq_ninja' ); ?> </h4>
	<p><small><?php esc_attr_e( 'Don\'t select any if you want to show all types', 'faq_ninja' );?></small></p>
	<?php foreach ($fnTags as $TagKey => $Tag ) : ?>
		<label>
            <input class="checkbox" name="<?php echo $this->get_field_name("_fn_tag_widget");?>[]" type="checkbox" value="<?php echo $TagKey;?>" <?php checked(in_array($TagKey, $_fn_tag_widget));?>><?php echo $Tag; ?> 
        </label>
	<?php endforeach; ?>
</div>


<div class="fn_widget_item">
	<label>
        <?php esc_attr_e( 'Number of posts to show:', 'faq_ninja' ); ?> 
    </label> 
	<input type="number" name="<?php echo esc_attr( $this->get_field_name( '_fn_limit_widget' ) ); ?>" class="tiny-text" step="1" min="1" size="3" value="<?php echo esc_attr( $_fn_limit_widget ); ?>">
</div>


<style type="text/css">
    .fn_widget_item {
        margin-bottom: 10px;
    }

    /*.fn_widget_item label {
        margin-bottom: 7px;
        display: block;
    }*/

    .fn_widget_item h4 {
        margin: 10px 0px 0px;
    }

    .fn_widget_item p {
        margin: 5px 0px !important;
    }
</style> 


