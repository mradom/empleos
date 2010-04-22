<form action="/buscar" method="POST" id="buscador">
<fieldset>
	<legend>Busqueda Avanzada</legend>
    	<p>
        	<label for="key">Palabra Clave</label>
            <input type="text" name="key" id="key" />
        </p>
        <p>
        	<label id="rubro">Area</label>
        	<select name="rubro" id="rubro" class="home">
			<option value="0" selected="selected"></option>
				<?php 
					$area = taxonomy_get_tree(get_vocabulary_by_name('Area'));
					foreach($area as $value){
						echo "<option value='$value->tid'>$value->name</option>";
					}
				?>
			</select>
        </p>
        <p>
        	<label for="zona">Zona</label>
			<select name="zona" id="zona" class="home">
				<option value="0" selected="selected"></option>
				<?php 
					$pronvincias = taxonomy_get_tree(get_vocabulary_by_name('Provincias'));
					foreach($pronvincias as $value){
						echo "<option value='$value->tid'>$value->name</option>";
					}
				?>
			</select>
		</p>
		<p>
			<label for="fechaDesde">Fecha desde</label><input type="text" id="fechaDesde" />
		</p>
		<p>
			<label for="fechaHasta">Fecha Hasta</label><input type="text" id="fechaHasta" />
		</p>
		<p>
			<?php 
				$sql = "SELECT u.uid, u.name, pv.value AS razon FROM users AS u INNER JOIN users_roles AS ur ON ur.uid = u.uid INNER JOIN profile_values AS pv ON pv.uid = u.uid WHERE STATUS = 1 AND ur.rid = 5 AND pv.fid = 30 ORDER BY pv.value LIMIT 7";
				$rs = db_query($sql);
			?>
			<label for="empresa">Empresa</label>
			<select name="empresa" id="empresa" class="home">
				<option value="0">&nbsp;</option>
				<?php while($emp = mysql_fetch_object($rs)){ ?>
						<option value="<?php echo $emp->uid; ?>"><?php echo $emp->razon;?></option>
				<?php }?>
			</select>
		</p>
		<span>Edad</span>
		<p>
			<label for="edadDesde">Desde</label>
			<select id="edadDesde" name="edadDesde">
				<option value="0"></option>
				<?php $i=18;while($i<=65){echo "<option value='$i'>$i</option>"; $i++;}?>
			</select>	
		</p>
		<p>
			<label for="edadHasta">Hasta</label>
			<select id="edadHasta" name="edadHasta">
				<option value="0"></option>
				<?php $i=18;while($i<=65){echo "<option value='$i'>$i</option>"; $i++;}?>
			</select>	
		</p>
		<p>
			<label for="residencia">Lugar de Residencia</label>
			<select>
				<option value="0"></option>
				<?php $rs = db_query("SELECT * FROM term_data WHERE vid = 17");?>
				<?php while($t = db_fetch_object($rs)){echo "<option value='".$t->tid."'>".$t->name."</option>";}?>
			</select>
		</p>
		<p>
			<label for="idiomas">Idiomas</label>
			<select id="idiomas">
				<option value="0"></option>
				<?php $rs = db_query("SELECT * FROM term_data WHERE vid = 2");?>
				<?php while($t = db_fetch_object($rs)){echo "<option value='".$t->tid."'>".$t->name."</option>";}?>
			</select>
		</p>
		<p>
			<label for="sexo">Sexo</label>
			<select id="sexo" name="sexo">
				<option value="0">Indistinto</option>
				<option value="1">Masculino</option>
				<option value="2">Femenino</option>
			</select>
		</p>
		<p>
			<label for="disponibilidad">Disponibilidad</label>
			<select id="disponibilidad" name="disponibilidad">
				<option value="0"></option>
				<?php $rs = db_query("SELECT * FROM term_data WHERE vid = 15");?>
				<?php while($t = db_fetch_object($rs)){echo "<option value='".$t->tid."'>".$t->name."</option>";}?>
			</select>
		</p>
		<input name="buscar" class="btn_gral" style="margin-left:60px; padding:0 15px 3px 15px;" value="Buscar Ahora" alt="Buscar" type="submit" dir="ltr">
</fieldset>
	<input type="hidden" name="busqueda" value="avanzada"/>
</form>

	<script type="text/javascript">
	$(function() {
		$("#fechaDesde").datepicker({minDate: -10, maxDate: '+0', hideIfNoPrevNext: true});
		$("#fechaHasta").datepicker({minDate: -10, maxDate: '+0', hideIfNoPrevNext: true});
	});
	</script>