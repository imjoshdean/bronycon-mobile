<?php

function bronycon_mobile_preprocess_image(&$variables) {
  $attributes = &$variables['attributes'];

  foreach (array('width', 'height') as $key) {
    unset($attributes[$key]);
    unset($variables[$key]);
  }
}

function bronycon_mobile_preprocess_html(&$vars) {
  global $theme_path;
  // Add conditional CSS for IE7 and below.
  //drupal_add_css($theme_path . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  $vars['head_title'] = implode(' | ', array(drupal_get_title(), variable_get('site_name')));  
}

function bronycon_mobile_menu_tree($variables) {
  return '<ul data-role="listview">' . $variables['tree'] . '</ul>';
}

function bronycon_mobile_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  $first = false;


  if($element['#attributes']['class'][0] == 'first') {
    $first = true;
  }

  $element['#attributes']['class'] = array();

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  if($element['#original_link']['plid'] == 0) {
    $sub_menu = str_replace('data-role="listview"', '', $sub_menu);
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

?>