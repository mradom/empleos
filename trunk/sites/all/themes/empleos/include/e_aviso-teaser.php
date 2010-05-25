<?php
//echo "<pre>"; print_r($node->links); echo "</pre>"; 
     	  			$nodo = node_load($node->nid);
        			$gold = "0";
        			$destacado = "0";
        			$simple = "0";
        			$gratis = "0";
        			$b_area=get_vocabulary_by_name('Area');
					$b_ramo=get_vocabulary_by_name('Ramo o Actividad');
					$b_localidad=get_vocabulary_by_name('Provincias');
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
		          <div>
		            <DIV class="brand">
		            	<?php print theme('imagecache','logo_empresa_resultado_busqueda_86_53',$nodo->picture,$nodo->picture,$nodo->picture); ?>
		            </div>
		            <?php 
		            	$link = "";
		            	if($user->uid){
		            		$link = "/job/apply/".$nodo->nid;
		            	}else{
		            		$link = "/user&destination=node/".$nodo->nid;
		            	}
		            ?>
		            <a href="<?php echo $link;?>"><div class="btn_postulate"></div></a>
		            <DIV class="datos">
		              <H2><SPAN class="orange"><a href="/taxonomy/term/<?php echo $nodo->taxonomy[$area]->tid;?>"><?php echo $nodo->taxonomy[$area]->name;?></a></SPAN> | <SPAN class="upper"><?php echo $nodo->name;?></SPAN></H2>
		              <P class="line">
		              	<SPAN class="orange">Sector:</SPAN> <?php print l($nodo->taxonomy[$sector]->name,"taxonomy/term/".$nodo->taxonomy[$sector]->tid) ?> | <?php print l($nodo->taxonomy[$localidad]->name,"taxonomy/term/".$nodo->taxonomy[$localidad]->tid) ?>
		                <br />
		                <?php //echo $nodo->teaser;?>
		                <?php if (strlen($nodo->teaser) > 215){
						  echo substr($nodo->teaser,0,215).'...';
						}else{
						  echo substr($nodo->teaser,0,215);
						}?></p>
		              <P><A class="orange right" href="/node/<?php echo $nodo->nid;?>">&gt;&gt;Ver oferta de trabajo</A></P>
		              <P class="grey">Fecha de publicaci&oacute;n: <?php print date('d-m-Y',$nodo->created); ?></P>
		            </div>
		          </div>
		          <?php }
		          	if($nodo->_workflow == 5){
		          		// tipo basico
		          	?>
						<div>
			            <div class="datos">
			              <H2><SPAN><a href="/taxonomy/term/<?php echo $nodo->taxonomy[$area]->tid;?>"><?php echo $nodo->taxonomy[$area]->name;?></a></SPAN> | <SPAN class="upper"><?php echo $nodo->name;?></SPAN></H2>
		                  <P class="line">
		              	<SPAN class="orange">Sector:</SPAN> <?php print l($nodo->taxonomy[$sector]->name,"taxonomy/term/".$nodo->taxonomy[$sector]->tid) ?> | <?php print l($nodo->taxonomy[$localidad]->name,"taxonomy/term/".$nodo->taxonomy[$localidad]->tid) ?>
		                <br />
		                <?php //echo $nodo->teaser;?>
		                <?php if (strlen($nodo->teaser) > 215){
						  echo substr($nodo->teaser,0,215).'...';
						}else{
						  echo substr($nodo->teaser,0,215);
						}?></p>
			              <P><a class="right" href="/node/<?php echo $nodo->nid;?>">&gt;&gt;Ver oferta de trabajo</A></P>
			              <p class="grey">Fecha de publicaci&oacute;n: <?php print date('d-m-Y',$nodo->created); ?></P>
			            </div>
			          </div>
		          	<?php
		          		}
		          		if($nodo->_workflow == 6){
		          			// tipo free
		          			?>
							<div class="datos">
					            <h2><strong><?php echo $nodo->title;?></strong> Importante Empresa de Servicios de Salud | <span class="grey">Sector: <?php echo $nodo->taxonomy[$sector]->name;?></span></h2>
					            <p><a href="/node/<?php echo $nodo->nid;?>" class="right">&gt;&gt;Ver oferta de trabajo</a></p>
					            <p class="grey">Fecha de publicaci&oacute;n: <?php print date('d-m-Y',$nodo->created); ?></P>
					        </div>
		          			<?php
		          		}
		          ?>
		          <a href="/<?php echo $node->links['job_apply']['href']?>">Ver postulantes para este aviso</a>
		         </div>