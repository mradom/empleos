<?php
// $Id: vocabulary.inc,v 1.1.2.6 2008/06/03 13:18:07 pancho Exp $


/**
 * @file contexts/vocabulary.inc
 *
 * Plugin to provide a vocabulary context
 */

function panels_vocabulary_panels_contexts() {
  $args['vocabulary'] = array(
    'title' => t("Taxonomy vocabulary"),
    'description' => t('A single taxonomy vocabulary object.'),
    'context' => 'panels_context_create_vocabulary',
    'settings form' => 'panels_context_vocabulary_settings_form',
    'settings form validate' => 'panels_context_vocabulary_settings_form_validate',
    'keyword' => 'vocabulary',
    'context name' => 'vocabulary',
  );
  return $args;
}

/**
 * It's important to remember that $conf is optional here, because contexts
 * are not always created from the UI.
 */
function panels_context_create_vocabulary($empty, $data = NULL, $conf = FALSE) {
  $context = new panels_context('vocabulary');
  $context->plugin = 'vocabulary';

  if ($empty) {
    return $context;
  }

  if ($conf) {
    $data = taxonomy_get_vocabulary($data['vid']);
  }

  if (!empty($data)) {
    $context->data     = $data;
    $context->title    = $data->name;
    $context->argument = $data->vid;
    return $context;
  }
}

function panels_context_vocabulary_settings_form($conf, $external = FALSE) {
  $options = array();
  if ($external) {
    $options[0] = t('External source');
  }

  foreach (taxonomy_get_vocabularies() as $vid => $vocabulary) {
    $options[$vid] = $vocabulary->name;
  }

  $form['vid'] = array(
    '#title' => t('Vocabulary'),
    '#type' => 'select',
    '#options' => $options,
    '#default_value' => $conf['vids'],
    '#prefix' => '<div class="clear-block">',
    '#suffix' => '</div>',
    '#description' => t('Select the vocabulary for this form.'),
  );
  if ($external) {
    $form['vid']['#description'] .= ' ' . t('Select external to require this from an external source (such as a containing panel page).');
  }

  return $form;
}

