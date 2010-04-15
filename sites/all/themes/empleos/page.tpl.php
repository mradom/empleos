<?php 
   global $ayuda;
	$url = $_SERVER['QUERY_STRING']; // PATH COMPLETO
	$is_principal = split('[?&]', $url); 
	
	// print '[[[[[[[[[[[[[[[['.$node->type.']]]]]]]]]]]]]]]]';
	
	// break;

switch ($node->type) {	
	case 'faq':
		include 'page-faq.tpl.php';
		return;
	case 'p_educacion':
		include 'page-mi-educacion.php';
		return; 		
	case 'p_idiomas':
		include 'page-mi-idiomas.php';
		return; 
	case 'p_cursos':
		include 'page-mi-cursos.php';
		return;
	case 'p_informatica':
		include 'page-mi-informatica.php';
		return; 
	case 'p_otros_conocimientos':
		include 'page-mi-otros-conocimientos.php';
		return; 		
	case 'p_experiencia_laboral':
		include 'page-mi-experiencia-laboral.php';
		return; 		
	case 'p_referencia':
		include 'page-mi-referencia.php';
		return; 		
	case 'p_objetivo_laboral':
		include 'page-mi-objetivo-laboral.php';
		return;		 		
	case 'e_aviso':
		include 'page-e-aviso.tpl.php';
		return;
	
		
	default:
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <div id="browser" class="inside"> </div>  
  <!-- MIDDLE -->
  <div id="midle">
    <?php include("include/banners-boxes.php");?>
    <!-- RIGHT -->
    <?php include("include/col_derecha.php");?>
    <!-- CENTRAL -->
    <DIV id="central_column" style="border:1px solid #cccccc ;">
		
        
      <?php //if ($breadcrumb): print "+".$breadcrumb."+"; endif; ?>
          <?php if ($title): print '<h2 class="blue hTitle"'. ($tabs ? ' class="with-tab"' : '') .'>'. $title .'</h2>'; endif; ?>
          <?php print $content ?>
          
        
    </div>
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>