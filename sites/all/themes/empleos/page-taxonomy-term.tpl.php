<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
    <?php include("include/col_derecha.php");?>
    <!-- ----CENTRAL colum------ -->
    <div id="central_column">
       <div class="box central ficha">
        <?php 
        $titulo = taxonomy_get_term(arg(2)); 
        $vocablo = taxonomy_get_vocabulary($titulo->vid);
        echo '<DIV class="results"><P>'.$vocablo->name.' - '.'<SPAN class="orange">'.$titulo->name.'</SPAN></P></div>'; 
        ?>
		<?php print $content;?>
	   </div>
    </div>
  <!-- -banners-minibox-- -->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>