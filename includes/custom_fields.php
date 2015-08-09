<?php
function nhb_extra_fields() {
	global $post;
	if(is_admin()) {
		//if($post->post_type == NHB_TYPE_PRODUCTS) {
			add_meta_box('extra_fields', __('Магазин'), 'nhb_extra_products_fields_box_func', NHB_TYPE_PRODUCTS, 'normal', 'high');
		//}
	}
}

function nhb_extra_products_fields_box_func( $post ){
	?>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<p><label><input type="text" name="extra[<?=NHB_PRICE_FIELD_NAME;?>]" value="<?php echo get_post_meta($post->ID, NHB_PRICE_FIELD_NAME, 1); ?>" style="width:50%" /> &larr; <?=__('Цена', 'nhb'); ?></label></p>
	<?php
}

function nhb_extra_fields_update($post_id){
	if(!wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__)) return false;
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false;

	if(!current_user_can('edit_post', $post_id)) return false;

	if(!isset($_POST['extra'])) return false;


	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach($_POST['extra'] as $key => $value ){
		if(empty($value)){
			delete_post_meta($post_id, $key);
			continue;
		}
		update_post_meta($post_id, $key, $value);
	}
	return $post_id;
}