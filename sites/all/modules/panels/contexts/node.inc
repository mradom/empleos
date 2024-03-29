<?php
// $Id: node.inc,v 1.1.2.16 2008/08/03 04:23:11 sdboyer Exp $


/**
 * @file contexts/node.inc
 *
 * Plugin to provide a node context
 */

function panels_node_panels_contexts() {
  $args['node'] = array(
    'title' => t("Node"),
    'description' => t('A node object.'),
    'context' => 'panels_context_create_node',
    'settings form' => 'panels_context_node_settings_form',
    'settings form validate' => 'panels_context_node_settings_form_validate',
    'keyword' => 'node',
    'context name' => 'node',
  );
  return $args;
}

/**
 * It's important to remember that $conf is optional here, because contexts
 * are not always created from the UI.
 */
function panels_context_create_node($empty, $data = NULL, $conf = FALSE) {
  $types = array('node');
  if (!empty($conf['types'])) {
    foreach ($conf['types'] as $type) {
      if ($type) {
        $types[] = 'node-' . $type;
      }
    }
  }
  $context = new panels_context($types);
  $context->plugin = 'node';

  if ($empty) {
    return $context;
  }

  if ($conf) {
    $nid = is_array($data) ? $data['nid'] : $data->nid;

    if (module_exists('translation')) {
       if ($translation = module_invoke('translation', 'node_nid', $nid, $GLOBALS['locale'])) {
        $nid = $translation;
        $reload = TRUE;
      }
    }
    
    if (is_array($data) || !empty($reload)) {
      $data = node_load($nid);
    }
  }

  if (!empty($data)) {
    $context->data     = $data;
    $context->title    = $data->title;
    $context->argument = $data->nid;
    if (is_array($context->type)) {
      $context->type[] = 'node-' . $data->type;
    }
    else {
      $context->type = array($context->type, 'node-' . $data->type);
    }
    return $context;
  }
}

function panels_context_node_settings_form($conf, $external = FALSE) {
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
    $info = db_fetch_object(db_query("SELECT * FROM {node} n WHERE n.nid = %d", $conf['nid']));
    if ($info) {
      $link = l("'$info->title' [node id: $info->nid]", "node/$info->nid", array('target' => '_blank', 'title' => t('Open in new window')));
      $form['node']['#description'] = t('Currently set to !link', array('!link' => $link));
    }
  }

  $form['nid'] = array(
    '#type' => 'value',
    '#value' => $conf['nid'],
  );

  return $form;
}

/**
 * Validate a node.
 */
function panels_context_node_settings_form_validate($form, $form_values) {
  // Validate the autocomplete
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

