<?php 
global $pager_total_items;

$key = $_POST["key"];
$rubro = $_POST["rubro"];
$zona = $_POST["zona"];

$sql_query = "";

$base_query = "SELECT * FROM node_revisions AS nr
INNER JOIN node AS n ON n.nid = nr.nid ";
// ojo tiene que ser select * si o si para que funcione el paginador

$inner_join = " INNER JOIN workflow_node AS w ON w.nid = n.nid ";

$inner_join2 = " INNER JOIN pub_publicacion AS z ON z.nid = n.nid ";
// en el cid esta el tipo
// abajo deberia estar ordenado por CID desc y desde ASC

$where = "WHERE n.type = 'e_aviso' AND n.status = 1 ";

if($key != "" and $key != 'Buscar por palabras clave'){
	$where = $where."AND n.title LIKE '%".$key."%' or nr.body LIKE '%".$key."%' ";
}
if($rubro > 0){
	$inner_join = $inner_join . " INNER JOIN term_node AS tn1 ON tn1.nid = n.nid ";
	$where = $where . "AND tn1.tid = ". $rubro ." ";
}
if($zona > 0){
	$inner_join = $inner_join ." INNER JOIN term_node AS tn2 ON tn2.nid = n.nid ";
	$where = $where . "AND tn2.tid = ". $zona ." ";
}

$where = $where . " ORDER BY w.sid, n.created DESC  ";

$sql = $base_query.$inner_join.$where;
    //$rs = db_query($sql);

	$nodes_per_page = variable_get(EMPLEOS_PAGE_LIMIT, 20);
	$nodes_per_page = 2;
	
	$rs = pager_query($sql,$nodes_per_page,0);


?>
<!-- Poner aca camino de links -->
	  <div style="float: left;">
      <UL class="tags">
        <li><H1><A href="?q=buscar">Buscar</A></H1></LI>
        <?php  	if(isset($rubro)) print '<li><h1><a href="?q=buscar/'.$rubro.'">$rubro / </a></h1></li>';
                if(isset($zona )) print '<li><h1><a href="?q=buscar/'.$zona.'">$zona / </a></h1></li>';
                if(isset($key  )) print '<li><h1><a href="?q=buscar/'.$key.'">$key</a></h1></li>';
				print '<li>['.$nodes_per_page.']</li>';
			?>
      </UL>
      </div>
<!-- LISTA DE RESULTADOS -->
	  <DIV class="box central" style="background:none">
			<DIV class="results">
          		<DIV class="rss redes">
          			<A href="#">Compartir</A>
          		</div>
          		<DIV class="rss">
          			<A href="#">RSS</A>
          		</div>
          		<P>Se econtraron <SPAN class="orange"><?php echo $pager_total_items[0];?> ofertas de trabajo:</SPAN> en el &aacute;rea: <SPAN class="orange"> GERENCIA GENERAL</SPAN></P>
			</div>
       <!-- Gold results -->
       <?php 
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
					      print '<a href="?q=job/apply/'.$nodo->nid.'"><div class="btn_postulate"></div></a>';
						  // encabezado
						  print '<div class="datos">'; 
							print '<h2><a class="orange" href="?q=taxonomy/term/';
							print $nodo->taxonomy[$area]->tid;
							print '">'.$nodo->taxonomy[$area]->name.'</a> | <span class="upper">';
							print $nodo->name.'</span></h2>';
							print '<p class="line">'; 
							 print '<span class="orange">Sector:</span> <a href="?q=taxonomy/term/';
							 print $nodo->taxonomy[$sector]->tid;
							 print '">'.$nodo->taxonomy[$sector]->name.'</a> | <a href="?q=taxonomy/term/';
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
							print '<p><a class="orange right" href="?q=node/';
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
							print '<h2><span><a href="?q=taxonomy/term/';
							print $nodo->taxonomy[$area]->tid;
							print '">'.$nodo->taxonomy[$area]->name.'</a></span> | <span class="upper">';
							print $nodo->name.'</span></h2>';
							print '<p class="line">'; 
							 print '<span class="orange">Sector:</span> <a href="?q=taxonomy/term/';
							 print $nodo->taxonomy[$sector]->tid;
							 print '">'.$nodo->taxonomy[$sector]->name.'</a> | <a href="?q=taxonomy/term/';
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
							print '<p><a class="orange right" href="?q=node/';
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
							print '<h2><strong><a href="?q=taxonomy/term/';
							print $nodo->taxonomy[$area]->tid;
							print '">'.$nodo->taxonomy[$area]->name.'</a></strong> | <span class="upper">';
							print $nodo->name.'</span></h2>';
							// ver oferta de trabajo
							print '<p><a class="orange right" href="?q=node/';
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
        		print '<div><p>No se encontraron resultados de acuerdo a su criterio de busqueda.</p><p>Por favor intente con otro criterio</p></div>';
        	}
			     print '<div style="float: right; ">'.theme('pager', NULL, $nodes_per_page).'</div>';	
        ?>
</div><!-- fin listado -->