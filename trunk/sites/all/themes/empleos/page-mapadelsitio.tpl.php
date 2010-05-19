<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<?php include("include/varios.php");?>
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
    <div id="right_column">
    <?php Empleos_ayuda('Tip', 'MapadelSitio');  ?>
    <?php include("include/col_derecha-sin.php");?>
    </div>
    <!-- CENTRAL -->
    <div id="central_column">
      <?php
        //}
        //if (arg(1)<>"") {
		print '<div style="margin-bottom:10px">';
		print '<ul class="sitemap">
					<li class="destacado stg"><a class="blue" href="/principal">Home</a></li>
					<li><a href="#">Registrarse</a></li>
					<li><a href="#">Buscar</a></li>
					<li><a href="#">Avisos publicados</a></li>
					<li><a href="#">Personas</a>
                    <ul class="n1">
                    <li><a href="#">Mi cuenta</a></li>	
                    </ul>
					</li>
					<li><a href="#">Empresas</a>
                    <ul class="n1">
                    <li><a href="#">Mi cuenta</a></li>					 
                    </ul>
					</li>                  
                    <li><a href="#">Consultoras</a>
					<ul class="n1">
                    <li><a href="#">Mi cuenta</a></li>					 
                    </ul>
					</li>
					<li><a href="#">Preguntas frecuentes</a></li>
					<li><a href="#">Noticias</a></li>
					<li><a href="#">Contacto</a></li>
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
