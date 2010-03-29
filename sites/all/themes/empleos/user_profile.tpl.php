<?php 
global $user;
global $user_profile;
?>
<div class="box top" style="background: url(sites/all/themes/empleos/img/bg_box_top2.jpg)">
<p><strong>Detall&aacute; tus estudios</strong> empezando desde el colegio
secundario en adelante. Si no ten&eacute;s estudios, dej&aacute; el formulario en
blanco y continu&aacute; con el siguiente paso. <br>
Si ten&eacute;s estudios, al ingresarlos consider&aacute; que los &iacute;tems destacados en
<span style="color: #248CC4; font-weight: bold">celeste</span> son
obligatorios.</p>

<div><img style="padding-left: 100px;" src="sites/all/themes/empleos/img/10pasos.png"></div>
<div><img style="padding-left: 150px" src="sites/all/themes/empleos/img/2paso.png"></div>
</div>
<!-----submenu----->
<?php include("include/submenu-usuarios.php");?>
<!-----tabla----->
<?php 
firep($fields, 'Fields');
firep($user, 'User');
//firep($user_profile, 'User');

				if (in_array('empresa', array_values($user->roles))) {
				  	 if ($user->uid) { 
						print '<div style="border: 1px solid #ccc ;">';
			  	 	 	print 'es empresa<br>';
			  	 	 	print '<a href="?q=/job/applications">Mis Aplicaciones</a><br>';		  	 	 	
			  	 	    print '</div>';
			  		 }
			  	 } else {
			  	 	 if ($user->uid) { 
			  	 	 	print '<div style="border: 1px solid #ccc ;">';
			  	 	 	print 'es persona<br>';
			  	 	 	print 'Bienvenido '.$fields['Empleado']['profile_empl_apellido']['value'].', '.$fields['Empleado']['profile_empl_nombre']['value'].'<br>';
			  	 	 	print '<a href="?q=/job/applications">Mis Aplicaciones</a><br>';	  	 	 	
			  	 	    print '</div>';
			  		 } 
			  	 }
?>
