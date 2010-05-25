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
if($user->roles[5] == "empresa" and $node->uid == $user->uid){
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
		            	<div class="btn_gral low" style="float: right">
							<!-- <a href="#" id="enviar-amigo">Enviar a un amigo</a> -->
							<button id="create-user">Enviar a un amigo</button>
						</div>
						
<style type="text/css">
		body { font-size: 62.5%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain { width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
		
	</style>
	<script type="text/javascript">
	$(document).ready(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$("#dialog").dialog("destroy");
		var from = $("#from"), to = $("#to"),msg = $("#msg"),	allFields = $([]).add(from).add(to).add(msg);
		$("#dialog-form").dialog({
			autoOpen: false,
			height: 300,
			width: 350,
			modal: true,
			buttons: {
				'Enviar': function() {
		       		$.post("/enviaramigo.php", "post=" + from.val() + "|" +  to.val() + "|" + msg.val(), function(data){alert(data);});	
		       		to.val("");
		       		msg.val("");				
					$(this).dialog('close');
				},
				'Cancelar': function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				//allFields.val('');//.removeClass('ui-state-error');
			}
		});
		$('#create-user')
			//.button()
			.click(function() {
				$('#dialog-form').dialog('open');
			});

	});
	</script>



<div class="demo">
	<div id="dialog-form" title="Enviar Aviso <?php echo $nodo->title;?>">
		<p class="validateTips">Enviar este aviso a un amigo.</p>
	
		<form>
		<fieldset>
			<label for="from">De: </label>
			<input type="text" name="from" id="from" class="text ui-widget-content ui-corner-all" />
			<label for="to">Para:</label>
			<input type="text" name="to" id="to" value="" class="text ui-widget-content ui-corner-all" />
			<label for="msg">Mensaje: </label>
			<textarea name="msg" rows="2" class="text ui-widget-content ui-corner-all" id="msg"></textarea>
		</fieldset>
		</form>
	</div>
</div><!-- End demo -->


	<div class="titleFicha">
		Oferta de trabajo para:
		<span class="upper orange stg"> <?php echo $nodo->title;?></span>
	</div>
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
        <li><span class="blue">Ramo o actividad:</span> <?php print l($nodo->taxonomy[$ramo]->name, 'taxonomy/term/'.$ramo); ?></li>
        <li><span class="blue">Lugar de trabajo:</span> <?php print l($nodo->taxonomy[$localidad]->name,'taxonomy/term/'.$localidad,''); ?></li> 
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
	<p><span class="blue stg">Descripci&oacute;n del empleo:</span><br />
	<?php echo $nodo->body;?>
	<br />&nbsp;<br />
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
          <?php 
          	$sql = "SELECT field_visitas_value FROM content_type_e_aviso WHERE nid = $nodo->nid";
          	$rs_visitas = db_query($sql);
          	$visitas = db_fetch_object($rs_visitas);
          ?>
          <li>Visitas: <span class="dark"><?php print $visitas->field_visitas_value; ?></span></li>
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
        <div class="arrow">Otras ofertas de trabajo en <?php print l($nodo->taxonomy[$ramo]->name,'taxonomy/term/'.$ramo,'')?></div>
	
    	
<!-- Ficha end  -->
</div>

<?php 
    // genero estadisticas en ajax
print '<script type="text/javascript">';
print '$(document).ready( function(){';
// print '$.get("/empleos/stat/aviso/'.$user->uid.'/'.$node->nid.'", function(x) { alert(x) });';
print '$.get("/empleos/stat/aviso/'.$user->uid.'/'.$node->nid.'", function(x) { });';
print '});</script>';
//print_r($nodo); ?>

<div id="flotante<?php echo $nodo->nid;?>top" class="flotante-top">
	<input id="nodo_url<?php echo $nodo->nid;?>top" type="hidden" />
	<input id="nodo_titulo<?php echo $nodo->nid;?>top" type="hidden" />

    <div class="compartir">
        <div class="compartir_cnt_iconos">            
            <a id="delicious<?php echo $nodo->nid;?>top" href="http://del.icio.us/post?url=http://empleos.lavoz.com.ar/node/<?php echo $nodo->nid;?>&title=<?php echo $nodo->title;?>" Title="Agregar a Del.icio el aviso de <?php echo $nodo->title;?>" target="_blank">
                <img src="/sites/all/themes/empleos/img/ico_compartir_1.jpg" alt="Delicious" width="16" height="16" border="0" />

            </a>
            <a id="facebook<?php echo $nodo->nid;?>top" href="http://www.facebook.com/share.php?u=http://empleos.lavoz.com.ar/node/<?php echo $nodo->nid;?>" Title="Agregar a Facebook el aviso de <?php echo $nodo->title;?>" target="_blank">
                <img src="/sites/all/themes/empleos/img/ico_compartir_2.jpg" alt="Facebook" width="16" height="16" border="0" />
            </a>
            <a id="digg<?php echo $nodo->nid;?>top" href="http://www.digg.com/submit?url=http://empleos.lavoz.com.ar/node/<?php echo $nodo->nid;?>" Title="Agregar a Digg el aviso de <?php echo $nodo->title;?>" target="_blank">
                <img src="/sites/all/themes/empleos/img/ico_compartir_3.jpg" width="16" height="16" border="0" />
            </a>
            <a id="reddit<?php echo $nodo->nid;?>top" href="http://reddit.com/submit?url=http://empleos.lavoz.com.ar/node/<?php echo $nodo->nid;?>" Title="Agregar a Reddit el aviso de <?php echo $nodo->title;?>" target="_blank">
                <img src="/sites/all/themes/empleos/img/ico_compartir_4.jpg" width="16" height="16" border="0" />

            </a>
            <a id="google<?php echo $nodo->nid;?>top" href="http://www.google.com/bookmarks/mark?op=edit&bkmk=http://empleos.lavoz.com.ar/node/<?php echo $nodo->nid;?>&title=<?php echo $nodo->title;?>" Title="Agregar a Google el aviso de <?php echo $nodo->title;?>" target="_blank">
                <img src="/sites/all/themes/empleos/img/ico_compartir_5.jpg" alt="Google" width="16" height="16" border="0" />
            </a>            
            <a id="twitter<?php echo $nodo->nid;?>top" href="http://twitter.com/home?status=Leyendo http://empleos.lavoz.com.ar/node/<?php echo $nodo->nid;?> en empleos.lavoz.com.ar" Title="Agregar a Twitter el aviso de <?php echo $nodo->title;?>" target="_blank">
                <img src="/sites/all/themes/empleos/img/ico_compartir_6.jpg" alt="Twiter" width="16" height="16" border="0" />
            </a>
            <a id="meneame<?php echo $nodo->nid;?>top" href="http://meneame.net/login.php?url=http://empleos.lavoz.com.ar/node/<?php echo $nodo->nid;?>&title=<?php echo $nodo->title;?>" Title="Agregar a Meneame el aviso de <?php echo $nodo->title;?>" target="_blank">
                <img src="/sites/all/themes/empleos/img/ico_compartir_7.jpg" width="16" height="16" border="0" />

            </a>
            <a id="wikio<?php echo $nodo->nid;?>top" href="http://www.wikio.es/vote?url=http://empleos.lavoz.com.ar/node/<?php echo $nodo->nid;?>" Title="Agregar a Wikio el aviso de <?php echo $nodo->title;?>" target="_blank">
                <img src="/sites/all/themes/empleos/img/ico_compartir_8.jpg" alt="RSS" width="16" height="16" border="0" />
            </a>
            <a id="misterWong166884top" href="http://www.mister-wong.es/index.php?action=addurl&bm_url=http://empleos.lavoz.com.ar/node/<?php echo $nodo->nid;?>&bm_description=<?php echo $nodo->title;?>" Title="Agregar a Mister Wong el aviso de <?php echo $nodo->title;?>" target="_blank">
                <img src="/sites/all/themes/empleos/img/ico_compartir_9.jpg" width="16" height="16" border="0" />
            </a>
        </div>
    </div>
</div>