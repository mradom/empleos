<?php
// $Id: node_edit_form.inc,v 1.1.2.8 2008/07/29 10:34:25 sdboyer Exp $


/**
 * @file contexts/node_edit_form.inc
 *
 * Plugin to provide a node_edit_form context
 */

function panels_node_edit_form_panels_contexts() {
  $args['node_edit_form'] = array(
    'title' => t("Node edit form"),
    'description' => t('A node edit form.'),
    'context' => 'panels_context_create_node_edit_form',
    'settings form' => 'panels_context_node_edit_form_settings_form',
    'settings form validate' => 'panels_context_node_edit_form_settings_form_validate',
    'keyword' => 'node_edit',
    'context name' => 'node_edit_form',
  );
  return $args;
}

/**
 * It's important to remember that $conf is optional here, because contexts
 * are not always created from the UI.
 */
function panels_context_create_node_edit_form($empty, $node = NULL, $conf = FALSE) {
  $context = new panels_context(array('form', 'node_edit', 'node_form', 'node'));
  $context->plugin = 'node_edit_form';

  if ($empty) {
    return $context;
  }

  if ($conf) {
    // In this case, $node is actually our $conf array.
    $node = node_load($node['nid']);
  }

  if (!empty($node) && node_access('update', $node)) {
    // This is from node_edit_page cause Drupal still doesn't use fapi right.
    if ($_POST['op'] == t('Delete')) {
      // Note: we redirect from node/nid/edit to node/nid/delete to make the tabs disappear.
      if ($_REQUEST['destination']) {
        $destination = drupal_get_destination();
        unset($_REQUEST['destination']);
      }
      drupal_goto('node/'. $node->nid .'/delete', $destination);
    }

    $form = drupal_retrieve_form($node->type . '_node_form', $node);
    drupal_process_form($node->type . '_node_form', $form);
    // Fill in the 'node' portion of the context
    $context->data     = $node;
    $context->title    = $node->title;
    $context->argument = $node->nid;

    $context->form       = $form;
    $context->form_id    = $node->type . '_node_form';
    $context->form_title = $node->title;
    $context->node_type  = $node->type;
    return $context;
  }
}

function panels_context_node_edit_form_settings_form($conf, $external = FALSE) {
  if ($external) {
    $form['external'] = array(
      '#type' => 'checkbox',
      '#default_value' => $conf['external'],
      '#title' => t('Require this context from an external source (such as a containing panel page).'),
      '#description' => t('If selected, node selection (below) will be ignored.'),
    );
  }

  $form['node'] = array(
    '#prefix' => '<div class="no-float">',
    '#suffix' => '</div>',
    '#title' => t('Enter the title or NID of a post'),
    '#type' => 'textfield',
    '#maxlength' => 512,
    '#autocomplete_path' => 'panels/node/autocomplete',
    '#weight' => -10,
  );

  if (!empty($conf['nid'])) {
    $info = db_fetch_object(db_query("SELECT * FROM {node} WHERE nid = %d", $conf['nid']));
    if ($info) {
      $link = l("'$info->title' [node id: $info->nid]", "node/$info->nid", array('target' => '_blank', 'title' => t('Open in new window')));
      $form['node']['#description'] = t('Currently set to !link', array('!link' => $link));
    }
  }

  $form['nid'] = array(
    '#type' => 'value',
    '#value' => $conf['nid'],
  );

  $form['external'] = array(
    '#type' => 'value',
    '#value' => $external,
  );

  return $form;
}

/**
 * Validate a node.
 */
function panels_context_node_edit_form_settings_form_validate($form, $form_values) {
  if (empty($form_values['external']) && empty($form_values['nid']) && empty($form_values['node'])) {
    form_error($form['node'], t('You must select a node.'));
    return;
  }

  if (empty($form_values['node'])) {
    return;
  }

  if ($nid = panels_nid_autocomplete($form_values['node'])) {
    form_set_value($form['nid'], $nid);
  }
  else {
    form_error($form['node'], t('Invalid node selected.'));
  }
}

