<?php 
	$url = $_SERVER['QUERY_STRING']; // PATH COMPLETO
	$is_principal = split('[?&]', $url); 
	
	// print '[[[[[[[[[[[[[[[['.$node->type.']]]]]]]]]]]]]]]]';
	
	// break;
	
switch ($node->type) {
	case 'e_aviso':
		include 'page-e_aviso.tpl.php';
		break;
	case 'aviso':
		include 'page-e_aviso.tpl.php'; 
		break;		
	case 'faq':
		include 'page-faq.tpl.php';
		break; 
	default:
		?>
<?php include("include/head.php");?>
<body> 
<div id="wrapper">
  <!----HEADER---->
    <?php include("include/header.php");?>
    <!------MIDDLE------>
    <div id="midle">
      <!------RIGHT colum------>
      <div id="right_column">
        <!----banner rectangle---->
        <div class="banner rectangle">
        	<img src="sites/all/themes/empleos/img/post_creative-genius-headphone-toy.jpg"></img>
        </div>
        <!----bar areas---->
        <div class="bar_blue">
          <div class="corner_blue _2"></div>
          <div class="corner_blue">Ofertas de trabajo por &Aacute;rea / Rubro</div>
        </div>
        	<div class="box side">
        		<?php include("block-block1.tpl.php"); ?>
        	</div>
        <!--bar brands-->
        <div class="bar_blue">
          <div class="corner_blue _2"></div>
          <div class="corner_blue">Ofertas de trabajo por Empresas</div>
        </div>
        <div class="box side">
        <?php include("block-block3.tpl.php"); ?>
           <div class="arrow"><a href="#">Ver mas</a></div>
        </div>
      </div>
      <!--------CENTRAL colum-------->
      <div id="central_column">
      <DIV class="box central" style="background:none">
      <!-- aca deberiamos ver que ponemos dependiendo del tipo de nodo  -->
      ======================================
      <div id="center">
          <?php print $content ?>
          </DIV>
     =====================================
    </div>
	</div>
      <!----END SLIDE---->
      <!-----banners-minibox---->
      <div class=" content_banners">
        <div class="banner minibox" style="margin-right: 26px;">
          <img src="sites/all/themes/empleos/img/ubuntu.gif"></img>
        </div>
        <div class="banner minibox" style="margin-right: 27px;">
          <img src="sites/all/themes/empleos/img/drupal.gif"></img>
        </div>
        <div class="banner minibox" style="margin-right: 27px;">
         <img src="sites/all/themes/empleos/img/linkmatrix-php.png"></img>
        </div>
        <div class="banner minibox">
         <img src="sites/all/themes/empleos/img/ML0000272.png"></img>
        </div>
      </div>
      </div>
    
    <!--FOOTER-->
    <?php include("include/footer.php");?>
</div>
</body></html>
	<?php
	break;
}
return; 

?>
