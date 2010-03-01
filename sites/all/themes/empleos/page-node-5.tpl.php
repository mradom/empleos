<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!----HEADER---->
    <?php include("include/header.php");?>
    <!------MIDDLE------>
    <div id="midle">
    <!----banners box---->
    <DIV class="content_banners" style="margin-bottom:10px;">
      <UL>
        <LI class="banner box">Box1</LI>
        <LI class="banner box">Box2</LI>
        <LI class="banner box" style="margin-right:0">Box3</LI>
      </UL>
    </DIV>
    <!------RIGHT colum------>
<?php include("include/col_derecha.php");?>
    <!--------CENTRAL colum-------->
    <DIV id="central_column">
       <div id="tab-container">
            <div style="display: block;" class="tab-content">
            <h1 class="tab" title="empleos destacados">Listado de Categorías</h1>
            <div class="widget">
              <div class="s_frame"> <a href="#" class="next"></a> <a href="#" class="previous"></a>
                <div class="widget_style">
  			    <?php include("include/listarubros.php");?>
                </div>
              </div>
            </div>
            </div>
        </div>
        <script type="text/javascript" src="sites/all/themes/empleos/js/tabs.js"></script>
    </DIV>
    <!----END SLIDE---->
    <!-----banners-minibox---->
	<?php include("include/banners-central.php");?>
  </DIV>
  <!--FOOTER-->
  <?php include("include/footer.php");?>
</DIV>
</BODY>
</HTML>
