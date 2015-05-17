<?php
function ds_custom_article() {
  return array(
    'label' => t('Custom Article'),
    'regions' => array(
      'image' => t('Image'),
      'contents' => t('Contents'),
      'sidebar' => t('Sidebar'),
      'footer' => t('Footer'),
    ),
    // Add this line if there is a default css file.
    'css' => TRUE,
    // Add this line if you're using DS 2.x for icon preview
    'image' => TRUE,
  );
}