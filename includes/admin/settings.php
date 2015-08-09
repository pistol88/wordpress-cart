<?php
function nhb_add_submenu() {
	add_menu_page(__('Настройки NHB', 'nhb'), __('Настройки NHB', 'nhb'), 'edit_posts', 'catalog-settings', 'nhb_theme_settings');
}

function nhb_theme_settings() {
	require NHB_DIR.'/views/admin/settings.php';
}
?>