<?php
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

?>

<!-- Ficha  -->
<div class="box central ficha">
	<div class="btn_gral low" style="float: right"><a href="/job/apply/<?php echo $nodo->nid;?>">Postularse</a></div>
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
		<li><span class="blue">Ramo o actividad:</span> <?php echo $nodo->taxonomy[$ramo]->name;?></li>
		<li><span class="blue">Lugar de trabajo:</span> <?php echo $nodo->taxonomy[$localidad]->name;?></li>
		<li><span class="blue">Jerarqu&iacute;a:</span> <?php echo $nodo->taxonomy[$jerarquia]->name;?></li>
		<li><span class="blue">Area:</span> <?php echo $nodo->taxonomy[$area]->name;?></li>
		<li><span class="blue">Disponibilidad:</span> <?php echo $nodo->taxonomy[$disponibilidad]->name;?></li>		
		<li><span class="blue">Salario:</span> <?php echo $nodo->taxonomy[$pretendido]->name;?></li>
		<li><span class="blue">Vacantes:</span> <?php echo $nodo->field_cantidad_de_vacantes[0]['value'];?></li>
	</ul>
	<div style="clear: both"></div>
	<p class="rigth"><a class="orange right" href="#">&gt;&gt;Ver mas avisos de esta empresa</a></p>
	<!-- Resumen end -->
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

              <li><strong>Educaci&oacute;n: </strong><br>
                Universitario, Graduado</li>
              <li><strong>Area de estudio:</strong> <br>
                Adm. de Empresas, Contabilidad / Auditor&iacute;a, Econom&iacute;a<br>
                Finanzas, Marketing Comercializaci&oacute;n </li>
              <li><strong>Idiomas:</strong><br>

                Ingl&eacute;s</li>
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
		if ($node->links['favorite_nodes_in']['title']<>'in favorites') { ?>
			<div class="btn_gral low" style="float: right"><a href="/favorite_nodes/add/<?php echo $nodo->nid;?>">+ Mis Favoritos</a></div>
		<?php }	else   { ?>
			<div class="btn_gral low" style="float: right"><a href="/favorite_nodes/delete/<?php echo $nodo->nid;?>">- Mis Favoritos</a></div>
		<?php }
		?>
        <div style="clear:both"></div>
        <div class="arrow">Otras ofertas de trabajo en <a href="/taxonomy/term/<?php print $area;?>"><?php print $nodo->taxonomy[$area]->name; ?></a></div>
	
	
    	
<!-- Ficha end  -->
</div>

<pre>
<?php //print_r($nodo); ?>
</pre>