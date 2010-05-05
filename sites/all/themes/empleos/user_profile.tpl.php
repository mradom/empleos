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
			  	 	 	print '<a href="/job/applications">Mis Aplicaciones</a><br>';
			  	 	 	print '<br>&nbsp;<br>&nbsp;<br>&nbsp;';		  	 	 	
			  	 	    //print '</div>';
						$where='';
			  		 }
			  	 } else {
			  	 	 if ($user->uid) { 
			  	 	 	//print '<div style="border: 1px solid #ccc ;">';
						print '<div><a href="/user/me/edit"><img class="right" title="Cambiar im&aacute;gen" src="/'.$user->picture.'"></a></div>';
			  	 	 	print 'Persona<br>';
			  	 	 	print 'Bienvenido '.$fields['Empleado']['profile_empl_apellido']['value'].', '.$fields['Empleado']['profile_empl_nombre']['value'].'<br>';
			  	 	 	print '<a href="/job/applications">Mis Aplicaciones</a><br>';	  	 	 	
			  	 	    //print '</div>';
			  	 	    print '<br>&nbsp;<br>&nbsp;<br>&nbsp;';
						$where='';
			  		 } 
			  	 }
				 
				 
				 
				 
				$nov_nota=0;
				$sql = "SELECT * FROM {node} WHERE status = 1 AND type='novedades' LIMIT 10";
				$rs = db_query($sql);
				
				print '<div>';
				while($fila = mysql_fetch_object($rs)){
					$nota = node_load($fila->nid);
					//print '<pre>';
					//print_r($nota);					
					//print '<pre>';					
					print '<div>';
					print '<div>'.substr($nota->field_fecha_0[0]['value'],0,10).'</div>';
                    print '<div><span>'.$nota->field_title.'</span></div>';
					print '<a href="/novedades/'.$nota->nid.'" target="_top" title="'.$nota->title.'">';
					print '<img src="/'.$nota->field_foto_0[0]['filepath'].'">';
                    print '<div><span>'.$nota->field_resumen_0[0]['value'].'</span></div>';
                    print '</a>';
					print '</div>';
					$nov_nota+= 1;
				}
				print '</div>';			 
print '</div>';
?>