<?php
define('NHB_TAX_CATS', 'products-categories');
define('NHB_TYPE_PRODUCTS', 'products');
define('NHB_TYPE_ORDERS', 'orders');

define('NHB_AUTHOR', '1');

define('NHB_ORDER_PRIMARY_FIELD', 'Имя');
define('NHB_PRICE_FIELD_NAME', 'nhb_price');

$nhb_config['image_preview_w'] = 220;
$nhb_config['image_preview_h'] = 160;
$nhb_config['client_fields'] = array(
	'Имя' => array('required' => true, 'type' => 'text', 'css_class' => 'nhb_name'),
	'Телефон' => array('required' => true, 'type' => 'text', 'css_class' => 'nhb_phone', 'description' => __('Например, +7 999 999-99-99')),
	'Адрес' => array('required' => true, 'type' => 'text', 'css_class' => 'nhb_address'),
	'Комментарий к заказу' => array('required' => false, 'type' => 'textarea', 'css_class' => 'nhb_comment')
);

if (get_option('nhb_client_fields')) {
	update_option('nhb_client_fields', $nhb_config['client_fields']);
}
else {
	$deprecated=' ';
	$autoload='no';
	add_option('nhb_client_fields', $nhb_config['client_fields'], $deprecated, $autoload);
}
?>