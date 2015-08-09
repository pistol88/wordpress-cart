<?php
function nhb_clear_basket($return_template = false) {
	unset($_SESSION['nhb_basket']);
	return true;
}
function nhb_get_basket($return_template = false) {
	$json = array();
	$json['elementscount'] = 0;
	$json['count'] = 0;
	$json['ids'] = '';
	$json['price'] = 0;
	$json['products'] = $_SESSION['nhb_basket'];
	if(!empty($_SESSION['nhb_basket'])) {
		foreach($_SESSION['nhb_basket'] as $element) {
			$json['ids'][] = $element['id'];
			$json['elementscount'] = $json['elementscount']+$element['count'];
			$json['count'] = $json['count']+$element['count'];
			$json['price'] = $json['price']+($element['price']*$element['count']);
		}
	}
	if(!empty($json['ids'])) $json['ids'] = implode(',', $json['ids']);
	
	if($return_template) {
		$json['basket_template_part'] = do_shortcode('[nhb_basket]');
	}
		
	return $json;
}
?>