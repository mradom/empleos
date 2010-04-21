<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<?php include("include/varios.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <?php include("include/empresa_encabezado.php");?>
    <?php //include("include/banners-boxes.php");?>
    <!-- RIGHT -->
    <?php 
      if (arg(1)=='') {
	    print '<div id="right_colum">'; 
        Empleos_ayuda('Tip', 'Empresas'); 
	    print '</div>';  }
	   if (arg(1)<>'') include("include/col_derecha.php");
	?>
    <!-- CENTRAL -->
    <DIV id="central_column">
    <?php 
    if ( arg(1)=='') {
		          print '<div class="bar_blue"><div class="corner_blue _2"></div>';
    		      print '<div class="corner_blue">Listado de Empresas</div></div>';
        		  print '<div class="box center">'; 
 
                  $sql = "SELECT u.* FROM users AS u INNER JOIN users_roles AS ur ON ur.uid = u.uid WHERE STATUS = 1 AND ur.rid = 5";
                  $rs = db_query($sql);
                    
                  print '<ul class="brands">';
                  while($fila = mysql_fetch_object($rs)){
                      $empresa = user_load(array('uid' => $fila->uid));
					  //firep($empresa, 'Empresa');	
                      print '<li class=" side brands center">';
                      print '<div class="brand">';
                      print theme('imagecache','logo_empresa_52_34',$empresa->picture,$empresa->picture,$fila->uid);
					  print '</div>';
					  //$empresa->profile_empresa_razon_social)
                      //print '<div><a href="/empresa/'.$fila->uid.'" >'.$empresa->name.'</a></div>';
					  print '<div ><a href="/empresa/'.$fila->uid.'" >'.$empresa->profile_empresa_razon_social.'</a></div>'; 
					  print '<div  class="m60">'.$empresa->profile_empresa_calle.' '.$empresa->profile_empresa_numero.'</div>';
                      print '</li>';
                  }
                  print '</ul></div>';
			  }
			  if (arg(1)<>'' and arg(2)=='') {
				  empresa_buscar();
			  }
 		  	  if (arg(1)<>'' and arg(2)=='avisos') {
				  empresa_avisos(arg(1));
			  }
			?>
    <?php include("include/banners-central.php");?>
    </div>
  </div>
  <?php include("include/footer.php");?>
</div>
</body>
</html>

<?php
function empresa_buscar() {
  global $user;
  $emp = user_load(array('uid' => arg(1)));
  profile_load_profile($emp);
  //print 'Nombre: '.$emp->name;
  
  
  $result = db_query('SELECT f.name, f.type, v.value FROM {profile_fields} f INNER JOIN {profile_values} v ON f.fid = v.fid WHERE uid = %d', arg(1));
  while ($field = db_fetch_object($result)) {
	//print '['.$field->name.']='.$field->value.'<br>';
    if (empty($emp->{$field->name})) {
      $emp->{$field->name} = _profile_field_serialize($field->type) ? unserialize($field->value) : $field->value;
    }
  }
  print '<br>';
  print theme('imagecache','logo_empresa_52_34',$emp->picture,$emp->picture,$emp->uid);
  print 'Nombre: '.$emp->profile_empresa_empresa_nombre.'<br>';
  
  print '<a href="/empresa/'.arg(1).'/avisos">Listado de avisos</a><br>';

  print '<div><a href="/empresa">Volver</a></div>';
  
  print "<div>&nbsp;</br>&nbsp;</br>&nbsp;</br>&nbsp;</br>&nbsp;</br></div>";

}






function empresa_avisos($uid) {
global $pager_total_items;

$sql_query = "";

$base_query = "SELECT * FROM node_revisions AS nr
INNER JOIN node AS n ON n.nid = nr.nid ";
// ojo tiene que ser select * si o si para que funcione el paginador

$inner_join = " INNER JOIN workflow_node AS w ON w.nid = n.nid ";

$inner_join2 = " INNER JOIN pub_publicacion AS z ON z.nid = n.nid ";
// en el cid esta el tipo
// abajo deberia estar ordenado por CID desc y desde ASC

$where = "WHERE n.type = 'e_aviso' AND n.status = 1 ";

if($term > 0){
	$inner_join = $inner_join ;
	$where = $where . "AND n.uid = ". $uid ." ";
}

$where = $where . " ORDER BY w.sid, n.created DESC  ";

$sql = $base_query.$inner_join.$where;
    //$rs = db_query($sql);

//print '['.$sql.']';

	$nodes_per_page = variable_get(EMPLEOS_PAGE_LIMIT, 20);
	$nodes_per_page = 2;
	
	$rs = pager_query($sql,$nodes_per_page,0);




	print '<div style="float: left;">';
    //print '<UL class="tags">'; 
    //print '<li><H1><A href="/buscar">Buscar</A></H1></LI>';
    //if(isset($rubro)) print '<li><h1><a href="/buscar/'.$rubro.'">$rubro / </a></h1></li>';
    //if(isset($zona )) print '<li><h1><a href="/buscar/'.$zona.'">$zona / </a></h1></li>';
    //if(isset($key  )) print '<li><h1><a href="/buscar/'.$key.'">$key</a></h1></li>';
	//print '<li>['.$nodes_per_page.']</li>';

    //print '</UL></div>'; 
    print '<DIV class="box central" style="background:none">'; 
	print '<DIV class="results"><DIV class="rss redes"><A href="#">Compartir</A>'; 
    print '</div><DIV class="rss"><A href="#">RSS</A>';
	print '</div><P><SPAN class="orange">'.$uid.'</SPAN> : '.$pager_total_items[0].' aviso/s</P>'; 
	print '</div>';


	$gold = "0";
	$destacado = "0";
	$simple = "0";
	$gratis = "0";
	$otro = 0;
	
	if(mysql_num_rows($rs) > 0){
		while($fila = mysql_fetch_object($rs)){
			$nodo = node_load($fila->nid);

			foreach($nodo->taxonomy as $value){
				if ($value->vid == 1){$area = $value->tid; break;}
			}
			foreach($nodo->taxonomy as $value){
				if ($value->vid == 11){$sector = $value->tid; break;}
			}
			foreach($nodo->taxonomy as $value){
				if ($value->vid == 17){$localidad = $value->tid; break;}
			}
			switch ($nodo->_workflow) {
				case 3:
					//if ( ($otro==1) and ($tipo <> 3) ) { print '</div><!-- fin tipo -->'; $otro=0; } 						
					if($gold == "0"){
						echo "<div id='gold'><div id='titles_bar'><img src='sites/all/themes/empleos/img/gold.gif'>Avisos Gold</div>";
						$otro = 1;	
						$gold = 1;
						$tipo = 3;
					} else {
					echo "<div id='gold'>"; 
					}
					break;
				case 4:
					//if ( ($otro==1) and ($tipo <> 4) ) { print '</div><!-- fin tipo -->'; $otro=0; } 												
					if($destacado == "0"){
						echo "<div id='destacado'><div id='titles_bar'><img src='sites/all/themes/empleos/img/destacado.gif'>Avisos Destacados</div>";
						$destacado = 1;
						$otro = 1;
						$tipo = 4;
					} else { 
					echo "<div id='destacado'>"; 
					}
					break;
				case 5:
					//if ( ($otro==1) and ($tipo <> 5) ) { print '</div><!-- fin tipo -->'; $otro=0; } 												
					if($simple == "0"){
						echo "<div id='simple'><div id='titles_bar'><img src='sites/all/themes/empleos/img/simple.gif'>Avisos Simples</div>";
						$simple = 1;
						$otro = 1;
						$tipo = 5;								
					} else {
					echo "<div id='simple'>"; 
					}
					break;
				case 6:
					//if ( ($otro==1) and ($tipo <> 6) ) { print '</div><!-- fin tipo -->'; $otro=0; } 												
					if($gratis == "0"){
						echo "<div id='gratis'><div id='titles_bar'>Avisos Gratuitos</div>";
						$gratis = 1;
						$otro = 1;
						$tipo = 6;								
					} else {
					echo "<div id='gratis'>"; 
					}
					break;
				default:
					//if ( ($otro==1) and ($tipo <> 9) ) { print '</div><!-- fin tipo -->'; $otro=0; } 												
					if($gratis == "0"){
						echo "<div id='gratis'><div id='titles_bar'>Avisos</div>";
						$gratis = 1;
						$otro = 1;
						$tipo = 9;								
					} else {
					echo "<div id='gratis'>" ;
					}
					break;	
			}

			if($nodo->_workflow == 3 or $nodo->_workflow == 4){
				print '<!-- ini destacado -->';
				// gold y destacado
				  print '<div>';
				  // logo de la empresa
				  print '<div class="brand">';
				  // print theme('imagecache','logo_empresa_resultado_busqueda_86_53',$nodo->picture,$nodo->picture,$nodo->picture);
				  print '</div>';
				  // boton de postulacion
				  print '<a href="/job/apply/'.$nodo->nid.'"><div class="btn_postulate"></div></a>';
				  // encabezado
				  print '<div class="datos">'; 
					print '<h2><a class="orange" href="/taxonomy/term/';
					print $nodo->taxonomy[$area]->tid;
					print '">'.$nodo->taxonomy[$area]->name.'</a> | <span class="upper">';
					print $nodo->name.'</span></h2>';
					print '<p class="line">'; 
					 print '<span class="orange">Sector:</span> <a href="/taxonomy/term/';
					 print $nodo->taxonomy[$sector]->tid;
					 print '">'.$nodo->taxonomy[$sector]->name.'</a> | <a href="/taxonomy/term/';
					 print $nodo->taxonomy[$localidad]->tid;
					 print '">'.$nodo->taxonomy[$localidad]->name.'</a><br>'; 
					 print '</p>';
					// texto hasta 215 caracteres
					print '<p>';
					if (strlen($nodo->teaser) > 215){
					  print substr($nodo->teaser,0,215).'...';
					 }else{
					  print substr($nodo->teaser,0,215);
					 }
					print '</p>';
					// ver oferta de trabajo
					print '<p><a class="orange right" href="/node/';
					 print $nodo->nid;
					 print '">&gt;&gt;Ver oferta de trabajo</a></p>';
					// fecha de creacion
					print '<p class="grey">Fecha de publicaci&oacute;n: ';
					 print date('d-m-Y',$nodo->created);
					 print '</p>';
				  print '</div>';
				print '</div>';
				print '</div>';						
				print '<!-- fin destacado -->';
				}
			  if($nodo->_workflow == 5){
				// simple
				print '<!-- ini simple -->';
				print '<div>';
				  // encabezado
				  print '<div class="datos">'; 
					print '<h2><span><a href="/taxonomy/term/';
					print $nodo->taxonomy[$area]->tid;
					print '">'.$nodo->taxonomy[$area]->name.'</a></span> | <span class="upper">';
					print $nodo->name.'</span></h2>';
					print '<p class="line">'; 
					 print '<span class="orange">Sector:</span> <a href="/taxonomy/term/';
					 print $nodo->taxonomy[$sector]->tid;
					 print '">'.$nodo->taxonomy[$sector]->name.'</a> | <a href="/taxonomy/term/';
					 print $nodo->taxonomy[$localidad]->tid;
					 print '">'.$nodo->taxonomy[$localidad]->name.'</a><BR>'; 
					 print '</p>';
					// texto hasta 215 caracteres
					print '<p>';
					if (strlen($nodo->teaser) > 215){
					  print substr($nodo->teaser,0,215).'...';
					 }else{
					  print substr($nodo->teaser,0,215);
					 }
					print '</p>';
					// ver oferta de trabajo
					print '<p><a class="orange right" href="/node/';
					 print $nodo->nid;
					 print '">&gt;&gt;Ver oferta de trabajo</a></p>';
					// fecha de creacion
					print '<p class="grey">Fecha de publicaci&oacute;n: ';
					 print date('d-m-Y',$nodo->created);
					 print '</p>';
				  print '</div>';
				  print '</div>';
				print '</div>';						  
				print '<!-- fin simple -->';
				}
			  if($nodo->_workflow == 6){
				print '<!-- ini free -->';
				// free
				print '<div>';
				  // encabezado
				  print '<div class="datos">'; 
					print '<h2><strong><a href="/taxonomy/term/';
					print $nodo->taxonomy[$area]->tid;
					print '">'.$nodo->taxonomy[$area]->name.'</a></strong> | <span class="upper">';
					print $nodo->name.'</span></h2>';
					// ver oferta de trabajo
					print '<p><a class="orange right" href="/node/';
					 print $nodo->nid;
					 print '">&gt;&gt;Ver oferta de trabajo</a></p>';
					// fecha de creacion
					print '<p class="grey">Fecha de publicaci&oacute;n: ';
					 print date('d-m-Y',$nodo->created);
					 print '</p>';
				  print '</div>';
				  print '</div>';
				print '</div>';						  
				print '<!-- fin free -->';
				}
		}
		 // aca cierro el div del tipo de aviso
		 print '</div>';
		 //if ($otro==1) { print '</div><!-- fin todo -->'; $otro=0;} 
	
		
	} else {
		print '<div><p>No se encontraron avisos en este rubro.</p></div>';
	}
		 print '<div style="float: right; ">'.theme('pager', NULL, $nodes_per_page).'</div>';	
        
    print '</div>'; 
}
?>

