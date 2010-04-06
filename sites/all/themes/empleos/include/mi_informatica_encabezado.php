   <div class="box top" style="background:url(sites/all/themes/empleos/img/bg_box_top5.jpg)">
      <p><strong>Ingres&aacute; tus conocimientos de inform&aacute;tica</strong> detallando el tipo de programa, el nombre del mismo y tu nivel. Si no ten&eacute;s conocimientos de inform&aacute;tica dej&aacute; el formulario en blanco y continu&aacute; con el siguiente paso. <br>
Si ten&eacute;s conocimientos, al ingresar los datos consider&aacute; que los &iacute;tems destacados en <span style="color:#248CC4; font-weight:bold">celeste </span>son obligatorios. </p>

      <div><img style=" padding-left:100px;" src="sites/all/themes/empleos/img/10pasos.png"></div>
      <div><img style=" padding-left:150px " src="sites/all/themes/empleos/img/5paso.png"></div>
    </div>

    <!-- -submenu--- --> 
	<?php include("submenu-usuarios.php");?> 
     <!-- -tabla--- --> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mis_informatica');
			$vista = views_build_view('items', $view, false, false);
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="40%">Programa</TD> 
				          <TD class="techo" width="20%">Tipo</TD>
				          <TD class="techo" width="16%">Nivel</TD>  
				          <TD class="techo" width="6%"></TD>
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