<?php
get_header();
?>
<section class="nhb_single_content">
	<?php if(have_posts()) { ?>
		<ul class="items">
			<?php while(have_posts()) { ?>
				<?php the_post(); ?>
				<div id="nhb_product_<?php the_ID(); ?>">
					<div class="nhb_prod">
						<?php if(has_post_thumbnail()) { ?>
							<figure class="nhb_image">
								<?php the_post_thumbnail('large', array('class' => 'nhb_full_image')); ?>
							</figure>
						<?php } ?>
						<h3><?php the_title(); ?></h3>
						<div><?php the_content(); ?></div>
						<?php if($price = get_field(NHB_PRICE_FIELD_NAME)) { ?>
							<div class="nhb_actions">
								<a class="nhb_add_to_cart" data-id="<?php the_ID(); ?>" href="#">Заказать</a>
								<div class="nhb_price_box">
									<span><?php echo $price; ?><span><?php echo get_option('nhb_currency', 'nhb'); ?></span></span>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</ul>
	<?php } else { ?>
		<p><?php _e('Ничего не найдено', 'nhb');?>.</p>
	<?php } ?>
</section>
<?php
get_footer();
?>