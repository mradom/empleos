<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <?php include("include/col_derecha-mini.php");?>
    <!-- CENTRAL -->
    <div id="central_column">
      <div id="center"><div id="squeeze"><div class="right-corner"><div class="left-corner">
          <?php //if ($breadcrumb): print "+".$breadcrumb."+"; endif; ?>
          <?php if ($title): print '<h2 class="blue hTitle"'. ($tabs ? ' class="with-tab"' : '') .'>'. $title .'</h2>'; endif; ?>
          <?php print $content ?>
          
      </div></div></div></div>
      <?php include("include/banners-central.php");?>
  </div>  
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>
