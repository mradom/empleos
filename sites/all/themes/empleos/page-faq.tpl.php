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
            <h1 class="tab" title="empleos destacados">Preguntas Frecuentes</h1>
            <div class="widget">
              <div class="s_frame"> <a href="#" class="next"></a> <a href="#" class="previous"></a>
                <div class="widget_style">
  			    <?php print $content; ?>
                </div>
              </div>
            </div>
            </div>
        </div>
        <script type="text/javascript" src="sites/all/themes/empleos/js/tabs.js"></script>
    </DIV>
    <!----END SLIDE---->
    <!-----banners-minibox---->
    <DIV class=" content_banners">
      <DIV class="banner minibox" style="margin-right:26px"> Minibox 1 </DIV>
      <DIV class="banner minibox" style="margin-right:27px"> Minibox 2 </DIV>
      <DIV class="banner minibox" style="margin-right:27px"> Minibox 3 </DIV>
      <DIV class="banner minibox"> Minibox 4 </DIV>
    </DIV>
  </DIV>
  <!--FOOTER-->
  <?php include("include/footer.php");?>
</DIV>
</BODY>
</HTML>