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

/** Trae el vid de un vocabulario si le pasamos en nombre **/ 
function get_vocabulary_by_name($name) {
 $result = db_query("SELECT vid FROM {vocabulary} WHERE name = '%s'", $name);
 $vname = db_fetch_object($result)->vid;
 return $vname;
}

function get_page_by_id($nid) {
 $result = db_query("SELECT title FROM {node} WHERE type = 'page' and nid = '%s'", $nid);
 $vname = db_fetch_object($result)->title;
 return $vname;
}


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

/**
 * views template to output a view.
 * This code was generated by the views theming wizard
 * Date: Mon, 08/03/2010 - 16:25
 * View: mi_educacion
 *
 * This function goes in your template.php file
 */
function phptemplate_views_view_list_mi_educacion($view, $nodes, $type) {
  $fields = _views_get_fields();

  $taken = array();

  // Set up the fields in nicely named chunks.
  foreach ($view->field as $id => $field) {
    $field_name = $field['field'];
    if (isset($taken[$field_name])) {
      $field_name = $field['queryname'];
    }
    $taken[$field_name] = true;
    $field_names[$id] = $field_name;
  }

  // Set up some variables that won't change.
  $base_vars = array(
    'view' => $view,
    'view_type' => $type,
  );

  foreach ($nodes as $i => $node) {
    $vars = $base_vars;
    $vars['node'] = $node;
    $vars['count'] = $i;
    $vars['stripe'] = $i % 2 ? 'even' : 'odd';
    foreach ($view->field as $id => $field) {
      $name = $field_names[$id];
      $vars[$name] = views_theme_field('views_handle_field', $field['queryname'], $fields, $field, $node, $view);
      if (isset($field['label'])) {
        $vars[$name . '_label'] = $field['label'];
      }
    }
    $items[] = _phptemplate_callback('views-list-mi_educacion', $vars);
  }
  if ($items) {
    return theme('item_list', $items);
  }
}

/*
function phptemplate_node_form($form) {
  $output = '';
  $output .= drupal_render($form['title']);
  $output .= drupal_render($form['body_filter']);
  $output .= drupal_render($form['taxonomy'][6]);
  //$output .= drupal_render($form); // Process any other fields and display them
  return $output;
}*/
  
function custom_p_educacion() {
	return drupal_get_form('custom_p_educacion_form');
}
function custom_p_educacion_form() {
	$form['miform']['title'] = array(
		'#type'  => 'textfield',
		'#title' => 'Titulo',
		);

	/* FIELDSET */
		
	$form['miform']['educacion'] = array(
    	'#type' => 'fieldset',
    	'#title' => t('Datos del instituto'),
    	'#collapsible' => FALSE,
    	'#collapsed' => FALSE,
    	'#weight' => 0,
	);
	
	/* Inicio de taxonomias */
		
	$instituto = taxonomy_form(6);
	$form['miform']['educacion']['taxonomy[6]'] = array(
    	'#type' => 'select', 
    	'#title' => t($instituto["#title"]), 
    	'#default_value' => $instituto["#default_value"], 
    	'#options' => $instituto["#options"],
		'#parents' => array('educacion'),
	);
		
	$area = taxonomy_form(5);
	$form['miform']['educacion']['taxonomy[5]'] = array(
    	'#type' => 'select', 
    	'#title' => t($area["#title"]), 
    	'#default_value' => $area["#default_value"], 
    	'#options' => $area["#options"],
		//'#parents' => array('publicador'),
	);
		
	$nivel = taxonomy_form(3);
	$form['miform']['educacion']['taxonomy[3]'] = array(
    	'#type' => 'select', 
    	'#title' => t($nivel["#title"]), 
    	'#default_value' => $nivel["#default_value"], 
    	'#options' => $nivel["#options"],
		//'#parents' => array('publicador'),
	);
		
	$estado = taxonomy_form(4);
	$form['miform']['educacion']['taxonomy[4]'] = array(
    	'#type' => 'select', 
    	'#title' => t($estado["#title"]), 
    	'#default_value' => $estado["#default_value"], 
    	'#options' => $estado["#options"],
		//'#parents' => array('publicador'),
	);
	
	/* Fin taxonomias */
	/* Fieldset - Datos de la carrera */
	
	$form['miform']['especificaciones'] = array(
    	'#type' => 'fieldset',
    	'#title' => t('Detalles de la carrera'),
    	'#collapsible' => FALSE,
    	'#collapsed' => FALSE,
    	'#weight' => 1,
	);
	
	$form['miform']['especificaciones']['field_ttulo_o_certificacin[0][value]'] = array(
    	'#type' => 'textfield',
    	'#title' => t('Titulo o certificacion'),
    	'#required' => TRUE,
	    '#tree' => FALSE,
		'#parents' => array('especificaciones'),
	);
	
	$form['miform']['especificaciones']['field_otra_institucin[0][value]'] = array(
    	'#type' => 'textfield',
    	'#title' => t('Otra institucion'),
    	'#required' => TRUE,
	    '#tree' => FALSE,
		'#parents' => array('especificaciones'),
	);
	
	$form['miform']['especificaciones']['field_descripcin[0][value]]'] = array(
    	'#type' => 'textfield',
    	'#title' => t('Descripcion'),
    	'#required' => TRUE,
	    '#tree' => FALSE,
		'#parents' => array('especificaciones'),
	);
	
	$form['miform']['especificaciones']['field_promedio[0][value]'] = array(
    	'#type' => 'textfield',
    	'#title' => t('Promedio'),
    	'#required' => TRUE,
	    '#tree' => FALSE,
		'#parents' => array('especificaciones'),
	);
	
	$form['miform']['especificaciones']['field_materias_de_la_carrera[0][value]'] = array(
    	'#type' => 'textfield',
    	'#title' => t('Cantidad de materias de la carrera'),
    	'#required' => TRUE,
	    '#tree' => FALSE,
		'#parents' => array('especificaciones'),
	);
	
	$form['miform']['especificaciones']['field_materias_aprobadas[0][value]'] = array(
    	'#type' => 'textfield',
    	'#title' => t('Cantidad de materias aprobadas'),
    	'#required' => TRUE,
	    '#tree' => FALSE,
		'#parents' => array('especificaciones'),
	);
	
	/* FIN DEL FIELDSET - Datos de la carrera */
	/* Inicio Fieldset periodos */
	
	$form['miform']['periodos'] = array(
    	'#type' => 'fieldset',
    	'#title' => t('Fechas'),
    	'#collapsible' => FALSE,
    	'#collapsed' => FALSE,
    	'#weight' => 2,
	);
	/* Inicio taxonomias */
	
	$mes_inicio = taxonomy_form(7);
	
	$form['miform']['periodos']['taxonomy[7]'] = array(
    	'#type' => 'select', 
    	'#title' => t($mes_inicio["#title"]), 
    	'#default_value' => $mes_inicio["#default_value"], 
    	//'#options' => $mes_inicio['#options'],
		'#options' => array("1","2","3"),
		'#parents' => array('periodos'),
	);
		
	$ano_inicio = taxonomy_form(9);
	$form['miform']['periodos']['taxonomy[9]'] = array(
    	'#type' => 'select', 
    	'#title' => t($ano_inicio["#title"]), 
    	'#default_value' => $ano_inicio["#default_value"], 
    	'#options' => $ano_inicio["#options"],
		'#parents' => array('periodos'),
	);
		
	$mes_fin = taxonomy_form(8);
	$form['miform']['periodos']['taxonomy[8]'] = array(
    	'#type' => 'select', 
    	'#title' => t($mes_fin["#title"]), 
    	'#default_value' => $mes_fin["#default_value"], 
    	'#options' => $mes_fin["#options"],
		'#parents' => array('periodos'),
	);
		
	$ano_fin = taxonomy_form(10);
	$form['miform']['periodos']['taxonomy[10]'] = array(
    	'#type' => 'select', 
    	'#title' => t($ano_fin["#title"]), 
    	'#default_value' => $ano_fin["#default_value"], 
    	'#options' => $ano_fin["#options"],
		'#parents' => array('periodos'),
	);
	
	/* Fin taxonomias */

	$form['miform']['submit'] = array(
		'#type'  => 'submit',
		'#value' => 'Grabar',
		'#weight' => 10,
		'#prefix' => '<div style="width: 680px;" class="bloque puntos"><div class="datos button">',
		'#suffix' => '</div></div>', 
	);	
	return $form;
}

function custom_p_educacion_form_submit($form_id, $form) {
	echo "<pre>";
	print_r($form_id);
	print_r($form);
	echo "</pre>";
	die();
	global $user;
	$form_id = 'p-educacion_node_form';
	$node = array(
		'uid'  => $user->uid,
		'name' => $user->name,
		'type' => 'p-educacion',
	);
	$form_values = array(
		'title'    => $form['title'],
		'name'     => $user->name,
		'taxonomy' => $form['taxonomy'],
	);
	watchdog('debug', 'Saving foo from mini node form');
	drupal_execute($form_id, $form_values, $node);
} 


function phptemplate_p_idiomas_node_form(&$form, $form_state, $form_id) {
	//print '<pre>';
	//print_r($form);
	//print '</pre>';  
	
	$form['intro']['#value']  = t('<h3>Comienzo de formulario de mis_idiomas</h3>');
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<div class="xxx">';
	$form['intro']['#suffix']  = '</div>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['title']['#title'] = 'Titulaso';
    $form['body_filter']['body']['#title'] = 'Cuerpo';
    
    $form['preview']="" ;

  return drupal_render($form);
}

function phptemplate_p_cursos_node_form(&$form, $form_state, $form_id) {
	//print '<pre>';
	//print_r($form);
	//print '</pre>';  
	
	$form['intro']['#value']  = t('<h3>Comienzo de formulario de mis_cursos</h3>');
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<div class="xxx">';
	$form['intro']['#suffix']  = '</div>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['title']['#title'] = 'Titulaso';
    $form['body_filter']['body']['#title'] = 'Cuerpo';
    
    $form['preview']="" ;

  return drupal_render($form);
}

function phptemplate_p_informatica_node_form(&$form, $form_state, $form_id) {
	//print '<pre>';
	//print_r($form);
	//print '</pre>';  
	
	$form['intro']['#value']  = t('<h3>Comienzo de formulario de informatica</h3>');
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<div class="xxx">';
	$form['intro']['#suffix']  = '</div>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['title']['#title'] = 'Titulaso';
    $form['body_filter']['body']['#title'] = 'Cuerpo';
    
    $form['preview']="" ;

  return drupal_render($form);
}

function phptemplate_p_otros_conocimientos_node_form(&$form, $form_state, $form_id) {
	//print '<pre>';
	//print_r($form);
	//print '</pre>';  
	
	$form['intro']['#value']  = t('<h3>Comienzo de formulario de informatica</h3>');
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<div class="xxx">';
	$form['intro']['#suffix']  = '</div>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['title']['#title'] = 'Titulaso';
    $form['body_filter']['body']['#title'] = 'Cuerpo';
    
    $form['preview']="" ;

  return drupal_render($form);
}

function phptemplate_p_experiencia_laboral_node_form(&$form, $form_state, $form_id) {
	//print '<pre>';
	//print_r($form);
	//print '</pre>';  
	
	$form['intro']['#value']  = t('<h3>Comienzo de formulario de experiencia laboral</h3>');
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<div class="xxx">';
	$form['intro']['#suffix']  = '</div>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['title']['#title'] = 'Titulaso';
    $form['body_filter']['body']['#title'] = 'Cuerpo';
    
    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
    $form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;

  return drupal_render($form);
}


function phptemplate_p_referencia_node_form(&$form, $form_state, $form_id) {
	//print '<pre>';
	//print_r($form);
	//print '</pre>';  
	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	$form['intro']['#value']  = t('<h3>Comienzo de formulario de referencia</h3>');
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<div class="xxx">';
	$form['intro']['#suffix']  = '</div>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['title']['#title'] = 'Titulaso';
    $form['body_filter']['body']['#title'] = 'Cuerpo';
    
    //$form['body_filter']['format']['format']['guidelines']['#value'] = '';
    //$form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;

  return drupal_render($form);
}

function phptemplate_p_objetivo_laboral_node_form(&$form, $form_state, $form_id) {
	//print '<pre>';
	//print_r($form);
	//print '</pre>';  
	
	$form['intro']['#value']  = t('<h3>Comienzo de formulario de objetivo laboral</h3>');
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<div class="xxx">';
	$form['intro']['#suffix']  = '</div>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['title']['#title'] = 'Titulaso';
    $form['body_filter']['body']['#title'] = 'Cuerpo';
    
    //$form['body_filter']['format']['format']['guidelines']['#value'] = '';
    //$form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;

  return drupal_render($form);
}

function phptemplate_p_educacion_node_form(&$form, $form_state, $form_id) {
	//print '<pre>';
	//print_r($form);
	//print '</pre>';  
	
	
	$form['#prefix']  = '<div class="mycv2">';
	$form['#suffix']   = '</div>';
	
	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	
	$form['intro']['#value']  = t('<h3>Comienzo de formulario de educacion</h3>');
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<div class="tit">';
	$form['intro']['#suffix']  = '</div>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['taxonomy']['#type'] = '';
    $form['body_filter'] = '';
    
    $form['body_filter']['body']['#title'] = 'Cuerpo';
    $form['body_filter']['body']['#rows'] = 10;
    $form['body_filter']['body']['#cols'] = 80;    
    
    //$form['body_filter']['format']['format']['guidelines']['#value'] = '';
    //$form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;
    
        
	//print '<pre>';
	//print_r($form);
	//print '</pre>';
    $miform  = '';
    //$miform .= drupal_render($form);
    
    $miform .= drupal_render($form[]['#prefix']);
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
	$miform .= drupal_render($form['title']);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Nivel de Estudio')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Instituto')]);
	$miform .= drupal_render($form['field_otra_institucin']);
    $miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Area de Estudios')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Estado de Estudios')]);
	$miform .= drupal_render($form['field_ttulo_o_certificacin']);    	
	$miform .= drupal_render($form['body_filter']);
	$miform .= drupal_render($form['field_promedio']);
	$miform .= drupal_render($form['field_materias_de_la_carrera']);
	$miform .= drupal_render($form['field_materias_aprobadas']);
	//$miform .= drupal_render($form);
	
	$miform .= drupal_render($form['group_omar_mmmmmm']);
	
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Mes de Inicio')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Ano de inicio')]);	
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Mes de Finalizacion')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Ano de Fin')]);
	
	//$miform .= drupal_render($form['form_id']);
	//$miform .= drupal_render($form['author']);
	//$miform .= drupal_render($form['options']);
	//$miform .= drupal_render($form['path']);
	//$miform .= drupal_render($form['#token']);
	//$miform .= drupal_render($form['#post']);
	
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form['#suffix']);
	$miform .= drupal_render($form);
  return $miform;
  
}
