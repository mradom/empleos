<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<?php include("include/varios.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <!-- banner -->
    <?php //include("include/banners-boxes.php");?>
    <?php include("include/encabezado_avanzada.php");?>
    <!-- RIGHT -->
        <?php Empleos_ayuda('Tip', 'BusquedaAvanzada');  ?>    
    	<div id="right_colum">
        <?php //include("include/col_derecha-sin.php");    ?>        
	    </div>        

    <!-- CENTRAL -->
    <div id="central_column">
      <?php
        //}
        //if (arg(1)<>"") {
        include("include/busqueda_avanzada.php");
		//}
        ?>
      <?php include("include/banners-central.php");?>
    </div>
   </div>
   <?php include("include/footer.php");?>
 </div>
</body>
</html>
