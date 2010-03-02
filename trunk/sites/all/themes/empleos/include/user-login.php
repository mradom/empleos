<?php
global $user;
if(!$user->uid){?>
	<div id="login">
		<ul class="log">
			<li>
				<a href="?q=user">Ingresar</a> |&nbsp;
			</li>
			<li>
				<a href="?q=user/register/persona">Registrarse</a> |&nbsp;
			</li>
			<li>
				<a href="#">Contacto</a>
			</li>
			<li class="destacar">
				<a href="?q=user/register/empleador">
					<span style="color:#FFF">Registro Empleadores</span>
				</a>&nbsp;&nbsp;&nbsp;
				<a href="?q=contacto">C&oacute;mo publico un aviso?</a>
			</li>
		</ul>
	</div>
<?php }else{?>
	<div id="login">
		<ul class="log">
			<li>
				<a href="?q=user/me">Hola <strong><?php print $user->name; ?></strong></a> |&nbsp;
			</li>
			<li>
				<a href="?q=user/me">Mi cuenta</a> |&nbsp;
			</li>
			<li>
				<a href="?q=logout">Salir</a> |&nbsp;
			</li>
			<li>
				<a href="#">Contacto</a>
			</li>
			<li class="destacar">
				<a href="?q=user/register/empleador">
					<span style="color:#FFF">Ingreso Empleadores</span>
				</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="?q=contacto">C&oacute;mo publico un aviso?</a>
			</li>
		</ul>
	</div>
<?php }?>
<br><br>