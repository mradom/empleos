<html>
<?php include("include/head.php");?>
<?php include("sites/all/themes/empleos/include/varios.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="browser" class="inside"> </div>  
  <div id="midle">
    <?php include("include/mi_experiencia_laboral_encabezado.php");?> 
    <!-- RIGHT -->
    <div id="right_colum">
	  <?php Form_ayuda('Ayuda', 'Experiencia Laboral'); ?>
	</div> 
    <!-- CENTRAL -->
    <div id="central_column">
	  <?php print $content;?>
	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') print "<div class='btn_gral b'><a href='?q=node/add/p-experiencia-laboral'>Agregar</a></div></br></br>";?>
      <?php include("include/banners-central.php");?>
    </div>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>