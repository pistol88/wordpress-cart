<form method="post" action="options.php">
	<h1><?php _e('Настройки', 'nhb'); ?></h1>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="nhb_liqpay_id,nhb_liqpay_secret,nhb_orders_email,nhb_min_sum,nhb_currency,nhb_thanks_url" />
	<?php wp_nonce_field('update-options'); ?>
	<h2><?php _e('Магазин', 'nhb'); ?></h2>
	<table class="form-table">
		<tr valign="top">
			<th scope="row"><?php _e('Страница спасибо', 'nhb'); ?> </th>
			<td><input type="text" name="nhb_thanks_url" value="<?php echo get_option('nhb_thanks_url'); ?>" /></td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Валюта', 'nhb'); ?> </th>
			<td><input type="text" name="nhb_currency" value="<?php echo get_option('nhb_currency'); ?>" /></td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Минимальная сумма заказа', 'nhb'); ?></th>
			<td><input type="text" name="nhb_min_sum" value="<?php echo get_option('nhb_min_sum'); ?>" /></td>
		</tr>
	</table>
	
	<h2><?php _e('Контакты', 'nhb'); ?></h2>
	<table class="form-table">
		<tr valign="top">
			<th scope="row"><?php _e('E-mail для заказов', 'nhb'); ?> </th>
			<td><input type="text" name="nhb_orders_email" value="<?php echo get_option('nhb_orders_email'); ?>" /></td>
		</tr>
	</table>
	<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Сохранить', 'nhb'); ?>" /></p>
</form>