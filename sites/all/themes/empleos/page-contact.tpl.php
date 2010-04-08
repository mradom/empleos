<html>
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER-- -->
  <?php include("include/header.php");?>
  <!-- --MIDDLE---- -->
  <div id="midle">
    <!-- banners -->
    <?php include("include/banners-boxes.php");?>
    <!-- RIGHT -->
    <?php include("include/col_derecha-mini.php");?>
    <!-- CENTRAL -->
    <div id="central_column">
      <?php
        if (arg(1)=='') { print 'Listado<br><br>';}
        if (arg(1)=='info') { print 'Info<br><br>';} 
        print $content;
        ?>
      <?php include("include/banners-central.php");?>
    </div>
   </div>
   <?php include("include/footer.php");?>
</div>
</body>
</html>
