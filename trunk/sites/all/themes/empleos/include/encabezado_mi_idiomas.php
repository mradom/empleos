    <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top4.jpg)">
      <p>Este paso te permite completar los detalles de tus <strong>conocimientos en otros idiomas</strong>, especificando tu nivel de desempe&ntilde;o en habilidades escritas, auditivas y de escritura. <br />
Este tipo de informaci&oacute;n puede ser muy &uacute;til para aquellos puestos que requieran el contacto con escritos o personas que utilizan otro idioma distinto del espa&ntilde;ol. <br /> 
Record&aacute; que los &iacute;tems destacados con asterisco <span class="stg orange">(*)</span> son obligatorios.<br />
Si no ten&eacute;s conocimiento en idiomas, dej&aacute; el formulario en blanco y contin&aacute; con el siguiente paso.
   
     </p>

      <div><img style=" padding-left:100px;" src="/sites/all/themes/empleos/img/10pasos.png"></div>
      <div><img style=" padding-left:150px " src="/sites/all/themes/empleos/img/4paso.png"></div>
    </div>

    <!-- submenu --> 
	<?php include("submenu-usuarios.php");?> 
     <!-- tabla --> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mis_idiomas');
			$vista = views_build_view('items', $view, false, false);
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="15%"></TD> 
				          <TD class="techo" width="15%">Idioma</TD> 
				          <TD class="techo" width="15%">Nivel Oral</TD> 
				          <TD class="techo" width="15%">Nivel Escrito</TD> 
				          <TD class="techo" width="15%">Nivel de Lectura</TD> 
				          <TD class="techo" width="18%">&Uacute;ltima Vez&nbsp;</TD> 
				          <TD class="techo" width="5%">&nbsp;</TD>
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
				        <TR class="<?php if ($node->nid == $row->nid) print arg(2);?>"> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
				          <TD><?php print $idioma;?></TD>
				          <TD><?php print $row->field_nivel_oral[0]['value'];?></TD> 
				          <TD><?php print $row->field_nivel_escrito[0]['value'];?></TD> 
				          <TD><?php print $row->field_nivel_de_lectura[0]['value'];?></TD>
				          <TD><?php print $row->field_ltima_vez_aplicado[0]['value'];?></TD>
						  <TD><div class="icos-form" style="padding-left:3px;"><a href="/node/<?php print $row->nid; ?>/edit" title="editar"><div class="arrow editar"></div></a><a href="/node/<?php print $row->nid; ?>/delete" title="borrar"><div class="arrow cancel"></div></a></div></TD>				          
				        </TR> 
				<?php
				
			}
			?>
				      </TBODY> 
				</TABLE>
		<?php
				
			}
			?>				