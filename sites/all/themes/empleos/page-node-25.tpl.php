<html>
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!----HEADER---->
  <?php include("include/header.php");?>
  <!------MIDDLE------>
  <div id="midle">
    <!----banners boxes---->
    <?php include("include/banners-boxes.php");?>
    <!------RIGHT colum------>
    <?php include("include/col_derecha.php");?>
    <!--------CENTRAL colum-------->
    <DIV id="central_column">
          <div class="bar_blue"><div class="corner_blue _2"></div>
          <div class="corner_blue">Listado de Rubros</div></div>
        	<div class="box center">
		    <?php include("include/lista_empresa.php");?>
		    </div>
  </DIV>
  <!-----banners-minibox---->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>


