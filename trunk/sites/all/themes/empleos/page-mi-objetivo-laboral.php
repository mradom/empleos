<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<?php include("sites/all/themes/empleos/include/varios.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="browser" class="inside"> </div>  
  <div id="midle">
    <?php include("include/mi_objetivo_laboral_encabezado.php");?> 
    <!-- RIGHT -->
    <div id="right_colum">
	<?php Form_ayuda('Ayuda', 'Objetivo Laboral'); ?>
	</div> 
    <!-- CENTRAL -->
    <div id="central_column">
	  <?php print $content;?>
	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') print "<div class='btn_gral b'><a href='?q=node/add/p-objetivo-laboral'>Agregar</a></div><br>";?>
     </div>
     <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>