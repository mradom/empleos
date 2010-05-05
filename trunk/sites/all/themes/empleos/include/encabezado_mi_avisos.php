    <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top13.jpg)">
    <div><img style=" padding-left:460px " src="/sites/all/themes/empleos/img/2e-paso.png"></div>
      <p>En esta secci&oacute;n podr&aacute;s ingresar la <strong>descripci&oacute;n y requisitos</strong> del puesto de trabajo vacante y designar la fecha de vigencia del aviso. Una vez completado este paso, podr&aacute;s elegir el tipo de aviso que mejor se adec&uacute;e a las necesidades de b&uacute;squeda.<br />

Los &iacute;tems destacados con asterisco <span class="stg orange">(*)</span> son obligatorios.
</p>
   
      
    </div>
    <!-- submenu --> 
	<?php include("submenu-empresa.php");?> 
     <!-- tabla --> 
<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1">
	<TBODY>
		<TR>
			<TD class="techo" width="16%">Desde - Hasta</TD>
			<TD class="techo" width="26%">T&iacute;tulo</TD>
			<TD class="techo" width="18%">Tipo</TD>
			<TD class="techo" width="18%">Estado</TD>
			<TD class="techo" width="12%">Empresa</TD>
			<TD class="techo" width="7%">&nbsp;</TD>
		</TR>
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
			<TD><a href="/node/<?php print $row->nid; ?>/edit" title="editar"><div class="arrow editar" style="margin-left:5px"></div></a><a href="/node/<?php print $row->nid; ?>/delete" title="borrar"><div class="arrow cancel"></div></a></TD>
		</TR>
		<?php

		}
		?>
	</TBODY>
</TABLE>