    <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top3.jpg)">
      <p> El paso n&uacute;mero 3 habilita a ingresar aquellas <strong>instancias de formaci&oacute;n</strong> que hayas realizado y que no formen parte de los planes de estudio est&aacute;ndar de los niveles secundarios, terciarios o universitarios.<br />
 Esta parte del formulario te permitir&aacute; describir tanto el nombre del curso, seminario, taller, etc., como tambi&eacute;n del rol que ocupaste en el mismo: docente, asistente, expositor, organizador, etc.<br />
Los &iacute;tems destacados con asterisco <span class="stg orange">(*)</span> son obligatorios.<br />
Si no ten&eacute;s cursos o seminarios para ingresar en los campos, deja el formulario en blanco y continu&aacute; con el siguiente paso.
      </p>
      <div><img style=" padding-left:100px;" src="/sites/all/themes/empleos/img/10pasos.png"></div>
      <div><img style=" padding-left:150px " src="/sites/all/themes/empleos/img/3paso.png"></div>
    </div>

    <!-- submenu --> 
	<?php include("submenu-usuarios.php");?> 
     <!-- tabla --> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mis_cursos');
			$vista = views_build_view('items', $view, false, false);
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="20%">Curso</TD> 
				          <TD class="techo" width="20%">Rol</TD> 
				          <TD class="techo" width="20%">Lugar</TD>
				          <TD class="techo" width="16%">Ubicaci&oacute;n</TD> 				           
				          <TD class="techo" width="8%">Fecha</TD> 
				          <TD class="techo" width="8%">Hasta</TD> 
				          <TD class="techo" width="7%">&nbsp;</TD>
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));

				?>
				        <TR class="<?php if ($node->nid == $row->nid) print arg(2);?>"> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
				          <TD><?php print $row->field_en_calidad_de[0]['value'];?></TD>
				          <TD><?php print $row->field_lugar[0]['value'];?></TD>
				          <TD><?php print $row->field_ubicacion[0]['value'];?></TD>				          
				          <TD><?php print format_date(strtotime($row->field_desde[0]['value']),'custom','d/m/Y');?></TD> 
				          <TD><?php print format_date(strtotime($row->field_hasta[0]['value']),'custom','d/m/Y');?></TD>
				          <TD><a href="/node/<?php print $row->nid; ?>/edit" title="editar"><div class="arrow editar" style="margin-left:5px"></div></a><a href="/node/<?php print $row->nid; ?>/delete" title="borrar"><div class="arrow cancel"></div></a></TD>
				        </TR> 
				<?php
				
			}
			?>
				      </TBODY> 
				</TABLE>
		<?php
				
			}
			?>				