<?php if(!isset($nhb_basket)) $nhb_basket = nhb_get_basket(); ?>
						
<div><?php _e('К оплате'); ?> <b><span class="nhb_price"><?php echo $nhb_basket['price']; ?></span></b> <?php echo get_option('nhb_currency'); ?></div>
<h3><?php _e('Клиент'); ?>:</h3>
<ul>
<?php foreach($client_data as $client_field_name => $client_field_value) { ?>
	<li><strong><?php echo $client_field_name;?></strong>: <?php echo $client_field_value;?></li>
<?php } ?>
</ul>
<table width="600px">
	<tbody>
		<?php foreach($nhb_basket['products'] as $product) { ?>
			<?php $post = get_post($product['id']); ?>
			<tr>
				<td>
					<figure><?php echo get_the_post_thumbnail($post->ID, 'thumb'); ?></figure>
				</td>
				<td>
					<strong><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></strong>
				</td>
				<td>
					<div>
						<span><?php echo $nhb_basket['products'][$post->ID]['count'];?></span>
						<span><?php _e('шт'); ?></span>
					</div>
				</td>
				<td>
					<span><b><?php echo $product['price'];?></b> <?php echo get_option('nhb_currency'); ?></span>
				</td>
			</tr>		
		<?php } ?>
	</tbody>
</table>