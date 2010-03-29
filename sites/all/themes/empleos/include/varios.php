<?php
Function form_ayuda($ayuda){
if (arg(1)=='add' or arg(2)=='edit' or (arg(0)=='node' and arg(1)==55) ) { 
	switch ($ayuda) {
	    case 'Tip':
	        echo "i equals 0";
	        break;
	    case 'Referencia':
	    	Print '<div id="right_column">';
		    Print '<div class="contentBoxTips">';
		    Print '<div class="ico"><img src="sites/all/themes/empleos/img/help.png"></div>';
		    Print '<div class="box tips">';
		    Print '<h3 class="orange">Ayuda</h3><br>';
		    Print '<p>Beautiful and free icon sets always come in handy. <br>';
		    Print 'Used properly and moderately, <strong>icons can be helpful</strong> to provide users with memorable metaphors and illustrations that would provide a visual support for otherwise unspectacular text blocks.</p>';
		    Print '</div></div></div>';
	        break;
	    case 'Previsualizar':
	        Print '<div id="right_column">';
		    Print '<div class="contentBoxTips">';
		    Print '<div class="ico"><img src="sites/all/themes/empleos/img/help.png"></div>';
		    Print '<div class="box tips">';
		    Print '<h3 class="orange">Ayuda</h3><br>';
	   		Print '<p>&iquest;C&oacute;mo tener un CV m&aacute;s completo? <br>';
		    Print '&deg;&nbsp;Describ&iacute; al m&aacute;ximo tus experiencias laborales o profesionales.<br>';
		    Print '&deg;&nbsp;Actualiz&aacute; tus estudios al d&iacute;a de hoy: cantidad de materias aprobadas, promedio, cursos realizados a la fecha.<br>';  
			Print '&deg;&nbsp;Ingres&aacute; a tu cuenta de <strong>empleoslavoz</strong> al menos una vez por mes.<br>';
			Print '&deg;&nbsp;Puntualiz&aacute; objetivos y preferencias laborales de manera clara y efectiva.</p>';
			Print '</div></div></div>';
	        break;
	        
	     case 'Educacion':
	        Print '<div id="right_column">';
		    Print '<div class="contentBoxTips">';
		    Print '<div class="ico"><img src="sites/all/themes/empleos/img/help.png"></div>';
		    Print '<div class="box tips">';
		    Print '<h3 class="orange">Ayuda</h3><br>';
	   		Print '<p>&iquest;Por qu&eacute; actualizar tu CV? <br>';
		    Print '&deg;&nbsp;Los CVs actualizados son los primeros que ven las empresas al postularse los usuarios.<br>';
		    Print '&deg;&nbsp;Te ayuda a evaluar tu carrera y orientar mejor tu crecimiento laboral.<br>';  
			Print '&deg;&nbsp;Te permite cambiar de estrategia cuando no ten&eacute;s buenos resultados en las b&uacute;squedas.</p>';
			Print '</div></div></div>';  
			break;
		case 'Objetivo Laboral':
	        Print '<div id="right_column">';
		    Print '<div class="contentBoxTips">';
		    Print '<div class="ico"><img src="sites/all/themes/empleos/img/help.png"></div>';
		    Print '<div class="box tips">';
		    Print '<h3 class="orange">Ayuda</h3><br>';
	   		Print '<p>Si estudias y deseas trabajar al mismo tiempo: <br>';
		    Print '&deg;&nbsp;Administr&aacute; bien tu tiempo y consider&aacute; ofertas de trabajo de menor carga horaria.<br>';
		    Print '&deg;&nbsp;Busc&aacute; empleo cerca de tu casa o tu universidad.<br>';  
			Print '&deg;&nbsp;Recurr&iacute; a proyectos universitarios especiales y trabajos voluntarios cuando no ten&eacute;s otras experiencias laborales para mencionar.<br>';
			Print '&deg;&nbsp;Manten&eacute; un di&aacute;logo abierto con tus profesores y empleadores.</p>';
			Print '</div></div></div>';  
			break;
		case 'Idiomas':
	        Print '<div id="right_column">';
		    Print '<div class="contentBoxTips">';
		    Print '<div class="ico"><img src="sites/all/themes/empleos/img/help.png"></div>';
		    Print '<div class="box tips">';
		    Print '<h3 class="orange">Ayuda</h3><br>';
	   		Print '<p>Algunos aspectos que suelen preguntarse en una entrevista de trabajo:<br>';
		    Print '&deg;&nbsp;Sobre tu situaci&oacute;n laboral actual y previa.<br>';
		    Print '&deg;&nbsp;Sobre tu desempe&ntilde;o laboral y profesional.<br>';  
			Print '&deg;&nbsp;Sobre la relaci&oacute;n del trabajo con tu vida personal.<br>';
			Print '&deg;&nbsp;Sobre el conocimiento de la empresa reclutadora.</p>';
			Print '</div></div></div>';  
			break;
			
			
			
	    default:
	    	Print '<div id="right_column">';
		    Print '<div class="contentBoxTips">';
		    Print '<div class="ico"><img src="sites/all/themes/empleos/img/help.png"></div>';
		    Print '<div class="box tips">';
		    Print '<h3 class="orange">General</h3><br>';
		    Print '<p>Beautiful and free icon sets always come in handy. <br>';
		    Print 'Used properly and moderately, <strong>icons can be helpful</strong> to provide users with memorable metaphors and illustrations that would provide a visual support for otherwise unspectacular text blocks.</p>';
		    Print '</div></div></div>';
	        break;	    	
	}
}
}
?>

