<!----BUSQUEDA SIMPLE---->
    <div id='tab-container'>

      <div class="tab-content">
        <h1 class="tab" title="nueva busqueda">Nueva b&uacute;squeda</h1>
        <div class="widget">
          <div class="widget_style">
            <div class="content_form">
              <form class="nueva_busqueda" action="?q=buscar" method="POST" id="buscador">
                <input style=" padding:.2em; margin-left:15px" name="key" type="text" value="Buscar por palabras clave" onFocus="if(this.value=='Buscar por palabras clave')this.value='';" >
                <select  name="rubro" class="select" >

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
                <input style="margin:15px 35%; margin-bottom:0;" name="buscar" type="submit" class="btn_buscar" value="" alt="Buscar" />
                
              </form>
            </div>

           <div class="arrow lupa"><a href="#">B&uacute;squeda avanzada</a></div> 
          </div>
        </div>
      </div>
      <script type="text/javascript" src="sites/all/themes/empleos/js/tabs.js"></script>
    </div>
