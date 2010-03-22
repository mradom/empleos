<?php 
	//user/login&destination=user/me/edit/Empleado
	// Mis datos personales -> user/2/edit/Empleado
	if(arg(0) == "user" and arg(2) == "edit" and arg(3) == "Empleado"){
		include("step1.php");
	}elseif(arg(2) == "p-educacion"){
		include("step2.php");
	}elseif(arg(2) == "p-cursos"){
		include("step3.php");
	}elseif(arg(2) == "p-idiomas"){
		include("step4.php");
	}elseif(arg(2) == "p-informatica"){
		include("step5.php");
	}elseif(arg(2) == "p-otros-conocimientos"){
		include("step6.php");
	}elseif(arg(2) == "p-experiencia-laboral"){
		include("step7.php");
	}elseif(arg(2) == "p-referencia"){
		include("step8.php");
	}elseif(arg(2) == "p-objetivo-laboral"){
		include("step9.php");
	}else{
		include("buscador.php");
	}
	//p-experiencia-laboral 
	//p-referencia
	//p-objetivo-labora
?> 