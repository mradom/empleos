<html>
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!----HEADER---->
  <?php include("include/header.php");?>
  <!------MIDDLE------>
  <div id="browser" class="inside"> </div>  
  <div id="midle">
    <?php include("include/mi_educacion_encabezado.php");?> 
    <!------RIGHT colum------>
    <?php if (arg(1)=='add' or arg(2)=='edit') { ?>
    <div id="right_column">
	   <div class="contentBoxTips">
	   <div class="ico"><img src="sites/all/themes/empleos/img/help.png"></div>
	   <div class="box tips">
	   <h3 class="orange">Ayuda</h3><br>
	   <p>Beautiful and free icon sets always come in handy. <br>
	Used properly and moderately, <strong>icons can be helpful</strong> to provide users with memorable metaphors and illustrations that would provide a visual support for otherwise unspectacular text blocks.</p>
	   </div>
	   </div>
    </div>
    <?php } ?>
    <?php // No tiene ... include("include/mi_idiomas_encabezado.php");?> 
    <!--------CENTRAL colum-------->
    <DIV id="central_column">
	  <?php print $content;?>
	  	  <?php if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') print "<div class='btn_gral'><a href='?q=node/add/p-educacion'>Agregar</a></div></br></br>";?>
    </DIV>
    <div id="browser" class="inside"> </div>
  <!-----banners-minibox---->
  <?php include("include/banners-central.php");?> 
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>