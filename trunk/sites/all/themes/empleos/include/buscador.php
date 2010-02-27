      <div class="white left">
        <div class="title">
          <h1>&iquest;Qu&eacute; empleo busc&aacute;s?</h1>
          <h3>Conoc&eacute; la manera m&aacute;s r&aacute;pida de encontrar 
            el trabajo que necesit&aacute;s</h3>
        </div>
        <div style="clear: both;"></div>
        <div class="content_form">
          <form action="/empleos/?q=buscar" method="POST" id="buscador">
            <input class="home" style="padding: 0.2em; width: 243px;" name="key" value="" type="text">
            <select name="rubro" class="home">
            <option value="0" selected="selected">&Aacute;rea / Rubro</option>
            	<?php 
            		$area = taxonomy_get_tree("1");
            		foreach($area as $value){
            			echo "<option value='$value->tid'>$value->name</option>";
            		}
            	?>
            </select>
            <select name="zona" class="home">
            	<option value="0" selected="selected">Zona geogr&aacute;fica</option>
            	<?php 
            		$pronvincias = taxonomy_get_tree("17");
            		foreach($pronvincias as $value){
            			echo "<option value='$value->tid'>$value->name</option>";
            		}
            	?>
            </select>
            <input name="buscar" class="btn_buscar" value="" alt="Buscar" type="submit">
          </form>
        </div>
      </div>