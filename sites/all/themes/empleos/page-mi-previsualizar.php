<html>
<?php include("include/head.php");?>
<?php include("sites/all/themes/empleos/include/varios.php");?>
<body>
<div id="wrapper">
  <!-- HEADER-- -->
  <?php include("include/header.php");?>
  <!-- --MIDDLE---- -->
  <div id="browser" class="inside"> </div>  
  <div id="midle">
    <?php include("include/mi_previsualizar_encabezado.php");?> 
    <!-- --RIGHT colum---- -->
    <div id="right_colum">
	<?php Form_ayuda('Ayuda', 'Previsualizar'); ?>
	</div>
    <!-- ----CENTRAL colum------ -->
    <DIV id="central_column">
	  <?php include("include/cv_previsualizar.php");?>
	  </div>
    </DIV>
  <!-- -banners-minibox-- -->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>