<?php

function nhb_register_tax_product_categories() {
	$labels = 	array(
		'name'              => __('Категории товаров', 'nhb'),
		'singular_name'     => __('Категория', 'nhb'),
		'search_items'      => __('Искать', 'nhb'),
		'all_items'         => __('Все категории', 'nhb'),
		'parent_item'       => __('Мать', 'nhb'),
		'parent_item_colon' => __('Мать', 'nhb'),
		'edit_item'         => __('Редактировать', 'nhb'),
		'update_item'       => __('Обновить', 'nhb'),
		'add_new_item'      => __('Добавить', 'nhb'),
		'new_item_name'     => __('Новая', 'nhb'),
		'menu_name'         => __('Категория', 'nhb'),
	); 
	register_taxonomy(NHB_TAX_CATS,
		NHB_TYPE_PRODUCTS,
		array('hierarchical' => true,
			'label' => __('Категории товаров', 'nhb'),
			'labels'                => $labels,
			'public'                => true,
			'show_in_nav_menus'     => true,
			'show_ui'               => true,
			'show_tagcloud'         => true,
			'hierarchical'          => true,
			'query_var' => true,
			'rewrite' => array('slug' => NHB_TAX_CATS),
			'show_admin_column' => true,
			'labels' => array(
				'menu_name' => __('Категории', 'nhb'),
				'search_items' => __('Категории', 'nhb'),
			)
		)
	); 
}

function nhb_register_type_products() {
	register_post_type(NHB_TYPE_PRODUCTS, array(
		'label' => __('Товары', 'nhb'),
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => NHB_TYPE_PRODUCTS, 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'editor', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes'),
		'taxonomies' => array(NHB_TAX_CATS),
		'labels' => array (
			'name' => __('Товары', 'nhb'),
			'singular_name' => __('Товар', 'nhb'),
			'menu_name' => __('Товары', 'nhb'),
			'add_new' => __('Добавить новый', 'nhb'),
			'add_new_item' => __('Добавить товар', 'nhb'),
			'edit' => __('Редактировать', 'nhb'),
			'edit_item' => __('Редактировать товар', 'nhb'),
			'new_item' => __('Новый товар', 'nhb'),
			'view' => __('Смотреть', 'nhb'),
			'view_item' => __('Смотреть товар', 'nhb'),
			'search_items' => __('Искать товары', 'nhb'),
			'not_found' => __('Не найдено', 'nhb'),
			'not_found_in_trash' => __('Не найдено', 'nhb'),
			'parent' => __('Материнский товар', 'nhb'),
		)
		)
	);
}

function nhb_register_type_orders() {
	register_post_type(NHB_TYPE_ORDERS, array(
		'label' => __('Заказы', 'nhb'),
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => NHB_TYPE_ORDERS, 'with_front' => false),
		'query_var' => false,
		'supports' => array('title', 'editor', 'custom-fields'),
		'labels' => array (
			'name' => __('Заказы', 'nhb'),
			'singular_name' => __('Заказ', 'nhb'),
			'menu_name' => __('Заказы', 'nhb'),
			'add_new' => __('Добавить', 'nhb'),
			'add_new_item' => __('Добавить заказ', 'nhb'),
			'edit' => __('Редактировать', 'nhb'),
			'edit_item' => __('Редактировать заказ', 'nhb'),
			'new_item' => __('Новый заказ', 'nhb'),
			'view' => __('Смотреть', 'nhb'),
			'view_item' => __('Смотреть заказ', 'nhb'),
			'search_items' => __('Искать заказы', 'nhb'),
			'not_found' => __('Не найдено', 'nhb'),
			'not_found_in_trash' => __('Не найдено', 'nhb'),
			'parent' => __('Материнский Заказ', 'nhb')
		)
		)
	);
}
