<!--Pagina de resultados-->

<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!----HEADER---->
    <?php include("include/header.php");?>
    <!------MIDDLE------>
    <div id="midle">
    <!----banners box---->
	<?php include("include/banners-boxes.php");?>
    <!------RIGHT colum------>
	<?php include("include/col_derecha.php");?>
    <!--------CENTRAL colum-------->
    <DIV id="central_column">
          <div class="bar_blue"><div class="corner_blue _2"></div>
          <div class="corner_blue">Listado de Empresas</div></div>
        	<div class="box center">

		<?php include("include/listadoempresa.php");?>
        </div>
    <!-----banners-minibox---->
	<?php include("include/banners-central.php");?>
  </DIV>
  </div>
  <!--FOOTER-->
  <?php include("include/footer.php");?>
</DIV>
</BODY>
</HTML>