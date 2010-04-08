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
 * Lo mismo en este caso, aca le decimos que queremos cargar el user_edit.tpl.php para hacer el formulario de registro 
 **/
function phptemplate_user_edit($form) {
	global $user;
	
	firep($user, 'Formulario');
	
	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	
	$form['intro']['#value']  = '<legend>Mis datos:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['taxonomy']['#type'] = '';
        
    $form['preview']="" ;
    // $form['submit']['#value']="Guardar" ;
     
    $miform  = '';
    
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
	$miform .= drupal_render($form['title']);
	
	$form['Empleado']['#title']='';
	$form['Empresa']['#title']='';
	$form['Empresa']['profile_empresa_consultora']='';
	
	if (arg(3)=='Empresa' and in_array('empresa', array_values($user->roles))){
		$miform .= drupal_render($form['Empresa']['profile_empresa_apellido']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_nombre']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_sexo']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_fecha_naciemiento']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_estado_civil']);

		$form['grupo']['#value']  = '<legend>Empresa:</legend>';
		// Lo pongo dentro de un div para poder temearlo
		$form['grupo']['#prefix']  = '<fieldset>';
		$form['grupo']['#suffix']  = '</fieldset>';
		// le pongo el weight bien bajo para que lo ponga primero
		$form['grupo']['#weight']  = -40;
		$miform .= drupal_render($form['grupo']);
		
		$miform .= drupal_render($form['Empresa']['profile_empresa_empresa_nombre']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_razon_social']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_responsable']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_cuil_cuit']);
		$miform .= drupal_render($form['Empresa']['profile_empl_puesto']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_telefono1']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_interno1']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_telefono2']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_interno2']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_web']);
		
		$miform .= drupal_render($form['Empresa']['profile_empresa_ramoactividad']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_ramoactividad2']);
		
		$miform .= drupal_render($form['Empresa']['profile_empresa_calle']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_numero']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_piso']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_dpto_ofi']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_cp']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_provincia']);
		
		$miform .= drupal_render($form['Empresa']['profile_empresa_dotacion']);
		$miform .= drupal_render($form['Empresa']['profile_empresa_descripcion']);
		
	 }
	 if (arg(3)=='Empleado' and in_array('authenticated user', array_values($user->roles))){
		 
		$form['Empleado']['profile_empl_apellido']['#required']=1;
		$form['Empleado']['profile_empl_nombre']['#required']=1;
		$form['Empleado']['profile_empl_sexo']['#required']=1;
		$form['Empleado']['profile_empl_fecha_nacimiento']['#required']=1;
		$form['Empleado']['profile_tipo_doc']['#required']=1;
		$form['Empleado']['profile_empl_num_doc']['#required']=1;
		$form['Empleado']['profile_empl_telefono']['#required']=1;
		
	 	$miform .= drupal_render($form['Empleado']['profile_empl_apellido']);
		$miform .= drupal_render($form['Empleado']['profile_empl_nombre']);
		$miform .= drupal_render($form['Empleado']['profile_empl_sexo']);
		$miform .= drupal_render($form['Empleado']['profile_empl_fecha_nacimiento']);
		$miform .= drupal_render($form['Empleado']['profile_empl_estado_civil']);
		$miform .= drupal_render($form['Empleado']['profile_tipo_doc']);
		$miform .= drupal_render($form['Empleado']['profile_empl_num_doc']);
		$miform .= drupal_render($form['Empleado']['profile_empl_calle']);
		$miform .= drupal_render($form['Empleado']['profile_empl_dir_numero']);
		$miform .= drupal_render($form['Empleado']['profile_empl_dir_piso']);
		$miform .= drupal_render($form['Empleado']['profile_empl_dir_dpto']);
		$miform .= drupal_render($form['Empleado']['profile_empl_cp']);
		$miform .= drupal_render($form['Empleado']['profile_empl_provincia']);
		$miform .= drupal_render($form['Empleado']['profile_empl_telefono']);
		$miform .= drupal_render($form['Empleado']['profile_empl_tel_alternativo']);
		$miform .= drupal_render($form['picture']);	
     }
	 if (arg(3)=='' ){
	 	$form['account']['#title']='';
	 	$form['locale']='';
	 	$form['comment_settings']['#title']='';
	  	$form['contact']='';
		$miform .= drupal_render($form['account']['mail']);
		$miform .= drupal_render($form['account']['pass']);
		$miform .= drupal_render($form['comment_settings']['signature']);
		$miform .= drupal_render($form['picture']);	
     }
	
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form);
  return $miform;	
	
	
  //return _phptemplate_callback('user_edit', array('form' => $miform));
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


function phptemplate_user_profile($account, $fields = array()) {
  return _phptemplate_callback('user_profile', array('account' => $account, 'fields' => $fields));
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

function phptemplate_p_idiomas_node_form(&$form, $form_state, $form_id) {  
	//function phptemplate_p_idiomas_node_form(&$form) {

	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	
	$form['intro']['#value']  = '<legend>Idiomas:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['taxonomy']['#type'] = '';
    $form['body_filter'] = '';
    
    $form['preview']="" ;
    $form['submit']['#value']="Guardar" ;
    
    ////firep($form['submit'], 'Formulario');
        	
    $miform  = '';
    
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
	$miform .= drupal_render($form['title']);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Idiomas')]);
	
	$miform .= drupal_render($form['field_nivel_oral']);
	$miform .= drupal_render($form['field_nivel_escrito']);
	$miform .= drupal_render($form['field_nivel_de_lectura']);
	$miform .= drupal_render($form['field_ltima_vez_aplicado']);
	
	$miform .= drupal_render($form['body_filter']);
	
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form);
  return $miform;
}

function phptemplate_p_cursos_node_form(&$form) {
	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	
	$form['intro']['#value']  = '<legend>Cursos:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
	
	$form['title']['#title']='Curso';
    $form['taxonomy']['#type'] = '';
    $form['body_filter'] = '';
    
    $form['body_filter']['body']['#title'] = 'Descripcion';
    $form['body_filter']['body']['#rows'] = 10;
    $form['body_filter']['body']['#cols'] = 80;    
    
    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
    $form['body_filter']['format'][2]['#value'] = '';
    
    unset($form['preview']);
    $form['submit']['#value']="Guardar" ;
    
    firep($form, 'Formulario');
        
    $miform  = '';
    
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
	$miform .= drupal_render($form['title']);
	$miform .= drupal_render($form['field_en_calidad_de']);
	$miform .= drupal_render($form['field_lugar']);
	$miform .= drupal_render($form['field_ubicacion']);	
  	$miform .= drupal_render($form['field_nota']);
	$miform .= drupal_render($form['field_numero_de_certificado']);
	$miform .= drupal_render($form['field_numero_de_examen']);
	$miform .= drupal_render($form['field_desde']);
	$miform .= drupal_render($form['field_hasta']);
	$miform .= drupal_render($form['field_web_0']);
	
	$miform .= drupal_render($form['body_filter']);
	
	
	$miform .= drupal_render($form['group_omar_mmmmmm']);
	
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form);
  return $miform;
}

function phptemplate_p_informatica_node_form(&$form) {
	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	
	$form['intro']['#value']  = '<legend>Inform&aacute;tica:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
	
	$form['title']['#title']='Recurso';
    $form['taxonomy']['#type'] = '';
    $form['body_filter'] = '';
    
    $form['body_filter']['body']['#title'] = 'Descripcion';
    $form['body_filter']['body']['#rows'] = 10;
    $form['body_filter']['body']['#cols'] = 80;    
    
    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
    $form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;
    $form['submit']['#value']="Guardar" ;
    
    //firep($form['submit'], 'Formulario');
        
    $miform  = '';
    
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
	$miform .= drupal_render($form['title']);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Tipo de Software')]);
	$miform .= drupal_render($form['field_detalle']);
	$miform .= drupal_render($form['field_nivel']);
	
	$miform .= drupal_render($form['body_filter']);
	
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form);
  return $miform;
}



function phptemplate_p_otros_conocimientos_node_form(&$form) {

	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	
	$form['intro']['#value']  = '<legend>Otros Conocimientos:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
	
	$form['title']['#title']='Tipo';
    $form['taxonomy']['#type'] = '';
    $form['body_filter'] = '';
    
    $form['body_filter']['body']['#title'] = 'Descripci&oacute;n';
    $form['body_filter']['body']['#rows'] = 10;
    $form['body_filter']['body']['#cols'] = 80;    
    
    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
    $form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;
    //$form['submit']['#value']="Guardar" ;
    
    //firep($form['submit'], 'Formulario');
        
    $miform  = '';
    
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
    
    $miform .= drupal_render($form['title']);
	$miform .= drupal_render($form['field_nombre']);
	
	$miform .= drupal_render($form['field_descripcion']);
	
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form);
  return $miform;
}

function phptemplate_p_experiencia_laboral_node_form(&$form) {

	firep($form, 'Form');
	
	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	
	$form['intro']['#value']  = '<legend>Experiencia Laboral:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
	
	$form['title']['#title']='Tipo';
    $form['taxonomy']['#type'] = 'Experiencia';
    $form['body_filter'] = '';
    
    $form['body_filter']['body']['#title'] = 'Descripci&oacute;n';
    $form['body_filter']['body']['#rows'] = 10;
    $form['body_filter']['body']['#cols'] = 80;    
    
    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
    $form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;
    //$form['submit']['#value']="Guardar" ;
    
    $miform  = '';
    
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
    
    $miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Mes de Inicio')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Ano de inicio')]);	
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Mes de Finalizacion')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Ano de Fin')]);
	
    $miform .= drupal_render($form['title']);
	
    //$miform .= drupal_render($form['field_nombre']);
	
	$miform .= drupal_render($form['field_empresa']);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Ramo o Actividad')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Actividad')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Area')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Jerarquia')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Personal a Cargo')]);
	
	$miform .= drupal_render($form['field_nombre_del_puesto']);
	$miform .= drupal_render($form['field_dotacion_total_de_la_empr']);
	$miform .= drupal_render($form['field_descripcin_de_tareas']);
	
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form);
  return $miform;
}


function phptemplate_p_referencia_node_form(&$form) {

	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	
	$form['intro']['#value']  = '<legend>Referencia Laboral:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
	
	$form['title']['#title']='Persona';
    $form['body_filter'] = '';
    
    $form['body_filter']['body']['#title'] = 'Descripci&oacute;n';
    $form['body_filter']['body']['#rows'] = 10;
    $form['body_filter']['body']['#cols'] = 80;    
    
    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
    $form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;
    //$form['submit']['#value']="Guardar" ;
    
    //firep($form['submit'], 'Formulario');
        
    $miform  = '';
    
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
    
    $miform .= drupal_render($form['title']);
	
	$miform .= drupal_render($form['field_empresa_0']);
	$miform .= drupal_render($form['field_titulo_o_cargo']);
	$miform .= drupal_render($form['field_telefono']);
	$miform .= drupal_render($form['field_email']);
	
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form);
  return $miform;
}

function phptemplate_p_objetivo_laboral_node_form(&$form) {
	firep($form['submit'], 'Formulario');
	
	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	$form['intro']['#value']  = '<legend>Objetivo Laboral:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
	
	$form['title']['#title']='Persona';
    $form['body_filter'] = '';
    //$form['taxonomy']['#type'] = '';
    
    $form['body_filter']['body']['#title'] = 'Descripci&oacute;n';
    $form['body_filter']['body']['#rows'] = 10;
    $form['body_filter']['body']['#cols'] = 80;    
    
    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
    $form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;
    //$form['submit']['#value']="Guardar" ;
        
    $miform  = '';
    
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
    
    $miform .= drupal_render($form['title']);
    
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Ramo o Actividad')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Area')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Jerarquia')]);
	
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Disponibilidad')]);
	$miform .= drupal_render($form['field_detalle_de_disponibilidad']);
	
	
	$miform .= drupal_render($form['field_titulo_o_cargo']);
	$miform .= drupal_render($form['field_dispuesto_a_ubicarme_en_o']);
	$miform .= drupal_render($form['field_dispuesto_a_ubicarme_en_0']);
	
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Sueldo Pretendido')]);
	
	$miform .= drupal_render($form['field_objetivo']);
		
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form);
  return $miform;
}

function phptemplate_p_educacion_node_form(&$form) {
	firep($form['submit'], 'Formulario');
	
	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	
	$form['intro']['#value']  = '<legend>Educaci&oacute;n:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['taxonomy']['#type'] = '';
    $form['body_filter'] = '';
    
    $form['body_filter']['body']['#title'] = 'Texto';
    $form['body_filter']['body']['#rows'] = 10;
    $form['body_filter']['body']['#cols'] = 80;    
    
    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
    $form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;
    //$form['submit']['#value']="Guardar" ;
        
    $miform  = '';
    
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
		
	$miform .= drupal_render($form['group_omar_mmmmmm']);
	
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Mes de Inicio')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Ano de inicio')]);	
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Mes de Finalizacion')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('Ano de Fin')]);
	
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form);
  return $miform;
  
}

function phptemplate_contact_mail_page(&$form) {
		
	$form['ini']['#prefix']  = '<div class="mycv">';
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	
	$form['intro']['#value']  = '<legend>Contacto:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
    $form['taxonomy']['#type'] = '';
    $form['body_filter'] = '';
    
    $form['body_filter']['body']['#title'] = 'Texto';
    $form['body_filter']['body']['#rows'] = 10;
    $form['body_filter']['body']['#cols'] = 80;    
    
    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
    $form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;
    $form['contact_information']['#value']="" ;
        
    $miform  = '';
    
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
	$miform .= drupal_render($form['title']);
	$miform .= drupal_render($form['name']);
	
	$miform .= drupal_render($form['mail']);
	$miform .= drupal_render($form['subject']);
	$miform .= drupal_render($form['cid']);
	$miform .= drupal_render($form['message']);
	$miform .= drupal_render($form['copy']);
	
	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form);
  return $miform;
  
}


function phptemplate_node_delete_confirm(&$form, $form_state, $form_id) {
  $form['actions']['cancel']['#prefix']  = '<div class="btn_gral b">';
  $form['actions']['cancel']['#suffix']  = '</div>';
  $form['description']['#value'] = 'Si ud. borra los datos, estos no se podran recuperar.';
  $miform  = "";
  $miform .= drupal_render($form);
  
  if ($form['#id'] == 'node-delete-confirm') {
  	//print '*********************************************************************';
  }
  return $miform;
}

function phptemplate_e_aviso_node_form(&$form) {
	
	//echo "<pre>"; print_r($form); echo "</pre>";
	
$html = '<ul style="height: 30px;" class="ui-tabs-nav"> 
        <li class="ui-tabs-selected"><a href="#fragment-1"><span>Descripcion del puesto:</span></a></li> 
        <li><a href="#fragment-2"><span>Requisitos</span></a></li> 
        <li><a href="#fragment-3"><span>Datos de la Empresa</span></a></li> 
        <li><a href="#fragment-4"><span>Publicacion</span></a></li> 
    </ul>';

	$form['ini']['#prefix']  = '<div class="mycv" id="aviso"><div id="tabs">'.$html;
	$form['ini']['#value']  = ' ';
	$form['ini']['#weight']  = -99;	
	
	$form['fin']['#prefix']  = '</div></div>';
	$form['fin']['#value']  = ' ';
	$form['fin']['#weight']  = 99;
	
	//$form['intro']['#value']  = '<legend>Descripcion del puesto:</legend>';
	// Lo pongo dentro de un div para poder temearlo
	$form['intro']['#prefix']  = '<fieldset>';
	$form['intro']['#suffix']  = '</fieldset>';
	// le pongo el weight bien bajo para que lo ponga primero
	$form['intro']['#weight']  = -40;
	
	$form['title']['#title']='Puesto';
	
    $form['taxonomy']['#type'] = '';
    
    $form['body_filter']['body']['#title'] = 'Descripcion del puesto y tareas';
    $form['body_filter']['body']['#rows'] = 10;
    $form['body_filter']['body']['#cols'] = 80;    
    
    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
    $form['body_filter']['format'][2]['#value'] = '';
    
    $form['preview']="" ;
    //$form['submit']['#value']="Siguiente" ;
    
    $form['workflow'] = "";
    
    $form['taxonomy'][get_vocabulary_by_name("provincias")]['#title'] = "Lugar de residencia";
    $form['field_remuneracion']['key']['title'] = "Indicar remuneración pretendida";
    
    ######## CREACION DE TABS #######
	
	$form['group_descripcion_del_puesto']['#prefix'] = "<div id='fragment-1' class='ui-tabs-panel'>";
	$form['group_descripcion_del_puesto']['#suffix'] = "</div>";
	
	$form['group_requisitos']['#prefix'] = "<div id='fragment-2' class='ui-tabs-panel'>"; // ui-tabs-hide
	$form['group_requisitos']['#suffix'] = "</div>";
	
	$form['group_datos_de_la_empresa']['#prefix'] = "<div id='fragment-3' class='ui-tabs-panel'>";
	$form['group_datos_de_la_empresa']['#suffix'] = "</div>";
	
	$form['group_publicacion']['#prefix'] = "<div id='fragment-4' class='ui-tabs-panel'>";
	$form['group_publicacion']['#suffix'] = "</div>";
    
    ######## REQUISITOS #########
    
    // Paso el taxonomy al grupo que yo quiero -- Nivel de Estudio
    $form['group_requisitos']['taxonomy'][get_vocabulary_by_name('Nivel de Estudio')] = $form['taxonomy'][get_vocabulary_by_name('Nivel de Estudio')];
    $form['group_requisitos']['taxonomy'][get_vocabulary_by_name('Nivel de Estudio')]['#weight'] = 90;
    $form['taxonomy'][get_vocabulary_by_name('Nivel de Estudio')] = "";
    
    //Paso el taxonomy al grupo que yo quiero -- Area de estudios
    $form['group_requisitos']['taxonomy'][get_vocabulary_by_name('Area de estudios')] = $form['taxonomy'][get_vocabulary_by_name('Area de estudios')];
    $form['group_requisitos']['taxonomy'][get_vocabulary_by_name('Area de estudios')]['#weight'] = 91;
    $form['taxonomy'][get_vocabulary_by_name('Area de estudios')] = "";
    
    //Paso el taxonomy al grupo que yo quiero -- Idiomas
    $form['group_requisitos']['taxonomy'][get_vocabulary_by_name('idiomas')] = $form['taxonomy'][get_vocabulary_by_name('idiomas')];
    $form['group_requisitos']['taxonomy'][get_vocabulary_by_name('idiomas')]['#weight'] = 92;
    $form['taxonomy'][get_vocabulary_by_name('idiomas')] = "";
    
    //$form['group_requisitos']['field_lugar_de_residencia'] = $form['field_lugar_de_residencia'];
    //$form['field_lugar_de_residencia'] = "";
    
    ####### DATOS DE LA EMPRESA ########
    
    //Paso el taxonomy al grupo que yo quiero -- Ramo o actividad
    $form['group_datos_de_la_empresa']['taxonomy'][get_vocabulary_by_name('Ramo o Actividad')] = $form['taxonomy'][get_vocabulary_by_name('Ramo o Actividad')];
    $form['group_datos_de_la_empresa']['taxonomy'][get_vocabulary_by_name('Ramo o Actividad')]['#weight'] = 92;
    $form['taxonomy'][get_vocabulary_by_name('Ramo o Actividad')] = "";
    
    //Paso el taxonomy al grupo que yo quiero -- Provincias
    $form['group_datos_de_la_empresa']['taxonomy'][get_vocabulary_by_name('Provincias')] = $form['taxonomy'][get_vocabulary_by_name('Provincias')];
    $form['group_datos_de_la_empresa']['taxonomy'][get_vocabulary_by_name('Provincias')]['#weight'] = 92;
    $form['taxonomy'][get_vocabulary_by_name('Provincias')] = "";
    
    //Paso el taxonomy al grupo que yo quiero -- Area
    $form['group_datos_de_la_empresa']['taxonomy'][get_vocabulary_by_name('area')] = $form['taxonomy'][get_vocabulary_by_name('area')];
    $form['group_datos_de_la_empresa']['taxonomy'][get_vocabulary_by_name('area')]['#weight'] = 92;
    $form['taxonomy'][get_vocabulary_by_name('area')] = "";
    
    $form['group_datos_de_la_empresa']['field_logo']['new']['field_logo_upload']['#title'] = "Seleccione el logo de su empresa";
    $form['group_datos_de_la_empresa']['field_logo']['new']['field_logo_upload']['#description'] = "Extensiones permitidas: jpg jpeg png gif";
    $form['group_datos_de_la_empresa']['field_logo']['#description'] = "";
    $form['group_datos_de_la_empresa']['field_logo']['new']['upload']['#value'] = "subir";
    
    //$form['group_datos_de_la_empresa']['field_empresa_1'] = $form['field_empresa_1'];
    //field_descripcion_0
    //$form['field_empresa_1'] = "";
    
    ####### DESCRIPCION DEL PUESTO ########
    
    //Paso el taxonomy al grupo que yo quiero -- Jerarquia
    $form['group_descripcion_del_puesto']['taxonomy'][get_vocabulary_by_name('Jerarquia')] = $form['taxonomy'][get_vocabulary_by_name('Jerarquia')];
    $form['group_descripcion_del_puesto']['taxonomy'][get_vocabulary_by_name('Jerarquia')]['#weight'] = 92;
    $form['taxonomy'][get_vocabulary_by_name('Jerarquia')] = "";
    
    //Paso el taxonomy al grupo que yo quiero -- Lugar de residencia
    $form['group_descripcion_del_puesto']['taxonomy'][get_vocabulary_by_name('Lugar de residencia')] = $form['taxonomy'][get_vocabulary_by_name('Lugar de residencia')];
    $form['group_descripcion_del_puesto']['taxonomy'][get_vocabulary_by_name('Lugar de residencia')]['#weight'] = 92;
    $form['taxonomy'][get_vocabulary_by_name('Lugar de residencia')] = "";
    
    $form['group_descripcion_del_puesto']['title'] = $form['title'];
    $form['title'] = "";
    
    $form['group_descripcion_del_puesto']['body_filter'] = $form['body_filter'];
    $form['body_filter'] = "";
    
    //$form['group_descripcion_del_puesto']['field_cantidad_vacantes'] = $form['#node']->field_cantidad_vacantes;
    //$form['#node']->field_cantidad_vacantes == ""; 
    
    $form["field_remuneracion"]['#weight'] = 93;
    
	####### PUBLICACION ########
	//$form['group_publicacion']['field_']
    

    $miform  = '';
    
    $miform .= drupal_render($form['ini']);
    $miform .= drupal_render($form['intro']);
    
	$miform .= drupal_render($form['group_descripcion_del_puesto']);
	$miform .= drupal_render($form['group_descripcion_del_puesto']['title']);
	$miform .= drupal_render($form['group_descripcion_del_puesto']['field_cantidad_de_vacantes']);
	$miform .= drupal_render($form['group_descripcion_del_puesto']['taxonomy'][get_vocabulary_by_name('Jerarquia')]);
	
	$miform .= drupal_render($form['group_requisitos']);
	$miform .= drupal_render($form['group_requisitos']['field_lugar_de_residencia']);
	
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('provincias')]);
	$miform .= drupal_render($form['taxonomy'][get_vocabulary_by_name('area')]);
	
	$miform .= drupal_render($form['group_datos_de_la_empresa']);
	$miform .= drupal_render($form['group_datos_de_la_empresa']['field_empresa_1']);
	$miform .= drupal_render($form['group_datos_de_la_empresa']['field_logo']);
	
	$miform .= drupal_render($form['group_publicacion']);
	$miform .= drupal_render($form['group_publicacion']['field_fecha_desde']);
	$miform .= drupal_render($form['group_publicacion']['field_fecha_hasta']);
	
	//$miform .= drupal_render($form['body_filter']);

	$miform .= drupal_render($form['submit']);
	$miform .= drupal_render($form['delete']);
	$miform .= drupal_render($form['fin']);
	$miform .= drupal_render($form['type']);
	$miform .= drupal_render($form['nid']);
	$miform .= drupal_render($form['vid']);
	$miform .= drupal_render($form['changed']);
	$miform .= drupal_render($form['form_token']);
	$miform .= drupal_render($form['form_id']);
	$miform .= drupal_render($form['field_logo-attach-url']);
	$miform .= drupal_render($form);
	//echo "<pre>"; print_r($form);echo "</pre>";
	//firep($form['field_empresa_1'], "Mi form");
	return $miform;
}

function phptemplate_form_alter(&$form, $form_state, $form_id){
	firep($form_id, 'Formulario id');
	firep($form, 'Formulario');

    switch($form_id){
        case 'p-cursos-node-form--------------------------------':
        	print "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
		    $form['ini']['#prefix']  = '<div class="mycv">';
			$form['ini']['#value']  = ' ';
			$form['ini']['#weight']  = -99;	
			
			$form['fin']['#prefix']  = '</div>';
			$form['fin']['#value']  = ' ';
			$form['fin']['#weight']  = 99;
			
			
			$form['intro']['#value']  = '<legend>Cursos:</legend>';
			// Lo pongo dentro de un div para poder temearlo
			$form['intro']['#prefix']  = '<fieldset>';
			$form['intro']['#suffix']  = '</fieldset>';
			// le pongo el weight bien bajo para que lo ponga primero
			$form['intro']['#weight']  = -40;
			
			
			$form['title']['#title']='Curso';
		    $form['taxonomy']['#type'] = '';
		    $form['body_filter'] = '';
		    
		    $form['body_filter']['body']['#title'] = 'Descripcion';
		    $form['body_filter']['body']['#rows'] = 10;
		    $form['body_filter']['body']['#cols'] = 80;    
		    
		    $form['body_filter']['format']['format']['guidelines']['#value'] = '';
		    $form['body_filter']['format'][2]['#value'] = '';
		    
		    unset($form['preview']);
		    $form['submit']['#value']="Guardar" ;
		    
		    firep($form, 'Formulario');
		        
		    $miform  = '';
		    
		    $miform .= drupal_render($form['ini']);
		    $miform .= drupal_render($form['intro']);
			$miform .= drupal_render($form['title']);
			$miform .= drupal_render($form['field_en_calidad_de']);
			$miform .= drupal_render($form['field_lugar']);
			$miform .= drupal_render($form['field_ubicacin']);	
		  	$miform .= drupal_render($form['field_nota']);
			$miform .= drupal_render($form['field_numero_de_certificado']);
			$miform .= drupal_render($form['field_numero_de_examen']);
			$miform .= drupal_render($form['field_desde']);
			$miform .= drupal_render($form['field_hasta']);
			$miform .= drupal_render($form['field_web_0']);
			
			$miform .= drupal_render($form['body_filter']);
			
			
			$miform .= drupal_render($form['group_omar_mmmmmm']);
			
			$miform .= drupal_render($form['submit']);
			$miform .= drupal_render($form['delete']);
			$miform .= drupal_render($form['fin']);
			$miform .= drupal_render($form);
            break;
    }

    $form = $miform;
    return $form;
}