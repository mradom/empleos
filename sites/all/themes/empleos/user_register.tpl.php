<!-- 
Aca poner el formulario de registro
 -->
<div class="login_form">
	<form action="/empleos/?q=user/register/empleador"  accept-charset="UTF-8" method="post" id="user-register">
		<div>
			<div class="form-item" id="edit-name-wrapper">
 				<label for="edit-name">Usuario: <span class="form-required" title="This field is required.">*</span></label>
 					<input type="text" maxlength="60" name="name" id="edit-name"  size="60" value="" class="form-text required" />
			</div>
			<div class="form-item" id="edit-mail-wrapper">
 				<label for="edit-mail">Email: <span class="form-required" title="This field is required.">*</span></label>
				<input type="text" maxlength="64" name="mail" id="edit-mail"  size="60" value="" class="form-text required" />
			</div>
			<div class="form-item" id="edit-pass-wrapper">
 				<div class="form-item" id="edit-pass-pass1-wrapper">
 					<label for="edit-pass-pass1">Contrase&ntilde;a: <span class="form-required" title="This field is required.">*</span></label>
 					<input type="password" name="pass[pass1]" id="edit-pass-pass1"  size="25"  class="form-text required" />
				</div>
				<div class="form-item" id="edit-pass-pass2-wrapper">
					<label for="edit-pass-pass2">Confirmar contrase&ntilde;a: <span class="form-required" title="This field is required.">*</span></label>
 					<input type="password" name="pass[pass2]" id="edit-pass-pass2"  size="25"  class="form-text required" />
				</div>
			</div>
			<input type="hidden" name="form_id" id="edit-user-register" value="user_register"  />
			<input type="submit" name="op" id="edit-submit" value="Registrarme"  class="form-submit" />
		</div>
		<input type="hidden" name="tipo_usuario" id="tipo_usuario" value="<?php echo arg(2);?>"  />
	</form>
</div>