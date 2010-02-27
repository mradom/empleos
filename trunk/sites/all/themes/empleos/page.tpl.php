<?php 
	$url = $_SERVER['QUERY_STRING']; // PATH COMPLETO
	$is_principal = split('[?&]', $url); 
switch ($node->type) {
	case 'e_aviso':
		include 'page-aviso.tpl.php';
		break;
	case 'faq':
		include 'page-faq.tpl.php';
		break;
	default:
		?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<?php print $head ?>
<?php print $scripts ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>empleoslavoz.com.ar</title>
<link href="sites/all/themes/empleos/css/style_layout.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="sites/all/themes/empleos/css/tabs.css">
<link rel="stylesheet" type="text/css" href="sites/all/themes/empleos/css/IN-noticias.css">
<script language="JavaScript" src="sites/all/themes/empleos/js/tabs.js" type="text/javascript"></script>
<script language="javascript" src="sites/all/themes/empleos/js/prototype.js" type="text/javascript"></script>
<script language="javascript" src="sites/all/themes/empleos/js/effects.js" type="text/javascript"></script>
<script language="javascript" src="sites/all/themes/empleos/js/glider.js" type="text/javascript"></script>
<script language="javascript" src="sites/all/themes/empleos/js/scriptPag.js" type="text/javascript"></script>

</head>

<div firebugversion="1.5.0" style="display: none;" id="_firebugConsole"></div><body>
<div id="wrapper">
  <!----HEADER---->
  <div id="header">
    <!----Banner Topsite---->
    <div class="banner top"> Topsite</div>
    <div id="logo"><a href="?q=principal"><img src="sites/all/themes/empleos/img/logo.jpg"></a> </div>
    <div style="clear: both;"></div>
    <!----menu---->
	<?php include("include/menu.php"); ?>
    <!----browser---->
    <div id="browser">
      <div class="white right">
        <h1 style="margin: 10px 10% 0pt;">&iquest;Primera vez en empleoslavoz?</h1>
        <h3 style="margin: 0pt 12%; text-align: center;">Registrate de forma f&aacute;cil y segura en s&oacute;lo 3 pasos</h3>
        <div class="pasos">
          <ul id="pasos">
            <li id="b-01"><a href="http://www.portalesverticales.com.ar/caci/empleos/%E2%80%9D#%E2%80%9D"><span>tramites</span></a></li>
            <li id="b-02"><a href="http://www.portalesverticales.com.ar/caci/empleos/%E2%80%9D#%E2%80%9D"><span>estaciones</span></a></li>
            <li id="b-03"><a href="http://www.portalesverticales.com.ar/caci/empleos/%E2%80%9D#%E2%80%9D"><span>estaciones</span></a></li>
          </ul>
        </div>
      </div>
	<?php include("include/buscador.php");?>
    </div>
    </div>
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
      <div id="center"><div id="squeeze"><div class="right-corner"><div class="left-corner">
          <?php if ($breadcrumb): print $breadcrumb; endif; ?>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>

          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
          <?php if ($tabs): print $tabs .'</div>'; endif; ?>

          <?php if (isset($tabs2)): print $tabs2; endif; ?>

          <?php if ($help): print $help; endif; ?>
          <?php if ($messages): print $messages; endif; ?>
          <?php print $content ?>
          <span class="clear"></span>
          <?php print $feed_icons ?>
          <div id="footer"><?php print $footer_message ?></div>
      </div></div></div></div>
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
    <div id="footer">
      <h3 class="small"> Un portal de <br>
        <a href="http://www.lavoz.com.ar/" target="_blank"> <img src="sites/all/themes/empleos/img/pie_lavoz.gif" height="14" width="110"> </a> </h3>
      <ul>
        <li> <a href="http://www.portalesverticales.com.ar/caci/empleos/aviso-legal.html">Aviso legal</a> </li>
        <li> <a href="http://www.portalesverticales.com.ar/caci/empleos/contacto.html">Contacto</a> </li>
        <li> <a href="http://www.portalesverticales.com.ar/caci/empleos/privacidad.html">Privacidad</a> </li>
        <li> <a href="http://www.portalesverticales.com.ar/caci/empleos/publicar.html" target="_blank">C&oacute;mo publicar</a> </li>
        <li> <a href="http://www.portalesverticales.com.ar/caci/empleos/site-map.html">Mapa del sitio</a> </li>
        <li> <a href="javascript:alert('Presione%20la%20combinaci%C3%B3n%20de%20teclas%20CTRL+D%20para%20agregar%20BuscaGuia%20como%20sitio%20Favorito.')" id="lnk1"><span>InmueblesLaVoz</span> como p&aacute;gina de inicio</a> </li>
      </ul>
      <ul class="logos">
        <li class="certifica"> <a href="http://www.certifica.com/" target="_blank"> <span>Certifica.com</span> </a> </li>
        <li class="bureau"> <a href="http://www.iabargentina.com.ar/" target="_blank"> <span>Internet Advertising Bureau</span> </a> </li>
      </ul>
    </div>
</div>
</body></html>
	<?php
	break;
}
return; 

?>
