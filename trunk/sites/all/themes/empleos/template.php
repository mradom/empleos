<?php
// $Id: template.php,v 1.4.2.1 2007/04/18 03:38:59 drumm Exp $

/**
 * Sets the body-tag class attribute.
 *
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function phptemplate_body_class($sidebar_left, $sidebar_right) {
  if ($sidebar_left != '' && $sidebar_right != '') {
    $class = 'sidebars';
  }
  else {
    if ($sidebar_left != '') {
      $class = 'sidebar-left';
    }
    if ($sidebar_right != '') {
      $class = 'sidebar-right';
    }
  }

  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' › ', $breadcrumb) .'</div>';
  }
}

/**
 * Allow themable wrapping of all comments.
 */
function phptemplate_comment_wrapper($content, $type = null) {
  static $node_type;
  if (isset($type)) $node_type = $type;

  if (!$content || $node_type == 'forum') {
    return '<div id="comments">'. $content . '</div>';
  }
  else {
    return '<div id="comments"><h2 class="comments">'. t('Comments') .'</h2>'. $content .'</div>';
  }
}

/**
 * Override or insert PHPTemplate variables into the templates.
 */
function _phptemplate_variables($hook, $vars) {
  if ($hook == 'page') {

    if ($secondary = menu_secondary_local_tasks()) {
      $output = '<span class="clear"></span>';
      $output .= "<ul class=\"tabs secondary\">\n". $secondary ."</ul>\n";
      $vars['tabs2'] = $output;
    }

    // Hook into color.module
    if (module_exists('color')) {
      _color_page_alter($vars);
    }
    return $vars;
  }
  return array();
}

/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks() {
  $output = '';

  if ($primary = menu_primary_local_tasks()) {
    $output .= "<ul class=\"tabs primary\">\n". $primary ."</ul>\n";
  }

  return $output;
}

/**
   * This snippet catches the default login form and looks for an
   * user_login.tpl.php file in the theme folder
   */
/**
 * Aca le decimos a Drupal que queremos invocar a otro archivo cuando llame a user_login
 * El archivo que vamos a usar el user_login.tpl.php
 * */
function phptemplate_user_login($form) {
    return _phptemplate_callback('user_login', array('form' => $form));
}

/*
 * Lo mismo en este caso, aca le decimos que queremos cargar el user_register.tpl.php para hacer el formulario de registro 
 **/
function phptemplate_user_register($form) {
    return _phptemplate_callback('user_register', array('form' => $form));
}

/*
 * Lo mismo en este caso, aca le decimos que queremos cargar el user_register.tpl.php para hacer el formulario de registro 
 **/
function phptemplate_user_edit($form) {
    return _phptemplate_callback('user_edit', array('form' => $form));
}

function phptemplate_user_pass($user, $form = array(), $form1 = array()) {
  // Display form:
  $form['name'] = array('#type' => 'textfield',
    '#title' => t('Username or e-mail address'),
    '#size' => 60,
    '#maxlength' => max(USERNAME_MAX_LENGTH, EMAIL_MAX_LENGTH),
    '#required' => TRUE,
  );
  $form['submit'] = array('#type' => 'submit',
    '#value' => t('E-mail new password'),
    '#weight' => 2,
  );
  
  $form['submit_login'] = array('#type' => 'submit', '#value' => t('Log in'), '#weight' => 2, '#attributes' => array('tabindex' => '3'));

  return _phptemplate_callback('user_pass', array('form' => $form));
}