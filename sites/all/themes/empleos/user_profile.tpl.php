<?php 
global $user;
global $user_profile;

if (in_array('empresa', array_values($user->roles))) {
      print '<div class="box top" style="background: url(/sites/all/themes/empleos/img/bg_box_top-e.jpg")>';
      print '<p><strong>Este es el resumen de tu cuenta.</strong> Los datos que aqu&iacute; se muestran te permitir&aacute;n tener un panorama general de las acciones que realices como usuario de empleoslavoz.com.ar. <br />
Este resumen  puede ayudarte a planificar o perfeccionar tus futuras b&uacute;squedas y publicaciones de avisos.</p>';
      print '</div>';
      include("include/submenu-empresa.php");
 } else {
     print '<div class="box top" style="background: url(/sites/all/themes/empleos/img/bg_box_top0.jpg)">';
     print '<p >Este es el <strong>resumen de tu cuenta.</strong> Los datos que aqu&iacute; se muestran te permitir&aacute;n tener un panorama general de las acciones que realices como usuario de empleoslavoz.com.ar.<br>';
	 print 'Este resumen  puede ayudarte a planificar o perfeccionar tus futuras b&uacute;squedas.';
     print '</p></div>';
     include("include/submenu-usuarios.php");
}



//firep($fields, 'Fields');
//firep($user, 'User');
//firep($user_profile, 'User');

print '<div>';
				if (in_array('empresa', array_values($user->roles))) {
				  	 if ($user->uid) { 
 						print '<div><a href="/user/me/edit"><img class="right" title="Cambiar logo" src="/'.$user->picture.'"></a><div>';
						//print '<div style="border: 1px solid #ccc ;">';
			  	 	 	print 'Empresa<br>';
			  	 	 	print '<a href="//job/applications">Mis Aplicaciones</a><br>';
			  	 	 	print '<br>&nbsp;<br>&nbsp;<br>&nbsp;';		  	 	 	
			  	 	    //print '</div>';
			  		 }
			  	 } else {
			  	 	 if ($user->uid) { 
			  	 	 	//print '<div style="border: 1px solid #ccc ;">';
						print '<div><a href="/user/me/edit"><img class="right" title="Cambiar im&aacute;gen" src="/'.$user->picture.'"></a><div>';
			  	 	 	print 'Persona<br>';
			  	 	 	print 'Bienvenido '.$fields['Empleado']['profile_empl_apellido']['value'].', '.$fields['Empleado']['profile_empl_nombre']['value'].'<br>';
			  	 	 	print '<a href="//job/applications">Mis Aplicaciones</a><br>';	  	 	 	
			  	 	    //print '</div>';
			  	 	    print '<br>&nbsp;<br>&nbsp;<br>&nbsp;';
			  		 } 
			  	 }
print '</div>';
?>