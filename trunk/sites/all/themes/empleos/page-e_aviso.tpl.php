<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
	    $("#tabs").tabs();
	    $("#edit-field-fecha-desde-0-value-date").datepicker({dateFormat: "d/mm/yy", });
	    $("#edit-field-fecha-hasta-0-value-date").datepicker({dateFormat: "d/mm/yy", });
	  });
  </script>
    	<?php 
    }?>
    <div id="central_column">
		<?php print $content;?>
    </div>
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>