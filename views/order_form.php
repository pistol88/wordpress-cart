<div id="nhb_order_form">
	<form action="<?php bloginfo('home'); ?>/?nhb_action=send_order_form" method="post" class="nhb_order_form">
	<fieldset>
		<p><strong>Оформление заказа</strong></p>
		<?php $fields = get_option('nhb_client_fields'); ?>
		<?php foreach($fields as $name => $field) { ?>
			<div class="nhb_line">
				<?php if($field['type'] == 'textarea') { ?>
					<p><textarea <?php if($field['required']) echo 'required'; ?> name="nhb_client[<?=$name;?>]" placeholder="<?=$name;?>"></textarea></p>
				<?php } else { ?>
					<p><input <?php if($field['required']) echo 'required'; ?> name="nhb_client[<?=$name;?>]" type="text" class="<?=$field['css_class'];?>" placeholder="<?=$name;?>"></p>
					<?php if(isset($field['description'])) { ?>
						<p class="example"><small><?=$field['description'];?></small></p>
					<?php } ?>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="nhb_line">
			<p><input type="submit" name="pay" value="Оформить" class="btn btn-default"></p>
		</div>
	</fieldset>
	</form>
</div>