<?php 
global $user;
global $user_profile;
//firep($account, 'Account');
firep($fields, 'Fields');
firep($user, 'User');
//firep($user_profile, 'User');

				if (in_array('empresa', array_values($user->roles))) {
				  	 if ($user->uid) { 
						print '<div style="border: 1px solid #ccc ;">';
			  	 	 	print 'es empresa<br>';
			  	 	 	print '<a href="?q=/job/applications">Mis Aplicaciones</a><br>';
			  	 	 	print '<a href="?q=/user/me/edit/Empleado">Mi CV</a><br>';			  	 	 	
			  	 	 	print 'Menu';
			  	 	    print '</div>';
			  		 }
			  	 } else {
			  	 	 if ($user->uid) { 
			  	 	 	print '<div style="border: 1px solid #ccc ;">';
			  	 	 	print 'es persona<br>';
			  	 	 	print 'Bienvenido '.$fields['Empleado']['profile_empl_apellido']['value'].', '.$fields['Empleado']['profile_empl_nombre']['value'].'<br>';
			  	 	 	print '<a href="?q=/job/applications">Mis Aplicaciones</a><br>';
			  	 	 	print '<a href="?q=/user/me/edit/Empleado">Mi CV</a><br>';			  	 	 	
			  	 	 	print 'Menu';
			  	 	    print '</div>';
			  		 } 
			  	 }
?>    