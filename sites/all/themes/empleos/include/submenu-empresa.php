<?php 
    //if(arg(0) == "user" and arg(1)==$user->uid and arg(2)==''){ $ant="#"; $sig="?q=user/me/edit/Empresa";}
    //if(arg(3) == "Empleado"){ $ant="?q=user/me"; $sig="?q=mieducacion/me";} 
    //if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){$ant="?q=user/me/edit/Empresa"; $sig="?q=micursos/me"; }
    
    //if($node->nid == 55){$ant="?q=miobjetivolaboral/me"; $sig="#";  } 
?>    
    <DIV class="menu submenu"> 
      <UL class="submenu e">
        <!--<li class="btns ant" style="width:24px; margin-left:5px"><a href="<?php print $ant;?>"></a></li> -->
        <li><A title="Home" href="?q=user/me" <?php if(arg(0) == "user" and arg(1)==$user->uid and arg(2)==''){ echo "class='active'";}?>>Home</A></LI>
        <li><A title="Datos de la empresa" href="?q=user/me/edit/Empresa" <?php if(arg(3) == "Empresa"){ echo "class='active'";}?>>Datos de la empresa</A></LI> 
        <li><A title="Publicar aviso" href="?q=node/add/e-aviso" <?php if(($node->type=='e_aviso') or (arg(2)=='e-aviso')){ echo "class='active'";}?>>Publicar aviso</A></LI> 
        <li><A title="Avisos publicados" href="?q=misavisos" <?php if(($node->type=='p_educacion') or (arg(0)=='misavisos')){ echo "class='active'";}?>>Avisos publicados</A></LI>
        <li><A title="Postulaciones" href="?q=postulantes" <?php if(arg(1) == "106"){ echo "class='active'";}?>>Postulaciones</A></LI>
        <li><A title="Estado de cuenta" href="?q=mi_estadodecuenta/me" <?php if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 107)){ echo "class='active'";}?>>Estado de cuenta</A></LI>
        
        <!--<li class="btns sig" style="width:20px; margin-right:5px"><a href="<?php print $sig;?>"></a></li>-->
      </UL> 
      <DIV class="line-submenu"></div> 
    </div>
    
