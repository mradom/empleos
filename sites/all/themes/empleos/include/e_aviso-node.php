<?php
global $user;
//echo '<pre>';
//print_r($node);
//echo '</pre>';
$nodo = node_load($node->nid);
$b_area=get_vocabulary_by_name('Area');
$b_ramo=get_vocabulary_by_name('Ramo o Actividad');
$b_jerarquia=get_vocabulary_by_name('Jerarquia');
$b_disponibilidad=get_vocabulary_by_name('Disponibilidad');
$b_localidad=get_vocabulary_by_name('Provincias');
$b_pretendido=get_vocabulary_by_name('Sueldo Pretendido');
$b_idiomas = get_vocabulary_by_name('idiomas');
$b_disponibilidad = get_vocabulary_by_name('disponibilidad');
foreach($nodo->taxonomy as $value){
	if ($value->vid == $b_area){$area = $value->tid; break;}
}
foreach($nodo->taxonomy as $value){
	if ($value->vid == $b_ramo){$ramo = $value->tid; break;}
}
foreach($nodo->taxonomy as $value){
	if ($value->vid == $b_jerarquia){$jerarquia = $value->tid; break;}
}
foreach($nodo->taxonomy as $value){
	if ($value->vid == $b_disponibilidad){$disponibilidad = $value->tid; break;}
}
foreach($nodo->taxonomy as $value){
	if ($value->vid == $b_localidad){$localidad = $value->tid; break;}
}
foreach($nodo->taxonomy as $value){
	if ($value->vid == $b_pretendido){$pretendido = $value->tid; break;}
}

foreach($nodo->taxonomy as $value){
	if ($value->vid == $b_idiomas){$idiomas = $value->tid; break;}
}

foreach($nodo->taxonomy as $value){
	if ($value->vid == $b_disponibilidad){$disponibilidad = $value->tid; break;}
}

?>

<script>

function AltDisplay(eldiv, elbot)
{
   var mydiv = document.getElementById(eldiv);
   var mybot = document.getElementById(elbot);   
      
   if ( mydiv.style.display != "none" ) {
     mydiv.style.visibility="";
     mydiv.style.display="none";
	 mybot.style.background="transparent";
	 
   } else {
	 mydiv.style.visibility="";
     mydiv.style.display="";
	 mybot.style.background="#fff";
   }
}
</script>

<?php 
if($user->roles[5] == "empresa"){
	include("submenu-empresa.php");
}
?>
<!-- Ficha  -->
<div class="box central ficha">
		            <?php 
		            	$link = "";
		            	if($user->uid){
		            		$link = "/job/apply/".$nodo->nid;
		            	}else{
		            		$link = "/user&destination=node/".$nodo->nid;
		            	}
		            	
		            	$sql = "select * from job where uid = $user->uid and nid = $nodo->nid and status = 1";
		            	$rs = db_query($sql);
		            	if($user->roles[5] != "empresa" and db_num_rows($rs) == 0){
		            	?>
						<div class="btn_gral low" style="float: right">
							<a href="<?php echo $link;?>">Postularse</a>
						</div>
		            	<?php	
		            	}
		            ?>
	<div class="titleFicha">Oferta de trabajo para:<span class="upper orange stg"> <?php echo $nodo->title;?></span></div>
	<div class="line_dot"></div>
	<!-- Resumen -->
	<div class="resumen">
	<!-- OJO aca dice node->created y deberia ser el dia desde la publicacion -->
	<p class="date"><?php print date('d-m-Y',$nodo->created); ?></p>
	<div class="brand">
	<?php print theme('imagecache','logo_empresa_resultado_busqueda_86_53',$nodo->field_logo[0]['filename'],$nodo->picture.' - alt',$nodo->picture.' - Title'); ?>
    
    </div>
	<ul class="resumen">
		<li class="stg"><span class="blue">Empleo ofrecido por:</span> <?php echo $nodo->name;?></li>
		<li><span class="blue">Ramo o actividad:</span> <a href="/sector/<?php echo $ramo;?>"><?php echo $nodo->taxonomy[$ramo]->name;?></a></li>
		<li><span class="blue">Lugar de trabajo:</span> <a href="/provincia/<?php echo $localidad;?>"><?php echo $nodo->taxonomy[$localidad]->name;?></a></li> 
		<li><span class="blue">Jerarqu&iacute;a:</span> <?php echo $nodo->taxonomy[$jerarquia]->name;?></li>
		<li><span class="blue">Area:</span> <a href="/rubro/<?php echo $area;?>"><?php echo $nodo->taxonomy[$area]->name;?></a></li>
		<!-- <li><span class="blue">Disponibilidad:</span> <?php echo $nodo->taxonomy[$disponibilidad]->name;?></li>  -->		
		<li><span class="blue">Salario:</span> <?php echo $nodo->taxonomy[$pretendido]->name;?></li>
		<li><span class="blue">Vacantes:</span> <?php echo $nodo->field_cantidad_de_vacantes[0]['value'];?></li>
	</ul>
	<div style="clear: both"></div>
	<p class="rigth"><a class="orange right" href="#">&gt;&gt;Ver mas avisos de esta empresa</a></p><br />
	<p class="rigth"><a class="orange right" href="javascript:AltDisplay('mydiv1','bot1');">&gt;&gt;Ver Informaci&oacute;n esta empresa</a></p>
	<!-- Resumen end -->
	</div>
	<div style="visibility: hidden; display: none;" id="mydiv1" class="ampliar">
		<p class="blue stg">La Empresa</p>
			<?php $empresa = user_load(array("uid" => $node->uid));?>
		<p><strong><?php echo $empresa->profile_empresa_razon_social;?></strong> <?php echo $empresa->profile_empresa_descripcion;?></p>
	</div>
	<div class="bloque puntos" style="width: 655px"></div>
	<div style="width: 330px; float: left; margin-right: 10px;">
	<!--  Descripcion del empleo -->
	<p><span class="blue stg">Descripci&oacute;n del empleo:</span><br>
	<?php echo $nodo->body;?>
	<br>&nbsp;<br>
	</p>
	<!--  Descripcion del empleo end -->
	</div>
    <!--  Requisitos -->	
	<div style="width: 300px; float: left;">
			<p><span class="blue stg">Requisitos que deben cumplir los postulantes:</span></p>
            <ul class="requisitos">
              <li><strong>Edad: </strong>
                Entre <?php echo $nodo->field_edad_entre[0]['value'];?> hasta <?php echo $nodo->field_edad_hasta[0]['value']?></li>
              <li><strong>Lugar de residencia:</strong> <?php echo $nodo->field_lugar_de_residencia[0]['value'];?></li>
              <li><strong>Indicar remuneracion:</strong> <?php echo $nodo->field_remuneracion[0]['value']?></li>
              <li><strong>Disponibilidad:</strong> <?php echo $nodo->taxonomy[$disponibilidad]->name;?></li>
              <li><strong>Idiomas:</strong> <?php echo $nodo->taxonomy[$idiomas]->name;?></li>
              <li><strong>Sexo:</strong> <?php echo $nodo->field_sexo[0]['value'];?></li>
            </ul>
	<!--  Requisitos end -->
	</div>
	<div class="bloque puntos" style="width:655px"></div>
	    <ul class="tags">
          <li>Fecha de publicaci&oacute;n: <span class="dark"> <?php print date('d-m-Y',$nodo->created);?></span> l </li>
          <li>N de aviso: <span class="dark"><?php print $nodo->vid; ?></span> l </li>
          <li>Visitas: <span class="dark">231</span></li>
        </ul>
		<?php 
		$link = "";
		if($user->uid){
			if ($node->links['favorite_nodes_in']['title']<>'in favorites') { 
 			   $link = "/favorite_nodes/add/".$nodo->nid;
			} else {
 			   $link = "/favorite_nodes/delete/".$nodo->nid;				
			}
		    if ($node->links['favorite_nodes_in']['title']<>'in favorites') { 
			  print '<div class="btn_gral low" style="float: right"><a href="'.$link.'">+ Mis Favoritos</a></div>';
		    }	else   { 
			  print '<div class="btn_gral low" style="float: right"><a href="'.$link.'">- Mis Favoritos</a></div>';
		    }	
		}
		?>
        <div style="clear:both"></div>
        <div class="arrow">Otras ofertas de trabajo en <a href="/rubro/<?php print $area;?>"><?php print $nodo->taxonomy[$area]->name; ?></a></div>
	
	
    	
<!-- Ficha end  -->
</div>

<pre>
<?php //print_r($nodo); ?>
</pre>