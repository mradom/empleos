<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER-- -->
  <?php include("include/header.php");?>
  <!-- --MIDDLE---- -->
  <div id="browser" class="inside"> </div>  
  <div id="midle">
	<?php if (arg(2)<>'') include("include/mi_avisos_encabezado.php");?>  
    <!-- --RIGHT colum---- -->
    <?php // No tiene ... include("include/mi_idiomas_encabezado.php");?> 
    <!-- ----CENTRAL colum------ -->
    <DIV id="central_column">
  <script>
  $(document).ready(function() {
    $("#tabs").tabs();
    $("#edit-field-fecha-desde-0-value").datepicker({dateFormat: "d/mm/yy", });
    $("#edit-field-fecha-hasta-0-value").datepicker({dateFormat: "d/mm/yy", });
  });

  </script>
	<?php print $content;?>
	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete' and arg(2)<>'') print "<a href='?q=node/add/p-objetivo-laboral'>Agregar</a>";?>
    </div>
  <!-- -banners-minibox-- -->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>