<?php

/**
 * @file
 * Display Suite custom article template.
 */
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="custom-article <?php print $classes;?> clearfix">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <<?php print $image_wrapper ?> class="group-image<?php print $image_classes; ?>">
    <?php print $image; ?>
  </<?php print $image_wrapper ?>>

  <<?php print $contents_wrapper ?> class="group-contents<?php print $contents_classes; ?>">
    <?php print $contents; ?>
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
