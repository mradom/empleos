<!-- 
Aca poner el formulario de registro
 -->
<div class="login_form">
<form action="/empleos/?q=user/register/empleador"  accept-charset="UTF-8" method="post" id="user-register">
<div><div class="form-item" id="edit-name-wrapper">
 <label for="edit-name">Username: <span class="form-required" title="This field is required.">*</span></label>
 <input type="text" maxlength="60" name="name" id="edit-name"  size="60" value="" class="form-text required" />
 <div class="description">Your preferred username; punctuation is not allowed except for periods, hyphens, and underscores.</div>
</div>
<div class="form-item" id="edit-mail-wrapper">
 <label for="edit-mail">E-mail address: <span class="form-required" title="This field is required.">*</span></label>

 <input type="text" maxlength="64" name="mail" id="edit-mail"  size="60" value="" class="form-text required" />
 <div class="description">A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail.</div>
</div>
<div class="form-item" id="edit-pass-wrapper">
 <div class="form-item" id="edit-pass-pass1-wrapper">
 <label for="edit-pass-pass1">Password: <span class="form-required" title="This field is required.">*</span></label>
 <input type="password" name="pass[pass1]" id="edit-pass-pass1"  size="25"  class="form-text required" />
</div>
<div class="form-item" id="edit-pass-pass2-wrapper">

 <label for="edit-pass-pass2">Confirm password: <span class="form-required" title="This field is required.">*</span></label>
 <input type="password" name="pass[pass2]" id="edit-pass-pass2"  size="25"  class="form-text required" />
</div>

 <div class="description">Provide a password for the new account in both fields.</div>
</div>
<input type="hidden" name="form_id" id="edit-user-register" value="user_register"  />
<input type="submit" name="op" id="edit-submit" value="Create new account"  class="form-submit" />

</div>

<input type="hidden" name="tipo_usuario" id="tipo_usuario" value="<?php echo arg(2);?>"  />
</form>
</div>