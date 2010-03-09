<?php include("head.php");?>
<BODY> 
<DIV id="wrapper"> 
  <!----HEADER----> 
  <DIV id="header"> 
    <!----Banner Topsite----> 
    <DIV class="banner top"> Topsite</DIV> 
    <!----login----> 
    <DIV id="login"> 
      <UL class="log"> 
        <LI><A href="http://www.portalesverticales.com.ar/caci/empleos/form-login.html">Ingresar </A> &nbsp;I</LI> 
        <LI><A href="http://www.portalesverticales.com.ar/caci/empleos/form-login.html">Registrarse</A>&nbsp;I</LI> 
        <LI><A href="./Forms_files/Forms.htm">Mi cuenta</A>&nbsp;I</LI> 
        <LI><A href="http://www.portalesverticales.com.ar/caci/empleos/form.html#">Contacto</A> </LI> 
        <LI class="destacar"><SPAN style="color:#FFF">Ingreso Empleadores</SPAN>&nbsp;&nbsp;&nbsp;<A href="http://www.portalesverticales.com.ar/caci/empleos/form.html#">¿C&oacute;mo publico un aviso? </A> </LI> 
      </UL> 
    </DIV> 
    <!----logo----> 
    <DIV id="logo"><A href="?q=principal"><IMG src="sites/all/themes/empleos/img/logo.jpg"></A> </DIV> 
    <DIV style="clear:both"></DIV> 
    <!----menu----> 
    <DIV class="menu top"> 
      <UL> 
        <LI><A href="http://www.portalesverticales.com.ar/caci/empleos/buscar.html" class="active">Buscar</A></LI> 
        <LI><A href="http://www.portalesverticales.com.ar/caci/empleos/empresas.html">Empresas</A></LI> 
        <LI><A href="http://www.portalesverticales.com.ar/caci/empleos/consultoras.html">Consultoras</A></LI> 
        <LI><A href="http://www.portalesverticales.com.ar/caci/empleos/facs.html">Preguntas frecuentes</A></LI> 
      </UL> 
    </DIV> 
    <DIV id="browser" class="inside"> </DIV> 
  </DIV> 
  <!------MIDDLE------> 
  <DIV id="midle"> 
    <DIV class="box top"> 
      <P><STRONG>Ingresar tu curriculum</STRONG> te permitir&aacute; postularte a todas las b&uacute;squedas de empleos que se publiquen en el sitio y, si as&iacute; lo dese&aacute;s, las empresas y consultoras que accedan a nuestra base de datos en busca de candidatos podr&aacute;n consultarlo.
        El proceso de ingreso del curr&iacute;culum est&aacute; dividido en pasos.<BR> 
        Al finalizar la carga de tus datos presion&aacute; el bot&oacute;n &quot;guardar&quot; al final de la p&aacute;gina antes de ir al paso siguiente.Los &iacute;tems <SPAN style="color:#248CC4; font-weight:bold">destacados en celeste</SPAN> son obligatorios.</P> 
      <DIV><IMG style=" padding-left:100px;" src="sites/all/themes/empleos/img/10pasos.png"></DIV> 
      <DIV><IMG style=" padding-left:150px " src="sites/all/themes/empleos/img/1paso.png"></DIV> 
    </DIV>
    <!-----submenu-----> 
	<?php include("submenu-usuarios.php");?> 
     <!-----tabla-----> 
  	<?php 
  		global $user;
  		if ($user->uid){
			$view = views_get_view('mi_educacion');
			$vista = views_build_view('items', $view, false, false, 2, $filters);
			?>
				<TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
				      <TBODY> 
				        <TR> 
				          <TD class="techo" width="16%">Per&iacute;odo</TD> 
				          <TD class="techo" width="16%">Instituto</TD> 
				          <TD class="techo" width="18%">Carrera</TD> 
				          <TD class="techo" width="18%">Nivel</TD> 
				          <TD class="techo" width="22%">Estado</TD> 
				          <TD class="techo" width="10%">&nbsp;</TD> 
				        </TR> 
			<?php
			foreach($vista["items"] as $item){
				$educacion = node_load(array('nid' => $item->nid));
					$instituto = "";
					foreach($educacion->taxonomy as $taxo){
						if($taxo->vid == "6"){
							$instituto = $taxo->name;
							break;
						}
					}
					$nivel = "";
					foreach($educacion->taxonomy as $taxo){
						if($taxo->vid == "3"){
							$nivel = $taxo->name;
							break;
						}
					}
					$estado = "";
					foreach($educacion->taxonomy as $taxo){
						if($taxo->vid == "4"){
							$estado = $taxo->name;
							break;
						}
					}
				?>
				        <TR> 
				          <TD><?php echo date("n.Y")?> - <?php echo date("n.Y")?></TD> 
				          <TD><?php print $instituto;?></TD> 
				          <TD><?php print $educacion->field_ttulo_o_certificacin[0]["value"];?></TD> 
				          <TD><?php print $nivel;?></TD> 
				          <TD><?php print $estado;?></TD>
				          <TD><A href="http://www.portalesverticales.com.ar/caci/empleos/form.html#" title="editar"><DIV class="arrow editar" style=" margin-right:10px;"></DIV></A> <A href="http://www.portalesverticales.com.ar/caci/empleos/form.html#" title="borrar"><DIV class="arrow cancel"></DIV></A> </TD> 
				        </TR> 
				<?php
				
			}
			?>
				      </TBODY> 
				</TABLE> 
				<?php print $content;?>
			<?php
  			//print "<div class='mycv'>".$content."</div>";
  		}else{
  	?>
     <TABLE class="tablaGris" border="0" cellpadding="0" cellspacing="1"> 
      <TBODY> 
        <TR> 
          <TD class="techo" width="16%">Per&iacute;odo</TD> 
          <TD class="techo" width="16%">Empresa</TD> 
          <TD class="techo" width="18%">Ramo o actividad</TD> 
          <TD class="techo" width="18%">Area o Sector</TD> 
          <TD class="techo" width="22%">Tipo de puesto o jerarqu&iacute;a</TD> 
          <TD class="techo" width="10%">&nbsp;</TD> 
        </TR> 
        <TR> 
          <TD>03.1974 - Presente</TD> 
          <TD>arcor</TD> 
          <TD>Telecomunicaciones</TD> 
          <TD>Comercial / Ventas</TD> 
          <TD>Jefe / Supervisor / Responsable</TD> 
          <TD><A href="http://www.portalesverticales.com.ar/caci/empleos/form.html#" title="editar"><DIV class="arrow editar" style=" margin-right:10px;"></DIV></A> <A href="http://www.portalesverticales.com.ar/caci/empleos/form.html#" title="borrar"><DIV class="arrow cancel"></DIV></A> </TD> 
        </TR> 
        <TR> 
          <TD>03.1974 - Presente</TD> 
          <TD>arcor</TD> 
          <TD>Telecomunicaciones</TD> 
          <TD>Comercial / Ventas</TD> 
          <TD>Jefe / Supervisor / Responsable</TD> 
          <TD><A href="http://www.portalesverticales.com.ar/caci/empleos/form.html#" title="editar"><DIV class="arrow editar" style=" margin-right:10px;"></DIV></A> <A href="http://www.portalesverticales.com.ar/caci/empleos/form.html#" title="borrar"><DIV class="arrow cancel"></DIV></A> </TD> 
        </TR> 
      </TBODY> 
    </TABLE> 
    <!----FORM----> 
    <DIV class="mycv"> 
    <FORM method="post" accept-charset="UTF-8" action="http://www.portalesverticales.com.ar/caci/empleos/form.html?q=user"> 
      <DIV class="bloque"> 
        <DIV class="itemTitle orange">Datos de Cuenta</DIV> 
        <DIV class="item req">Usuario:</DIV> 
        <DIV class="datos"> 
          <INPUT type="text" class="req" tabindex="1" value="" size="60" id="edit-name" name="name" maxlength="60"> 
          <DIV class="grey" style="margin-bottom: 4px;">Ingresa un nombre entre 4 y 10 caracteres</DIV> 
        </DIV> 
        <DIV class="item req">Contraseña:</DIV> 
        <DIV class="datos"> 
          <INPUT type="password" class="req" tabindex="2" size="60" id="edit-pass" name="pass"> 
        </DIV> 
      </DIV> 
      <DIV class="bloque"> 
        <DIV class="itemTitle orange">Datos Personales</DIV> 
        <DIV class="item req">Nombre:</DIV> 
        <DIV class="datos"> 
          <INPUT type="text" class="req" tabindex="1" value="" size="60" id="edit-name" name="name" maxlength="60"> 
        </DIV> 
        <DIV class="item req">Apellido:</DIV> 
        <DIV class="datos"> 
          <INPUT type="text" class="req" tabindex="1" value="" size="60" id="edit-name" name="name" maxlength="60"> 
          <DIV class="grey" style="margin-bottom: 4px;">ingresa palabras separadas por coma (,)</DIV> 
        </DIV> 
        <DIV class="item">Dato menos importante:</DIV> 
        <DIV class="datos"> 
          <INPUT type="text" tabindex="1" value="" size="60" id="edit-name" name="name" maxlength="60"> 
        </DIV> 
        <DIV class="item req">Nacionalidad</DIV> 
        <DIV class="datos"> 
          <SELECT class="req" id="/" name="/" style="width:110px; margin-right:50px;"> 
            <OPTION selected="selected" value="">Seleccion&aacute; uno</OPTION> 
            <OPTION value="1">Argentina</OPTION> 
            <OPTION value="2">Brasil</OPTION> 
          </SELECT> 
          Otro dato:
          <INPUT class="text" maxlength="6" id="totalEmployee" name="totalEmployee" style="width: 95px; margin-left: 5px;" type="text"> 
        </DIV> 
        <DIV class="item req">Genero:</DIV> 
        <DIV class="datos"> 
         <INPUT class="check" type="radio" name="id"> 
         <LABEL class="check" for="">hombre</LABEL> 
         <INPUT class="check" type="radio" name="id"> 
         <LABEL class="check" for="">mujer</LABEL> 
        </DIV> 
        <DIV class="item req">Optgroup</DIV> 
        <DIV class="datos"> 
          <SELECT class="req" id="/" name="/" style="width:325px; margin-right:50px;"> 
            <OPTION selected="selected" value="">Seleccion&aacute; uno</OPTION> 
            <OPTGROUP label="Primero"> 
            <OPTION value="1">opcion 1</OPTION> 
            <OPTION value="2">opcion 2</OPTION> 
            </OPTGROUP> 
            <OPTGROUP label="segundo"> 
            <OPTION value="1">opcion 1</OPTION> 
            <OPTION value="2">opcion 2</OPTION> 
            </OPTGROUP> 
          </SELECT> 
        </DIV> 
      </DIV> 
      <DIV class="bloque"> 
        <DIV class="itemTitle orange">Otros Datos:</DIV>       
        <DIV class="item req">Elegir:</DIV> 
        <DIV class="datos"> 
          <INPUT class="check" type="checkbox" name="chknewsletter" id="chk1" checked="checked"> 
          <LABEL class="check" for="chknewsletter">opcion 1</LABEL> 
          <INPUT class="check" type="checkbox" name="chknewsletter" id="chk2"> 
          <LABEL class="check" for="chknewsletter">opcion 2</LABEL> 
          <INPUT class="check" type="checkbox" name="chknewsletter" id="chk3"> 
          <LABEL for="chknewsletter">opcion 3</LABEL> 
        </DIV> 
        <DIV class="item">Intereses y pasatiempos</DIV> 
        <DIV class="datos"> 
          <TEXTAREA id="" name="jobdescription" rows="8" style="width: 310px;"></TEXTAREA> 
        </DIV> 
      </DIV> 
     <DIV class="bloque puntos" style="width:680px"> 
        <DIV class="datos button"> 
          <INPUT type="hidden" value="user_login" id="edit-user-login" name="form_id"> 
          <INPUT type="submit" class="button" tabindex="3" value="Ingresar" id="edit-submit" name="op"> 
        </DIV> 
    
    </DIV> 
  </FORM>
  </DIV> 
  <?php } ?>
  <!--FOOTER--> 
  <DIV id="footer"> 
    <H3 class="small"> Un portal de <BR> 
      <A href="http://www.lavoz.com.ar/" target="_blank"> <IMG src="./Forms_files/pie_lavoz.gif" width="110" height="14"> </A> </H3> 
    <UL> 
      <LI> <A href="http://www.portalesverticales.com.ar/caci/empleos/aviso-legal.html">Aviso legal</A> </LI> 
      <LI> <A href="http://www.portalesverticales.com.ar/caci/empleos/contacto.html">Contacto</A> </LI> 
      <LI> <A href="http://www.portalesverticales.com.ar/caci/empleos/privacidad.html">Privacidad</A> </LI> 
      <LI> <A href="http://www.portalesverticales.com.ar/caci/empleos/publicar.html" target="_blank">C&oacute;mo publicar</A> </LI> 
      <LI> <A href="http://www.portalesverticales.com.ar/caci/empleos/site-map.html">Mapa del sitio</A> </LI> 
      <LI> <A href="javascript:alert('Presione la combinaci&oacute;n de teclas CTRL+D para agregar BuscaGuia como sitio Favorito.')" id="lnk1"><SPAN>InmueblesLaVoz</SPAN> como p&aacute;gina de inicio</A> </LI> 
    </UL> 
    <UL class="logos"> 
      <LI class="certifica"> <A href="http://www.certifica.com/" target="_blank"> <SPAN>Certifica.com</SPAN> </A> </LI> 
      <LI class="bureau"> <A href="http://www.iabargentina.com.ar/" target="_blank"> <SPAN>Internet Advertising Bureau</SPAN> </A> </LI> 
    </UL> 
  </DIV> 
</DIV> 
</DIV></BODY></HTML>