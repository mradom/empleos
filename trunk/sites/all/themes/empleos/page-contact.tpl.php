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
    <?php include("include/contact_encabezado.php");?>
    <!-- RIGHT -->
    <?php include("include/col_derecha-mini.php");?>
    <!-- CENTRAL -->
    <div id="central_column">
    <?php //if (arg(1)=='') { ?>
  <div class="resumen" style="background:none; padding-left:0">
          <div class="brand"><img src="sites/all/themes/empleos/img/logo_lv.jpg"></div>
          <ul class="resumen grey">
            <li><span class="stg">Sede Integral:&nbsp;</span> Av. La Voz del Interior 6080</li>
            <li><span class="stg ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>X5008HKJ - C&oacute;rdoba - Argentina</li>            
            <li><span class="stg">Tel&eacute;fono: &nbsp;</span>+54 351 4757000  <span class="stg">Fax: </span>+54 351 4757286</li>
          </ul>
    </div>
    <div class="btn_contactos"><img src="sites/all/themes/empleos/img/icoRecomendar.png"><a href="?q=contact/info">Informaci&oacute;n General</a></div>
    <div class="btn_contactos"><img src="sites/all/themes/empleos/img/icoRecomendar.png"><a href="?q=contact/ventas">Comercial</a></div>
    <div class="btn_contactos"><img src="sites/all/themes/empleos/img/icoRecomendar.png"><a href="?q=contact/tecnico">T&eacute;cnico</a></div>
      <?php
        //}
        //if (arg(1)<>"") {
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
