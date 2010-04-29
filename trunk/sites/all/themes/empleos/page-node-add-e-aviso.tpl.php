<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <?php include("include/encabezado_mi_avisos.php");?> 
    <!-- RIGHT -->
    <?php // No tiene ... include("include/encabezado_mi_idiomas.php");?> 
    <!-- CENTRAL -->
    <DIV id="central_column">
  <script>
  $(document).ready(function() {
	    $("#tabs").tabs();
	    $("#edit-field-fecha-desde-0-value-date").datepicker({dateFormat: "d/mm/yy", });
	    $("#edit-field-fecha-hasta-0-value-date").datepicker({dateFormat: "d/mm/yy", });
	  });
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
    <?php include("include/banners-central.php");?>
    </div>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>