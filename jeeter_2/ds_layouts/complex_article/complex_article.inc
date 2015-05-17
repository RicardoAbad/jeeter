<?php
function ds_complex_article() {
	return array(
		'label' => t('Complex Article'),
		'regions' => array(
			'main_image' => t('Imagen principal'),
			'main_title' => t('Título'),
			'fecha' => t('Fecha'),
			'autor' => t('Sobre el autor'),
			'autor_picture' => t('Imagen del autor'),
			'contents' => t('Contenido general'),
			'extra_contents' => t('Contenido extra'),
			'sidebar' => t('Lateral, auxiliar'),
			'footer' => t('Pie del artículo'),
		),
		// Add this line if there is a default css file.
		'css' => TRUE,
		// Add this line if you're using DS 2.x for icon preview
		'image' => TRUE,
	);
}