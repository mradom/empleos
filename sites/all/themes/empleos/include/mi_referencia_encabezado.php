    <div class="box top" style="background:url(sites/all/themes/empleos/img/bg_box_top8.jpg)">
      <p>Ingres&aacute; tus <strong>referencias laborales.</strong> Si no ten&eacute;s ninguna referencia dej&aacute; el formulario en blanco y continu&aacute; con el siguiente paso.<br> 
      Record&aacute; que los &iacute;tems destacados en <span style="color:#248CC4; font-weight:bold">celeste</span> son obligatorios.</p>
      <div><img style=" padding-left:100px;" src="sites/all/themes/empleos/img/10pasos.png"></div>

      <div><img style=" padding-left:150px " src="sites/all/themes/empleos/img/8paso.png"></div>
    </div>
    <!-----submenu-----> 
	<?php include("submenu-usuarios.php");?> 
     <!-----tabla-----> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mis_referencia_laboral');
			$vista = views_build_view('items', $view, false, false);
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
				//print '<pre>';
				//print_r($row);
				//print '</pre>';

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
			?>
				      </TBODY> 
				</TABLE>
		<?php
				
			}
			?>				