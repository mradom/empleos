<?php 
        			$nodo = node_load($node->nid);
        			$gold = "0";
        			$destacado = "0";
        			$simple = "0";
        			$gratis = "0";
        			$b_area=get_vocabulary_by_id('Area');
					$b_ramo=get_vocabulary_by_id('Ramo o Actividad');
					$b_localidad=get_vocabulary_by_id('Provincias');
        			foreach($nodo->taxonomy as $value){
        				if ($value->vid == $b_area){$area = $value->tid; break;}
        			}
        			foreach($nodo->taxonomy as $value){
        				if ($value->vid == $b_ramo){$sector = $value->tid; break;}
        			}
        			foreach($nodo->taxonomy as $value){
        				if ($value->vid == $b_localidad){$localidad = $value->tid; break;}
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
        				// tipo gold=3 y destacado=4
        			?>
		          <DIV>
		            <DIV class="brand">
		            	<?php print theme('imagecache','logo_empresa_resultado_busqueda_86_53',$nodo->picture,$nodo->picture,$nodo->picture); ?>
		            </DIV>
		            <a href="?q=job/apply/<?php echo $nodo->nid;?>"><div class="btn_postulate"></div></a>
		            <DIV class="datos">
		              <H2><SPAN class="orange"><a href="?q=taxonomy/term/<?php echo $nodo->taxonomy[$area]->tid;?>"><?php echo $nodo->taxonomy[$area]->name;?></a></SPAN> | <SPAN class="upper"><?php echo $nodo->name;?></SPAN></H2>
		              <P class="line">
		              	<SPAN class="orange">Sector:</SPAN> <a href="?q=taxonomy/term/<?php echo $nodo->taxonomy[$sector]->tid;?>"><?php echo $nodo->taxonomy[$sector]->name;?></a> | 
		              <a href="?q=taxonomy/term/<?php echo $nodo->taxonomy[$localidad]->tid?>"><?php echo $nodo->taxonomy[$localidad]->name;?></a><BR>
		                <?php //echo $nodo->teaser;?>
		                <?php if (strlen($nodo->teaser) > 215){
						  echo substr($nodo->teaser,0,215).'...';
						}else{
						  echo substr($nodo->teaser,0,215);
						}?></p>
		              <P><A class="orange right" href="?q=node/<?php echo $nodo->nid;?>">&gt;&gt;Ver oferta de trabajo</A></P>
		              <P class="grey">Fecha de publicaci&oacute;n: <?php print date('d-m-Y',$nodo->created); ?></P>
		            </DIV>
		          </DIV>
		          <?php }
		          		if($nodo->_workflow == 5){
		          		// tipo basico
		          	?>
						<div>
			            <div class="datos">
			              <H2><SPAN><a href="?q=taxonomy/term/<?php echo $nodo->taxonomy[$area]->tid;?>"><?php echo $nodo->taxonomy[$area]->name;?></a></SPAN> | <SPAN class="upper"><?php echo $nodo->name;?></SPAN></H2>
		                  <P class="line">
		              	  <SPAN class="orange">Sector:</SPAN> <a href="?q=taxonomy/term/<?php echo $nodo->taxonomy[$sector]->tid;?>"><?php echo $nodo->taxonomy[$sector]->name;?></a> | 
		                  <a href="?q=taxonomy/term/<?php echo $nodo->taxonomy[$localidad]->tid?>"><?php echo $nodo->taxonomy[$localidad]->name;?></a><BR>
		                <?php //echo $nodo->teaser;?>
		                <?php if (strlen($nodo->teaser) > 215){
						  echo substr($nodo->teaser,0,215).'...';
						}else{
						  echo substr($nodo->teaser,0,215);
						}?></p>
			              <P><a class="right" href="?q=node/<?php echo $nodo->nid;?>">&gt;&gt;Ver oferta de trabajo</A></P>
			              <p class="grey">Fecha de publicaci&oacute;n: <?php print date('d-m-Y',$nodo->created); ?></P>
			            </div>
			          </div>
		          	<?php
		          		}
		          		if($nodo->_workflow == 6){
		          			// tipo free
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
