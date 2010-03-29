<?php 
    if(arg(0) == "user" and arg(1)==$user->uid and arg(2)==''){ $ant="#"; $sig="?q=user/me/edit/Empleado";}
    if(arg(3) == "Empleado"){ $ant="?q=user/me"; $sig="?q=mieducacion/me";} 
    if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){$ant="?q=user/me/edit/Empleado"; $sig="?q=micursos/me"; }
    if(($node->type=='p_cursos') or (arg(2)=='p-cursos') or ($node->nid == 31)){$ant="?q=mieducacion/me"; $sig="?q=miidiomas/me";  } 
	if(($node->type=='p_idiomas') or (arg(2)=='p-idiomas') or ($node->nid == 33)){$ant="?q=micursos/me"; $sig="?q=miinformatica/me";  }         
    if(($node->type=='p_informatica') or (arg(2)=='p-informatica') or ($node->nid == 32)){$ant="?q=miidiomas/me"; $sig="?q=miotrosconocimientos/me";  }  
    if(($node->type=='p_otros_conocimientos') or (arg(2)=='p-otros-conocimientos') or ($node->nid == 34)){$ant="?q=miinformatica/me"; $sig="?q=miexperiencialaboral/me";  }
    if(($node->type=='p_experiencia_laboral') or (arg(2)=='p-experiencia-laboral') or ($node->nid == 35)){$ant="?q=miotrosconocimientos/me"; $sig="?q=mireferencia/me";  }
    if(($node->type=='p_referencia') or (arg(2)=='p-referencia') or ($node->nid == 51)){$ant="?q=miexperiencialaboral/me"; $sig="?q=miobjetivolaboral/me";  }
    if(($node->type=='p_objetivo_laboral') or (arg(2)=='p-objetivo-laboral') or ($node->nid == 36)){$ant="?q=mireferencia/me"; $sig="?q=miprevisualizar/me";  }
    if($node->nid == 55){$ant="?q=miobjetivolaboral/me"; $sig="#";  } 
?>    
    <DIV class="menu submenu"> 
      <UL class="submenu">
        <li class="btns ant" style="padding-left:6px"><a href="<?php print $ant;?>"></a></li> 
        <li><A href="?q=user/me" <?php if(arg(0) == "user" and arg(1)==$user->uid and arg(2)==''){ echo "class='active'";}?>>Home</A></LI>
        <li><A href="?q=user/me/edit/Empleado" <?php if(arg(3) == "Empleado"){ echo "class='active'";}?>>Datos de contacto</A></LI> 
        <li><A href="?q=mieducacion/me" <?php if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){ echo "class='active'";}?>>Educaci&oacute;n</A></LI> 
        <li><A href="?q=micursos/me" <?php if(($node->type=='p_cursos') or (arg(2)=='p-cursos') or ($node->nid == 31)){ echo "class='active'";}?>>Cursos</A></LI> 
		<li><A href="?q=miidiomas/me" <?php if(($node->type=='p_idiomas') or (arg(2)=='p-idiomas') or ($node->nid == 33)){ echo "class='active'";}?>>Idiomas</A></LI>        
        <li><A href="?q=miinformatica/me" <?php if(($node->type=='p_informatica') or (arg(2)=='p-informatica') or ($node->nid == 32)){ echo "class='active'";}?>>Inform&aacute;tica</A></LI>  
        <li><A href="?q=miotrosconocimientos/me" <?php if(($node->type=='p_otros_conocimientos') or (arg(2)=='p-otros-conocimientos') or ($node->nid == 34)){ echo "class='active'";}?>>Otros conocimentos</A></LI> 
        <li><A href="?q=miexperiencialaboral/me" <?php if(($node->type=='p_experiencia_laboral') or (arg(2)=='p-experiencia-laboral') or ($node->nid == 35)){ echo "class='active'";}?>>Experiencia laboral</A></LI> 
        <li><A href="?q=mireferencia/me" <?php if(($node->type=='p_referencia') or (arg(2)=='p-referencia') or ($node->nid == 51)){ echo "class='active'";}?>>Referencias</A></LI> 
        <li><A href="?q=miobjetivolaboral/me" <?php if(($node->type=='p_objetivo_laboral') or (arg(2)=='p-objetivo-laboral') or ($node->nid == 36)){ echo "class='active'";}?>>Objetivo laboral</A></LI> 
        <li><A href="?q=miprevisualizar/me" <?php if($node->nid == 55){ echo "class='active'";}?>>Previsualizar</A></li> 
        <li class="btns sig" style="padding-left:0px"><a href="<?php print $sig;?>"></a></li>
      </UL> 
      <DIV class="line-submenu"></DIV> 
    </DIV>
    
