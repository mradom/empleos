<html>
<?php include("sites/all/themes/empleos/include/varios.php");?>
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER-- -->
  <?php include("include/header.php");?>
  <!-- --MIDDLE---- -->
  <div id="browser" class="inside"> </div>  
  <div id="midle">
    <?php include("include/mi_educacion_encabezado.php");?> 
    <!-- --RIGHT colum---- -->
    <div id="right_colum">
	<?php Form_ayuda('Ayuda', 'Educacion'); ?>
	</div> 
    <!-- ----CENTRAL colum------ -->
    <DIV id="central_column">
	  <?php print $content;?>
	  	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') print "<div class='btn_gral b'><a href='?q=node/add/p-educacion'>Agregar</a></div></br></br>";?>
    </DIV>
    <div id="browser" class="inside"> </div>
  <!-- -banners-minibox-- -->
  <?php include("include/banners-central.php");?> 
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>