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
    <?php include("include/col_derecha-mini.php");?>
    <!--------CENTRAL colum-------->
    <DIV id="central_column">
      <div id="center" style ="border:1px solid  ;">
      <div id="squeeze"><div class="right-corner"><div class="left-corner">
          <?php //if ($breadcrumb): print "+".$breadcrumb."+"; endif; 
          
          if (arg(0)<>'node' and $title): print '<h2 class="blue hTitle"'. ($tabs ? ' class="with-tab"' : '') .'>'. $title .'</h2>'; endif; ?>
          
          <?php print $content ?>
          
      </div></div></div></div>
  </DIV>
  <!-----banners-minibox---->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>
