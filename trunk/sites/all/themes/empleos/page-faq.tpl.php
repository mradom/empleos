<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <?php //include("include/banners-boxes.php");?>
    <div class="box top" style="background: url(/sites/all/themes/empleos/img/bg_box_top_faq.jpg)">
		<p style="margin-top:50px;">A continuaci&oacute;n se presentan una serie de preguntas y respuestas que los usuarios de empleoslavoz suelen realizar de un modo frecuente.<br />
 Si a&uacute;n te quedan dudas o consultas, podes comunicarte con nosotros a trav&eacute;s de las v&iacute;as que se detallan en la secci&oacute;n &#34;Contacto&#34;. 
	    </p>
	</div>
    <!-- RIGHT -->
      <?php
        //print '<div id="right_colum">'; 
        //Empleos_ayuda('Tip', 'Otros Conocimientos'); 
	    //print '</div>';  
        include("include/col_derecha-mini.php");
	   ?>
    <!-- CENTRAL -->
    <div id="central_column">
    	<div id="center">
      		<div id="squeeze">
     	 		<div class="right-corner">
      				<div class="left-corner">
          			<?php //if ($title): print '<h2 class="blue hTitle"'. ($tabs ? ' class="with-tab"' : '') .'>'. $title .'</h2>'; endif; ?>
          			<?php print $content ?>
     		 		</div>
    			</div>
   		   </div>
    	</div>
      <?php include("include/banners-central.php");?>
    </div>        
</div>  
<?php include("include/footer.php");?>
</div>
</body>
</html>
