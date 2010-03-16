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
    <div id="central_column">
    <?php $titulo = taxonomy_get_term(arg(2)); echo $titulo->name ?>
		<?php print $content;?>
    </div>
  <!-----banners-minibox---->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>