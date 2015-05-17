<?php
/**
 * @file
 * template.php
 *
 * This file should only contain light helper functions and stubs pointing to
 * other files containing more complex functions.
 *
 * The stubs should point to files within the `theme` folder named after the
 * function itself minus the theme prefix. If the stub contains a group of
 * functions, then please organize them so they are related in some way and name
 * the file appropriately to at least hint at what it contains.
 *
 * All [pre]process functions, theme functions and template implementations also
 * live in the 'theme' folder. This is a highly automated and complex system
 * designed to only load the necessary files when a given theme hook is invoked.
 * @see theme/registry.inc
 *
 * Due to a bug in Drush, these includes must live inside the 'theme' folder
 * instead of something like 'includes'. If a module or theme has an 'includes'
 * folder, Drush will think it is trying to bootstrap core when it is invoked
 * from inside the particular extension's directory.
 * @see https://drupal.org/node/2102287
 */


 // Ouptuts site breadcrumbs with current page title appended onto trail
function jeeter_2_breadcrumb($variables) {
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		// Provide a navigational heading to give context for breadcrumb links to
		// screen-reader users. Make the heading invisible with .element-invisible.
		$output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
		$crumbs = '<div class="breadcrumb">';
		$array_size = count($breadcrumb);
		$i = 0;
		while ( $i < $array_size) {
			$crumbs .= '<span class="breadcrumb-' . $i;
			if ($i == 0) {
				$crumbs .= ' first';
			}
			if ($i+1 == $array_size) {
				$crumbs .= ' last';
			}
			$crumbs .=  '">' . $breadcrumb[$i] . '</span> <span class="separator"> /</span> ';
			$i++;
		}
		$crumbs .= '<span class="active">'. drupal_get_title() .'</span></div>';
		return $crumbs;
	}
}


//Retouch main menu: Add the description of each link as a span tag inside the link
function jeeter_2_links($variables) {
	$links = $variables['links'];
	$attributes = $variables['attributes'];
	$heading = $variables['heading'];
	global $language_url;
	$output = '';

	if (count($links) > 0) {
		$output = '';
		// Treat the heading first if it is present to prepend it to the
		// list of links.
		if (!empty($heading)) {
			if (is_string($heading)) {
				// Prepare the array that will be used when the passed heading
				// is a string.
				$heading = array(
					'text' => $heading,
					// Set the default level of the heading.
					'level' => 'h2',
				);
			}
			$output .= '<' . $heading['level'];
			if (!empty($heading['class'])) {
				$output .= drupal_attributes(array('class' => $heading['class']));
			}
			$output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
		}
		
		$output .= '<ul' . drupal_attributes($attributes) . '>';
		$num_links = count($links);
		$i = 1;
		foreach ($links as $key => $link) {
			$class = array($key);
			
			// Add first, last and active classes to the list of links to help out themers.
			if ($i == 1) {
				$class[] = 'first';
			}
			if ($i == $num_links) {
				$class[] = 'last';
			}
			if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
					&& (empty($link['language']) || $link['language']->language == $language_url->language)) {
				$class[] = 'active';
			}
			$output .= '<li' . drupal_attributes(array('class' => $class)) . '>';
			if (isset($link['href'])) {
				// Pass in $link as $options, they share the same keys.
				// $attributes['id'] - menu name change it from 'main-menu' to your menu name if you like to display description in some other menu
				if(isset($attributes['id'])&& $attributes['id']=='main-menu') {
					$link['html'] = true;
					$output .= l($link['title']. '<span>' . $link['attributes']['title'] . '</span>',$link['href'], $link);}
				else {
					$output .= l($link['title'], $link['href'], $link);
				}
			}
			elseif (!empty($link['title'])) {
				// Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
				if (empty($link['html'])) {
					$link['title'] = check_plain($link['title']);
				}
				$span_attributes = '';
				if (isset($link['attributes'])) {
					$span_attributes = drupal_attributes($link['attributes']);
				}
				$output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
			}
			
			$i++;
			$output .= "</li>\n";
		}
		$output .= '</ul>';
	}
	return $output;
}



/**
 * Implements hook_preprocess_node().
 */
function jeeter_2_preprocess_node(&$vars) {
	// Add css class "node--NODETYPE--VIEWMODE" to nodes
	$vars['classes_array'][] = 'node-' . $vars['type'] . '-' . $vars['view_mode'];
	// Make "node--NODETYPE--VIEWMODE.tpl.php" templates available for nodes 
	$vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];
}


/*Adding a close button to messajes box. JQuery to get functionality*/
function jeeter_2_status_messages($variables) {
	$display = $variables ['display'];
	$output = '';

	$status_heading = array(
		'status' => t('Status message'),
		'error' => t('Error message'),
		'warning' => t('Warning message'),
	);
	foreach (drupal_get_messages($display) as $type => $messages) {
		$output .= "<div class=\"messages $type\">\n";
		if (!empty($status_heading [$type])) {
			$output .= '<h2 class="element-invisible">' . $status_heading [$type] . "</h2>\n";
		}
		if (count($messages) > 1) {
			$output .= " <ul>\n";
			foreach ($messages as $message) {
				$output .= '  <li>' . $message . "</li>\n";
			}
			$output .= " </ul>\n";
		}
		else {
			$output .= reset($messages);
		}
		$output .= "<span class='close-button'>&times;</span></div>\n";
	}
	return $output;
}



/**
* Changes the search form to use the "search" input element of HTML5 and some atributes.
*/
function jeeter_2_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_block_form') {
		$form['actions']['submit']['#value'] = t('OK!');
		$form['search_block_form']['#attributes']['placeholder'] = "¿Que buscas?...";
		$form['search_block_form']['#attributes']['size'] = "30";
		$form['search_block_form']['#attributes']['type'] = "search";
	}
}
function jeeter_2_preprocess_search_block_form(&$vars) {
	$vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}