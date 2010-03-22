    <div class="box top" style="background:url(sites/all/themes/empleos/img/bg_box_top7.jpg)">
      <p><strong>Ingres&aacute; tu experiencia laboral.</strong> Si no ten&eacute;s experiencia laboral dej&aacute; el formulario en blanco y continu&aacute; con el siguiente paso. Si ten&eacute;s experiencia, al ingresarla consider&aacute; que los &iacute;tems destacados en <span style="color:#248CC4; font-weight:bold">celeste </span> son obligatorios. Empez&aacute; cargando tu experiencia m&aacute;s reciente y luego cronol&oacute;gicamente, las anteriores.<br> 
      <div><img style=" padding-left:100px;" src="sites/all/themes/empleos/img/10pasos.png"></div>

      <div><img style=" padding-left:150px " src="sites/all/themes/empleos/img/7paso.png"></div>
    </div>
    <!-----submenu-----> 
	<?php include("submenu-usuarios.php");?> 
     <!-----tabla-----> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mis_experiencia_laboral');
			$vista = views_build_view('items', $view, false, false);
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="20%">Fecha</TD> 
				          <TD class="techo" width="18%"></TD>
				          <TD class="techo" width="16%">Empresa</TD> 
				          <TD class="techo" width="16%">Area</TD> 
				          <TD class="techo" width="16%">Jerarquia</TD> 
				          <TD class="techo" width="16%">Puesto</TD>  
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
				//print '<pre>';
				//print_r($row);
				//print '</pre>';
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
			        $area = "";
					foreach($row->taxonomy as $taxo){
						if($taxo->vid == "1"){	$area = $taxo->name; break;}
					}
			        $jerarquia = "";
					foreach($row->taxonomy as $taxo){
						if($taxo->vid == "12"){	$jerarquia = $taxo->name; break;}
					}
				?>
				        <TR> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</TD>';
			                   } else { print '<TD><A href="?q=node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';  } ?> 
				          <TD><?php print $row->title;?></TD>
				          <TD><?php print $row->field_empresa[0]['value'];?></TD>				          
				          <TD><?php print $area;?></TD> 
				          <TD><?php print $jerarquia;?></TD> 
				          <TD><?php print $row->field_nombre_del_puesto[0]['value'];?></TD>
				        </TR> 
				<?php
				
			}
			?>
				      </TBODY> 
				</TABLE>
		<?php
				
			}
			?>				