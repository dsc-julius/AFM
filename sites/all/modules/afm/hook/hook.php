<?php
function afm_menu(){
  $items = array();
  $items['admin/settings/afm'] = array(
    'title' => 'Template Settings',
    'description' => 'Template Information Customization',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('afm_admin'),
    'access arguments' => array('administer afm settings'),
    'type' => MENU_NORMAL_ITEM,
  );
  $items['admin/support-ticket'] = array(
    'title' => 'Template Settings',
    'description' => 'Template Information Customization',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('afm_admin'),
    'access arguments' => array('administer afm settings'),
    'type' => MENU_NORMAL_ITEM,
  );

  return $items;
}

 
/*
 * Implements hook_theme
 */
function afm_theme(){
  return array(
    'afm_main_menu' => array(
      'template' => 'main-menu',
      'path' => drupal_get_path('module', 'afm') . '/templates',
      'variables' => array(), 
    )
  );
 
}

function afm_admin() {
    $form = array();

    $form['legal_number'] = array(
      '#type' => 'textfield', 
      '#name' => 'legal_number',
      '#title' => 'Legal Approval Number',
      '#required' => true,
      '#description' => t("Set Legal Approval Number to be put on footer."),
      '#attributes' => array(
        'class' => array('form-control')
      ),
      '#default_value' => variable_get('legal_number', ''),
    );
    $form['events_tab'] = array(
      '#type' => 'select',
      '#name' => 'events_tab',
      '#title' => t('Events & Webcasts'),
      '#default_value' => variable_get('events_tab', ''),
      '#description' => t("Set default tab for Events and Webcasts."),
      '#required' => TRUE,
      '#options' => array(
        '1' => 'Events',
        '2' => 'Webcasts'
      )
    );
    $form['samples_tab'] = array(
      '#type' => 'select',
      '#name' => 'samples_tab',
      '#title' => t('Samples & Resources'),
      '#default_value' => variable_get('samples_tab', ''),
      '#description' => t("Set default tab for Samples and Resources."),
      '#required' => TRUE,
      '#options' => array(
        '1' => 'Samples',
        '2' => 'Resources'
      )
    );

    return system_settings_form($form);
}

function afm_page_alter(&$page){
  global $user, $base_url; 
  if(drupal_get_path_alias() == 'node/add/homepage-settings'){
    drupal_goto($base_url . '/node/21/edit?destination=admin/content');
  }
}
?>