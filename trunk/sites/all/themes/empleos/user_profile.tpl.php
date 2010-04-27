<?php 
global $user;
global $user_profile;

//firep($fields, 'Fields');
//firep($user, 'User');
//firep($user_profile, 'User');

print '<div  class="content_grl">';
				if (in_array('empresa', array_values($user->roles))) {
				  	 if ($user->uid) { 
 						print '<div><a href="/user/me/edit"><img class="right" title="Cambiar logo" src="/'.$user->picture.'"></a></div>';
						//print '<div style="border: 1px solid #ccc ;">';
			  	 	 	print 'Empresa<br>';
			  	 	 	print '<a href="//job/applications">Mis Aplicaciones</a><br>';
			  	 	 	print '<br>&nbsp;<br>&nbsp;<br>&nbsp;';		  	 	 	
			  	 	    //print '</div>';
			  		 }
			  	 } else {
			  	 	 if ($user->uid) { 
			  	 	 	//print '<div style="border: 1px solid #ccc ;">';
						print '<div><a href="/user/me/edit"><img class="right" title="Cambiar im&aacute;gen" src="/'.$user->picture.'"></a></div>';
			  	 	 	print 'Persona<br>';
			  	 	 	print 'Bienvenido '.$fields['Empleado']['profile_empl_apellido']['value'].', '.$fields['Empleado']['profile_empl_nombre']['value'].'<br>';
			  	 	 	print '<a href="//job/applications">Mis Aplicaciones</a><br>';	  	 	 	
			  	 	    //print '</div>';
			  	 	    print '<br>&nbsp;<br>&nbsp;<br>&nbsp;';
			  		 } 
			  	 }
print '</div>';
?>