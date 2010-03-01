<?php if (arg(1) != "register"){?>
<?php
	global $user;
	if(!$user->uid){
?>
<div>
	<!-- <form id="form1" name="logonform" method="post" action="clasific.asp"> -->
		<form id="user-login" method="post" accept-charset="UTF-8" action="?q=user">
			Usuario: <input type="text" class="form-text required" tabindex="1" value="" size="60" id="edit-name" name="name" maxlength="60"><br />
			Contrase&ntilde;a: <input type="password" class="form-text required" tabindex="2" size="60" id="edit-pass" name="pass"><br />
			<input type="hidden" value="user_login" id="edit-user-login" name="form_id">
			<input type="submit" class="form-submit" tabindex="3" value="Ingresar" id="edit-submit" name="op"><br />
		</form>
		<a href="?q=user/register/persona">Registrarme como persona</a> | 
		<a href="?q=user/register/empresa">Registrarme como Empresa</a> | 
		<a href="?q=user/password">Olvid&eacute; mi clave</a>
</div>
<?php 
	}else{
		?>
		<div>
			Hola <?php echo $user->name; ?>!<br />
			Ver <a href="?q=user/me/edit">mi perf&iacute;l</a> <br />
			<a href="?q=logout">Salir</a>
			<?php if($user->uid == 1){?><a href="?q=admin">Administraci&oacute;n</a><?php }?>
		</div>
		<?php
	}
?>
<?php } ?>
<br><br>