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
    <?php include("include/mi_educacion_encabezado.php");?> 
    <!-- RIGHT colum -->
    <div id="right_colum">
	  <?php Form_ayuda('Ayuda', 'Educacion'); ?>
	</div> 
    <!-- CENTRAL colum -->
    <div id="central_column">
	  <?php print $content;?>
	  	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') print "<div class='btn_gral b'><a href='?q=node/add/p-educacion'>Agregar</a></div></br></br>";?>
    </div>    
    <?php include("include/banners-central.php");?> 
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>
