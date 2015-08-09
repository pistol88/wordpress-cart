<?php
function nhb_basket_function($atts) {
	define('NHB_BASKET_SHORTCODE_USED', TRUE);
	//extract(shortcode_atts(array("count" => get_option('posts_per_page')), $atts));
	$nhb_basket = nhb_get_basket();

	if(!file_exists(get_template_directory().'/pistol88-cart/basket_shortcode.php')) {
		$template_path = NHB_DIR.'/views/basket_shortcode.php';
	}
	else {
		$template_path = get_template_directory().'/pistol88-cart/basket_shortcode.php';
	}
	
	ob_start();
	require $template_path;
	$return = ob_get_contents();
	ob_end_clean();

	return $return;
}
?>