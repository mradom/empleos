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
    <?php include("include/mi_idiomas_encabezado.php");?> 
    <!-- RIGHT -->
    <div id="right_column">
	  <?php Form_ayuda('Ayuda', 'Idiomas'); ?> 
    </div>
    <!-- CENTRAL -->
    <DIV id="central_column">
	  <?php print $content;?>
	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') print "<div class='btn_gral b'><a href='?q=node/add/p-idiomas'>Agregar</a></div><br>";?>
      <?php include("include/banners-central.php");?>
     </div>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>