<?php

/**
 * @file
 * Display Suite complex article template.
 */
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="complex-article <?php print $classes;?> clearfix">

	<?php if (isset($title_suffix['contextual_links'])): ?>
	<?php print render($title_suffix['contextual_links']); ?>
	<?php endif; ?>

	<<?php print $main_image_wrapper ?> class="group-main-image<?php print $main_image_classes; ?>">
		<?php print $main_image; ?>
	</<?php print $main_image_wrapper ?>>

	<<?php print $main_title_wrapper ?> class="group-main-title<?php print $main_title_classes; ?>">
		<?php print $main_title; ?>
	</<?php print $main_title_wrapper ?>>

	<<?php print $fecha_wrapper ?> class="group-fecha<?php print $fecha_classes; ?>">
		<?php print $fecha; ?>
	</<?php print $fecha_wrapper ?>>

	<<?php print $autor_wrapper ?> class="group-autor<?php print $autor_classes; ?>">
		<?php print $autor; ?>
	</<?php print $autor_wrapper ?>>

	<<?php print $contents_wrapper ?> class="group-contents<?php print $contents_classes; ?>">

		<<?php print $autor_picture_wrapper ?> class="group-autor-picture<?php print $autor_picture_classes; ?>">
			<?php print $autor_picture; ?>
		</<?php print $autor_picture_wrapper ?>>

		<?php print $contents; ?>

		<<?php print $extra_contents_wrapper ?> class="group-extra-contents<?php print $extra_contents_classes; ?>">
			<?php print $extra_contents; ?>
		</<?php print $extra_contents_wrapper ?>>

	</<?php print $contents_wrapper ?>>


	<<?php print $sidebar_wrapper ?> class="group-sidebar<?php print $sidebar_classes; ?>">
		<?php print $sidebar; ?>
	</<?php print $sidebar_wrapper ?>>

	<<?php print $footer_wrapper ?> class="group-footer<?php print $footer_classes; ?>">
		<?php print $footer; ?>
	</<?php print $footer_wrapper ?>>

</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
	<?php print $drupal_render_children ?>
<?php endif; ?>
