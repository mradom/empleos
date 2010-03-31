<?php
global $user;
global $user_profile;
        // Previsualizar --------------------------------------------------------------------------------------------
  		if ($user->uid){
  			Print '<div class="share"><img src="sites/all/themes/empleos/img/icoImprimir.png" width="16" height="16" border=0 alt="Imprimir" style="margin-right:7px;"> <a href="?q=cv_print/me" target="_blanc">Imprimir</a>&nbsp;&nbsp; <img src="sites/all/themes/empleos/img/icoRecomendar.png" width="16" height="16" border=0 alt="Recomendar este aviso" style="margin-right:7px;"> <a href="#">Enviar a un amigo</a>
      </div>';
  			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="?q=/user/me/edit/Empleado">Datos Personales</a></div>';
  			$usuario = user_load(array('uid' => $user->uid));
  			
  			//print '<pre>';
  			//print_r($usuario);
  			//print '</pre>';

  			print '<div class="resumen prev" style="position:relative">';
            print ' <p class="date">15-03-2010</p>';
            print ' <div class="foto"></div>';
            print '<ul class="resumen">';
            print ' <li class="stg"><span class="blue">Apellido: </span>'.$usuario->profile_empl_apellido.'</li>';
            print ' <li><span class="blue">Nombre: </span>'.$usuario->profile_empl_nombre  .'</li>';
            print ' <li><span class="blue">Sexo: </span>'.$usuario->profile_empl_sexo    .'</li>';
            print ' <li><span class="blue">Fecha de Nacimiento: </span>'.$usuario->profile_empl_fecha_nacimiento['day'].'/'.$usuario->profile_empl_fecha_nacimiento['month'].'/'.$usuario->profile_empl_fecha_nacimiento['year'].'</li>';
            print ' <li><span class="blue">Estado Civil: </span>'.$usuario->profile_empl_estado_civil.'</li>';
            print '&nbsp;<br>';
            print ' <li><span class="blue">Tipo de Documento: </span> '.$usuario->profile_tipo_doc.'</li>';
            print ' <li><span class="blue">N&uacute;mero de Documento: </span>'.$usuario->profile_empl_num_doc.'</li>';
            print ' <li><span class="blue">Direci&oacute;n: </span>'.$usuario->profile_empl_calle.' '.$usuario->profile_empl_dir_numero.', '.$usuario->profile_empl_dir_piso.' '.$usuario->profile_empl_dir_dpto.'</li>';
            print ' <li><span class="blue">C&oacute;digo Postal: </span>'.$usuario->profile_empl_cp.'</li>';
            print '&nbsp;<br>';
            print ' <li><span class="blue">Provincia: </span>'.$usuario->profile_empl_provincia.'</li>';
            print ' <li><span class="blue">Telelefo: </span> '.$usuario->profile_empl_telefono.'</li>';
            print ' <li><span class="blue">Telefono Alternativo: </span>'.$usuario->profile_empl_tel_alternativo.'</li>';
            print ' </ul>';
            print ' </div>';
 			
  			
  			// Educacion --------------------------------------------------------------------------------------------
  			$view = views_get_view('mis_educacion');
			$vista = views_build_view('items', $view, false, false);
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="?q=/node/add/p-educacion">Educacion</a></div>';
			?>
			<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1">
				<TBODY>
			<TR>
				<TD class="techo" width="16%">Per&iacute;odo</TD>
				<TD class="techo" width="16%">Instituto</TD> 
				<TD class="techo" width="18%">Carrera</TD>
				<TD class="techo" width="18%">Nivel</TD>
				<TD class="techo" width="22%">Estado</TD>
				<TD class="techo" width="10%">&nbsp;</TD>
			</TR>
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
				$instituto = "";
				foreach($row->taxonomy as $taxo){
					if($taxo->vid == "6"){
						$instituto = $taxo->name;
						break;
					}
				}
				$nivel = "";
				foreach($row->taxonomy as $taxo){
					if($taxo->vid == "3"){
						$nivel = $taxo->name;
						break;
					}
				}
				$estado = "";
				foreach($row->taxonomy as $taxo){
					if($taxo->vid == "4"){
						$estado = $taxo->name;
						break;
					}
				}
				$m_ini = "";
				foreach($row->taxonomy as $taxo){
					if($taxo->vid == "7"){	$m_ini = $taxo->name; break;}
				}
				$m_fin = "";
				foreach($row->taxonomy as $taxo){
					if($taxo->vid == "8"){	$m_fin = $taxo->name; break;}
				}
				$a_ini = "";
				foreach($row->taxonomy as $taxo){
					if($taxo->vid == "9"){	$a_ini = $taxo->name; break;}
				}
				$a_fin = "";
				foreach($row->taxonomy as $taxo){
					if($taxo->vid == "10"){	$a_fin = $taxo->name; break;}
				}
	
				?>
			<TR>
			<?php if ($node->nid == $row->nid) { print '<TD>'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</TD>';
			} else { print '<TD><A href="?q=node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';  } ?>
				<TD><?php print $instituto;?></TD>
				<TD><?php print $row->field_ttulo_o_certificacin[0]["value"];?></TD>
				<TD><?php print $nivel;?></TD>
				<TD><?php print $estado;?></TD>
				<TD></TD>
			</TR>
			<?php
	
			}
			?></TBODY></TABLE> <?php 
  			// Cursos --------------------------------------------------------------------------------------------
			$view = views_get_view('mis_cursos');
			$vista = views_build_view('items', $view, false, false);
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="?q=/node/add/p-cursos">Cursos</a></h3</div>';
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="20%">Curso</TD> 
				          <TD class="techo" width="20%">Rol</TD> 
				          <TD class="techo" width="20%">Lugar</TD>
				          <TD class="techo" width="20%">Ubicaci&oacute;n</TD> 				           
				          <TD class="techo" width="8%">Fecha</TD> 
				          <TD class="techo" width="8%">Hasta</TD> 
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
				?>
				        <TR> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="?q=node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
				          <TD><?php print $row->field_en_calidad_de[0]['value'];?></TD>
				          <TD><?php print $row->field_lugar[0]['value'];?></TD>
				          <TD><?php print $row->field_ubicacion[0]['value'];?></TD>				          
				          <TD><?php print format_date(strtotime($row->field_desde[0]['value']),'custom','d/m/Y');?></TD> 
				          <TD><?php print format_date(strtotime($row->field_hasta[0]['value']),'custom','d/m/Y');?></TD>
				        </TR> 
				<?php
				
			}
			?> </TBODY></TABLE><?php 	
			// Idiomas ------------------------------------------------------------------------------------------
			$view = views_get_view('mis_idiomas');
			$vista = views_build_view('items', $view, false, false);
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="?q=/node/add/p-idiomas">Idiomas</a></div>';
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="20%"></TD> 
				          <TD class="techo" width="16%">Idioma</TD> 
				          <TD class="techo" width="16%">Nivel Oral</TD> 
				          <TD class="techo" width="16%">Nivel Escrito</TD> 
				          <TD class="techo" width="16%">Nivel de Lectura</TD> 
				          <TD class="techo" width="18%">&Uacute;ltima Vez&nbsp;</TD> 
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
					$idioma = "";
					foreach($row->taxonomy as $taxo){
						if($taxo->vid == "2"){
							$idioma = $taxo->name;
							break;
						}
					}
				?>
				        <TR> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="?q=node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
				          <TD><?php print $idioma;?></TD>
				          <TD><?php print $row->field_nivel_oral[0]['value'];?></TD> 
				          <TD><?php print $row->field_nivel_escrito[0]['value'];?></TD> 
				          <TD><?php print $row->field_nivel_de_lectura[0]['value'];?></TD>
				          <TD><?php print $row->field_ltima_vez_aplicado[0]['value'];?></TD>
				        </TR> 
				<?php
				
			}
			// Fin Idiomas ------------------------------------------------------------------------------------
			?></TBODY></TABLE><?php 
			// Informatica ------------------------------------------------------------------------------------------
			$view = views_get_view('mis_informatica');
			$vista = views_build_view('items', $view, false, false);
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="?q=/node/add/p-informatica">Informatica</a></div>';
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="40%">Programa</TD> 
				          <TD class="techo" width="20%">Tipo</TD>
				          <TD class="techo" width="16%">Nivel</TD>  
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
					$tipo = "";
					foreach($row->taxonomy as $taxo){
						if($taxo->vid == "14"){
							$tipo = $taxo->name;
							break;
						}
					}	
				?>
				        <TR> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="?q=node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
				    	  <TD><?php print $tipo;?></TD> 
				    	  <TD><?php print $row->field_nivel[0]['value'];?></TD>
				        </TR> 
				<?php
				
			}
			// Fin Informatica ------------------------------------------------------------------------------------
			?></TBODY></TABLE> <?php 
			// Otros Conocimientos ------------------------------------------------------------------------------------------			
			$view = views_get_view('mis_otros_conocimientos');
			$vista = views_build_view('items', $view, false, false);
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="?q=/node/add/p-otros-conocimientos">Otros Conocimientos</a></div>';
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="25%"></TD>
				          <TD class="techo" width="25%">Nombre</TD> 
				          <TD class="techo" width="50%">Descripcion</TD> 
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
				?>
				        <TR> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="?q=node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
				    	  <TD><?php print $row->field_nombre[0]['value'];?></TD> 
				    	  <TD><?php print $row->field_descripcion[0]['value'];?></TD>
				        </TR> 
				<?php
				
			}
			// Fin Otros Conocimientos ------------------------------------------------------------------------------------
			?></TBODY></TABLE><?php 
			// Experiencia Laboral ------------------------------------------------------------------------------------------
			$view = views_get_view('mis_experiencia_laboral');
			$vista = views_build_view('items', $view, false, false);
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="?q=/node/add/p-experiencia-laboral">Experiencia Laboral</a></div>';
			
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="20%">Fecha</TD> 
				          <TD class="techo" width="18%"></TD>
				          <TD class="techo" width="16%">Empresa</TD> 
				          <TD class="techo" width="16%">Area</TD> 
				          <TD class="techo" width="16%">Jerarquia</TD> 
				          <TD class="techo" width="16%">Puesto</TD>  
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
					$m_ini = "";
					foreach($row->taxonomy as $taxo){
						if($taxo->vid == "7"){	$m_ini = $taxo->name; break;}
					}
			        $m_fin = "";
					foreach($row->taxonomy as $taxo){
						if($taxo->vid == "8"){	$m_fin = $taxo->name; break;}
					}
			        $a_ini = "";
					foreach($row->taxonomy as $taxo){
						if($taxo->vid == "9"){	$a_ini = $taxo->name; break;}
					}
			        $a_fin = "";
					foreach($row->taxonomy as $taxo){
						if($taxo->vid == "10"){	$a_fin = $taxo->name; break;}
					}
			        $area = "";
					foreach($row->taxonomy as $taxo){
						if($taxo->vid == "1"){	$area = $taxo->name; break;}
					}
			        $jerarquia = "";
					foreach($row->taxonomy as $taxo){
						if($taxo->vid == "12"){	$jerarquia = $taxo->name; break;}
					}
				?>
				        <TR> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</TD>';
			                   } else { print '<TD><A href="?q=node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';  } ?> 
				          <TD><?php print $row->title;?></TD>
				          <TD><?php print $row->field_empresa[0]['value'];?></TD>				          
				          <TD><?php print $area;?></TD> 
				          <TD><?php print $jerarquia;?></TD> 
				          <TD><?php print $row->field_nombre_del_puesto[0]['value'];?></TD>
				        </TR> 
				<?php
				
			}
			// Fin Experiencias Laborales ------------------------------------------------------------------------------------
			?></TBODY></TABLE><?php 
			// Referencia Laboral ------------------------------------------------------------------------------------------			
			$view = views_get_view('mis_referencia_laboral');
			$vista = views_build_view('items', $view, false, false);
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="?q=/node/add/p-referencia">Referencia Laboral</a></div>';
			
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="20%">Empresa</TD>
				          <TD class="techo" width="24%">T&iacute;tulo/Cargo</TD> 				          
				          <TD class="techo" width="20%">Nompre</TD>
				          <TD class="techo" width="16%">Tel&eacute;fono</TD>
				          <TD class="techo" width="20%">Email</TD>  
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
				?>
				        <TR> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->field_empresa_0[0]['value'].'</TD>';
			                   } else { print '<TD><A href="?q=node/'.$row->nid.'/edit" title="editar">'.$row->field_empresa_0[0]['value'].'</A></TD>';  } ?>
				          <TD><?php print $row->field_titulo_o_cargo[0]['value'];?></TD> 				          
				          <TD><?php print $node->title;?></TD>
				          <TD><?php print $row->field_telefono[0]['value'];?></TD> 
				          <TD><?php print $row->field_email[0]['email'];?></TD>
				        </TR> 
				<?php
				
			}
			// Fin Referencias Laborales ------------------------------------------------------------------------------------
			?></TBODY></TABLE>
			
			
			<?php				
  		}  ?>				
			<br>&nbsp;<br>&nbsp;<br>&nbsp;