<?php 
    //if(arg(0) == "user" and arg(1)==$user->uid and arg(2)==''){ $ant="#"; $sig="/user/me/edit/Empresa";}
    //if(arg(3) == "Empleado"){ $ant="/user/me"; $sig="/mieducacion/me";} 
    //if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){$ant="/user/me/edit/Empresa"; $sig="/micursos/me"; }
    
    //if($node->nid == 55){$ant="/miobjetivolaboral/me"; $sig="#";  } 
?>    
    <div class="menu submenu"> 
      <ul class="submenu e">
        <!--<li class="btns ant" style="width:24px; margin-left:5px"><a href="<?php print $ant;?>"></a></li> -->
        <li><A title="Home" href="/user/me" <?php if(arg(0) == "user" and arg(1)==$user->uid and arg(2)==''){ echo "class='active'";}?>>Home</A></LI>
        <li><A title="Datos de la empresa" href="/user/me/edit/Empresa" <?php if(arg(3) == "Empresa"){ echo "class='active'";}?>>Datos de la empresa</A></LI> 
        <li><A title="Publicar aviso" href="/node/add/e-aviso" <?php if(($node->type=='e_aviso') or (arg(2)=='e-aviso')){ echo "class='active'";}?>>Publicar aviso</A></LI> 
        <li><A title="Avisos publicados" href="/misavisos" <?php if(($node->type=='p_educacion') or (arg(0)=='misavisos')){ echo "class='active'";}?>>Mis avisos</A></LI>
        <li><A title="Postulaciones" href="/postulantes" <?php if(arg(1) == "106"){ echo "class='active'";}?>>Postulaciones</A></LI>
        <li><A title="Estado de cuenta" href="/mi_estadodecuenta" <?php if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 107)){ echo "class='active'";}?>>Estado de cuenta</A></LI>
        
        <!--<li class="btns sig" style="width:20px; margin-right:5px"><a href="<?php print $sig;?>"></a></li>-->
      </ul> 
      <div class="line-submenu"></div> 
    </div>