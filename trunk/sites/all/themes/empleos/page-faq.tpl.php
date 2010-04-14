<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <?php //include("include/banners-boxes.php");?>
    <div class="box top" style="background: url(sites/all/themes/empleos/img/bg_box_top_faq.jpg)">
	<p style="margin-top:50px; padding-right:80px;">Estas son las <strong>preguntas m&aacute;s frecuentes</strong> que tienen nuestros postulantes.</br>
Hac&eacute; click sobre la que te interese y te daremos la respuesta online.<br>
Escribinos o envianos tus sugerencias a <a class="blue stg" href="#">empleoslavoz@lavozdelinterior.com.ar</a>
</p></div>
    <!-- RIGHT -->
      <?php include("include/col_derecha-mini.php");?>
    <!-- CENTRAL -->
    <div id="central_column">
      <div id="center"><div id="squeeze"><div class="right-corner"><div class="left-corner">
          <?php //if ($title): print '<h2 class="blue hTitle"'. ($tabs ? ' class="with-tab"' : '') .'>'. $title .'</h2>'; endif; ?>
          <?php print $content ?>
      </div></div></div></div>
    </div>      
      <?php include("include/banners-central.php");?>
</div>  
<?php include("include/footer.php");?>
</div>
</body>
</html>
