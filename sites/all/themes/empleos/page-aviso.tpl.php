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