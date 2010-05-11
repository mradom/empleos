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
    <?php include("include/encabezado_mapadelsitio.php");?>
    <!-- RIGHT -->
    <?php include("include/col_derecha-mini.php");?>
    <!-- CENTRAL -->
    <div id="central_column">
      <?php
        //}
        //if (arg(1)<>"") {
		print '<div>';
		print '<ul class="sitemap"><a href="#">Home</a>
					<li><a href="#">Buscar</a></li>
					<li><a href="#">Empresa</a>
                    <ul class="n1">
                     <li><a href="ficha.html">Mi cuenta</a></li>
					 <li><a href="ficha.html">bla</a></li>
                    </ul>
					</li>
                    <li><a href="#">Persona</a>
                    <ul class="n1">
                    <li><a href="registrarse.html">Registrarse</a></li>
                    <li><a href="tarifas.html">Tarifas</a></li>
                    </ul>
                    <li> <a href="comprar.html">Gu&iacute;a del comprador</a></li>
                    <li> <a href="contacto.html">Contacto</a></li>
                 </ul>';	
		print '</div>';
        print $content;
		//}
        ?>
      <?php include("include/banners-central.php");?>
    </div>
   </div>
   <?php include("include/footer.php");?>
 </div>
</body>
</html>
