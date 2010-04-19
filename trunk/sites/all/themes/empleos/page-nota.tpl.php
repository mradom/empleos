<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <!-- banner -->
    <?php //include("include/banners-boxes.php");?>
    <?php include("include/nota_encabezado.php");?>
    <!-- RIGHT -->
    <?php include("include/col_derecha-mini.php");?>
    <!-- CENTRAL -->
    <div id="central_column">
      <?php
        $num_nota = arg(1);
		$nodo = node_load($num_nota);
		print "<div><h2>".$nodo->title."<h2></div>";
		
		print '<div><img src="'.'/'.$nodo->field_foto[0]['filepath'].'" title="">';
		
		print '<div style="background-color:#FF9">'.$nodo->field_resumen[0]['value'].'</div>';
		print '<div>'.$nodo->body.'</div>';
		//print '<pre>';
		//print_r($nodo);
		//print '<pre>';
        //print $content;
        ?>
      <?php include("include/banners-central.php");?>
    </div>
   </div>
   <?php include("include/footer.php");?>
 </div>
</body>
</html>