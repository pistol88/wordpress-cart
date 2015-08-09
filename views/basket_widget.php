<?php if(!isset($nhb_basket)) $nhb_basket = nhb_get_basket(); ?>
<?php if(!empty($title)) echo "<h3>$title</h3>"; ?>
<div class="nhb_basket_block">
	<?=do_shortcode('[nhb_basket]'); ?>
</div>