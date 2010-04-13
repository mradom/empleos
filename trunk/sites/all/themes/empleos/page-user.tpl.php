<?php 
 global $user;
			  //If (arg(2)=='edit' and arg(3)=='Empresa') { include 'page-edit-empresa.php';  return;}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER-- -->
  <?php include("include/header.php");?>
  <!-- --MIDDLE---- -->
  <div id="midle">
    <?php if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=='') include("include/mi_info_encabezado.php");?>
    <?php if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=='Empleado') include("include/mi_datos_encabezado.php");?>
    <?php if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=='Empresa')  include("include/mi_empresa_encabezado.php");?> 
    <!-- banners boxes-- -->
    <?php // include("include/banners-boxes.php");?>
    <!-- --RIGHT colum---- -->
    <?php //include("include/col_derecha-mini.php");?>
    <!-- ----CENTRAL colum------ -->
    <DIV id="central_column">
          <?php
			  If (arg(1)=='password') print $content; 
              If (!$user->uid and arg(1)<>'password' and arg(1) <>'register') include ('user-login.php');
			  //if (!$user->uid) print '<div style="border: 1px solid #ccc ;">'.$content.'</div>';			   
			  If (arg(1)=='register' and arg(2)=='persona'  ) print '<div style="border: 1px solid #cbb ;">'.$content.'</div><br>'; //    registracion de personas			  
			  If (arg(1)=='register' and arg(2)=='empleador') print '<div style="border: 1px solid #ccc ;">'.$content.'</div><br>'; //include ('include/register-empleador.php'); //    registracion de personas
			  if ($user->uid and arg(1)==$user->uid){
			  	 print $content;
			  } 
  ?>
  </div>
  <?php //if ($messages): print $messages; endif; ?>
  <!-- -banners-minibox-- -->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>