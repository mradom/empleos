    <div class="box top" style="background:url(sites/all/themes/empleos/img/bg_box_top6.jpg)">
      <p>
      Si quer&eacute;s, pod&eacute;s detallar  <strong>otros conocimientos</strong>, hobbies o actividades de tiempo libre que realices o poseas y que no est&eacute;n incluidos en los campos anteriores.
      </br> Al ingresar los datos consider&aacute; que los &iacute;tems destacados en <span style="color:#248CC4; font-weight:bold">celeste </span>son obligatorios.
      
       </p>
      <div><img style=" padding-left:100px;" src="sites/all/themes/empleos/img/10pasos.png"></div>

      <div><img style=" padding-left:150px " src="sites/all/themes/empleos/img/6paso.png"></div>
    </div>

    <!-----submenu-----> 
	<?php include("submenu-usuarios.php");?> 
     <!-----tabla-----> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mis_otros_conocimientos');
			$vista = views_build_view('items', $view, false, false);
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="25%"></TD>
				          <TD class="techo" width="25%">Nombre</TD> 
				          <TD class="techo" width="40%">Descripcion</TD>
				          <TD class="techo" width="7%"></TD> 
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
					//$tipo = "";
					//foreach($row->taxonomy as $taxo){
					//	if($taxo->vid == "14"){
					//		$tipo = $taxo->name;
					//		break;
					//	}
					//}	
				?>
				        <TR> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="?q=node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
				    	  <TD><?php print $row->field_nombre[0]['value'];?></TD> 
				    	  <TD><?php print $row->field_descripcion[0]['value'];?></TD>
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