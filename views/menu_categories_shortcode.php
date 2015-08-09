<?php
$categories = get_terms(NHB_TAX_CATS, array('hide_empty' => 0));
?>

<ul class="nhb_categories_menu">
	<?php foreach($categories as $category) { ?>
		<?php if($category->parent == 0) { ?>
			<li>
				<a href="<?php echo get_term_link($category);?>" title="<?php echo $category->name; ?>">
					<span><?php echo $category->name; ?></span>
				</a>
			</li>
		<?php } ?>
	<?php } ?>
</ul>