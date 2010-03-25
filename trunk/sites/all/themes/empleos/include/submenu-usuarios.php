    <DIV class="menu submenu"> 
      <UL class="submenu">
        <li class="btns ant" style="padding-left:15px"><a href="<?php btn_ant();?>">ant</a></li> 
        <li><A href="?q=user/me/edit/Empleado" <?php if(arg(3) == "Empleado"){ echo "class='active'";}?>>Datos de contacto</A></LI> 
        <li><A href="?q=mieducacion/me" <?php if(($node->type=='p_educacion') or (arg(2)=='p-educacion') or ($node->nid == 28)){ echo "class='active'";}?>>Educaci&oacute;n</A></LI> 
        <li><A href="?q=micursos/me" <?php if(($node->type=='p_cursos') or (arg(2)=='p-cursos') or ($node->nid == 31)){ echo "class='active'";}?>>Cursos</A></LI> 
		<li><A href="?q=miidiomas/me" <?php if(($node->type=='p_idiomas') or (arg(2)=='p-idiomas') or ($node->nid == 33)){ echo "class='active'";}?>>Idiomas</A></LI>        
        <li><A href="?q=miinformatica/me" <?php if(($node->type=='p_informatica') or (arg(2)=='p-informatica') or ($node->nid == 32)){ echo "class='active'";}?>>Inform&aacute;tica</A></LI>  
        <li><A href="?q=miotrosconocimientos/me" <?php if(($node->type=='p_otros_conocimientos') or (arg(2)=='p-otros-conocimientos') or ($node->nid == 34)){ echo "class='active'";}?>>Otros conocimentos</A></LI> 
        <li><A href="?q=miexperiencialaboral/me" <?php if(($node->type=='p_experiencia_laboral') or (arg(2)=='p-experiencia-laboral') or ($node->nid == 35)){ echo "class='active'";}?>>Experiencia laboral</A></LI> 
        <li><A href="?q=mireferencia/me" <?php if(($node->type=='p_referencia') or (arg(2)=='p-referencia') or ($node->nid == 51)){ echo "class='active'";}?>>Referencias</A></LI> 
        <li><A href="?q=miobjetivolaboral/me" <?php if(($node->type=='p_objetivo_laboral') or (arg(2)=='p-objetivo-laboral') or ($node->nid == 36)){ echo "class='active'";}?>>Objetivo laboral</A></LI> 
        <li><A href="?q=miprevisualizar/me" <?php if($node->nid == 55){ echo "class='active'";}?>>Previsualizar</A></LI> 
        <li class="btns sig" style="padding-right:15px"><a href="<?php btn_sig();?>">sig</a></li>
      </UL> 
      <DIV class="line-submenu"></DIV> 
    </DIV>
    
<?php    




Function btn_ant(){
     return '#';
}

Function btn_sig(){
     return '#'; 
}
?>

