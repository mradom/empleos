<?php 
global $user;
global $user_profile;
?>
<div class="box top" style="background: url(sites/all/themes/empleos/img/bg_box_top0.jpg)">
<p style="float:left">En solo 10 pasos <strong>carga y actualiza </strong>permanentemente tus datos aumentando tus oportunidades<br>
 de conseguir el empleo que buscas.<br>
Si lo deseas, las empresas y consultoras que accedan a nuestra base de datos<br> en busca de candidatos podran consultar tu curriculum.
</p>



</div>
<!-- -submenu--- -->
<?php 
  if (in_array('empresa', array_values($user->roles))) {
      include("include/submenu-empresa.php");
  } else {
  	  include("include/submenu-usuarios.php");
  }
?>
<!-- -tabla--- -->
<?php 
firep($fields, 'Fields');
firep($user, 'User');
//firep($user_profile, 'User');

				if (in_array('empresa', array_values($user->roles))) {
				  	 if ($user->uid) { 
						//print '<div style="border: 1px solid #ccc ;">';
			  	 	 	print 'Empresa<br>';
			  	 	 	print '<a href="?q=/job/applications">Mis Aplicaciones</a><br>';
			  	 	 	print '<br>&nbsp;<br>&nbsp;<br>&nbsp;';		  	 	 	
			  	 	    //print '</div>';
			  		 }
			  	 } else {
			  	 	 if ($user->uid) { 
			  	 	 	//print '<div style="border: 1px solid #ccc ;">';
			  	 	 	print 'Persona<br>';
			  	 	 	print 'Bienvenido '.$fields['Empleado']['profile_empl_apellido']['value'].', '.$fields['Empleado']['profile_empl_nombre']['value'].'<br>';
			  	 	 	print '<a href="?q=/job/applications">Mis Aplicaciones</a><br>';	  	 	 	
			  	 	    //print '</div>';
			  	 	    print '<br>&nbsp;<br>&nbsp;<br>&nbsp;';
			  		 } 
			  	 }
?>
