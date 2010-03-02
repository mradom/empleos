<!-- Inicio RECONDAR CONTRASEÑA  ............................. -->
<div>
	<!-- Inicio tit mod -->
	<div>
		<h4>¿Olvidaste tu contraseña?</h4>
	</div>
	<!-- Fin tit mod -->
	
	<!-- Inicio cuerpo -->
	<div>
		<p>Ingresá la casilla de e-mail con la que te registraste y te enviaremos a la brevedad tu contraseña.</p>
		<form action="/?q=user/password"  accept-charset="UTF-8" method="post" id="user-pass">
			<p>
				<label for="email">E-mail:</label><input type="<?php print $form['name']['#type']; ?>" id="edit-name" name="name" class="form_t4" />
				<input id="" type="<?php print $form['submit']['#type']; ?>" value="Recuperar clave" name="op" class="boton">
			</p>
			<input type="hidden" name="form_id" id="edit-user-pass" value="user_pass"  />
		</form>  														 
	</div>
	<!-- Fin cuerpo -->	
				
</div>
<!-- Fin RECONDAR CONTRASEÑA ............................. -->