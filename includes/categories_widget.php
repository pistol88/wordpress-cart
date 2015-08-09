<?php

function nhb_categories_widget() {
	register_widget("Nhb_Categories_Widget");
}

class Nhb_Categories_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'Nhb_Categories_Widget',
            __('Категории товаров', 'nhb'),
            array('description' => __('Этот виджет отобразит дерево категорий товаров', 'nhb'))
        );
    }
 
    public function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		require NHB_DIR.'/views/categories_widget.php';
    }
    public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
    }
    public function form($instance) {
		$title = isset($instance[ 'title']) ? $instance['title'] : __('Категории товаров', 'nhb');
        require NHB_DIR.'/views/admin/categories_widget.php';
    }
}
?>