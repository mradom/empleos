<?php
global $user;
if(!$user->uid){?>
	<div id="login">
		<ul class="log">
			<li><a title="Ingresar" href="/user">Ingresar</a> |&nbsp;</li>
			<li><a title="Registrarse" href="/user/register/persona">Registrarse</a> |&nbsp;</li>
			<li><a title="Contacto" href="/contact">Contacto</a></li>
			<li class="destacar">
				<a title="Registrarse como empleador" href="/user/register/empresa"><span style="color:#FFF">Registro Empleadores</span>
				</a>&nbsp;&nbsp;&nbsp;<a title="Preguntas frecuentes" href="/faq">C&oacute;mo publico un aviso?</a>
			</li></ul>
	</div>
<?php }else{?>
	<div id="login">
		<ul class="log">
			<li><a title="Mis preferencias" href="/user/me/edit">Hola <strong><?php print $user->name; ?></strong></a> |&nbsp;</li>
			<li><a title="Mi cuenta" href="/user/me">Mi cuenta</a> |&nbsp;</li>
			<li><a title="Salir" href="/logout">Salir</a> |&nbsp;</li>
			<li><a title="Contacto" href="/contact">Contacto</a></li>
			<li class="destacar">
				<a title="Registrarse como empleador" href="/user/register/empresa">
					<span style="color:#FFF">Ingreso Empleadores</span>
				</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a title="Preguntas frecuentes" href="/faq">C&oacute;mo publico un aviso?</a>
			</li>
		</ul>
	</div>
<?php }?>