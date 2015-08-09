<?php
function nhb_get_price($post_id = NULL) {
	if(!$post_id) {
		$post_id = get_the_ID();
	}
	$price = get_post_meta($post_id, NHB_PRICE_FIELD_NAME, 1);
    return apply_filters('nhb_price', round($price, 2));
}

function nhb_actions() {
	switch($_GET['nhb_action']) {
		case 'add_to_cart':
		require NHB_DIR.'/actions/ajax_add_to_cart.php';
		break;
		
		case 'delete_from_cart':
		require NHB_DIR.'/actions/ajax_delete_from_cart.php';
		break;
		
		case 'send_order_form':
		require NHB_DIR.'/actions/ajax_send_order_form.php';
		break;
		
		case 'basket_recount':
		require NHB_DIR.'/actions/ajax_basket_recount.php';
		break;
	}
}

function nhb_wp_head() {
	echo '<script type="text/javascript">';
	echo 'var nhb_plugin_uri = "'.NHB_URL.'"; ';
	echo 'var nhb_site_uri = "'.get_bloginfo('url').'"; ';
	echo 'var nhb_thanks_url = "'.get_option('nhb_thanks_url').'";';
	echo '</script>';
}

function nhb_wp_footer() {
	require NHB_DIR.'/views/order_form.php';
}

function nhb_get_rus_goods_name($count) {
	$last_sym = substr($count, -1);
	$first_sym = substr($count, 0, 1);

	if($count == 1) {
		return 'товар';
	}
	elseif($first_sym != 1) {
		if($last_sym == 1) {
			return 'товар';
		}
		elseif(in_array($last_sym, array(0, 5, 6, 7, 8, 9))) {
			return 'товаров';
		}
		else {
			return 'товара';
		}
	}
	else {
		return 'товаров';
	}
}
?>