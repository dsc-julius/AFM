<?php

/**
 * Add body classes if certain regions have content.
 */
function afm_preprocess_html(&$variables) {
  drupal_add_css(path_to_theme() . '/css/font-awesome.min.css', array('group' => CSS_DEFAULT, 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/bootstrap.min.css', array('group' => CSS_DEFAULT, 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/timeTo.css', array('group' => CSS_DEFAULT, 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/animate.css', array('group' => CSS_THEME, 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/main.css', array('group' => CSS_THEME, 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/custom.css', array('group' => CSS_THEME, 'preprocess' => FALSE));


  drupal_add_js(path_to_theme() . '/js/modernizr-2.8.3-respond-1.4.2.min.js', 'file');
  drupal_add_js(path_to_theme() . '/js/selectivizr-min.js', 'file');
  
  drupal_add_js(path_to_theme() . '/js/jquery-1.11.2.min.js', 'file');
  drupal_add_js(path_to_theme() . '/js/bootstrap.min.js', 'file');
  drupal_add_js(path_to_theme() . '/js/jquery.stellar.js', 'file');
  drupal_add_js(path_to_theme() . '/js/jquery.fancybox.js', 'file');
  drupal_add_js(path_to_theme() . '/js/jquery.timeTo.js', 'file');
  drupal_add_js(path_to_theme() . '/js/jquery.appear.js', 'file');
  drupal_add_js(path_to_theme() . '/js/main.js', 'file');
  drupal_add_js(path_to_theme() . '/js/custom.script.js', 'file');
  
  $meta_viewport_render_engine = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' =>  'width=device-width, initial-scale=1, user-scalable=no',
    )
  );
  $meta_ie_edge = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'X-UA-Compatible',
      'content' =>  'IE=edge',
    )
  );
  $meta_charset = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'charset' =>  'utf-8',
    )
  );
 
  // Add header meta tag for IE to head
  drupal_add_html_head($meta_viewport_render_engine, 'meta_viewport_render_engine');
  drupal_add_html_head($meta_ie_edge, 'meta_ie_edge');
  drupal_add_html_head($meta_charset, 'meta_charset');

  // Get a list of all the regions for this theme
  foreach (system_region_list($GLOBALS['theme']) as $region_key => $region_name) {

    // Get the content for each region and add it to the $region variable
    if ($blocks = block_get_blocks_by_region($region_key)) {
      $variables['region'][$region_key] = $blocks;
    }
    else {
      $variables['region'][$region_key] = array();
    }
  }
}

/**
 * Override or insert variables into the block template.
 */
function afm_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

function afm_link($variables) {
  $variables['options']['html'] = TRUE;
  return '<a href="' . check_plain(url($variables['path'], $variables['options'])) . '"' . drupal_attributes($variables['options']['attributes']) . '>' . ($variables['options']['html'] ? $variables['text'] : check_plain($variables['text'])) . '</a>';
}

function afm_preprocess_page(&$vars, $hook) {
  if (isset($vars['node']->type)) {
    // If the content type's machine name is "my_machine_name" the file
    // name will be "page--my-machine-name.tpl.php".
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
  }
}