<?php
get_header();
$term = get_term($wp_query->queried_object->term_id, NHB_TAX_CATS);
?>
<section class="nhb_category_content">
	<h1><?php echo $term->name; ?></h1>
	<?php if(have_posts()) { ?>
		<ul class="nhb_items">
			<?php while(have_posts()) { ?>
				<?php the_post(); ?>
				<li>
					<?php if(has_post_thumbnail()) { ?>
						<a class="nhb_image" href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('nhb_preview', array('class' => 'nhb_preview')); ?>
						</a>
					<?php } ?>
					<h2 class="nhb_name">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<p><?php the_excerpt() ;?></p>
					<?php if($price = nhb_get_price()) { ?>
						<div class="nhb_actions">
							<a class="nhb_add_to_cart" data-id="<?php the_ID(); ?>" href="#"><?=__('Заказать', 'nhb');?></a>
							<div class="nhb_price_box">
								<span><?php echo $price; ?><span><?php echo get_option('nhb_currency'); ?></span></span>
							</div>
						</div>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>
		<?php wp_reset_postdata(); ?>

		<?php		
		if(function_exists('wp_pagenavi')) {
			wp_pagenavi();
		}
		else {
			?>
			<div class="nav-previous"><?php next_posts_link( __( 'Новые', 'nhb')); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Старые', 'nhb')); ?></div>
			<?
		}
		?>
		
	<?php } else { ?>
		<p><?php _e('В категории пусто', 'nhb');?>.</p>
	<?php } ?>
</section>
<?php
get_footer();
?>