    <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top6.jpg)">
      <p>
      En esta parte de tu CV en empleoslavoz podr&aacute;s incluir <strong>todos aquellos conocimientos, habilidades, hobbies o actividades de tiempo libre</strong> que puedan ayudar a las empresas o consultoras interesadas a tener un perfil m&aacute;s completo de tu personalidad y de tus intereses.<br />
Incluso, este espacio puede servirte para ingresar aquellas actividades de formaci&oacute;n que consideres importantes para tu experiencia pero que posiblemente no se relacionen directamente con el perfil principal de tu b&uacute;squeda.<br />

Los &iacute;tems destacados con asterisco <span class="stg orange">(*)</span> son obligatorios.
       </p>
      <div><img style=" padding-left:100px;" src="/sites/all/themes/empleos/img/10pasos.png"></div>

      <div><img style=" padding-left:150px " src="/sites/all/themes/empleos/img/6paso.png"></div>
    </div>

    <!-- submenu --> 
	<?php include("submenu-usuarios.php");?> 
     <!-- tabla --> 
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
				          <TD class="techo" width="40%">Descripci&oacute;n</TD>
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
				        <TR class="<?php if ($node->nid == $row->nid) print arg(2);?>"> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?> 
				    	  <TD><?php print $row->field_nombre[0]['value'];?></TD> 
				    	  <TD><?php print $row->field_descripcion[0]['value'];?></TD>
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