<?php 
 global $user;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <?php if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=='') include("include/mi_info_encabezado.php");?>
    <?php if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=='Empleado') include("include/mi_datos_encabezado.php");?>
    <?php if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=='Empresa')  include("include/mi_empresa_encabezado.php");?> 
    <!-- RIGHT -->
    <?php include("include/col_derecha-mini.php");?>
    <!-- CENTRAL -->
    <!-- ini central -->
    <div id="central_column">
          <?php
			  If (arg(1)=='password') print $content; 
              If (!$user->uid and arg(1)<>'password' and arg(1) <>'register') include ('user-login.php');
			  If (arg(1)=='register' and arg(2)=='persona'  ) print '<div style="border: 1px solid #cbb ;">'.$content.'</div><br />'; 
			  If (arg(1)=='register' and arg(2)=='empleador') print '<div style="border: 1px solid #ccc ;">'.$content.'</div><br />';
			  if ($user->uid and arg(1)==$user->uid){
			  	 print $content;
			  } 
  ?>
  <!-- fin central -->
  </div>
  <!-- paso 2 -->
  <?php include("include/banners-central.php");?>
  <!-- paso 3 -->
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>