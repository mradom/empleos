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
		<?php include("include/listarubros.php");?>
    </DIV>
    <!----END SLIDE---->
    <!-----banners-minibox---->
	<?php include("include/banners-central.php");?>
  </DIV>
  <!--FOOTER-->
  <DIV id="footer">
    <H3 class="small"> Un portal de <BR>
      <A href="http://www.lavoz.com.ar/" target="_blank"> <IMG src="./Resulados de busqueda_files/pie_lavoz.gif" width="110" height="14"> </A> </H3>
    <UL>
      <LI> <A href="http://www.portalesverticales.com.ar/caci/empleos/aviso-legal.html">Aviso legal</A> </LI>
      <LI> <A href="http://www.portalesverticales.com.ar/caci/empleos/contacto.html">Contacto</A> </LI>
      <LI> <A href="http://www.portalesverticales.com.ar/caci/empleos/privacidad.html">Privacidad</A> </LI>
      <LI> <A href="http://www.portalesverticales.com.ar/caci/empleos/publicar.html" target="_blank">Cómo publicar</A> </LI>
      <LI> <A href="http://www.portalesverticales.com.ar/caci/empleos/site-map.html">Mapa del sitio</A> </LI>
      <LI> <A href="javascript:alert('Presione la combinación de teclas CTRL+D para agregar BuscaGuia como sitio Favorito.')" id="lnk1"><SPAN>InmueblesLaVoz</SPAN> como página de inicio</A> </LI>
    </UL>
    <UL class="logos">
      <LI class="certifica"> <A href="http://www.certifica.com/" target="_blank"> <SPAN>Certifica.com</SPAN> </A> </LI>
      <LI class="bureau"> <A href="http://www.iabargentina.com.ar/" target="_blank"> <SPAN>Internet Advertising Bureau</SPAN> </A> </LI>
    </UL>
  </DIV>
</DIV>
</BODY>
</HTML>