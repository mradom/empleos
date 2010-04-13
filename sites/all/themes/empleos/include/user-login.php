<?php
global $user;
if(!$user->uid){?>
	<div id="login">
		<ul class="log">
			<li><a title="Ingresar" href="?q=user">Ingresar</a> |&nbsp;</li>
			<li><a title="Registrarse" href="?q=user/register/persona">Registrarse</a> |&nbsp;</li>
			<li><a title="Contacto" href="?q=contact">Contacto</a></li>
			<li class="destacar">
				<a title="Registrarse como empleador" href="?q=user/register/empleador"><span style="color:#FFF">Registro Empleadores</span>
				</a>&nbsp;&nbsp;&nbsp;<a title="Preguntas frecuentes" href="?q=faq">C&oacute;mo publico un aviso?</a>
			</li></ul>
	</div>
<?php }else{?>
	<div id="login">
		<ul class="log">
			<li><a title="Mis preferencias" href="?q=user/me/edit">Hola <strong><?php print $user->name; ?></strong></a> |&nbsp;</li>
			<li><a title="Mi cuenta" href="?q=user/me">Mi cuenta</a> |&nbsp;</li>
			<li><a title="Salir" href="?q=logout">Salir</a> |&nbsp;</li>
			<li><a title="Contacto" href="?q=contact">Contacto</a></li>
			<li class="destacar"><a title="Registrarse como empleador" href="?q=user/register/empleador"><span style="color:#FFF">Ingreso Empleadores</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a title="Preguntas frecuentes" href="?q=faq">C&oacute;mo publico un aviso?</a>
			</li>
		</ul>
	</div>
<?php }?>