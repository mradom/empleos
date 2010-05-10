<?php 
global $user;
global $user_profile;

print '<div  class="content_grl content-profile">';
				if (in_array('empresa', array_values($user->roles))) {
				  	 if ($user->uid) { 
 						print '<div class="right"><a href="/user/me/edit"><img title="Cambiar logo" src="/'.$user->picture.'"></a></div>';
						//print '<div style="border: 1px solid #ccc ;">';
			  	 	 	print 'Empresa<br>';
			  	 	 	//print '<a href="/job/applications">Mis Aplicaciones</a><br>';
			  	 	 	print '<br>&nbsp;<br>&nbsp;<br>&nbsp;';		  	 	 	
			  	 	    //print '</div>';
						$busco='empresa';
						print'<div class="clr"></div>';
			  		 }
			  	 } else {
			  	 	 if ($user->uid) { 
			  	 	 	//print '<div style="border: 1px solid #ccc ;">';
						print '<div class="right"><a href="/user/me/edit"><img  title="Cambiar im&aacute;gen" src="/'.$user->picture.'"></a></div>';
						print 'Persona<br>';
			  	 	 	print 'Bienvenido '.$fields['Empleado']['profile_empl_apellido']['value'].', '.$fields['Empleado']['profile_empl_nombre']['value'].'<br>';
			  	 	 	//print '<a href="/job/applications">Mis Aplicaciones</a><br>';	  	 	 	
			  	 	    //print '</div>';
			  	 	    print '<br>&nbsp;<br>&nbsp;<br>&nbsp;';
						$busco='empleado';
						print'<div class="clr"></div>';
			  		 } 
			  	 }
				 
				// Postulaciones =================
				print '<div class="rigth-side-profile">';
				if (!in_array('empresa', array_values($user->roles))) {
					$sql_base   = "SELECT * FROM job AS j INNER JOIN node AS n ON n.nid = j.nid ";
					$inner_join = "";
	
					$where = "WHERE j.uid = '".$user->uid."' AND j.status=1";
					$where = $where . " ORDER BY j.timestamp DESC LIMIT 10 ";
					
					$sql = $sql_base.$inner_join.$where;
					//print '['.$sql.']';
					$rs = db_query($sql);
					
					print '<div>';
					print '<div class="nav"><h2>Postulaciones:</h2></div>';
					print '<table class="tablaGris" border="0" cellpadding="0" cellspacing="1"> ';
				    print '<tbody><tr>';
				          print '<td class="techo" width="70%">Aviso</TD>';
				          print '<td class="techo" width="20%">Fecha</TD>';
				          print '<td class="techo" width="10%">&nbsp;</TD>'; 
				    print '</tr>'; 
					while($fila = mysql_fetch_object($rs)){
						$nodo = node_load($fila->nid);
						print '<tr>';
						print '<td><a href="/node/'.$nodo->nid.'" target="_top" title="'.$nodo->title.'">';
						print $nodo->title.'</td>';
						print '<td>'.date('d-m-Y', $fila->timestamp).'</td>';
						print '<td><a href="/job/clear/'.$nodo->nid.'/'.$user->uid.'&destination=/user/me" title="Borrar">Borrar</a></td>';
						print '</tr>';
					}
					print  '</tbody></table>';
					print '</div>';			 
				}
				 
				 print '</br>&nbsp;</br>';

				 
				 // Favoritos =================
				
				if (!in_array('empresa', array_values($user->roles))) {
					$sql_base   = "SELECT * FROM favorite_nodes AS fn INNER JOIN node AS n ON n.nid = fn.nid ";
					$inner_join = "";
	
					$where = "WHERE fn.uid = '".$user->uid."'";
					$where = $where . " ORDER BY fn.last DESC LIMIT 10 ";
					
					$sql = $sql_base.$inner_join.$where;
					//print '['.$sql.']';
					$rs = db_query($sql);
					
					print '<div>';
					print '<div class="nav"><h2>Favoritos:</h2></div>';
					print '<table class="tablaGris" border="0" cellpadding="0" cellspacing="1">';
				    print '<tbody><tr>';
				          print '<td class="techo" width="60%">Aviso</td>';
				          print '<td class="techo" width="20%">Fecha</td>';
				          print '<td class="techo" width="20%">&nbsp;</td>'; 
				    print '</tr>'; 
					while($fila = mysql_fetch_object($rs)){
						$nodo = node_load($fila->nid);
						//print '<pre>';
						//print_r($nota);					
						//print '<pre>';					
						print '<tr>';
						print '<td><a href="/node/'.$nodo->nid.'" target="_top" title="'.$nodo->title.'">';
						print $nodo->title.'</td>';
						print '<td>'.date('d-m-Y',$fila->last).'</td>';
						print '<td><a href="/favorite_nodes/delete/'.$nodo->nid.'" title="Borrar">Borrar</a></td>';
						print '</tr>';
					}
					print '</tbody></table>';
					print '</div>';	
		 
				}

				if (in_array('empresa', array_values($user->roles))) {
					$sql_base   = "SELECT * FROM job AS j INNER JOIN node AS n ON n.nid = j.nid ";
					$inner_join = "";
	
					$where = "WHERE j.uid = '".$user->uid."' AND j.status=1";
					$where = $where . " ORDER BY j.timestamp DESC LIMIT 10 ";
					
					$sql = $sql_base.$inner_join.$where;
					//print '['.$sql.']';
					$rs = db_query($sql);
					
					print '<div>';
					print '<div class="nav"><h2>Postulantes:</h2></div>';
					print '<table class="tablaGris" border="0" cellpadding="0" cellspacing="1"> ';
				    print '<tbody><tr>';
				          print '<td class="techo" width="70%">Aviso</TD>';
				          print '<td class="techo" width="20%">Fecha</TD>';
				          print '<td class="techo" width="10%">&nbsp;</TD>'; 
				    print '</tr>'; 
					while($fila = mysql_fetch_object($rs)){
						$nodo = node_load($fila->nid);
						print '<tr>';
						print '<td><a href="/node/'.$nodo->nid.'" target="_top" title="'.$nodo->title.'">';
						print $nodo->title.'</td>';
						print '<td>'.date('d-m-Y', $fila->timestamp).'</td>';
						print '<td><a href="/job/clear/'.$nodo->nid.'/'.$user->uid.'&destination=/user/me" title="Borrar">Borrar</a></td>';
						print '</tr>';
					}
					print  '</tbody></table>';
					print '</div>';			 
				}
				 
				 print '</br>&nbsp;</br>';


				// cierro el rigth-side-profile ============
				print '</div>';
				
				// Novedades =================
				print'<div class="left-side-profile">';
				 
				$nov_nota=0;
			    $sql_base   = "SELECT * FROM node_revisions AS nr INNER JOIN node AS n ON n.nid = nr.nid ";
				$inner_join = "INNER JOIN content_type_novedades AS w ON w.nid = n.nid ";

				$where = "WHERE n.type = 'novedades' AND field_tipo_0_value = '".$busco."' AND n.status = 1 ";
				$where = $where . " ORDER BY w.field_fecha_0_value DESC, w.field_orden_0_value DESC LIMIT 10 ";
				
				$sql = $sql_base.$inner_join.$where;
				//print '['.$sql.']';
				$rs = db_query($sql);
				 
		       print '<div class="noticias">';
				print '<div class="nav"><h2>Novedades:</h2></div>';
				while($fila = mysql_fetch_object($rs)){
					$nota = node_load($fila->nid);
					//print '<pre>';
					//print_r($nota);					
					//print '<pre>';					
					print '<div class="note">';      
					print '<a href="/novedades/'.$busco.'/'.$nota->nid.'" target="_top" title="'.$nota->title.'">';
					print '<div class="date">'.date("d-m-Y",strtotime(substr($nota->field_fecha_0[0]['value'],0,10))).'</div>';
					
					print '<div class="phot">';
					print '<img src="/'.$nota->field_foto_0[0]['filepath'].'">';
					print '</div>';
					print '<div class="title">'.$nota->title.'</div>';
                    print '<div class="body-note">'.$nota->field_resumen_0[0]['value'].'</div>';
                    print '</a>';
					print '<div class="clr"></div>';
					print '</div>';
					$nov_nota+= 1;
				}
				print '</div>';	
				
			
	print '</div>';
	print '<div class="clr"></div>';
?>