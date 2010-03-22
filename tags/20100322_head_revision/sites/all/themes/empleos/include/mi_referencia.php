<html>
<?php include("head.php");?>
<BODY> 
<DIV id="wrapper"> 
  <!----HEADER---->
  <?php include("header.php");?>
  <!------MIDDLE------> 
  <DIV id="midle"> 
	<?php include("buscador-banner.php"); ?>
    <!-----submenu-----> 
	<?php include("submenu-usuarios.php");?> 
     <!-----tabla-----> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mi_educacion');
			$vista = views_build_view('items', $view, false, false);
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="16%">Per&iacute;odo</TD> 
				          <TD class="techo" width="16%">Instituto</TD> 
				          <TD class="techo" width="18%">Carrera</TD> 
				          <TD class="techo" width="18%">Nivel</TD> 
				          <TD class="techo" width="22%">Estado</TD> 
				          <TD class="techo" width="10%">&nbsp;</TD> 
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$educacion = node_load(array('nid' => $item->nid));
					$instituto = "";
					foreach($educacion->taxonomy as $taxo){
						if($taxo->vid == "6"){
							$instituto = $taxo->name;
							break;
						}
					}
					$nivel = "";
					foreach($educacion->taxonomy as $taxo){
						if($taxo->vid == "3"){
							$nivel = $taxo->name;
							break;
						}
					}
					$estado = "";
					foreach($educacion->taxonomy as $taxo){
						if($taxo->vid == "4"){
							$estado = $taxo->name;
							break;
						}
					}
				?>
				        <TR> 
				          <TD><?php echo date("n.Y")?> - <?php echo date("n.Y")?></TD> 
				          <TD><?php print $instituto;?></TD> 
				          <TD><?php print $educacion->field_ttulo_o_certificacin[0]["value"];?></TD> 
				          <TD><?php print $nivel;?></TD> 
				          <TD><?php print $estado;?></TD>
				          <TD><A href="node/<?php print $educacion->nid ?>/edit" title="editar"><DIV class="arrow editar" style=" margin-right:10px;"></DIV></A> <A href="http://www.portalesverticales.com.ar/caci/empleos/form.html#" title="borrar"><DIV class="arrow cancel"></DIV></A> </TD> 
				        </TR> 
				<?php
				
			}
			?>
				      </TBODY> 
				</TABLE>
				<div class="mycv">
					<?php print $content;?>
				</div> 
			<?php
  			//print "<div class='mycv'>".$content."</div>";
  		}else{
  	?>
 
  <?php } ?>
  <!--FOOTER--> 
<?php include("footer.php");?>
</DIV> 
</DIV></BODY></HTML>