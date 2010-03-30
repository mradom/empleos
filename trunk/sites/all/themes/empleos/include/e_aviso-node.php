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
?>
<!-- Ficha  -->
<div class="box central ficha">
	<div class="btn_gral low" style="float: right"><a href="?q=job/apply/<?php echo $nodo->nid;?>">Postularse a	este trabajo</a></div>
	<div class="titleFicha">Oferta de trabajo para:<span class="upper orange stg"> <?php echo $nodo->title;?></span></div>
	<div class="line_dot"></div>
	<!-- Resumen -->
	<div class="resumen">
	<!-- OJO aca dice node->created y deberia ser el dia desde la publicacion -->
	<p class="date"><?php print date('d-m-Y',$nodo->created); ?></p>
	<div class="brand"><?php print theme('imagecache','logo_empresa_resultado_busqueda_86_53',$nodo->picture,$nodo->picture,$nodo->picture); ?></div>
	<ul class="resumen">
		<li class="stg"><span class="blue">Empleo ofrecido por:</span> <?php echo $nodo->name;?></li>
		<li><span class="blue">Ramo o actividad:</span> <?php echo $nodo->taxonomy[$ramo]->name;?></li>
		<li><span class="blue">Lugar de trabajo:</span> <?php echo $nodo->taxonomy[$localidad]->name;?></li>
		<li><span class="blue">Jerarqu&iacute;a:</span> <?php echo $nodo->taxonomy[$jerarquia]->name;?></li>
		<li><span class="blue">Area:</span> <?php echo $nodo->taxonomy[$area]->name;?></li>
		<li><span class="blue">Disponibilidad:</span> <?php echo $nodo->taxonomy[$disponibilidad]->name;?></li>		
		<li><span class="blue">Salario:</span> $7000</li>
		<li><span class="blue">Vacantes:</span> 1</li>
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
	</p>
	<!--  Descripcion del empleo end -->
	</div>
    <!--  Requisitos -->	
	<div style="width: 300px; float: left;">
	<p><span class="blue stg">Requisitos que deben cumplir los postulantes:</span></p>
	<ul>
		<li>Educaci&oacute;n: Universitario, Graduado</li>
		<li>Area de estudio: Adm. de Empresas,<br>Contabilidad / Auditor&iacute;a, Econom&iacute;a<br>Finanzas, MarketingComercializaci&oacute;n</li>
	</ul>
	Idioma: Ingl&eacute;s
	<!--  Requisitos end -->
	</div>
	
<!-- Ficha end  -->
</div>

<pre>
<?php //print_r($nodo); ?>
</pre>