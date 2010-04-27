    <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top15.jpg)">
    <div><img style=" padding-left:460px " src="/sites/all/themes/empleos/img/4e-paso.png"></div>
      <p>Esta secci&oacute;n de tu cuenta funciona como una especie de bandeja de entrada ya que <strong>aqu&iacute; recibir&aacute;s las postulaciones a tus avisos publicados</strong>. Tambi&eacute;n podr&aacute;s tener una descripci&oacute;n general y particular de cada uno de los postulantes interesados en la oferta laboral de tu compa&ntilde;&iacute;a de manera de poder iniciar un proceso de selecci&oacute;n serio y exhaustivo.  </p>
    </div>
    <!-- submenu --> 
	<?php include("submenu-empresa.php");?> 
     <!-- tabla --> 
<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1">
	<TBODY>
	<?php 
		if(arg(2) > 0){
			$nodo = node_load(array('nid' => arg(2)));
?>
					<tr><td colspan='6'><?php echo $nodo->title;?></td></tr>
					<TR>
						<TD class="techo" width="16%">Fecha</TD>
						<TD class="techo" width="26%">Postulante</TD>
						<TD class="techo" width="18%">E-Mail</TD>
						<TD class="techo" width="18%"></TD>
						<TD class="techo" width="12%"></TD>
						<td class="techo" width="10%">Acciones</td>
					</TR>
					<?php 
						$nid = arg(2);
						$sql = "SELECT * FROM job AS j WHERE j.nid = $nid AND j.status = 1 ORDER BY j.timestamp ASC ";
						$rs = db_query($sql);
						while($postulante = mysql_fetch_object($rs)){
							$usuario = user_load(array('uid' => $postulante->uid));
							?>
							<tr>
								<td><?php echo date('d/m/Y', $postulante->timestamp);?></td>
								<td><?php echo $usuario->name; ?></td>
								<td><?php echo $usuario->mail; ?></td>
								<td></td>
								<td></td>
								<td><a href='/user/<?php echo $usuario->uid;?>'>Ver</a></td>
							</tr>
							<?php 
						}
					?>
<?php
		}else{
			?>
					<TR>
						<TD class="techo" width="16%">Fecha</TD>
						<TD class="techo" width="26%">Titulo</TD>
						<TD class="techo" width="18%">Tipo</TD>
						<TD class="techo" width="18%">Estado</TD>
						<TD class="techo" width="12%">Cantidad de posulantes</TD>
						<td class="techo" width="10%">Acciones</td>
					</TR>
					<?php
					$sql = "SELECT j.*, COUNT(j.nid) AS cantidad FROM job AS j INNER JOIN node AS n ON n.nid = j.nid WHERE n.status = 1 AND n.uid = $user->uid AND j.status = 1 GROUP BY j.nid ORDER BY n.created DESC ";
					$rs = db_query($sql);
					while($nodo = mysql_fetch_object($rs)){
						$aviso = node_load(array('nid' => $nodo->nid));
						//$usuario = user_load(array('uid' => $nodo->uid));
						?>
						<tr>
							<td><?php echo date('d/m/Y', $nodo->timestamp);?></td>
							<td><?php echo $aviso->title;?></td>
							<td><?php $wi = workflow_get_state($aviso->_workflow); print $wi['state']?></td>
							<td><?php echo ($aviso->status == 1) ? "Publicado" : "No publicado"?></td>
							<td><?php echo $nodo->cantidad?></td>
							<td><a href="/node/98/<?php echo $nodo->nid;?>">Ver</a></td>
						</tr>
					<?php } ?>
<?php
		}
	?>
	</TBODY>
</TABLE>