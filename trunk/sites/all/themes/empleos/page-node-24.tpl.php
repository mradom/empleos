<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <?php include("include/banners-boxes.php");?>
    <!-- RIGHT -->
    <?php include("include/col_derecha.php");?>
    <!-- CENTRAL -->
    <DIV id="central_column">
          <div class="bar_blue"><div class="corner_blue _2"></div>
          <div class="corner_blue">Listado de Rubros</div></div>
        	<div class="box center">
		      <?php include("include/lista_rubros.php");?>
		    </div>
    </div>
    <?php include("include/banners-central.php");?>
  </div>
  <?php include("include/footer.php");?>
</div>
</body>
</html>