<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="browser" class="inside"> </div>  
  <div id="midle">
    <?php include("include/mi_avisos_encabezado.php");?> 
    <!-- RIGHT -->
    <?php // No tiene ... include("include/mi_idiomas_encabezado.php");?> 
    <!-- CENTRAL -->
    <DIV id="central_column">
  <script>
  $(document).ready(function() {
    $("#tabs").tabs();
  });
  </script>
	<?php print $content;?>
	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') print "<a href='?q=node/add/p-objetivo-laboral'>Agregar</a>";?>
    <?php include("include/banners-central.php");?>
    </div>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>