    <div class="box top" style="background:url(/sites/all/themes/empleos/img/bg_box_top9.jpg)">
      <p>En el paso 9 pod&eacute;s expresar <strong>tus objetivos, intereses y pretensiones laborales.</strong> <br />
Dado que se trata de informaci&oacute;n que permite inferir caracter&iacute;sticas personales del postulante, esta secci&oacute;n merece atenci&oacute;n y esmero en su preparaci&oacute;n y redacci&oacute;n. <br />

Los &iacute;tems destacados con asterisco <span class="stg orange">(*)</span> son obligatorios.<br />

     </p>

      <div><img style=" padding-left:100px;" src="/sites/all/themes/empleos/img/10pasos.png"></div>
      <div><img style=" padding-left:150px " src="/sites/all/themes/empleos/img/9paso.png"></div>
    </div>

    <!-- submenu --> 
	<?php include("submenu-usuarios.php");?> 
     <!-- tabla --> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mis_objetivo_laboral');
			$vista = views_build_view('items', $view, false, false);
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="17%"></TD>				        
				          <TD class="techo" width="17%">Jerarqu&iacute;a</TD>
				          <TD class="techo" width="17%">&Aacute;rea</TD>
				          <TD class="techo" width="17%">Disponibilidad</TD> 				          
				          <TD class="techo" width="14%">Sueldo</TD>
				          <TD class="techo" width="10%">Pa&iacute;s/Provincia</TD>  
				          <TD class="techo" width="7%"></TD>
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$row = node_load(array('nid' => $item->nid));
				//print '<pre>';
				//print_r($row);
				//print '</pre>';
				$jerarquia = "";
				foreach($row->taxonomy as $taxo){ if($taxo->vid == get_vocabulary_by_name('Jerarquia')){ $jerarquia = $taxo->name; break; 	} 	}
				$area = "";
				foreach($row->taxonomy as $taxo){ if($taxo->vid == get_vocabulary_by_name('Area')){ $area = $taxo->name; break; 	} 	}
				$Disponibilidad = "";
				foreach($row->taxonomy as $taxo){ if($taxo->vid == get_vocabulary_by_name('Disponibilidad')){ $disponibilidad = $taxo->name; break; 	} 	}
				$Sueldo = "";
				foreach($row->taxonomy as $taxo){ if($taxo->vid == get_vocabulary_by_name('Sueldo Pretendido')){ $sueldo = $taxo->name; break; 	} 	}
				
				?>
				        <TR class="<?php if ($node->nid == $row->nid) print arg(2);?>"> 
				          <?php if ($node->nid == $row->nid) { print '<TD>'.$row->title.'</TD>';
			                   } else { print '<TD><A href="/node/'.$row->nid.'/edit" title="editar">'.$row->title.'</A></TD>';  } ?>
				          <TD><?php print $jerarquia;?></TD> 				          
				          <TD><?php print $area;?></TD>
				          <TD><?php print $disponibilidad;?></TD> 
				          <TD><?php print $sueldo;?></TD>
				          <TD><?php print $row->field_dispuesto_a_ubicarme_en_o[0]['value'].' / '.$row->field_dispuesto_a_ubicarme_en_0[0]['value'];?></TD>
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