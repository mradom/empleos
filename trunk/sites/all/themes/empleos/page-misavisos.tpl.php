<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <?php include("include/encabezado_mi_avisos_publicados.php");?> 
    <!-- CENTRAL -->
    <div id="central_column">
	  <?php //print $content;?>
      <?php include("include/banners-central.php");?> 
    </div>      
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>