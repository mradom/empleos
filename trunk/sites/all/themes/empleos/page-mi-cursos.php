<html>
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!----HEADER---->
  <?php include("include/header.php");?>
  <!------MIDDLE------>
  <div id="browser" class="inside"> </div>  
  <div id="midle">
    <?php include("include/mi_cursos_encabezado.php");?> 
    <!------RIGHT colum------>
     
    <!--------CENTRAL colum-------->
    <DIV id="central_column">
	  <?php print $content;?>
	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') print "<a href='?q=node/add/p-cursos'>Agregar</a>";?>
    </DIV>
  <!-----banners-minibox---->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>