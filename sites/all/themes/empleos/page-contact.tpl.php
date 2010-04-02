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
    <div id="right_colum">
    <?php include("include/col_derecha-mini.php");?>
    </div>
    <!--------CENTRAL colum-------->
    <DIV id="central_column">
      <?php
        if (arg(1)=='') { print 'Listado<br><br>';}
        if (arg(1)=='info') { print 'Info<br><br>';} 
        print $content;
      ?>
  </DIV>
  <!-----banners-minibox---->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>
