
<nav class="nhb_categories">
	<?php if(!empty($title)) echo "<h3>$title</h3>"; ?>
	
	<?php
	global $wp_query, $post;
	$categories = get_terms(NHB_TAX_CATS, array('parent' => 0, 'orderby' => 'order', 'hide_empty' => 0));
	if (is_tax() && get_query_var('taxonomy') == NHB_TAX_CATS && !empty($wp_query->queried_object->term_id)) {
		$current_term = get_term($wp_query->queried_object->term_id, NHB_TAX_CATS);
	}
	else {
		$current_term = false;
	}
	?>
	<ul>
		<?php foreach($categories as $category) { ?>
			<?php
			if(has_term($category->term_id, NHB_TAX_CATS, $post) | ($current_term && ($current_term->term_id == $category->term_id | $current_term->parent == $category->term_id))) {
				$is_active = true;
			}
			else {
				$is_active = false;
			}
			?>
			<li<?php if($is_active) { ?> class="active"<?php } ?>>
				<a href="<?php echo get_term_link($category); ?>">
					<?php echo $category->name;?>
				</a>
				<?php if($is_active) { ?>
					<?php $subcategories = get_terms(NHB_TAX_CATS, array('child_of' => $category->term_id, 'orderby' => 'order', 'hide_empty' => 0)); ?>
					<?php if(!empty($subcategories)) { ?>
						<ul>
							<?php foreach($subcategories as $subcategory) { ?>
								<li><a href="<?php echo get_term_link($subcategory); ?>"><?php echo $subcategory->name;?></a></li>
							<?php } ?>
						</ul>
					<?php } ?>
				<?php } ?>
			</li>
		<?php } ?>
	</ul>
</nav>