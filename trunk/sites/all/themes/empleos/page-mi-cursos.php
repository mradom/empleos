<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<?php include("sites/all/themes/empleos/include/varios.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
   <div id="midle">
    <?php include("include/encabezado_mi_cursos.php");?> 
       <?php Form_ayuda('Ayuda', 'Cursos'); ?> 
     <div class="left">
	  <?php print $content;?>
	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') {
		  print "<div class='btn_gral b'><a href='/node/add/p-cursos'>Agregar</a></div>";
	      print "<div class='btn_gral r'><a href='/miidiomas/me'>Paso siguiente</a></div>";
		  }?>
       </div>
    <!-- CENTRAL -->
     <div id="central_column" class="clr">
  	  <?php include("include/banners-central.php");?>
      </div>        
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>