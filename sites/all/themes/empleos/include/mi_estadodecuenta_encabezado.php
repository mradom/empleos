    <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top_ecuenta.jpg)">
    <div><img style=" padding-left:460px " src="/sites/all/themes/empleos/img/5e-paso.png"></div>
      <p><strong>Publicar tus avisos</strong> permitir&aacute; postular todas las b&uacute;squedas de empleos que se publiquen en el sitio y, si as&iacute; lo dese&aacute;s, las empresas y consultoras que accedan a nuestra base de datos en busca de candidatos podr&aacute;n consultarlo.
        El proceso de ingreso del curr&iacute;culum est&aacute; dividido en pasos.<br>
        Al finalizar la carga de tus datos presion&aacute; el bot&oacute;n &quot;guardar&quot; al final de la p&aacute;gina antes de ir al paso siguiente.</p>
   
      
    </div>
    <!-- submenu --> 
	<?php include("submenu-empresa.php");?> 
     <!-- tabla --> 
<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1">
	<TBODY>
		<TR>
			<TD class="techo" width="16%">Desde - Hasta</TD>
			<TD class="techo" width="26%">Titulo</TD>
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
		<TR class="<?php if ($node->nid == $row->nid) print arg(2);?>">
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