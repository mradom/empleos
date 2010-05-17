<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<?php include("include/varios.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <?php include("include/encabezado_mi_avisos.php");?> 
    <!-- RIGHT -->
    <div id="right_column">
    <?php Empleos_ayuda('Ayuda', 'PublicarAviso');  ?>
    <?php include("include/col_derecha-sin.php");?>
    </div>
    <!-- CENTRAL -->
    <div id="central_column">
  <script>
  $(document).ready(function() {
	    $("#edit-submit").remove()
	    //<div id='fragment-5' class='ui-tabs-panel'>
	    $("#tabs").html($("#tabs").html()+"<div id='fragment-5' class='ui-tabs-panel'>"+ $("#content_preview").html()+"</div>");
	    $("#content_preview").remove();
	    $("#fragment-5").html($("#fragment-5").html() + '<input type="submit" name="op" id="edit-submit" value="Enviar"  class="form-submit" />')
	    $("#tabs").tabs();
	    $("#edit-field-fecha-desde-0-value-date").datepicker({dateFormat: "d/mm/yy", });
	    $("#edit-field-fecha-hasta-0-value-date").datepicker({dateFormat: "d/mm/yy", });
	    $("#edit-field-visitas-0-value-wrapper").remove();
	  });

  function aviso_preview(){
		return true;
  }

  function actualizarPreview(){
  		//$("#fragment-5").empty();
		//$("#fragment-5").html(aviso_preview() + $("#fragment-5").html());
		return true;
	  }

  function get_now(){
	  var fecha=new Date();
	  var diames=fecha.getDate();
	  var diasemana=fecha.getDay();
	  var mes=fecha.getMonth() +1 ;
	  var ano=fecha.getFullYear();

	  var textosemana = new Array (7);
	    textosemana[0]="Domingo";
	    textosemana[1]="Lunes";
	    textosemana[2]="Martes";
	    textosemana[3]="Miércoles";
	    textosemana[4]="Jueves";
	    textosemana[5]="Viernes";
	    textosemana[6]="Sábado";

	  var textomes = new Array (12);
	    textomes[1]="Enero";
	    textomes[2]="Febrero";
	    textomes[3]="Marzo";
	    textomes[4]="Abril";
	    textomes[5]="Mayo";
	    textomes[6]="Junio";
	    textomes[7]="Julio";
	    textomes[7]="Agosto";
	    textomes[9]="Septiembre";
	    textomes[10]="Octubre";
	    textomes[11]="Noviembre";
	    textomes[12]="Diciembre";
	  return diames + "/" + mes + "/" + ano;
	  }
  </script>
  <?php if(arg(3) == "copy"){
  		$node = node_load(array("nid"=> arg(4)));
  		$nodo_nuevo = $node;
  		$nodo_nuevo->nid = "";
  		$nodo_nuevo->created = "";
  		$nodo_nuevo->title = "Copia de ".$nodo_nuevo->title;
  		$nodo_nuevo = node_save($nodo_nuevo);
  		$sql = "SELECT * FROM sequences WHERE NAME = 'node_nid'";
  		$rs = db_query($sql);
  		$row = db_fetch_object($rs);
  		drupal_goto("node/".$row->id."/edit");
  }?>
	<?php print $content;?>
	  <?php //if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') print "<a href='/node/add/p-objetivo-laboral'>Agregar</a>";?>
      <?php
	  //-------------------TIPOS DE AVISOS
  	 print'<div class="content_grl left" id="content_preview">';
     //----------- Gold --------
     print'<div class="aviso w660 left" style="background:url(/sites/all/themes/empleos/img/a-gold-2.png)top no-repeat;">';
	 print'<ul class="right" style=" margin-left:15px">';
     print'<li class="orange" ><a class="orange" href="#">Sin restricciones</a></li>';
     print'</ul>';
     print'<ul class="right" style=" margin-left:15px">';
     print'<li class="orange" ><a class="orange" href="#">Publicaci&oacute;n en Home</a></li>';
     print'<li class="orange" ><a class="orange" href="#">Publicaci&oacute;n en Home de &aacute;rea</a></li>';
     print'</ul>';
	 print'<ul class="right" style=" margin-left:15px">';
     print'<li class="orange" ><a class="orange" href="#">1&deg; en listado</a></li>';
     print'<li class="orange" ><a class="orange" href="#">Publicaci&oacute;n con logo</a></li>';
     print'</ul>';
     print'<div class="price" style="background:url(/sites/all/themes/empleos/img/price-gold.png)top no-repeat;"></div>';
     print'<a href="#"><div class="btn" style="background:url(/sites/all/themes/empleos/img/btn-a-gold.gif) top  no-repeat;"></div></a>';
     print'</div>';
	 //----------- Destacado--------
	 print'<div class="aviso w660 left" style="background:url(/sites/all/themes/empleos/img/a-destacado-2.gif)top no-repeat;">';
     print'<ul class="right" style=" margin-left:15px">';
     print'<li class="blue" ><a class="blue" href="#">Publicaci&oacute;n en Home</a></li>';
     print'<li class="blue" ><a class="blue" href="#">Publicaci&oacute;n en Home de &aacute;rea</a></li>';
     print'</ul>';
	 print'<ul class="right" style=" margin-left:15px">';
     print'<li class="blue"><a class="blue" href="#">2&deg; en listado</a></li>';
     print'<li class="blue"><a class="blue" href="#">Publicaci&oacute;n con logo</a></li>';
     print'</ul>';
     print'<div class="price" style="background:url(/sites/all/themes/empleos/img/price-destacado.png)top no-repeat;"></div>';
     print'<a href="#"><div class="btn" style="background:url(/sites/all/themes/empleos/img/btn-a-destacado.png) top  no-repeat;"></div></a>';
     print'</div>';
	 //----------- Simple --------
	 print'<div class="aviso w660 left" style="background:url(/sites/all/themes/empleos/img/a-simple-2.gif)top no-repeat;">';
     print'<ul class="right" style=" margin-left:15px">';
     print'<li class="grey"><a href="#">3&deg; en listado</a></li>';
     print'</ul>';
	 print'<ul class="right" style=" margin-left:15px">';
	 print'<li class="grey"><a href="#">Publicaci&oacute;n en Home</a></li>';
     print'<li class="grey"><a href="#">Publicaci&oacute;n con logo</a></li>';
     print'</ul>';
     print'<div class="price" style="background:url(/sites/all/themes/empleos/img/price-simple.png)top no-repeat;"></div>';
     print'<a href="#"><div class="btn" style="background:url(/sites/all/themes/empleos/img/btn-a-simple.png) top  no-repeat;"></div></a>';
     print'</div>';
	 //----------- Gratis --------
	 print'<div class="aviso w660 left" style="background:url(/sites/all/themes/empleos/img/a-gratis-2.gif)top no-repeat;">';
     print'<div class="price" style="background:url(/sites/all/themes/empleos/img/price-gratis.png)top no-repeat;"></div>';
     print'<a href="#"><div class="btn" style="background:url(/sites/all/themes/empleos/img/btn-a-gratis.png) no-repeat; top:110px"></div></a>';
     print'</div>';
	 print'</div>';

      //-------------------
      ?>
    <?php include("include/banners-central.php");?>
    </div>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>