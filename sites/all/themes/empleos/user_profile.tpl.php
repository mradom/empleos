<?php 
global $user;
firep($account, 'Account');
firep($fields, 'Fields');
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
			  	 	 	print 'es persona';
			  	 	 	print '<a href="?q=/job/applications">Mis Aplicaciones</a><br>';
			  	 	 	print '<a href="?q=/user/me/edit/Empleado">Mi CV</a><br>';			  	 	 	
			  	 	 	print 'Menu';
			  	 	    print '</div>';
			  		 } 
			  	 }
?>    