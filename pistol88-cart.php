<?php
/*
Plugin Name: Pistol88 Cart
Description: Добавляет корзину на сайт. Шорткоды: [nhb_menu_categories], [nhb_basket]. Чтобы начать, смотрите на появившиеся виджеты.
Author: Nethammer band <pistol88@gmail.com>
Author URI: http://nethammer.ru/
Version: 0.1
Text Domain: nhb
Domain Path: /languages/
*/ 

session_start();

//Конфиг
define('NHB_DIR', untrailingslashit(dirname(__FILE__)));
define('NHB_URL', plugins_url().'/pistol88-cart');
require NHB_DIR.'/config.php';

//Инициализация кастомных типов и полей
require NHB_DIR.'/includes/custom_types.php';
require NHB_DIR.'/includes/custom_fields.php';

//Функции корзины
require NHB_DIR.'/includes/basket.php';

//Разные функции
require NHB_DIR.'/includes/functions.php';

//Загружаем языки
function nhb_load_plugin_textdomain(){
	load_plugin_textdomain('nhb', false, "pistol88-cart/languages");
}
add_action('plugins_loaded','nhb_load_plugin_textdomain');

//Добавляем типы контента
add_action('init', 'nhb_register_type_products');
add_action('init', 'nhb_register_tax_product_categories');
add_action('init', 'nhb_register_type_orders');
add_action('add_meta_boxes', 'nhb_extra_fields', 1);
add_action('save_post', 'nhb_extra_fields_update', 0);

//Пасссивное внедрение в функционал
if(!is_admin()) {
	add_action('wp_head', 'nhb_wp_head');
	add_action('wp_footer', 'nhb_wp_footer');
	//Подключение скриптов и стилей
	wp_enqueue_script('jquery');
	wp_register_script('nhb_scripts', NHB_URL.'/assets/js/scripts.js');
	wp_enqueue_script('nhb_scripts');
	wp_register_style('nhb_styles', NHB_URL.'/assets/css/styles.css');
	wp_enqueue_style('nhb_styles');
}
else {
	//Настройки сайта
	require NHB_DIR.'/includes/admin/settings.php';
	add_action('admin_menu', 'nhb_add_submenu');
}
//Шаблоны магазина
require NHB_DIR.'/includes/templates.php';
add_filter('template_include', 'nhb_template', 1);
	
	//Миниатюры
add_theme_support('post-thumbnails');
add_image_size('nhb_preview', $nhb_config['image_preview_w'], $nhb_config['image_preview_h'], true);

//Виджет категорий
require NHB_DIR.'/includes/categories_widget.php';
add_action('widgets_init',  'nhb_categories_widget');

//Виджет корзины
require NHB_DIR.'/includes/basket_widget.php';
add_action('widgets_init', 'nhb_basket_widget');

//Шорткод корзины
require NHB_DIR.'/includes/basket_shortcode.php';
add_shortcode('nhb_basket', 'nhb_basket_function');

//Шорткод категорий меню [nhb_menu_categories]
require NHB_DIR.'/includes/categories_shortcode.php';
add_shortcode('nhb_menu_categories', 'nhb_menu_categories_function');

//Обработчик действий
if(isset($_GET['nhb_action'])) {
	add_action('plugins_loaded', 'nhb_actions');
}