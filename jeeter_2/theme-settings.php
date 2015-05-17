

<?php

function jeeter_2_form_system_theme_settings_alter(&$form, &$form_state) {

	$form['customize'] = array(
		'#type' => 'fieldset', 
		'#title' => t('Custom settings'), 
		'#weight' => -5, 
		'#collapsible' => TRUE, 
		'#collapsed' => TRUE,
	);

	$form['customize']['front_bg_img'] = array(
		'#type' => 'checkbox',
		'#title' => t('Custom header background'),
		'#default_value' => theme_get_setting('front_bg_img'),
		'#description'   => t("Use a background image in header for front page."),
		'#weight' => 0, 
	);

	$form['customize']['imagen'] = array(
		'#type' => 'textfield', 
		'#title' => t('Ruta a tu imagen'),
		'#description'   => t("The path relative to the root begininng by ./, for example: ./sites/default/files/background.png"),
		'#default_value' => theme_get_setting('imagen'),
		'#size' => 60, 
		'#maxlength' => 128,
		'#weight' => 1,
	);
}