<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <?php include("include/banners-boxes.php");?>
    <!-- RIGHT -->
    <?php 
	   include("include/col_derecha.php");
	?>
    <!-- CENTRAL -->
    <div id="central_column">
  	      <?php //include("include/lista_rubros.php");?>
              <?php
			  if ( arg(1)=='') {
		          print '<div class="bar_blue"><div class="corner_blue _2"></div>';
    		      print '<div class="corner_blue">Avisos por Sector</div></div>';
        		  print '<div class="box center">'; 
			      
				  $b_ramo=get_vocabulary_by_name('Ramo o Actividad');
				  
				  $sql = "SELECT vid, name FROM {vocabulary} WHERE vid = ".$b_ramo;
				  $vocabularies = db_query($sql);
				  $output = "";
				  while ($avoc = db_fetch_object($vocabularies)) {
					  $output .= "<li><strong></strong></li>\n"
							  .  get_child_terms(0, $avoc->vid);
				  }
				  print "<div class='taxonomy_tree grey'><p><ul class='side'>\n". $output ."</ul></p></div>\n";
				  print '</div>';
			  }
			  if (arg(1)<>'') {
				  rubro_buscar(arg(1));
			  }			  
			  
			  //print '['.arg(0).'-'.arg(1).']';
			  

			?>
      <?php include("include/banners-central.php");?>
      </div>      
  </div>
  <?php include("include/footer.php");?>
</div>
</body>
</html>

<?php
function get_child_terms($parent, $vid) {
      $sql = "SELECT td.tid, td.vid, td.name"
         . "  FROM {term_data} td"
         . "  JOIN {term_hierarchy} th on th.tid = td.tid"
         . " WHERE th.parent = %d"
         . "   AND td.vid = %d"
         . " ORDER BY td.weight, td.name";
    $terms = db_query($sql, $parent, $vid);
    $output = "";
    while ($aterm = db_fetch_object($terms)) {
        $output .= "<li>";
		// theme('feed_icon', url("taxonomy/term/$aterm->tid/all/feed"))
        $output .= l("$aterm->name", "rubro/$aterm->tid") . " ("
                .  taxonomy_term_count_nodes($aterm->tid) . ")</li>\n"
                .  get_child_terms($aterm->tid, $vid);
    }
    return ($output != "") ? "<ul>\n". $output ."</ul>\n" : "";
  }


function rubro_buscar($term) {

global $pager_total_items;

$sql_query = "";

$base_query = "SELECT * FROM node_revisions AS nr INNER JOIN node AS n ON n.nid = nr.nid ";
$inner_join = "INNER JOIN content_type_e_aviso AS w ON w.nid = n.nid ";
// ojo tiene que ser select * si o si para que funcione el paginador
$where = "WHERE n.type = 'e_aviso' AND n.status = 1 ";

if($term > 0){
	$inner_join = $inner_join . " INNER JOIN term_node AS tn1 ON tn1.nid = n.nid ";
	$where = $where . "AND tn1.tid = ". $term ." ";
}

$where = $where . " ORDER BY w.field_tipo_de_aviso_value DESC, n.created DESC  ";

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
    print '</div>'; 
	
    print '<div class="box central" style="background:none">'; 
	print '<div class="results"><div class="rss redes"><a href="#">Compartir</a>'; 
    print '</div><div class="rss"><a href="#">RSS</a>';
	print '</div><p><span class="orange">'.get_term_by_id($term).'</span> : '.$pager_total_items[0].' aviso/s</p>'; 
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
			switch ($nodo->field_tipo_de_aviso[0]["value"]) {
				case 4:
					//if ( ($otro==1) and ($tipo <> 3) ) { print '</div><!-- fin tipo -->'; $otro=0; } 						
					if($gold == "0"){
						echo "<div id='gold'><div id='titles_bar'><img src='/sites/all/themes/empleos/img/gold.gif'>Avisos Gold</div>";
						$otro = 1;	
						$gold = 1;
						$tipo = 3;
					} else {
					echo "<div id='gold'>"; 
					}
					break;
				case 3:
					//if ( ($otro==1) and ($tipo <> 4) ) { print '</div><!-- fin tipo -->'; $otro=0; } 												
					if($destacado == "0"){
						echo "<div id='destacado'><div id='titles_bar'><img src='/sites/all/themes/empleos/img/destacado.gif'>Avisos Destacados</div>";
						$destacado = 1;
						$otro = 1;
						$tipo = 4;
					} else { 
					echo "<div id='destacado'>"; 
					}
					break;
				case 2:
					//if ( ($otro==1) and ($tipo <> 5) ) { print '</div><!-- fin tipo -->'; $otro=0; } 												
					if($simple == "0"){
						echo "<div id='simple'><div id='titles_bar'><img src='/sites/all/themes/empleos/img/simple.gif'>Avisos Simples</div>";
						$simple = 1;
						$otro = 1;
						$tipo = 5;								
					} else {
					echo "<div id='simple'>"; 
					}
					break;
				case 1:
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

			if($nodo->field_tipo_de_aviso[0]["value"] == 3 or $nodo->field_tipo_de_aviso[0]["value"] == 4){
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
				    print '<h2><a class="orange" href="/node/';
					print $fila->nid;
					print '">'.$nodo->title.'</a></h2>';
					print '<h2><a class="orange" href="/rubro/';
					print $nodo->taxonomy[$area]->tid;
					print '">'.$nodo->taxonomy[$area]->name.'</a> | <span class="upper">';
					print $nodo->name.'</span></h2>';
					print '<p class="line">'; 
					 print '<span class="orange">Sector:</span> <a href="/sector/';
					 print $nodo->taxonomy[$sector]->tid;
					 print '">'.$nodo->taxonomy[$sector]->name.'</a> | <a href="/provincia/';
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
			  if($nodo->field_tipo_de_aviso[0]["value"] == 2){
				// simple
				print '<!-- ini simple -->';
				print '<div>';
				  // encabezado
				  print '<div class="datos">'; 
				    print '<h2><a class="orange" href="/node/';
					print $fila->nid;
					print '">'.$nodo->title.'</a></h2>';
				  
					print '<h2><span><a href="/rubro/';
					print $nodo->taxonomy[$area]->tid;
					print '">'.$nodo->taxonomy[$area]->name.'</a></span> | <span class="upper">';
					print $nodo->name.'</span></h2>';
					print '<p class="line">'; 
					 print '<span class="orange">Sector:</span> <a href="/sector/';
					 print $nodo->taxonomy[$sector]->tid;
					 print '">'.$nodo->taxonomy[$sector]->name.'</a> | <a href="/provincia/';
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
			  if($nodo->field_tipo_de_aviso[0]["value"] == 1){
				print '<!-- ini free -->';
				// free
				print '<div>';
				  // encabezado
				  print '<div class="datos">'; 
				    print '<h2><a class="orange" href="/node/';
					print $fila->nid;
					print '">'.$nodo->title.'</a></h2>';
				  
					print '<h2><strong><a href="/rubro/';
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
        
    print '</div><!--fin listado-->'; 
}
?>

