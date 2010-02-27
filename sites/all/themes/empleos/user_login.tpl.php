<!-- 
Aca poner el codigo html de login
 -->

<div class="login_form">
<?php
   print drupal_render($form); // this displays the login form.
?>
<p>
	<a href="?q=user/register/usuario">Registro de Usuario</a>
</p>
<p>
	<a href="?q=user/register/empleador">Registro de Empleadores</a>
</p>
</div>