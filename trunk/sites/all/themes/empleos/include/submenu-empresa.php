<?php 
    if(arg(0) == "user" and arg(1)==$user->uid and arg(2)==''){ $ant="#"; $sig="?q=user/me/edit/Empresa";}
    if(arg(3) == "Empleado"){ $ant="?q=user/me"; $sig="?q=mieducacion/me";} 
    if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){$ant="?q=user/me/edit/Empresa"; $sig="?q=micursos/me"; }
    
    if($node->nid == 55){$ant="?q=miobjetivolaboral/me"; $sig="#";  } 
?>    
    <DIV class="menu submenu"> 
      <UL class="submenu">
        <li class="btns ant" style="width:24px; margin-left:5px"><a href="<?php print $ant;?>"></a></li> 
        <li><A href="?q=user/me" <?php if(arg(0) == "user" and arg(1)==$user->uid and arg(2)==''){ echo "class='active'";}?>>Home</A></LI>
        <li><A href="?q=user/me/edit/Empresa" <?php if(arg(3) == "Empresa"){ echo "class='active'";}?>>Datos de la Empresa</A></LI> 
        <li><A href="?q=mieducacion/me" <?php if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){ echo "class='active'";}?>>Publicar Aviso</A></LI> 
        <li><A href="?q=mieducacion/me" <?php if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){ echo "class='active'";}?>>Avisos Publicados</A></LI>
        <li><A href="?q=mieducacion/me" <?php if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){ echo "class='active'";}?>>Postulaciones</A></LI>
        <li><A href="?q=mieducacion/me" <?php if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){ echo "class='active'";}?>>Estado de Cuenta</A></LI>
        
        <li class="btns sig" style="width:20px; margin-right:5px"><a href="<?php print $sig;?>"></a></li>
      </UL> 
      <DIV class="line-submenu"></DIV> 
    </DIV>
    
