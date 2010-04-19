<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<?php include("sites/all/themes/empleos/include/varios.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <?php include("include/mi_previsualizar_encabezado.php");?> 
    <!-- RIGHT -->
    <div id="right_colum">
	  <?php Form_ayuda('Ayuda', 'Previsualizar'); ?>
	</div>
    <!-- CENTRAL -->
    <div id="central_column">
	  <?php include("include/cv_previsualizar.php");?>
      <?php include("include/banners-central.php");?>
    </div>    
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>