<?php
// $Id: share_admin.inc,v 1.6.2.5 2008/12/01 23:49:57 greenskin Exp $

/**
 * @file
 * Functions for administering Share.
 *
 * This file holds the functions that build and theme the Share administration
 * pages. This is only loaded when the uri begins with 'admin/build/share'.
 *
 * Written by greenSkin. Development sponsored by the It Is Written.
 * http://www.itiswritten.org
 */

/*******************************************************************************
 * Callback Functions, Forms, and Tables
 ******************************************************************************/

function share_admin_page() {
  $result = db_query("SELECT * FROM {share}");
  $popups = array();
  while ($data = db_fetch_object($result)) {
    $popups[$data->module][] = $data;
  }

  if (empty($popups)) {
    return t('No Share popups have been created. Click !here to create one.', array('!here' => l(t('here'), 'admin/build/share/add')));
  }

  ksort($popups);
  return theme('share_list_popups', $popups);
}

function share_popup_form($share_id = NULL, $module = 'share') {
  if ($share_id && is_numeric($share_id)) {
    $share = share_popup_load($share_id, $module);

    $form['share_id'] = array(
      '#type' => 'hidden',
      '#value' => $share_id
    );
  } else {
    $share = new $module;
    $share->defaults();
  }

  $form['_share'] = array('#type' => 'value', '#value' => $share);
  $form['status'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable this popup'),
    '#default_value' => $share->status
  );
  $form['module'] = array(
    '#type' => 'hidden',
    '#value' => $share->module
  );
  $form['label'] = array(
    '#type' => 'textfield',
    '#title' => t('Label'),
    '#description' => t('Give a label for this popup.'),
    '#default_value' => $share->label,
    '#required' => TRUE
  );

  // WHERE
  $form['where_wrapper'] = array(
    '#type' => 'fieldset',
    '#title' => t('Where to share'),
    '#description' => t('Set node credentials for where you would like the popup to show.'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE
  );
  $form['where_wrapper']['node_types'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Node types'),
    '#description' => t('If no node type is selected, the popup will not be restricted by node type.'),
    '#default_value' => $share->node_types,
    '#options' => array_map('check_plain', node_get_types('names'))
  );
  if (module_exists('taxonomy')) {
    $terms = taxonomy_form_all();
    if (!empty($terms)) {
      $form['where_wrapper']['category_terms'] = array(
        '#type' => 'select',
        '#multiple' => TRUE,
        '#title' => t('Categories'),
        '#description' => t('If no category term is selected, the popup will not be restricted by terms.'),
        '#default_value' => $share->category_terms,
        '#options' => taxonomy_form_all()
      );
    }
  } else {
    $form['where_wrapper']['category_terms'] = array(
      '#type' => 'hidden',
      '#value' => array()
    );
  }
  $form['where_wrapper']['where'] = array(
    '#type' => 'select',
    '#title' => t('Where'),
    '#default_value' => $share->where,
    '#options' => array('block' => t('Block'), 'link' => t('Link'), 'node' => t('Node'))
  );
  $form['where_wrapper']['weight'] = array(
    '#type' => 'weight',
    '#title' => t('Weight'),
    '#description' => t('Only applies if the popup is shown in the node.'),
    '#default_value' => $share->weight
  );
  $form['where_wrapper']['view'] = array(
    '#type' => 'select',
    '#title' => t('View'),
    '#default_value' => $share->view,
    '#options' => array(t('Teasers'), t('Full-page'), t('Teasers and full-page'))
  );

  $form['share']['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Link name'),
    '#description' => t('Specify the name of the Share link.'),
    '#default_value' => $share->name
  );
  $form['share']['effects'] = array(
    '#type' => 'hidden',
    '#title' => t("Effects"),
    '#description' => t("Add animation to the opening and closing of the Share popup."),
    '#default_value' => $share->effects
  );

  if (!empty($share->tabs) && $module == 'share') {
    $form['tabs'] = array(
      '#theme' => 'share_tabs_settings'
    );
    foreach ($share->tabs as $key => $tab) {
      $form['tabs'][$key] = array('#weight' => $tab->weight);
      $form['tabs'][$key][$tab->id .'_id'] = array(
        '#type' => 'hidden',
        '#value' => $tab->id
      );
      $form['tabs'][$key][$tab->id .'_title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#default_value' => $tab->title
      );
      $form['tabs'][$key][$tab->id .'_enabled'] = array(
        '#type' => 'checkbox',
        '#default_value' => $tab->enabled
      );
      $form['tabs'][$key][$tab->id .'_weight'] = array(
        '#type' => 'weight',
        '#delta' => 10,
        '#default_value' => $tab->weight
      );
      $form['tabs'][$key][$tab->id .'_module'] = array(
        '#type' => 'hidden',
        '#value' => $tab->module
      );

      if ($share_id) {
        module_invoke($tab->module, 'share_tab', 'load', $tab);
      }
      if ($settings = module_invoke($tab->module, 'share_tab', 'settings', $tab)) {
        $form['tabs'][$key][$tab->id .'_settings'] = $settings;
      }
    }
  }

  $form['save'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
    '#weight' => 10
  );
  if ($share_id) {
    $form['save_edit'] = array(
      '#type' => 'submit',
      '#value' => t('Save and edit'),
      '#weight' => 10
    );
  }

  return $form;
}

function share_popup_status($state, $share_id, $redirect = FALSE) {
  switch ($state) {
    case 'disable':
      $status = 0;
      break;
    case 'enable':
      $status = 1;
      break;
  }
  db_query("UPDATE {share} SET `status` = %d WHERE `share_id` = %d", $status, $share_id);

  if ($redirect) {
    drupal_goto('admin/build/share');
  }
}

function share_popup_delete_form($share) {
  $form['share_id'] = array(
    '#type' => 'value',
    '#value' => $share->share_id
  );
  $form['module'] = array(
    '#type' => 'value',
    '#value' => $share->module
  );
  $form['label'] = array(
    '#type' => 'value',
    '#value' => $share->label
  );

  return confirm_form(
    $form,
    t('Are you sure you want to delete %title?', array('%title' => $share->label)),
    'admin/build/share',
    t('This action cannot be undone.'),
    t('Delete'),
    t('Cancel')
  );
}

/*******************************************************************************
 * Module and Helper Functions
 ******************************************************************************/

function share_popup_form_validate($form_id, $form_values, $form) {
  switch ($form_values['module']) {
    case 'share':
      $set = FALSE;
      foreach ($form_values as $key => $value) {
        if (preg_match('/_enabled$/', $key)) {
          if ($value) {
            $set = TRUE;
            break;
          }
        }
      }
      if ($set == FALSE) {
        form_set_error('_enabled', t('At least one tab needs to be enabled.'));
        return;
      }
      foreach (module_implements('share_tab') as $module) {
        module_invoke($module, 'share_tab', 'validate', $form_values);
      }
      break;
  }
}

function share_popup_form_submit($form_id, $form_values) {
  if (isset($form_values['share_id'])) {
    $share_id = share_popup_save($form_values);
    drupal_set_message(t('@label saved.', array('@label' => $form_values['label'])));
  } else {
    $share_id = share_popup_new($form_values);
    drupal_set_message(t('@label created.', array('@label' => $form_values['label'])));
  }

  if ($form_values['op'] == $form_values['save']) {
    return 'admin/build/share';
  }
}

function share_popup_delete_form_submit($form_id, $form_values) {
  share_popup_delete($form_values['share_id'], $form_values['module']);
  drupal_set_message(t('@label deleted.', array('@label' => $form_values['label'])));
  return 'admin/build/share';
}

/*******************************************************************************
 * Theme Functions
 ******************************************************************************/

function theme_share_list_popups($popups) {
  $headers = array(
    array('data' => t('Label')),
    array('data' => t('Node types')),
    array('data' => t('Actions'))
  );

  $output = '';
  foreach ($popups as $module => $value) {
    $rows = array();
    foreach ($value as $share) {
      $node_types = unserialize($share->node_types);
      $types = array();
      if (!empty($node_types)) {
        foreach ($node_types as $node_type) {
          if ($node_type) {
            $types[] = node_get_types('name', $node_type);
          }
        }
      }

      $actions = array(
        'delete' => array(
          'title' => t('Delete'),
          'href' => "admin/build/share/". $share->share_id ."/delete"
        ),
        'disable' => array(
          'title' => t('Disable'),
          'href' => "admin/build/share/". $share->share_id ."/disable"
        ),
        'enable' => array(
          'title' => t('Enable'),
          'href' => "admin/build/share/". $share->share_id ."/enable"
        ),
        'edit' => array(
          'title' => t('Edit'),
          'href' => "admin/build/share/". $share->share_id ."/edit"
        )
      );
      $row = array(
        array('data' => $share->label),
        array('data' => empty($types) ? '' : implode(', ', $types)),
        array(
          'data' => theme(
            'links',
            ($share->status) ? 
              array(
                $actions['edit'],
                $actions['disable']
              ) : array(
                $actions['edit'],
                $actions['enable'],
                $actions['delete']
              )
          )
        )
      );
      $rows[] = $row;
    }

    switch ($module) {
      case 'share':
        $title = t('Share');
        break;
      default:
        // $title = t('ShareThis');
        break;
    }
    $element = array(
      '#title' => $title,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#value' => theme('table', $headers, $rows)
    );
    $output.= theme('fieldset', $element);
  }

  return $output;
}

function theme_share_tabs_settings($form) {
  drupal_add_js(drupal_get_path('module', 'share') .'/js/share_settings.js');
  drupal_add_css(drupal_get_path('module', 'share') .'/css/share_settings.css');

  $rows = array();
  $headers = array(
    array('data' => t('Tab')),
    array('data' => t('Weight'), 'width' => '67px')
  );

// dpm($form);
  foreach (element_children($form) as $tab) {
    $tab_name = '<div class="tab-name"><div class="double-arrows"></div><div class="tab-weight">'. drupal_render($form[$tab][$tab .'_weight']) .'</div><div class="tab-enabled">'. drupal_render($form[$tab][$tab .'_enabled']) .'</div><div class="tab-title">'. $form[$tab][$tab .'_title']['#value'] .'</div></div>';
    $tab_settings = '<div class="tab-settings" style="display: none;">'. drupal_render($form[$tab][$tab .'_title']) . drupal_render($form[$tab][$tab .'_settings']) .'</div>';
    $tab = '<div id="'. str_replace('_', '-', $tab) .'-tab">'. $tab_name . $tab_settings .'</div>';

    $row = array(
      array('data' => $tab, 'colspan' => 2)
    );
    $rows[] = $row;
  }

  $output = theme('table', $headers, $rows);
  $output.= drupal_render($form);
  return $output;
}
