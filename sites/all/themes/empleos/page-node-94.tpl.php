<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
	<div style="padding:10px;">
<?php
global $user;
global $user_profile;
  		if ($user->uid){
  			
  			// poner el logo en el encabezado 
  			
  			$usuario = user_load(array('uid' => $user->uid));
  			
  			//print '<pre>';
  			//print_r($usuario);
  			//print '</pre>';

  			Print '&nbsp;<br>&nbsp;<br><h3><a href="/user/me/edit/Empleado">Datos Personales</a></h3><br>';
  			
  			print 'Apellido: '.$usuario->profile_empl_apellido.'<br>';
  			print 'Nombre  : '.$usuario->profile_empl_nombre  .'<br>';
  			print 'Sexo    : '.$usuario->profile_empl_sexo    .'<br>';
  			print 'Fecha de Nacimiento: '.$usuario->profile_empl_fecha_nacimiento['day'].'/'.$usuario->profile_empl_fecha_nacimiento['month'].'/'.$usuario->profile_empl_fecha_nacimiento['year'].'<br>';
  			print 'Estado Civil: '.$usuario->profile_empl_estado_civil.'<br>';
  			
  			print '&nbsp;<br>';
  			
  			print 'Tipo de Documento: '.$usuario->profile_tipo_doc.'<br>';
  			print 'N&uacute;mero de Documento: '.$usuario->profile_empl_num_doc.'<br>';
  			print 'Direci&oacute;n: '.$usuario->profile_empl_calle.' '.$usuario->profile_empl_dir_numero.', '.$usuario->profile_empl_dir_piso.' '.$usuario->profile_empl_dir_dpto.'<br>';
  			print 'C&oacute;digo Postal: '.$usuario->profile_empl_cp.'<br>';
  			print 'Provincia: '.$usuario->profile_empl_provincia.'<br>';
  			print 'Telefono: '.$usuario->profile_empl_telefono.'<br>';
  			print 'Telefono Alternativo: '.$usuario->profile_empl_tel_alternativo.'<br>';
  			
 
  			
  			
  			
  			
  			// Educacion --------------------------------------------------------------------------------------------
  			$view = views_get_view('mis_educacion');
			$vista = views_build_view('items', $view, false, false);
			Print '&nbsp;<br>&nbsp;<br><h3><a href="//node/add/p-educacion">Educacion</a></h3><br>';
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
			} else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';  } ?>
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
			Print '&nbsp;<br>&nbsp;<br><h3><a href="//node/add/p-cursos">Cursos</a></h3><br>';
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
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
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
			Print '&nbsp;<br>&nbsp;<br><h3><a href="//node/add/p-idiomas">idiomas</a></h3><br>';
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
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
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
			Print '&nbsp;<br>&nbsp;<br><h3><a href="//node/add/p-informatica">Informatica</a></h3><br>';
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
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
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
			Print '&nbsp;<br>&nbsp;<br><h3><a href="//node/add/p-otros-conocimientos">Otros Conocimientos</a></h3><br>';
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
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
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
			Print '&nbsp;<br>&nbsp;<br><h3><a href="//node/add/p-experiencia-laboral">Experiencia Laboral</a></h3><br>';
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
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';  } ?> 
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
			Print '&nbsp;<br>&nbsp;<br><h3><a href="//node/add/p-referencia">Referencia Laboral</a></h3><br>';
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
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->field_empresa_0[0]['value'].'</A></TD>';  } ?>
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
  		}  
  		
  		// poner un pie de pagina... algo asi como ...este CV fue generado automaticamente con el portal 
  		// .... bla bla bla
  		?>				
			<br>&nbsp;<br>&nbsp;<br>&nbsp;
			
		<div>	
	</body>
</html>