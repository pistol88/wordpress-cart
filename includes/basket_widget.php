<?php

function nhb_basket_widget() {
	register_widget("Nh_Basket_Widget");
}

class Nh_Basket_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'Nh_Basket_Widget',
            __('Корзина'),
            array('description' => __('Этот виджет отобразит корзину', 'nhb'))
        );
    }
 
    public function widget($args, $instance) {
		if(defined('NHB_BASKET_SHORTCODE_USED')) return false;
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		require NHB_DIR.'/views/basket_widget.php';
    }
    public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
    }
    public function form($instance) {
		$title = isset($instance['title'])  ? $instance['title'] : __('Корзина', 'nhb');
        require NHB_DIR.'/views/admin/basket_widget.php';
    }
}
?>