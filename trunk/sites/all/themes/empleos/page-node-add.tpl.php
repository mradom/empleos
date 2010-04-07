<?php 
switch (arg(2)) {
	case 'p-educacion':
		include 'page-mi-educacion.php';
		return;
	case 'p-idiomas':
		include 'page-mi-idiomas.php';
		return;
	case 'p-cursos':
		include 'page-mi-cursos.php';
		return;
    case 'p-informatica':
		include 'page-mi-informatica.php';
		return;					
    case 'p-otros-conocimientos':
		include 'page-mi-otros-conocimientos.php';
		return;			
    case 'p-experiencia-laboral':
		include 'page-mi-experiencia-laboral.php';
		return;	
    case 'p-referencia':
		include 'page-mi-referencia.php';
		return;
	case 'p-objetivo-laboral':
		include 'page-mi-objetivo-laboral.php';
		return;		
	case 'e-aviso':
		include 'page-e-aviso.tpl.php';
		return;				
	default:
		print $content;
		break;
}
		?>

<html>
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
    <DIV id="central_column">
          <div class="bar_blue"><div class="corner_blue _2"></div>
          <div class="corner_blue">Listado de Rubros</div></div>
        	<div class="box center">
		    <?php include("include/lista_rubros.php");?>
		    </div>
  </div>
  <!-- -banners-minibox-- -->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>