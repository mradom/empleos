    <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top8.jpg)">
      <p>
  El paso 8 te posibilita explicitar los datos de aquellas personas que pueden dar <strong>referencias de tus actuales o anteriores experiencias de trabajo</strong>.<br />
Recuerda que las personas que consignes podr&iacute;an ser contactadas por tus potenciales empleadores para consultas sobre tus funciones, desempe&ntilde;o, relaciones en el &aacute;mbito de trabajo, puntos d&eacute;biles, etc. <br />

Los &iacute;tems destacados con asterisco <span class="stg orange">(*)</span> son obligatorios.<br />
Si decid&iacute;s dejar esta parte del formulario en blanco pod&eacute;s continuar con el siguiente paso. 

 </p>
      <div><img style=" padding-left:100px;" src="/sites/all/themes/empleos/img/10pasos.png"></div>

      <div><img style=" padding-left:150px " src="/sites/all/themes/empleos/img/8paso.png"></div>
    </div>
    <!-- submenu --> 
	<?php include("submenu-usuarios.php");?> 
     <!-- tabla --> 
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
				          <TD class="techo" width="20%">T&iacute;tulo/Cargo</TD> 				          
				          <TD class="techo" width="18%">Nombre</TD>
				          <TD class="techo" width="15%">Tel&eacute;fono</TD>
				          <TD class="techo" width="20%">Email</TD>
				          <TD class="techo" width="5%"></TD>  
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
				//print '<pre>';
				//print_r($row);
				//print '</pre>';

				?>
				        <TR class="<?php if ($node->nid == $row->nid) print arg(2);?>"> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->field_empresa_0[0]['value'].'</TD>';
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->field_empresa_0[0]['value'].'</A></TD>';  } ?>
				          <TD><?php print $row->field_titulo_o_cargo[0]['value'];?></TD> 				          
				          <TD><?php print $node->title;?></TD>
				          <TD><?php print $row->field_telefono[0]['value'];?></TD> 
				          <TD><?php print $row->field_email[0]['email'];?></TD>
				          <TD><div class="icos-form" style="padding-left:4px;"><a href="/node/<?php print $row->nid; ?>/edit" title="editar"><div class="arrow editar"></div></a><a href="/node/<?php print $row->nid; ?>/delete" title="borrar"><div class="arrow cancel"></div></a></div></TD>
				        </TR> 
				<?php
				
			}
			?>
				      </TBODY> 
				</TABLE>
		<?php
				
			}
			?>				