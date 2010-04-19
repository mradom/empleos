<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <!--<div id="browser" class="inside"> </div>-->  
  <div id="midle">
	<?php if (arg(2)<>'') include("include/mi_avisos_encabezado.php");?>  
    <!-- RIGHT -->
    <?php // No tiene ... include("include/mi_idiomas_encabezado.php");?> 
    <!-- CENTRAL -->
    <DIV id="central_column">
  <script>
  $(document).ready(function() {
    $("#tabs").tabs();
    $("#edit-field-fecha-desde-0-value-date").datepicker({dateFormat: "d/mm/yy", });
    $("#edit-field-fecha-hasta-0-value-date").datepicker({dateFormat: "d/mm/yy", });
  });
  </script>
	<?php print $content;?>
	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete' and arg(2)<>'') print "<a href='/node/add/p-objetivo-laboral'>Agregar</a>";?>
     <?php include("include/banners-central.php");?>
     </div>
   </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>