<div class="white left">
  <h2 class="datos"><span class="underline">1668</span> empleos en <span class="underline">3542</span> empresas</h2>
	<div class="title">
	  <h1>&iquest;Qu&eacute; empleo busc&aacute;s?</h1>
	  <h3>Conoc&eacute; la manera m&aacute;s r&aacute;pida de encontrar 
		el trabajo que necesit&aacute;s</h3>
	</div>
	<div style="clear: both;"></div>
	<div class="content_form">
	  <form action="?q=buscar" method="POST" id="buscador">
		<input class="home" style="padding: 0.2em; width: 250px;" name="key" value="Buscar por palabras clave" type="text" onFocus="if(this.value=='Buscar por palabras clave')this.value='';">
		<select name="rubro" class="home">
		<option value="0" selected="selected">&Aacute;rea / Rubro</option>
			<?php 
				$area = taxonomy_get_tree(get_vocabulary_by_name('Area'));
				foreach($area as $value){
					echo "<option value='$value->tid'>$value->name</option>";
				}
			?>
		</select>
		<select name="zona" class="home">
			<option value="0" selected="selected">Zona geogr&aacute;fica</option>
			<?php 
				$pronvincias = taxonomy_get_tree(get_vocabulary_by_name('Provincias'));
				foreach($pronvincias as $value){
					echo "<option value='$value->tid'>$value->name</option>";
				}
			?>
		</select>
		<input name="buscar" class="btn_gral" style="margin-left:60px; padding:0 15px 3px 15px;" value="Buscar Ahora" alt="Buscar" type="submit" dir="ltr">
	  </form>
	  <div class="btn_busquedaA"><a href="?q=avanzada">B&uacute;squeda avanzada</a></div>
	</div>
</div>