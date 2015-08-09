<?php
function nhb_menu_categories_function($atts) {
	$return = '';

	define('NHB_REVIEWS_SHORTCODE_USED', true);
	extract(shortcode_atts(array("count" => get_option('posts_per_page')), $atts));
	
	ob_end_clean();
	ob_start();
	require NHB_DIR.'/views/menu_categories_shortcode.php';
	$return = ob_get_contents();
	ob_end_clean();

	return $return;
}
?>