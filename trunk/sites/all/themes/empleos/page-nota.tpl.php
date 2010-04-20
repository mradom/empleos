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
		<div class="postdate">
<div class="month m-<?php print date("m") ?>"><?php print date("M") ?></div>
<div class="day d-<?php print date("d") ?>"><?php print date("d") ?></div>
<div class="year y-<?php print date("Y") ?>"><?php print date("Y") ?></div>-->
</div>
      <?php
        $num_nota = arg(1);
		$nodo = node_load($num_nota);
		print '<div class="contentNotas">';
		print '<div class="nota"><h2>'.$nodo->title.'</h2> <h3>Nota publicada por empleoslavoz</h3> </div>';
		
		print '<div ><img class="photo" src="'.'/'.$nodo->field_foto[0]['filepath'].'" title=""></img></div>';
		
		print '<div class="bajada">'.$nodo->field_resumen[0]['value'].'</div>';
		print '<div class="cuerpo">'.$nodo->body.'</div>';
		//print '<pre>';
		//print_r($nodo);
		//print '<pre>';
        //print $content;
		print '</div>';
        ?>
        
      <?php include("include/banners-central.php");?>
    </div>
   </div>
   <?php include("include/footer.php");?>
 </div>
</body>
</html>