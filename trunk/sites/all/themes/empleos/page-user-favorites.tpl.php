<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER-- -->
  <?php include("include/header.php");?>
  <!-- --MIDDLE---- -->
  <div id="midle">
    <!-- banners boxes-- -->
    <?php include("include/banners-boxes.php");?>
    <!-- --RIGHT colum---- -->
    <?php include("include/col_derecha-mini.php");?>
    <!-- ----CENTRAL colum------ -->
    <DIV id="central_column">
      <div id="center"><div id="squeeze"><div class="right-corner"><div class="left-corner">
          <?php //if ($breadcrumb): print "+".$breadcrumb."+"; endif; ?>
          <?php if ($title): print '<h2 class="blue hTitle"'. ($tabs ? ' class="with-tab"' : '') .'>'. $title .'</h2>'; endif; ?>
          <?php print $content ?>
          
      </div></div></div></div>
  </div>
  <!-- -banners-minibox-- -->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>
