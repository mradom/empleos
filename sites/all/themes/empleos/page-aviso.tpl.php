<?php include("include/head.php");?>
<BODY>
	<DIV id="wrapper">
  		<!----HEADER---->
		<?php //include("include/header.php");?>
<div id="header">
    <!----Banner Topsite---->
    <div class="banner top"> Banner Topsite</div>
    <div id="logo"><a href="?q=principal"><img src="sites/all/themes/empleos/img/logo.jpg"></a> </div>
    <div style="clear: both;"></div>
    <!----menu---->
    <div class="menu top">
      <ul>
        <li><a class="active" href="buscar.html">Buscar</a></li>
        <li><a href="empresas.html">Empresas</a></li>
        <li><a href="consultoras.html">Consultoras</a></li>
        <li><a href="facs.html">Preguntas frecuentes</a></li>
      </ul>
    </div>
    <div class="inside" id="browser"> </div>
  </div>
  <!------MIDDLE------>
  <DIV id="midle">
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
		<?php print $content;?>
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