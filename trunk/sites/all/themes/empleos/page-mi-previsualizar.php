<html>
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!----HEADER---->
  <?php include("include/header.php");?>
  <!------MIDDLE------>
  <div id="browser" class="inside"> </div>  
  <div id="midle">
    <?php include("include/mi_previsualizar_encabezado.php");?> 
    <!------RIGHT colum------>
     
    <!--------CENTRAL colum-------->
    <DIV id="central_column">
	  <?php print $content;?>
	  aca hay que poner el preview
    </DIV>
  <!-----banners-minibox---->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>