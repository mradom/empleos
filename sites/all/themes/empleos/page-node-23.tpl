<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER-- -->
    <?php include("include/header.php");?>
    <!-- --MIDDLE---- -->
    <div id="midle">
    <!-- banners box-- -->
    <DIV class="content_banners" style="margin-bottom:10px;">
      <UL>
        <LI class="banner boxes">Box1</LI>
        <LI class="banner boxes">Box2</LI>
        <LI class="banner boxes" style="margin-right:0">Box3</LI>
      </UL>
    </div>
    <!-- --RIGHT colum---- -->
<?php include("include/col_derecha.php");?>
    <!-- ----CENTRAL colum------ -->
    <DIV id="central_column">
		<?php include("sites/all/themes/empleos/block-block4.tpl.php");?>
    </div>
    <!-- -banners-minibox-- -->
	<?php include("include/banners-central.php");?>
  </div>
  <!--FOOTER-->
  <?php include("include/footer.php");?>
</div>
</BODY>
</HTML>
