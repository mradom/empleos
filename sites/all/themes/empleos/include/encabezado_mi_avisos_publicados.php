    <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top14.jpg)">
    <div><img style=" padding-left:460px " src="/sites/all/themes/empleos/img/3e-paso.png"></div>
      <p>Aqu&iacute; podr&aacute;s <strong>visualizar el historial</strong> detallado de todos los avisos que hayas publicado en el sitio.<br />
 Esto te permitir&aacute; tener un panorama general y particular de cada aviso ya que podr&aacute;s desde aqu&iacute; mismo editar la informaci&oacute;n que contienen o borrarlos si el puesto que buscabas ya fue cubierto. </p>
   
      
    </div>
    <!-- submenu --> 
	<?php include("submenu-empresa.php");?> 
     <!-- tabla --> 
<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1">
	<TBODY>
		<TR>
			<TD class="techo" width="16%">Desde - Hasta</TD>
			<TD class="techo" width="23%">Titulo</TD>
			<TD class="techo" width="18%">Tipo</TD>
			<TD class="techo" width="13%">Estado</TD>
			<TD class="techo" width="19%">Empresa</TD>
			<TD class="techo" width="7%">&nbsp;</TD>
		</TR>
		<?php
	$view = views_get_view('mis_avisos');
	$vista = views_build_view('items', $view, false, false);
		foreach($vista["items"] as $item){
			$row = node_load(array('nid' => $item->nid));
			?>
		<TR>
		<?php 
		/*if ($node->nid == $row->nid) { 
			print '<TD>'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</TD>';
		} else { 
			print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';  
		}*/ ?>
			<TD><?php print  $row->field_fecha_desde[0]['value'];?> - <?php print  $row->field_fecha_hasta[0]['value'];?></TD>
			<TD><a href="/node/<?php echo $row->nid;?>"><?php print $row->title;?></a></TD>
			<TD><?php
				switch ($row->field_tipo_de_aviso[0]['value']){
					case 1:
						echo "Gratuito";
						break;
					case 2:
						echo "Simple";
						break;
					case 3:
						echo "Destacado";
						break;
					case 4:
						echo "Gold";
						break;
					default:
						break;
				}
			?></TD>
			<TD><?php echo ($row->status == 1) ? "Publicado" : "No publicado"?></TD>
			<TD><?php print_r( $row->field_empresa_1[0]['value']);?></TD>
			<TD>
                <div class="iscos-form" style="padding-left:4px">
				<a href="/node/<?php print $row->nid; ?>/edit" title="Editar">
					<div class="arrow editar"></div>
				</a>
				<a href="/node/add/e-aviso/copy/<?php echo $row->nid;?>" title="Copiar">
					<div class="arrow copiar"></div>
				</a>                
				<a href="/node/<?php print $row->nid; ?>/delete" title="borrar">
					<div class="arrow cancel"></div>
                </a>
                </div>
			</TD>
		</TR>
		<?php

		}
		?>
		<?php
	$view = views_get_view('mis_avisos_no_publicados');
	$vista = views_build_view('items', $view, false, false);
		foreach($vista["items"] as $item){
			$row = node_load(array('nid' => $item->nid));
			?>
		<TR>
		<?php 
		/*if ($node->nid == $row->nid) { 
			print '<TD>'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</TD>';
		} else { 
			print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';  
		}*/ ?>
			<TD><?php print  $row->field_fecha_desde[0]['value'];?> - <?php print  $row->field_fecha_hasta[0]['value'];?></TD>
			<TD><?php print $row->title;?></TD>
			<TD><?php $wi = workflow_get_state($row->_workflow); print $wi['state']?></TD>
			<TD><?php echo ($row->status == 1) ? "Publicado" : "No publicado"?></TD>
			<TD><?php print_r( $row->field_empresa_1[0]['value']);?></TD>
			<TD>
				 <div class="icos-form">
                 <a href="/node/<?php print $row->nid; ?>/edit" title="editar">
					<div class="arrow editar" style="margin-left:5px"></div>
				</a> 
				<a href="/node/<?php print $row->nid; ?>/delete" title="borrar">
					<div class="arrow cancel"></div>
				</a>
				<a href="/node/add/e-aviso/copy/<?php echo $row->nid;?>" title="Copiar">
					<div class="arrow copiar"></div>
				</a>
                </div>
			</TD>
		</TR>
		<?php

		}
		?>
	</TBODY>
</TABLE>