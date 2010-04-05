    <div class="box top" style="background:url(sites/all/themes/empleos/img/bg_box_top4.jpg)">
      <p><strong>Detall&aacute; tus conocimientos en idiomas</strong>, especificando el nivel de lectura, habla y escritura.</br>
      Si no ten&eacute;s conocimientos en idiomas, dej&aacute; el formulario en blanco y continu&aacute; con el siguiente paso.</br> 
Si ten&eacute;s conocimientos, al ingresar los datos consider&aacute; que los &iacute;tems destacados en <span style="color:#248CC4; font-weight:bold">celeste</span> son obligatorios.
   
     </p>

      <div><img style=" padding-left:100px;" src="sites/all/themes/empleos/img/10pasos.png"></div>
      <div><img style=" padding-left:150px " src="sites/all/themes/empleos/img/4paso.png"></div>
    </div>

    <!-----submenu-----> 
	<?php include("submenu-usuarios.php");?> 
     <!-----tabla-----> 
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
				          <TD class="techo" width="7%">&nbsp;</TD>
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
						  <TD><a href="?q=node/<?php print $row->nid; ?>/edit" title="editar"><div class="arrow editar" style="margin-left:5px"></div></a><a href="?q=node/<?php print $row->nid; ?>/delete" title="borrar"><div class="arrow cancel"></div></a></TD>				          
				        </TR> 
				<?php
				
			}
			?>
				      </TBODY> 
				</TABLE>
		<?php
				
			}
			?>				