<?php

/**
 * @file
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependent to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 *
 * @ingroup themeable
 */
?>
<?php if ($search_results): ?>
	<h2 class="text-center"><?php print t('¿Esta aquí lo que buscas?');?><br><span class="fa fa-4x fa-folder-open-o"></span></h2>
	<section class="search-results <?php print $module; ?>-results">
		<?php print $search_results; ?>
	</section>
	<?php print $pager; ?>
<?php else : ?>
	<h2 class="text-center"><span class="fa fa-5x fa-exclamation-triangle"></span><br><?php print t('¡Ups!. No se ha encontrado nada para tu búsqueda...');?></h2>
	<h3><?php print t('Sugerencias ');?> <span class="fa fa-fw fa-comment-o"></span> :</h3>
	<?php print search_help('search#noresults', drupal_help_arg()); ?>
<?php endif; ?>
