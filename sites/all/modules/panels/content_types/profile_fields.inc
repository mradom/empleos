<?php
// $Id: profile_fields.inc,v 1.1.2.4 2008/05/27 20:21:11 sdboyer Exp $


/**
 * Callback function to supply a list of content types.
 */
function panels_profile_fields_panels_content_types() {
  $items = array();
  if (module_exists('profile') && !is_null(profile_categories())) {
    $items['profile_fields'] = array(
      'title' => t('Profile Fields'),
      'content_types' => 'panels_profile_fields_content_type',
      // only provides a single content type
      'single' => TRUE,
      'render callback' => 'panels_profile_fields_content',
      'add callback' => 'panels_profile_fields_configure',
      'edit callback' => 'panels_profile_fields_configure',
      'title callback' => 'panels_profile_fields_configure_title',
    );
  }
  return $items;
}

/**
 * 'Render' callback for the 'profile fields' content type.
 */
function panels_profile_fields_content($conf, $panel_args, $context) {
  $account = isset($context->data) ? drupal_clone($context->data) : NULL;
  $block = new stdClass();
  $block->module = 'profile fields';

  if ($account) {
    // Get the category from the options
    $category = str_replace("_", " ", $conf['category']);

    // Set the subject to the name of the category
    $block->subject = $category;

    // Put all the fields in the category into an array
    $profile = profile_view_profile($account);
    if (is_array($profile[$category])) {
      foreach ($profile[$category] as $field) {
        $vars[$field['class']]['title'] = $field['title'];
        $vars[$field['class']]['value'] = $field['value'];
      }
    }

    if (sizeof($vars) == 0) {
      // Output the given empty text
      $output = $conf['empty'];
    }
    else {
      // Call the theme function with the field vars
      $output = theme('profile_fields_pane', $category, $vars);
    }

    $block->content = $output;
    $block->delta = $account->uid;
  }
  else {
    $block->subject = $conf['category'];
    $block->content = t('Profile content goes here.');
    $block->delta   = 'unknown';
  }

  return $block;
}

/**
 * Theme the profile fields retrieved in panels_profile_fields_content
 */
function theme_profile_fields_pane($category, $vars) {
  if (is_array($vars)) {
    foreach ($vars as $class => $field) {
      $output .= '<dl class="profile-category">';
      $output .= '<dt class="profile-' . $class . '">' . $field['title'] . '</dt>';
      $output .= '<dd class="profile-' . $class . '">' . $field['value'] . '</dd>';
      $output .= '</dl>';
    }
  }

  return $output;
}

/**
 * Return all content types available.
 */
function panels_profile_fields_content_type() {
  return array(
    'description' => array(
      'title' => t('Profile Category'),
      'icon' => 'icon_user.png',
      'path' => panels_get_path('content_types/user'),
      'description' => t('Profile category contents.'),
      'required context' => new panels_required_context(t('User'), 'user'),
      'category' => array(t('User context'), -9),
    ),
  );
}

/**
 * Helper function : build the list of categories for the 'edit' form.
 */
function _panels_profile_fields_options() {
  $cat_list = array();

  $categories = profile_categories();
  foreach ($categories as $key => $value) {
    $cat_list[str_replace(" ", "_", $value['name'])] = $value['title'];
  }

  return $cat_list;
}

/**
 * 'Edit' callback for the 'profile fields' content type.
 */
function panels_profile_fields_configure($id, $parents, $conf = array()) {
  // Apply defaults
  if (empty($conf)) {
    $conf = array('title' => '', 'category' => '', 'empty' => '');
  }

  $form['category'] = array(
    '#type' => 'radios',
    '#title' => t('Which category'),
    '#options' => _panels_profile_fields_options(),
    '#default_value' => $conf['category'],
    '#prefix' => '<div class="clear-block no-float">',
    '#suffix' => '</div>',
  );

  $form['empty'] = array(
    '#type' => 'textarea',
    '#title' => 'Empty text',
    '#description' => t('Text to display if category has no data. Note that title will not display unless overridden.'),
    '#rows' => 5,
    '#default_value' => $conf['empty'],
    '#prefix' => '<div class="clear-block no-float">',
    '#suffix' => '</div>',
  );

  return $form;
}

/**
 * 'Title' callback for the 'profile fields' content type.
 */
function panels_profile_fields_configure_title($conf, $context) {
  return t('"@s" profile fields', array('@s' => $conf['category']));
}

