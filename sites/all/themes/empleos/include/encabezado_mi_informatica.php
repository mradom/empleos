   <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top5.jpg)">
      <p>En el paso 5 podr&aacute;s describir tus capacidades y habilidades en el manejo de herramientas y programas inform&aacute;ticos. Gran parte de los oficios y puestos de trabajo requieren alg&uacute;n tipo y nivel de <strong>conocimiento de software o equipos inform&aacute;ticos</strong> para el desempe&ntilde;o de funciones. Por ello, no olvides detallar y actualizar tus datos al respecto. <br />
Los &iacute;tems destacados con asterisco <span class="stg orange">(*)</span> son obligatorios.<br />
Si no manejas ninguna herramienta o programa inform&aacute;tico, dej&aacute; el formulario en blanco y contin&aacute; con el siguiente paso.
 </p>

      <div><img style=" padding-left:100px;" src="/sites/all/themes/empleos/img/10pasos.png"></div>
      <div><img style=" padding-left:150px " src="/sites/all/themes/empleos/img/5paso.png"></div>
    </div>

    <!-- submenu --> 
	<?php include("submenu-usuarios.php");?> 
     <!-- tabla --> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mis_informatica');
			$vista = views_build_view('items', $view, false, false);
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="35%">Programa</TD> 
				          <TD class="techo" width="25%">Tipo</TD>
				          <TD class="techo" width="16%">Nivel</TD>  
                          <TD class="techo" width="10%">Experiencia</TD>  
				          <TD class="techo" width="5%"></TD>
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
				        <TR class="<?php if ($node->nid == $row->nid) print arg(2);?>"> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
				    	  <TD><?php print $tipo;?></TD> 
				    	  <TD><?php print $row->field_nivel[0]['value'];?></TD>
                          <TD><?php print $row->field_experiencia_0[0]['value'];?></TD>
				    	  <TD><div class="icos-form" style="padding-left:5px;"><a href="/node/<?php print $row->nid; ?>/edit" title="editar"><div class="arrow editar"></div></a><a href="/node/<?php print $row->nid; ?>/delete" title="borrar"><div class="arrow cancel"></div></a></div></TD>
				        </TR> 
				<?php
				
			}
			?>
				      </TBODY> 
				</TABLE>
		<?php
				
			}
			?>				