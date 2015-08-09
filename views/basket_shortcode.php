<?php if(!isset($nhb_basket)) $nhb_basket = nhb_get_basket(); ?>
<div class="nhb_cart" id="nhb_cart">
<div class="nhb_basket_header">
	<p>
		<span><?=_e('Ваша корзина', 'nhb');?>:</span>
		<br>
		<span class="nhb_count"><?php echo $nhb_basket['count']; ?></span>
		<?=_e('на');?>
		<span class="nhb_price"><?php echo $nhb_basket['price']; ?></span>
		<?php echo get_option('nhb_currency'); ?>
	</p>
</div>
<?php if(!empty($nhb_basket['products'])) { ?>
	<div class="nhb_cart_drop">
		<table class="nhb_order_table">
			<tfoot>
				<tr>
					<td colspan="5" align="right">
						<?=__('К оплате');?> <b><span class="nhb_price"><?php echo $nhb_basket['price']; ?></span></b> <?php echo get_option('nhb_currency'); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach($nhb_basket['products'] as $product) { ?>
					<?php $post = get_post($product['id']); ?>
					<tr>
						<td>
							<figure><?php echo get_the_post_thumbnail($post->ID, 'thumb', array('class' => 'nhb_preview')); ?></figure>
						</td>
						<td>
							<strong class="nhb_name"><a href="<?php the_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></strong>
						</td>
						<td class="nhb_qty_cell">
							<div>
								<input type="text" value="<?php echo $nhb_basket['products'][$post->ID]['count'];?>">
								<span>X</span>
								<span><?=_e('шт', 'nhb'); ?></span>
							</div>
						</td>
						<td class="nhb_price_cell">
							<?php if($price = $product['price']) { ?><span class="price"><b><?php echo $price ?></b> <?php echo get_option('nhb_currency'); ?></span><?php } ?>
						</td>
						<td>
							<a href="#" class="nhb_delete_from_cart" data-id="<?php echo $post->ID; ?>">X</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php require NHB_DIR.'/views/order_form.php'; ?>
	</div>
<?php } ?>
</div>