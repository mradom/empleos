    <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top7.jpg)">
      <p>
      El paso 7 te permite ingresar informaci&oacute;n importante sobre tus actuales o anteriores <strong>experiencias de trabajo</strong>.<br />
 Dado que es muy importante para las empresas conocer qu&eacute; tipo experiencia laboral has tenido, no olvides ser lo m&aacute;s preciso posible al momento de cargar los datos correspondientes.<br />
 Si no posees experiencia laboral dej&aacute;, el formulario en blanco y contin&aacute; con el siguiente paso.


      </p><br> 
      <div><img style=" padding-left:100px;" src="/sites/all/themes/empleos/img/10pasos.png"></div>
      <div><img style=" padding-left:150px " src="/sites/all/themes/empleos/img/7paso.png"></div>
    </div>
    <!-- submenu --> 
	<?php include("submenu-usuarios.php");?> 
     <!-- tabla --> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mis_experiencia_laboral');
			$vista = views_build_view('items', $view, false, false);
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="18%">Fecha</TD> 
				          <TD class="techo" width="15%"></TD>
				          <TD class="techo" width="15%">Empresa</TD> 
				          <TD class="techo" width="15%">&Aacute;rea</TD> 
				          <TD class="techo" width="15%">Jerarqu&iacute;a</TD> 
				          <TD class="techo" width="15%">Puesto</TD>  
				          <TD class="techo" width="5%"></TD>
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
				        <TR class="<?php if ($node->nid == $row->nid) print arg(2);?>"> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</TD>';
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$a_ini.'-'.$m_ini.' - '.$a_fin.'-'.$m_fin.'</A></TD>';  } ?> 
				          <TD><?php print $row->title;?></TD>
				          <TD><?php print $row->field_empresa[0]['value'];?></TD>				          
				          <TD><?php print $area;?></TD> 
				          <TD><?php print $jerarquia;?></TD> 
				          <TD><?php print $row->field_nombre_del_puesto[0]['value'];?></TD>
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