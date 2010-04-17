<?php 
    //if(arg(0) == "user" and arg(1)==$user->uid and arg(2)==''){ $ant="#"; $sig="/user/me/edit/Empleado";}
    //if(arg(3) == "Empleado"){ $ant="/user/me"; $sig="/mieducacion/me";} 
    //if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){$ant="/user/me/edit/Empleado"; $sig="/micursos/me"; }
    //if(($node->type=='p_cursos') or (arg(2)=='p-cursos') or ($node->nid == 31)){$ant="/mieducacion/me"; $sig="/miidiomas/me";  } 
	//if(($node->type=='p_idiomas') or (arg(2)=='p-idiomas') or ($node->nid == 33)){$ant="/micursos/me"; $sig="/miinformatica/me";  }         
    //if(($node->type=='p_informatica') or (arg(2)=='p-informatica') or ($node->nid == 32)){$ant="/miidiomas/me"; $sig="/miotrosconocimientos/me";  }  
    //if(($node->type=='p_otros_conocimientos') or (arg(2)=='p-otros-conocimientos') or ($node->nid == 34)){$ant="/miinformatica/me"; $sig="/miexperiencialaboral/me";  }
    //if(($node->type=='p_experiencia_laboral') or (arg(2)=='p-experiencia-laboral') or ($node->nid == 35)){$ant="/miotrosconocimientos/me"; $sig="/mireferencia/me";  }
    //if(($node->type=='p_referencia') or (arg(2)=='p-referencia') or ($node->nid == 51)){$ant="/miexperiencialaboral/me"; $sig="/miobjetivolaboral/me";  }
    //if(($node->type=='p_objetivo_laboral') or (arg(2)=='p-objetivo-laboral') or ($node->nid == 36)){$ant="/mireferencia/me"; $sig="/miprevisualizar/me";  }
    //if($node->nid == 55){$ant="/miobjetivolaboral/me"; $sig="#";  } 
?>    
    <div class="menu submenu"> 
      <ul class="submenu">
        <!--<li class="btns ant" style="width:24px; margin-left:5px"><a href="<?php print $ant;?>"></a></li> -->
        <li><A title="Home" href="/user/me" <?php if(arg(0) == "user" and arg(1)==$user->uid and arg(2)==''){ echo "class='active'";}?>>Home</A></LI>
        <li><A title="Datos de contacto" href="/user/me/edit/Empleado" <?php if(arg(3) == "Empleado"){ echo "class='active'";}?>>Datos de contacto</A></LI> 
        <li><A title="Educaci&oacute;n" href="/mieducacion/me" <?php if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){ echo "class='active'";}?>>Educaci&oacute;n</A></LI> 
        <li><A title="Cursos" href="/micursos/me" <?php if(($node->type=='p_cursos') or (arg(2)=='p-cursos') or ($node->nid == 31)){ echo "class='active'";}?>>Cursos</A></LI> 
		<li><A title="Idiomas" href="/miidiomas/me" <?php if(($node->type=='p_idiomas') or (arg(2)=='p-idiomas') or ($node->nid == 33)){ echo "class='active'";}?>>Idiomas</A></LI>        
        <li><A title="Inform&aacute;tica" href="/miinformatica/me" <?php if(($node->type=='p_informatica') or (arg(2)=='p-informatica') or ($node->nid == 32)){ echo "class='active'";}?>>Inform&aacute;tica</A></LI>  
        <li><A title="Otros conocimientos" href="/miotrosconocimientos/me" <?php if(($node->type=='p_otros_conocimientos') or (arg(2)=='p-otros-conocimientos') or ($node->nid == 34)){ echo "class='active'";}?>>Otros conocimentos</A></LI> 
        <li><A title="Experiencia laboral" href="/miexperiencialaboral/me" <?php if(($node->type=='p_experiencia_laboral') or (arg(2)=='p-experiencia-laboral') or ($node->nid == 35)){ echo "class='active'";}?>>Experiencia laboral</A></LI> 
        <li><A title="Referencias laborales" href="/mireferencia/me" <?php if(($node->type=='p_referencia') or (arg(2)=='p-referencia') or ($node->nid == 51)){ echo "class='active'";}?>>Referencias</A></LI> 
        <li><A title="Objetivo laboral" href="/miobjetivolaboral/me" <?php if(($node->type=='p_objetivo_laboral') or (arg(2)=='p-objetivo-laboral') or ($node->nid == 36)){ echo "class='active'";}?>>Objetivo laboral</A></LI> 
        <li><A title="Previsualizar CV" href="/miprevisualizar/me" <?php if($node->nid == 55){ echo "class='active'";}?>>Previsualizar</A></li> 
        <!--<li class="btns sig" style="width:20px; margin-right:5px"><a href="<?php print $sig;?>"></a></li>-->
      </ul> 
      <div class="line-submenu"></div> 
    </div>