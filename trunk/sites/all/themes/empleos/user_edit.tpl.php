<?php
	global $user;
	?>
	<a href="?q=user/<?php echo $user->uid; ?>/edit">Editar datos de mi cuenta</a></br>
	<?php
	if(in_array("empresa",$user->roles)){
		?>
			<p><a href="?q=user/<?php echo $user->uid; ?>/edit/Empresa">Editar Datos de la empresa</a></p>
		<?php
	}else{
		?>
			<p><a href="?q=user/<?php echo $user->uid; ?>/edit/Empleado">Editar Datos de CV</a></p>
		<?php
	}
	//echo "<a href='?q=node/add'>Mi curriculum</a>";
   print drupal_render($form); // this displays the login form.
?>