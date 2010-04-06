<div class="box top" style="background: url(sites/all/themes/empleos/img/bg_box_top2.jpg)">
<p><strong>Detall&aacute; tus estudios</strong> a partir del nivel secundario. Si no ten&eacute;s estudios, dej&aacute; el formulario en blanco y continu&aacute; con el siguiente paso.<br> 
Si ten&eacute;s estudios, al registrarlos consider&aacute; que los &iacute;tems destacados en <span style="color: #248CC4; font-weight: bold">celeste</span> son obligatorios.

</p>

<div><img style="padding-left: 100px;" src="sites/all/themes/empleos/img/10pasos.png"></div>
<div><img style="padding-left: 150px" src="sites/all/themes/empleos/img/2paso.png"></div>
</div>
<!-- -submenu--- -->
<?php include("submenu-usuarios.php");?>
<!-- -tabla--- -->
<?php
global $user;
if ($user->uid){
	$view = views_get_view('mis_educacion');
	$vista = views_build_view('items', $view, false, false);
	?>
<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1">
	<TBODY>
		<TR>
			<TD class="techo" width="16%">Per&iacute;odo</TD>
			<TD class="techo" width="26%">Instituto</TD>
			<TD class="techo" width="18%">Carrera</TD>
			<TD class="techo" width="18%">Nivel</TD>
			<TD class="techo" width="12%">Estado</TD>
			<TD class="techo" width="7%">&nbsp;</TD>
		</TR>
		<?php
		foreach($vista["items"] as $item){
			$row = node_load(array('nid' => $item->nid));
			$instituto = "";
			foreach($row->taxonomy as $taxo){
				if($taxo->vid == "6"){
					$instituto = $taxo->name;
					break;
				}
			}
			$nivel = "";
			foreach($row->taxonomy as $taxo){
				if($taxo->vid == "3"){
					$nivel = $taxo->name;
					break;
				}
			}
			$estado = "";
			foreach($row->taxonomy as $taxo){
				if($taxo->vid == "4"){
					$estado = $taxo->name;
					break;
				}
			}
			$m_ini = "";
			foreach($row->taxonomy as $taxo){
				if($taxo->vid == "7"){	$m_ini = $taxo->name; break;}
			}
			$m_fin = "";
			foreach($row->taxonomy as $taxo){
				if($taxo->vid == "8"){	$m_fin = $taxo->name; break;}
			}
			$a_ini = "";
			foreach($row->taxonomy as $taxo){
				if($taxo->vid == "9"){	$a_ini = $taxo->name; break;}
			}
			$a_fin = "";
			foreach($row->taxonomy as $taxo){
				if($taxo->vid == "10"){	$a_fin = $taxo->name; break;}
			}

			?>
		<TR>
		<?php if ($node->nid == $row->nid) { print '<TD>'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</TD>';
		} else { print '<TD><A href="?q=node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';  } ?>
			<TD><?php print $instituto;?></TD>
			<TD><?php print $row->field_ttulo_o_certificacin[0]["value"];?></TD>
			<TD><?php print $nivel;?></TD>
			<TD><?php print $estado;?></TD>
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
