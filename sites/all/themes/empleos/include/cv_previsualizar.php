<?php
global $user;
global $user_profile;
        // Previsualizar --------------------------------------------------------------------------------------------
  		if ($user->uid){
  			?>
  			<div class="share">
  				<img src="/sites/all/themes/empleos/img/icoImprimir.png" width="16" height="16" border=0 alt="Imprimir" style="margin-right:7px;"> 
  				<a href="/?q=cv_print/me" target="_blanc">Imprimir</a>&nbsp;&nbsp; 
  				<img src="/sites/all/themes/empleos/img/icoRecomendar.png" width="16" height="16" border=0 alt="Recomendar este aviso" style="margin-right:7px;"> 
  				<a href="#">Enviar a un amigo</a>
  			</div>
  			<?php
  		  	if(arg(0) == "user"){
  				$usuario = user_load(array('uid' => arg(1)));	
  			}else{
  				$usuario = user_load(array('uid' => $user->uid));
  			}
  		  	if(arg(1) != $user->uid){
				$link = "#";
			}else{
				$link = "/?q=/user/me/edit/Empleado";
			}
  			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="'.$link.'">Datos Personales</a></div>';
  			
  			//print '<pre>';
  			//print_r($usuario);
  			//print '</pre>';

  			print '<div class="resumen prev" style="position:relative">';
            print ' <p class="date">15-03-2010</p>';
            print ' <div class="foto">';
			if ($usuario->picture) {
				print theme('imagecache','avatar_120_120',$usuario->picture,$usuario->picture,$usuario->name);
			} else {
				print theme('imagecache','avatar_120_120',"/sites/all/themes/empleos/img/foto.jpg","/sites/all/themes/empleos/img/foto.jpg",$usuario->name);
			}
            print '</div>';
            print '<ul class="resumen">';
            print ' <li class="stg"><span class="blue">Apellido: </span>'.$usuario->profile_empl_apellido.'</li>';
            print ' <li><span class="blue">Nombre: </span>'.$usuario->profile_empl_nombre.'</li>';
            print ' <li><span class="blue">Sexo: </span>'.$usuario->profile_empl_sexo.'</li>';
            print ' <li><span class="blue">Fecha de Nacimiento: </span>'.$usuario->profile_empl_fecha_nacimiento['day'].'/'.$usuario->profile_empl_fecha_nacimiento['month'].'/'.$usuario->profile_empl_fecha_nacimiento['year'].'</li>';
            print ' <li><span class="blue">Estado Civil: </span>'.$usuario->profile_empl_estado_civil.'</li>';
            print '&nbsp;<br />';
            print ' <li><span class="blue">Tipo de Documento: </span> '.$usuario->profile_tipo_doc.'</li>';
            print ' <li><span class="blue">N&uacute;mero de Documento: </span>'.$usuario->profile_empl_num_doc.'</li>';
            print ' <li><span class="blue">Direci&oacute;n: </span>'.$usuario->profile_empl_calle.' '.$usuario->profile_empl_dir_numero.', '.$usuario->profile_empl_dir_piso.' '.$usuario->profile_empl_dir_dpto.'</li>';
            print ' <li><span class="blue">C&oacute;digo Postal: </span>'.$usuario->profile_empl_cp.'</li>';
            print '&nbsp;<br />';
            print ' <li><span class="blue">Provincia: </span>'.$usuario->profile_empl_provincia.'</li>';
            print ' <li><span class="blue">Telelefo: </span>';
			
			//=======
			print '<img src="/sites/all/themes/empleos/img/ico_tel.gif" width="13" height="10" alt="Ver tel&eacute;fono" style="margin:0px 2px 0px 5px;" /><span id="tel"><a rel="nofollow" id="ver_tel" href="javascript:;" style="font-weight:bold;">Ver tel&eacute;fono</a></span>'; 
			print '<script type="text/javascript">';
			print '$(document).ready(function () {';
			print '$("#ver_tel").click(function(){';
			print '$("#tel").text("'.$usuario->profile_empl_telefono.'");';
			print '$.get("/empleos/stat/cv_tel_pri/'.$usuario->uid.'/'.$user->uid.'", function(x) { });';
			//print '$.get("/empleos/stat/ver_tel_pri/'.$usuario->uid.'/'.$user->uid.'", function(x) {alert(x); });';
			print '});';
			print '});';
			print '</script>';
            print '</li>';
			//======
            print ' <li><span class="blue">Telefono Alternativo: </span>';
			print '<img src="/sites/all/themes/empleos/img/ico_tel.gif" width="13" height="10" alt="Ver tel&eacute;fono" style="margin:0px 2px 0px 5px;" /><span id="tel2"><a rel="nofollow" id="ver_tel2" href="javascript:;" style="font-weight:bold;">Ver tel&eacute;fono</a></span>'; 
			print '<script type="text/javascript">';
			print '$(document).ready(function () {';
			print '$("#ver_tel2").click(function(){';
			print '$("#tel2").text("'.$usuario->profile_empl_tel_alternativo.'");';
			print '$.get("/empleos/stat/cv_tel_alt/'.$usuario->uid.'/'.$user->uid.'", function(x) { });';
			print '});';
			print '});';
			print '</script>';
            print '</li>';		
			//=======
			print ' <li><span class="blue">E-mail: </span>';
			print '<img src="/sites/all/themes/empleos/img/ico_mail.gif" width="13" height="10" alt="Ver email" style="margin:0px 2px 0px 5px;" /><span id="mail"><a rel="nofollow" id="ver_mail" href="javascript:;" style="font-weight:bold;">Ver email</a></span>'; 
			print '<script type="text/javascript">';
			print '$(document).ready(function () {';
			print '$("#ver_mail").click(function(){';
			print '$("#mail").text("'.$usuario->mail.'");';
			print '$.get("/empleos/stat/cv_mail/'.$usuario->uid.'/'.$user->uid.'", function(x) { });';
			print '});';
			print '});';
			print '</script>';
            print '</li>';			
            print ' </ul>';
            print ' </div>';
 			
  			
  			// Educacion --------------------------------------------------------------------------------------------
			if(arg(0) == "user"){
				$link = "#";
				$argu = array("uid"=>arg(1));
			}else{
				$link = "/?q=/node/add/p-educacion";
				$argu = array("0"=>$user->uid);
			}
  			$view = views_get_view('mis_educacion');
			$vista = views_build_view('items', $view, $argu, false);
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="'.$link.'">Educacion</a></div>';
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
			<?php 
				if ($node->nid == $row->nid or arg(0) == "user"){ 
					print '<TD>'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</TD>';
				}else{
					print '<TD><A href="/?q=node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';	
				}
			?>	
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
  			if(arg(0) == "user"){
				$link = "#";
			}else{
				$link = "/?q=/node/add/p-cursos";
			}
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="'.$link.'">Cursos</a></h3</div>';
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
				          <?php 
							if ($node->nid == $row->nid or arg(0) == "user"){
				          		print '<TD>'.$row->title.'</TD>';
							}else{ 
								print '<TD><A href="/?q=node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  
							} ?> 
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
  		  	if(arg(0) == "user"){
				$link = "#";
			}else{
				$link = "/?q=/node/add/p-idiomas";
			}
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="'.$link.'">Idiomas</a></div>';
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
				          <?php if ($node->nid == $row->nid or arg(0) == "user"){ print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="/?q=node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
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
  		  	if(arg(0) == "user"){
				$link = "#";
			}else{
				$link = "/?q=/node/add/p-informatica";
			}
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="'.$link.'">Informatica</a></div>';
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
				          <?php if ($node->nid == $row->nid or arg(0) == "user"){ print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="/?q=node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
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
  		  	if(arg(0) == "user"){
				$link = "#";
			}else{
				$link = "/?q=/node/add/p-otros-conocimientos";
			}
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="'.$link.'">Otros Conocimientos</a></div>';
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
				          <?php if ($node->nid == $row->nid or arg(0) == "user"){ print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="/?q=node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
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
  		  	if(arg(0) == "user"){
				$link = "#";
			}else{
				$link = "/?q=/node/add/p-experiencia-laboral";
			}
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="'.$link.'">Experiencia Laboral</a></div>';
			
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
				          <?php if ($node->nid == $row->nid or arg(0) == "user"){ print '<TD>'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</TD>';
			                   } else { print '<TD><A href="/?q=node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';  } ?> 
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
  		  	if(arg(0) == "user"){
				$link = "#";
			}else{
				$link = "/?q=/node/add/p-referencia";
			}
			Print '<div class="itemTitle" style="padding-left:10px; clear:both"><a class="orange" href="'.$link.'">Referencia Laboral</a></div>';
			
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
				          <?php if ($node->nid == $row->nid or arg(0) == "user"){ print '<TD>'.$row->field_empresa_0[0]['value'].'</TD>';
			                   } else { print '<TD><A href="/?q=node/'.$row->nid.'/edit" title="editar">'.$row->field_empresa_0[0]['value'].'</A></TD>';  } ?>
				          <TD><?php print $row->field_titulo_o_cargo[0]['value'];?></TD> 				          
				          <TD><?php print $row->title;?></TD>
				          <TD><?php print $row->field_telefono[0]['value'];?></TD> 
				          <TD><?php print $row->field_email[0]['email'];?></TD>
				        </TR> 
				<?php
				
			}
			// Fin Referencias Laborales ------------------------------------------------------------------------------------
			?></TBODY></TABLE>
			
			
			<?php				
  		}  
		    // genero estadisticas en ajax
			print '<script type="text/javascript">';
			print '$(document).ready( function(){';
			print '$.get("/empleos/stat/cv/'.$usuario->uid.'/'.$user->uid.'", function(x) { });';
			print '});</script>';
		?>				
			<br />&nbsp;<br />&nbsp;<br />&nbsp;
            