<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <!-- banners boxes -->
    <?php include("include/banners-boxes.php");?>
    <!-- RIGHT -->
    <?php include("include/col_derecha.php");?>
    <!-- CENTRAL -->
    <?php if(arg(2) == "edit"){
    	?>
  <script>
  $(document).ready(function() {
	    $("#edit-submit").remove()
	    $("#fragment-5").html($("#fragment-5").html() + '<input type="submit" name="op" id="edit-submit" value="Enviar"  class="form-submit" />')
	    $("#tabs").tabs();
	    $("#edit-field-fecha-desde-0-value-date").datepicker({dateFormat: "d/mm/yy", });
	    $("#edit-field-fecha-hasta-0-value-date").datepicker({dateFormat: "d/mm/yy", });
	    $("#edit-field-visitas-0-value-wrapper").remove();
	  });
  </script>
    	<?php 
    }?>
    
    <div id="central_column">
		<?php print $content;
        // aca deberiamos ver de agregarle de nuevo el buscador cuando solo es visualizacion
		?>
    </div>
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>