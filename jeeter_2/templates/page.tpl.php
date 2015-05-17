<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<!-- descomentar este bloque si modulo pace está activo -->
<!-- <div class="pace-background">
	<span>
		<img src="<?/*php print $logo; */?>" alt="<?/*php print t('logo de jeeter');*/ ?>" class="mini-logo-img"/>
		<br>Espera un segundo mientras cargamos la página ...
	</span>
</div> -->

<div id="page-wrapper">


	<div class="navicon">
		<a id="nav-toggle" class="nav-slide-btn" href="#"><span></span></a>
	</div>

	<?php if ($page['main_menu']): ?>
		<div id="navigation" class="navigation-overlayer">
			<nav class="main-menu-wrapper">
				<?php print render($page['main_menu']); ?>
			</nav><!-- /.main-menu-wrapper -->
		</div> <!-- /#navigation -->
	<?php endif; ?>

	<div id="page">

		<?php if ($is_front && theme_get_setting('front_bg_img')) : /* Use settings front page */ ?>
			<div id="top-zone" class="custom-header-bg" style='background:transparent url("<?php print theme_get_setting('imagen'); ?>") no-repeat fixed center top; background-size:cover;'>
		<?php else:  ?>
			<div id="top-zone">
		<?php endif; ?>

			<?php if ($page['top_bar_left'] || $page['top_bar_right']): ?>
				<div id="top-bar">
					<?php if ($page['top_bar_left']): ?>
						<div class="top-bar-left"><?php print render($page['top_bar_left']); ?></div>
					<?php endif; ?>	
					<?php if ($page['top_bar_right']): ?>
						<div class="top-bar-right"><?php print render($page['top_bar_right']); ?></div>
					<?php endif; ?>	
				</div>
			<?php endif; ?>

			<div id="header">
				<div class="section clearfix">
					<div id="branding">
						<?php if ($logo): ?>
							<div id="logo">
								<?php if ($is_front): /* Use big logo in front page */ ?>
									<img src="<?php print $logo; ?>" alt="<?php print t('logo de jeeter'); ?>" class="logo-img" />
								<?php else: /* Use small logo along the site */ ?>
									<a class="hvr-float-shadow" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
										<img src="<?php print $logo; ?>" alt="<?php print t('logo de jeeter'); ?>" class="mini-logo-img"/>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php if ($site_name || $site_slogan): ?>
							<div id="name-and-slogan">
								<?php if ($site_name): ?>
									<?php if ($title): ?>
										<div id="site-name">
											<h2><a class="hvr-bob" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a></h2>
										</div>
									<?php else: /* Use h1 when the content title is empty */ ?>
										<h1 id="site-name">
											<a class="hvr-bob" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
										</h1><br />
									<?php endif; ?>
								<?php endif; ?>
								<?php if ($site_slogan): ?>
									<div id="site-slogan"><h3><?php print $site_slogan; ?></h3></div>
								<?php endif; ?>
								<?php if ($is_front): /* buttons */ ?>
									<div class="span-50-center text-center">
										<div class="col-50 appear-bottom">
											<a href="#contact-map" class="btn btn-padding btn-block btn-blue go-for-it">Más Información</a>
										</div>
										<div class="col-50 appear-bottom">
											<a href="#prefooter" class="btn btn-padding btn-block btn-red go-for-it">Participa</a>
										</div>
									</div>
								<?php endif; ?>
							</div> <!-- /#name-and-slogan -->
						<?php endif; ?>
					</div><!-- /#branding -->

				<?php print render($page['header']); ?>

				</div><!-- /.section -->
			</div> <!--  /#header -->
		</div> <!--  /#top-zone -->

		
		<?php print render($title_prefix); ?>
		<?php if ($title): ?>
			<div id="page-title-wrapper">
				<h1 class="title" id="page-title"><?php print $title; ?></h1>
			</div>
		<?php endif; ?>
		<?php print render($title_suffix); ?>

		<?php if ($breadcrumb): ?>
			<div id="breadcrumb-wrapper">
				<div class="breadcrumb">
					<?php print $breadcrumb; ?>
				</div><!-- /.breadcrumb -->
			</div><!-- /#breadcrumb-wrapper -->
		<?php endif; ?>

		<?php if ($page['important']): ?>
			<div id="important">
				<?php print render($page['important']); ?>
			</div>
		<?php endif; ?>


		<?php if ($page['help'] || $messages): ?>
			<div id="ayudas">
				<?php print $messages; ?>
				<?php print render($page['help']); ?>
			</div>
		<?php endif; ?>


		<div id="main-wrapper">
			<div id="main" class="clearfix">

				<div id="content" class="column">
					<a id="main-content"></a>
					<div class="section">

						<?php if ($tabs): ?>
							<div class="tabs"><?php print render($tabs); ?></div>
						<?php endif; ?>

						<?php if ($action_links): ?>
							<ul class="action-links"><?php print render($action_links); ?></ul>
						<?php endif; ?>

						<?php print render($page['content']); ?>

						<?php /*print $feed_icons*/; ?>
					</div><!-- /.section -->
				</div> <!--  /#content -->

				<?php if ($page['sidebar_first']): ?>
					<aside id="sidebar-first" class="column sidebar">
						<div class="section">
							<?php print render($page['sidebar_first']); ?>
						</div><!-- /.section -->
					</aside> <!-- /#sidebar-first -->
				<?php endif; ?>

				<?php if ($page['sidebar_second']): ?>
					<aside id="sidebar-second" class="column sidebar">
						<div class="section">
							<?php print render($page['sidebar_second']); ?>
						</div> <!-- /.section -->
					</aside> <!--  /#sidebar-second -->
				<?php endif; ?>

			</div><!-- /#main -->
		</div> <!--/#main-wrapper -->


		<?php if ($page['pre_footer_left'] || $page['pre_footer_center'] || $page['pre_footer_right']): ?>
			<div id="prefooter">
				<div class="prefooter-left">
					<?php if($page['pre_footer_left']):?>
						<?php print render($page['pre_footer_left']); ?>
					<?php endif; ?>
				</div>
				<div class="prefooter-center">
					<?php if($page['pre_footer_center']):?>
						<?php print render($page['pre_footer_center']); ?>
					<?php endif; ?>
				</div>
				<div class="prefooter-right">
					<?php if($page['pre_footer_right']):?>
						<?php print render($page['pre_footer_right']); ?>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>



		<div id="footer">

			<?php if ($page['footer_menu']): ?>
				<div id="footer-menu-wrapper" class="footer-menu-wrapper">
					<div class="footer-menu">
						<?php print render($page['footer_menu']); ?>
					</div><!-- /.footer-menu -->
				</div> <!-- /#footer-menu-wrapper -->
			<?php endif; ?>

			<div id="footer-wrapper" class="section">
				<?php print render($page['footer']); ?>
			</div> <!-- /.section -->

		</div> <!-- /#footer -->

	</div> <!-- /#page -->
</div> <!-- /#page-wrapper -->