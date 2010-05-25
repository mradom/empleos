<?php 
global $pager_total_items;
	$key = $_REQUEST["key"];
	$rubro = $_REQUEST["rubro"];
	$zona = $_REQUEST["zona"];
	$fecha_desde = $_REQUEST["fechaDesde"];
	$fecha_hasta = $_REQUEST["fechaHasta"];
	$empresa = $_REQUEST["empresa"];
	$edad_desde = $_REQUEST["edadDesde"];
	$edad_hasta = $_REQUEST["edadHasta"];
	$idiomas = $_REQUEST["idiomas"];
	$sexo = $_REQUEST["sexo"];
	$disponibilidad = $_REQUEST["disponibilidad"];
	
	$sql_query = "";
	$base_query = "SELECT * FROM node_revisions AS nr INNER JOIN node AS n ON n.nid = nr.nid ";
	$inner_join = "INNER JOIN content_type_e_aviso AS w ON w.nid = n.nid ";
	// ojo tiene que ser select * si o si para que funcione el paginador
	$where = "WHERE n.type = 'e_aviso' AND n.status = 1 ";
	
	if($key == 'Buscar por palabras clave'){
		$key = "";
	}
	
	if($key != ""){
		$where .="AND (n.title LIKE '%".$key."%' or nr.body LIKE '%".$key."%') ";
	}
	if($rubro > 0){
		$inner_join = $inner_join . " INNER JOIN term_node AS tn1 ON tn1.nid = n.nid ";
		$where = $where . "AND tn1.tid = ". $rubro ." ";
	}
	if($zona > 0){
		$inner_join = $inner_join ." INNER JOIN term_node AS tn2 ON tn2.nid = n.nid ";
		$where = $where . "AND tn2.tid = ". $zona ." ";
	}
	
if($_REQUEST['busqueda'] == "avanzada"){
	if(isset($fecha_desde) and $fecha_desde != null and $fecha_desde != ""){
		$where .= " AND DATE(w.field_fecha_desde_value) >= DATE_FORMAT(DATE('$fecha_desde'),'%Y-%m-%d')";
	}
	
	if(isset($fecha_hasta) and $fecha_hasta != null and $fecha_hasta != ""){
		$where .= " AND DATE(w.field_fecha_hasta_value) <= DATE_FORMAT(DATE('$fecha_hasta'),'%Y-%m-%d')";
	}
	
	if(isset($empresa) and $empresa > 0){
		$where .= " AND n.uid = 4";
	}
	
	if(isset($edadDesde) and isset($edadHasta)){
		$where .= "AND w.field_edad_entre_value >= '$edadDesde' AND w.field_edad_hasta_value <= '$edadHasta'";
	}
	
	if(isset($idiomas) and $idiomas > 0){
		$inner_join = $inner_join ." INNER JOIN term_node AS tn3 ON tn3.nid = n.nid ";
		$where = $where . " AND tn3.tid = '$idiomas'";
	}
	
	if(isset($sexo) and $sexo != 0){
		$where .= " AND w.field_sexo_value = $sexo";
	}
	
	if(isset($disponibilidad) and $disponibilidad > 0){
		$inner_join = $inner_join ." INNER JOIN term_node AS tn4 ON tn4.nid = n.nid ";
		$where = $where . " AND tn4.tid = '$disponibilidad'";
	}
}

	$where = $where . " ORDER BY w.field_tipo_de_aviso_value DESC, n.created DESC  ";
	
	$sql = $base_query.$inner_join.$where;
	//Print "<pre>".$sql."<pre>";

    //$rs = db_query($sql);
    //$rs = mysql_query($sql) or die(mysql_errors());
    //echo $sql;

	$nodes_per_page   = variable_get(EMPLEOS_PAGE_LIMIT, 20);
	$banners_per_page = variable_get(EMPLEOS_BANNER_VIEW, 0);
	//print '[[[[[[[[[[[[[[['.$banners_per_page.']]]]]]]]]]';
	//$nodes_per_page = 2;
	$rs = pager_query($sql,$nodes_per_page,0);
?>
<!-- Poner aca camino de links -->
	  <div style="float: left;">
      <ul class="tags">
        <li><h1><A href="/buscar">Buscar</A></h1></li>
        <?php  	if(isset($rubro) and $rubro != "0"){
        			$rs2 = db_query("SELECT * FROM term_data WHERE tid = $rubro");
        			$rub = db_fetch_object($rs2);
        			echo '<li><h1><a href="/buscar/'.$rubro.'">'.$rub->name .' / </a></h1></li>';
        		}
                if(isset($zona) and $zona != "0"){
        			$rs2 = db_query("SELECT * FROM term_data WHERE tid = $zona");
        			$zon = db_fetch_object($rs2);
                	echo '<li><h1><a href="/buscar/'.$zona.'">'.$zon->name .' / </a></h1></li>';
                }
                if(isset($key) and $key != "0") echo '<li><h1><a href="/buscar/'.$key.'">'.$key.'</a></h1></li>';
				//echo '<li>['.$nodes_per_page.']</li>';
			?>
      </ul>
      </div>
<!-- LISTA DE RESULTADOS -->
	  <div class="box central" style="background:none">
			<div class="results">
          		<div class="rss redes">
          			<A href="#">Compartir</A>
          		</div>
          		<div class="rss">
          			<A href="#">RSS</A>
          		</div>
          		<P>Se econtraron <span class="orange"><?php echo $pager_total_items[0];?> ofertas de trabajo:</span> en el &aacute;rea: <span class="orange"> GERENCIA GENERAL</span></p>
			</div>
       <!-- Gold results -->
       <?php 
        	$gold = "0";
        	$destacado = "0";
        	$simple = "0";
        	$gratis = "0";
        	$otro = 0;
			$ren = 0;
        	if(mysql_num_rows($rs) > 0){
        	    while($fila = mysql_fetch_object($rs)){
					$ren += 1;
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
					        	echo "<div id='gold'><div id='titles_bar'><img src='sites/all/themes/empleos/img/gold.gif' />Avisos Gold</div>";
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
					        	echo "<div id='destacado'><div id='titles_bar'><img src='sites/all/themes/empleos/img/destacado.gif' />Avisos Destacados</div>";
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
					        	echo "<div id='simple'><div id='titles_bar'><img src='sites/all/themes/empleos/img/simple.gif' />Avisos Simples</div>";
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

        			if($nodo->field_tipo_de_aviso[0]["value"] == 4){
   					    print '<!-- ini destacado -->';
						// gold y destacado
						  print '<div>';
						  // logo de la empresa
						  print '<div class="brand">';
						  print theme('imagecache','logo_empresa_resultado_busqueda_86_53',$nodo->picture,$nodo->picture,$nodo->picture);
						  print '</div>';
						  // boton de postulacion 
		            	$link = "";
		            	if($user->uid){
		            		$link = "/job/apply/".$nodo->nid;
		            	}else{
		            		$link = "/user&destination=node/".$nodo->nid;
		            	}
					      print '<a href="'.$link.'"><div class="btn_postulate"></div></a>';
						  // encabezado
						    print '<div class="datos">'; 
			  			    print '<h2>';
						    $attributes = array( 'class' => 'orange' );
						    print l($nodo->title, 'node/'.$nodo->nid, $attributes);
							print '</h2>';
							print '<h2><a class="orange" href="/rubro/';
							print $nodo->taxonomy[$area]->tid;
							print '">'.$nodo->taxonomy[$area]->name.'</a> | <span class="upper">';
							print $nodo->name.'</span></h2>';
							print '<p class="line">'; 
							print '<span class="orange">Sector:</span> ';
							print l($nodo->taxonomy[$sector]->name, 'taxonomy/term/'.$nodo->taxonomy[$sector]->tid);
							print ' | ';
							print l($nodo->taxonomy[$localidad]->name,'taxonomy/term/'.$nodo->taxonomy[$localidad]->tid);
							print '<br />'; 
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
						    $attributes = array( 'class' => 'orange right' );
                            print '<p>';
							print l("Ver oferta de trabajo", 'node/'.$nodo->nid, $attributes);
							print '</p>';
							// fecha de creacion
							print '<p class="grey">Fecha de publicaci&oacute;n: ';
							print date('d-m-Y',$nodo->created);
							print '</p>';
						  print '</div>';
						print '</div>';
						print '</div>';						
						print '<!-- fin gold -->';
					    }
						
					if($nodo->field_tipo_de_aviso[0]["value"] == 3 ){
   					    print '<!-- ini destacado -->';
						// gold y destacado
						  print '<div>';
						  // logo de la empresa
						  print '<div class="brand">';
						  print theme('imagecache','logo_empresa_resultado_busqueda_86_53',$nodo->picture,$nodo->picture,$nodo->picture);
						  print '</div>';
						  // boton de postulacion 
		            	$link = "";
		            	if($user->uid){
		            		$link = "/job/apply/".$nodo->nid;
		            	}else{
		            		$link = "/user&destination=node/".$nodo->nid;
		            	}
					      print '<a href="'.$link.'"><div class="btn_postulate"></div></a>';
						  // encabezado
						  print '<div class="datos">'; 
						    print '<h2>';
							$attributes = array( 'class' => 'blue' );
							print l($nodo->title, 'node/'.$nodo->nid, $attributes);
							print '</h2>';
							print '<h2><a class="blue" href="/rubro/';
							print $nodo->taxonomy[$area]->tid;
							print '">'.$nodo->taxonomy[$area]->name.'</a> | <span class="upper">';
							print $nodo->name.'</span></h2>';
							print '<p class="line">'; 
							print '<span class="blue">Sector:</span> ';
							print l($nodo->taxonomy[$sector]->name, 'taxonomy/term/'.$nodo->taxonomy[$sector]->tid);
							print ' | ';
							print l($nodo->taxonomy[$localidad]->name,'taxonomy/term/'.$nodo->taxonomy[$localidad]->tid);
							print '<br />'; 
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
						    $attributes = array( 'class' => 'blue right' );
                            print '<p>';
							print l("Ver oferta de trabajo", 'node/'.$nodo->nid, $attributes);
							print '</p>';
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
						    print '<h2>';
							$attributes = array( 'class' => '' );
							print l($nodo->title, 'node/'.$nodo->nid);
							print '</h2>';
							print '<h2><span><a href="/rubro/';
							print $nodo->taxonomy[$area]->tid;
							print '">'.$nodo->taxonomy[$area]->name.'</a></span> | <span class="upper">';
							print $nodo->name.'</span></h2>';
							print '<p class="line">'; 
							 print '<span class="grey">Sector:</span> <a href="/sector/';
							 print $nodo->taxonomy[$sector]->tid;
							 print '">'.$nodo->taxonomy[$sector]->name.'</a> | <a href="/provincia/';
							 print $nodo->taxonomy[$localidad]->tid;
							 print '">'.$nodo->taxonomy[$localidad]->name.'</a><br />'; 
							 print '</p>';
							// texto hasta 215 caracteres
							print '<p>';
							if (strlen($nodo->teaser) > 215){
							  print substr($nodo->teaser,0,215).'...';
							 }else{
							  print substr($nodo->teaser,0,215);
							 }
							print '</p>';
							print '<p>';
							// ver oferta de trabajo
							 $attributes = array( 'class' => 'right' );
                             print l("Ver oferta de trabajo", 'node/'.$nodo->nid, $attributes);
							//print '<p><a class="orange right" href="/node/';
							// print $nodo->nid;
							// print '">&gt;&gt;Ver oferta de trabajo</a></p>';
							print '</p>';
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
						    print '<h2>';
							$attributes = array( 'class' => 'orange' );
							print l($nodo->title, 'node/'.$nodo->nid);
							print '</h2>';
							print '<h2><strong><a href="/rubro/';
							print $nodo->taxonomy[$area]->tid;
							print '">'.$nodo->taxonomy[$area]->name.'</a></strong> | <span class="upper">';
							print $nodo->name.'</span></h2>';
							// ver oferta de trabajo
							$attributes = array( 'class' => 'orange right' );
                            print '<p>';
							print l("Ver oferta de trabajo", 'node/'.$nodo->nid, $attributes);
							print '</p>';
							//print '<p><a class="orange right" href="/node/';
							// print $nodo->nid;
							// print '">&gt;&gt;Ver oferta de trabajo</a></p>';
							// fecha de creacion
							print '<p class="grey">Fecha de publicaci&oacute;n: ';
							 print date('d-m-Y',$nodo->created);
							 print '</p>';
						  print '</div>';
						  print '</div>';
						print '</div>';						  
						//print '<!-- fin free -->';
		          		}
				 //print '[[[['.$ren.']]]]]]';		
				 if ((($banners_per_page == 1) and ($ren==5)) or 
				     (($banners_per_page == 2) and (($ren == 3) or ($ren==7))) or
					 (($banners_per_page == 3) and (($ren == 2) or ($ren==5) or ($ren==8))) or
					 (($banners_per_page == 4) and (($ren == 2) or ($ren==4) or ($ren==6) or ($ren==8))) 	 
					 ){ 
					    //print '<div style="float:left; background:#666; heigh:50px width:660px;">---</div>';
 	 				    print '<div class="content_banners" >';
						print '<div class="banner resultado" >';
						$conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 				'css_class' => '', 'name' => 'banner_resultado_busqueda',);
						$columna= panels_mini_content($conf, $panel_args, $contexts);
						print ($columna->content); 	
						print '</div>'; 
						print '</div>';

				 }		
				 
				}
                 // aca cierro el div del tipo de aviso
		         print '</div>';
				 
       			 //if ($otro==1) { print '</div><!-- fin todo -->'; $otro=0;} 
                 
        	} else {
        		print '<div><p>No se encontraron resultados de acuerdo a su criterio de b&uacute;squeda.</p><p>Por favor intente con otro criterio.</p></div>';
        	}
		print '<div style="float: right;">'.theme('pager', NULL, $nodes_per_page).'</div>';
		print '<div class="clr">&nbsp;</div>';	
        ?>
