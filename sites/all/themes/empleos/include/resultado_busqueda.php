<?php 
$key = $_POST["key"];
$rubro = $_POST["rubro"];
$zona = $_POST["zona"];

$sql_query = "";

$sql = "	SELECT nr.nid FROM node_revisions AS nr
INNER JOIN node AS n ON n.nid = nr.nid
WHERE nr.body LIKE '%".$key."%' or nr.title like '%".$key."%' AND n.status = 1";

$base_query = "SELECT n.nid FROM node AS n ";
$inner_join = " INNER JOIN workflow_node AS w ON w.nid = n.nid ";
$where = "WHERE n.type = 'e_aviso' AND n.status = 1 ";
if($key != ""){
	$inner_join =  $inner_join . " INNER JOIN node_revisions AS nr ON nr.nid = n.nid ";
	$where = $where."AND n.title LIKE '%".$key."%' AND nr.body LIKE '%".$key."%' ";
}
if($rubro > 0){
	$inner_join = $inner_join . " INNER JOIN term_node AS tn1 ON tn1.nid = n.nid ";
	$where = $where . "AND tn1.tid = ". $rubro ." ";
}
if($zona > 0){
	$inner_join = $inner_join ." INNER JOIN term_node AS tn2 ON tn2.nid = n.nid ";
	$where = $where . "AND tn2.tid = ". $zona ." ";
}

$where = $where . " ORDER BY w.sid, n.created DESC  ";

$sql = $base_query.$inner_join.$where;
$rs = db_query($sql);
?>
      <!--------Poner aca camino de links -------->
      <UL class="tags">
        <LI>
          <H1>
          	<A href="?q=buscar">
          		Buscar
          	</A>
          </H1>
        </LI>
        <?php 
        	if(isset($rubro)){
        		?>
        		<li>
        			<h1>
        				<a href="?q=buscar/<?php echo $rubro;?>">
        					<?php echo $rubro;?> /
        				</a>
        			</h1>
        		</li>
        		<?php
        	}
        ?>
        <?php 
        	if(isset($zona)){
        		?>
        		<li>
        			<h1>
        				<a href="?q=buscar/<?php echo $zona;?>">
        					<?php echo $zona;?> /
        				</a>
        			</h1>
        		</li>
        		<?php
        	}
        ?>
        <?php 
        	if(isset($key)){
        		?>
        		<li>
        			<h1>
        				<a href="?q=buscar/<?php echo $key;?>">
        					<?php echo $key;?>
        				</a>
        			</h1>
        		</li>
        		<?php
        	}
        ?>
      </UL>
      <!----LISTA DE RESULTADOS---->
		<DIV class="box central" style="background:none">
			<DIV class="results">
          		<DIV class="rss redes">
          			<A href="#">Compartir</A>
          		</DIV>
          		<DIV class="rss">
          			<A href="#">RSS</A>
          		</DIV>
          		<P>Se econtraron <SPAN class="orange"><?php echo mysql_num_rows($rs);?> ofertas de trabajo:</SPAN> en el &aacute;rea: <SPAN class="orange">GERENCIA GENERAL</SPAN></P>
			</DIV>
        <!-----Gold results---->
        <?php 
        	$gold = "0";
        	$destacado = "0";
        	$simple = "0";
        	$gratis = "0";
        	if(mysql_num_rows($rs) > 0){
        	    while($fila = mysql_fetch_object($rs)){
        			$nodo = node_load($fila->nid);
        			foreach($nodo->taxonomy as $value){
        				if ($value->vid == 1){$area = $value->tid; break;}
        			}
        			foreach($nodo->taxonomy as $value){
        				if ($value->vid == 11){$sector = $value->tid; break;}
        			}
        			foreach($nodo->taxonomy as $value){
        				if ($value->vid == 17){$localidad = $value->tid; break;}
        			}
					switch ($nodo->_workflow) {
					    case 3:
					        echo "<div id='gold'>";
					        if($gold == "0"){
					        	echo "<div id='titles_bar'><img src='sites/all/themes/empleos/img/gold.gif'>Avisos Gold</div>";
					        	$gold = 1;	
					        }
					        break;
					    case 4:
					        echo "<div id='destacado'>";
					        if($destacado == "0"){
					        	echo "<div id='titles_bar'><img src='sites/all/themes/empleos/img/destacado.gif'>Avisos Destacados</div>";
					        	$destacado = 1;
					        }
					        break;
					    case 5:
					        echo "<div id='simple'>";
					        if($simple == "0"){
					        	echo "<div id='titles_bar'><img src='sites/all/themes/empleos/img/simple.gif'>Avisos Simples</div>";
					        	$simple = 1;
					        }
					        break;
					    case 6:
					        echo "<div id='gratis'>";
					        if($gratis == "0"){
					        	echo "<div id='titles_bar'>Avisos Gratuitos</div>";
					        	$gratis = 1;
					        }
					        break;
					}
        		?>
        			<?php 
        				if($nodo->_workflow == 3 or $nodo->_workflow == 4){
        			?>
		          <DIV>
		            <DIV class="brand">
		            	<!--  <IMG src="./Resulados de busqueda_files/01(1).jpg"> -->
		            	<?php print theme('imagecache','logo_empresa_resultado_busqueda_86_53',$nodo->picture,$nodo->picture,$nodo->picture); ?>
		            </DIV>
		            <DIV class="btn_postulate"><a href="?q=job/apply/<?php echo $nodo->nid;?>">Postulate</a></DIV>
		            <DIV class="datos">
		              <H2><SPAN class="orange"><a href="?q=taxonomy/term/<?php echo $nodo->taxonomy[$area]->tid;?>"><?php echo $nodo->taxonomy[$area]->name;?></a></SPAN> | <SPAN class="upper"><?php echo $nodo->name;?></SPAN></H2>
		              <P class="line">
		              	<SPAN class="orange">Sector:</SPAN> 
		              		<a href="?q=taxonomy/term/<?php echo $nodo->taxonomy[$sector]->tid;?>"><?php echo $nodo->taxonomy[$sector]->name;?></a> | 
		              <a href="?q=taxonomy/term/<?php echo $nodo->taxonomy[$localidad]->tid?>"><?php echo $nodo->taxonomy[$localidad]->name;?></a><BR>
		                <?php //echo $nodo->teaser;?>
		                <?php if (strlen($nodo->teaser) > 200){
						  echo substr($nodo->teaser,0,200).'...';
						}else{
						  echo substr($nodo->teaser,0,200);
						}?></p>
		              <P><A class="orange right" href="?q=node/<?php echo $nodo->nid;?>">&gt;&gt;Ver oferta de trabajo</A></P>
		              <P class="grey">Fecha de publicaci&oacute;n: <?php print date('d-m-Y',$nodo->created); ?></P>
		            </DIV>
		          </DIV>
		          <?php }
		          		if($nodo->_workflow == 4){
		          	?>
						<div>
			            <div class="datos">
			              <h2><strong>Oficial de Atención a Clientes</strong> l  Importante Entidad Bancaria</h2>
			              <p class="line">Sector: Gerencia  l  Córdoba<br>
			                Seleccionaremos para importante Banco Multinacional Relationship Manager de Payroll Services (Ref. RMPS02) <br>
			                Principales Responsabilidades: Interactuar en equipo con los Relación...</p>
			              <p><a href="#" class="right">&gt;&gt;Ver oferta de trabajo</a></p>
			              <p class="grey">Fecha de publicación: 15-01-2010</p>
			            </div>
			          </div>
		          	<?php
		          		}
		          		if($nodo->_workflow == 6){
		          			?>
							<div class="datos">
					            <h2><strong>Ejecutivo de Ventas l </strong> Importante Empresa de Servicios de Salud l <span class="grey">Sector: Gerencia l Córdoba</span></h2>
					            <p><a href="#" class="right">&gt;&gt;Ver oferta de trabajo</a></p>
					            <p class="grey">Fecha de publicación: 15-01-2010</p>
					        </div>
		          			<?php
		          		}
		          ?>
		         </div>
        			<?php
        		}
        	}else{
        		?>
        		<div><p>No se encontraron resultados de acuerdo a su criterio de busqueda.</p><p>Por favor intente con otro criterio</p></div>
        		<?php
        	}
        ?>
<?php /*    <DIV>
            <DIV class="brand"><IMG src="./Resulados de busqueda_files/01(1).jpg"></DIV>
            <DIV class="btn_postulate"></DIV>
            <DIV class="datos">
              <H2><SPAN class="orange">Dirección de ventas</SPAN>l<SPAN class="upper"> onthe fly wall</SPAN></H2>
              <P class="line"><SPAN class="orange">Sector:</SPAN> Gerencia General  l  Córdoba<BR>
                On the fly wall Argentina integrará a su staff un Gerente de Ventas con sede en Córdoba que tendrá responsabilidad sobre la central. Buscamos profesionales graduados en  carreras afines...</P>
              <P><A class="orange right" href="http://www.portalesverticales.com.ar/caci/empleos/resultado.html?filtrar+por+palabras=Filtrar+por+palabra%2Fs+clave&rubro=%C3%81rea+%2F+Rubro&zona=Zona+geogr%C3%A1fica&buscar=#">&gt;&gt;Ver oferta de trabajo</A></P>
              <P class="grey">Fecha de publicación: 15-01-2010</P>
            </DIV>
          </DIV>
          <DIV>
            <DIV class="brand"><IMG src="./Resulados de busqueda_files/04(1).jpg"></DIV>
            <DIV class="btn_postulate"></DIV>
            <DIV class="datos">
              <H2><SPAN class="orange">Dirección de ventas </SPAN> idamo</H2>
              <P class="line"><SPAN class="orange">Sector:</SPAN> Gerencia General  l  Córdoba<BR>
                On the fly wall Argentina integrará a su staff un Gerente de Ventas con sede en Córdoba que tendrá responsabilidad sobre la central. Buscamos profesionales graduados en  carreras afines...</P>
              <P><A class="orange right" href="http://www.portalesverticales.com.ar/caci/empleos/resultado.html?filtrar+por+palabras=Filtrar+por+palabra%2Fs+clave&rubro=%C3%81rea+%2F+Rubro&zona=Zona+geogr%C3%A1fica&buscar=#">&gt;&gt;Ver oferta de trabajo</A></P>
              <P class="grey">Fecha de publicación: 15-01-2010</P>
            </DIV>
          </DIV> */ ?>
        </DIV>
<?php /*       <!-----Destacado results---->
        <DIV id="destacado">
          <DIV>
            <DIV class="brand"><IMG src="./Resulados de busqueda_files/08.jpg"></DIV>
            <DIV class="btn_postulate"></DIV>
            <DIV class="datos">
              <H2><SPAN class="blue">Dirección de ventas </SPAN> l   aanwa</H2>
              <P class="line"><SPAN class="blue">Sector:</SPAN> Gerencia General  l  Córdoba<BR>
                On the fly wall Argentina integrará a su staff un Gerente de Ventas con sede en Córdoba que tendrá responsabilidad sobre la central. Buscamos profesionales graduados en  carreras afines...</P>
              <P><A class="blue right" href="http://www.portalesverticales.com.ar/caci/empleos/resultado.html?filtrar+por+palabras=Filtrar+por+palabra%2Fs+clave&rubro=%C3%81rea+%2F+Rubro&zona=Zona+geogr%C3%A1fica&buscar=#">&gt;&gt;Ver oferta de trabajo</A></P>
              <P class="grey">Fecha de publicación: 15-01-2010</P>
            </DIV>
          </DIV>
          <DIV>
            <DIV class="brand"><IMG src="./Resulados de busqueda_files/02(1).jpg"></DIV>
            <DIV class="btn_postulate"></DIV>
            <DIV class="datos">
              <H2><SPAN class="blue">Dirección de ventas </SPAN> l   sziltop</H2>
              <P class="line"><SPAN class="blue">Sector:</SPAN> Gerencia General  l  Córdoba<BR>
                On the fly wall Argentina integrará a su staff un Gerente de Ventas con sede en Córdoba que tendrá responsabilidad sobre la central. Buscamos profesionales graduados en  carreras afines...</P>
              <P><A class="blue right" href="http://www.portalesverticales.com.ar/caci/empleos/resultado.html?filtrar+por+palabras=Filtrar+por+palabra%2Fs+clave&rubro=%C3%81rea+%2F+Rubro&zona=Zona+geogr%C3%A1fica&buscar=#">&gt;&gt;Ver oferta de trabajo</A></P>
              <P class="grey">Fecha de publicación: 15-01-2010</P>
            </DIV>
          </DIV>
        </DIV>
        <!-----Simple results---->
        <DIV id="simple">
          <DIV>
            <DIV class="datos">
              <H2><STRONG>Oficial de Atención a Clientes</STRONG> l  Importante Entidad Bancaria</H2>
              <P class="line">Sector: Gerencia  l  Córdoba<BR>
                Seleccionaremos para importante Banco Multinacional Relationship Manager de Payroll Services (Ref. RMPS02) <BR>Principales Responsabilidades: Interactuar en equipo con los Relación...</P>
              <P><A class="right" href="http://www.portalesverticales.com.ar/caci/empleos/resultado.html?filtrar+por+palabras=Filtrar+por+palabra%2Fs+clave&rubro=%C3%81rea+%2F+Rubro&zona=Zona+geogr%C3%A1fica&buscar=#">&gt;&gt;Ver oferta de trabajo</A></P>
              <P class="grey">Fecha de publicación: 15-01-2010</P>
            </DIV>
          </DIV>
          <DIV>
            <DIV class="datos">
              <H2><STRONG>Oficial de Atención a Clientes</STRONG> l  Importante Entidad Bancaria</H2>
              <P class="line">Sector: Gerencia  l  Córdoba<BR>
                Seleccionaremos para importante Banco Multinacional Relationship Manager de Payroll Services (Ref. RMPS02) <BR>Principales Responsabilidades: Interactuar en equipo con los Relación...</P>
              <P><A class="right" href="http://www.portalesverticales.com.ar/caci/empleos/resultado.html?filtrar+por+palabras=Filtrar+por+palabra%2Fs+clave&rubro=%C3%81rea+%2F+Rubro&zona=Zona+geogr%C3%A1fica&buscar=#">&gt;&gt;Ver oferta de trabajo</A></P>
              <P class="grey">Fecha de publicación: 15-01-2010</P>
            </DIV>
          </DIV>
        </DIV>
        <!-----Simple gratis---->
        <DIV id="gratis">
          <DIV class="datos">
              <H2><STRONG>Ejecutivo de Ventas l </STRONG> Importante Empresa de Servicios de Salud l <SPAN class="grey">Sector: Gerencia l Córdoba</SPAN></H2>
              <P><A class="right" href="http://www.portalesverticales.com.ar/caci/empleos/resultado.html?filtrar+por+palabras=Filtrar+por+palabra%2Fs+clave&rubro=%C3%81rea+%2F+Rubro&zona=Zona+geogr%C3%A1fica&buscar=#">&gt;&gt;Ver oferta de trabajo</A></P>
              <P class="grey">Fecha de publicación: 15-01-2010</P>
            </DIV>
          <DIV class="datos">
              <H2><STRONG>Ejecutivo de Ventas l </STRONG> Importante Empresa de Servicios de Salud l <SPAN class="grey">Sector: Gerencia l Córdoba</SPAN></H2>
              <P><A class="right" href="http://www.portalesverticales.com.ar/caci/empleos/resultado.html?filtrar+por+palabras=Filtrar+por+palabra%2Fs+clave&rubro=%C3%81rea+%2F+Rubro&zona=Zona+geogr%C3%A1fica&buscar=#">&gt;&gt;Ver oferta de trabajo</A></P>
              <P class="grey">Fecha de publicación: 15-01-2010</P>
            </DIV>
          <DIV class="datos">
              <H2><STRONG>Ejecutivo de Ventas l </STRONG> Importante Empresa de Servicios de Salud l <SPAN class="grey">Sector: Gerencia l Córdoba</SPAN></H2>
              <P><A class="right" href="http://www.portalesverticales.com.ar/caci/empleos/resultado.html?filtrar+por+palabras=Filtrar+por+palabra%2Fs+clave&rubro=%C3%81rea+%2F+Rubro&zona=Zona+geogr%C3%A1fica&buscar=#">&gt;&gt;Ver oferta de trabajo</A></P>
              <P class="grey">Fecha de publicación: 15-01-2010</P>
            </DIV>
        </DIV>
      
      </DIV>
      
      */?>