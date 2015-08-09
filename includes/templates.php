<?php

function nhb_template($template_path) {
	global $wp_query, $post;
    if(is_tax() && get_query_var('taxonomy') == NHB_TAX_CATS && !empty($wp_query->queried_object->term_id)) {
		define('IS_NHB_TAX', true);

		if(!file_exists(get_template_directory().'/pistol88-cart/category.php')) {
			$template_path = NHB_DIR.'/theme/category.php';
		}
		else {
			$template_path = get_template_directory().'/pistol88-cart/category.php';
		}
	}
    elseif(get_post_type() == NHB_TYPE_PRODUCTS && is_single()) {
		define('IS_NHB_PRODUCT', true);
		if(!file_exists(get_template_directory().'/pistol88-cart/single.php')) {
			$template_path = NHB_DIR.'/theme/single.php';
		}
		else {
			$template_path = get_template_directory().'/pistol88-cart/single.php';
		}
	}
    return $template_path;
}
?>