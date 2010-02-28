<DIV id="gold">
        <?php 
        			$nodo = node_load($node->nid);
        			foreach($nodo->taxonomy as $value){
        				if ($value->vid == 1){$area = $value->tid; break;}
        			}
        			foreach($nodo->taxonomy as $value){
        				if ($value->vid == 11){$sector = $value->tid; break;}
        			}
        			foreach($nodo->taxonomy as $value){
        				if ($value->vid == 17){$localidad = $value->tid; break;}
        			}
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
		                <?php echo $nodo->body;?></p>
		              
		              <P class="grey">Fecha de publicaci&oacute;n: <?php print date('d-m-Y',$nodo->created); ?></P>
		            </DIV>
		          </DIV>
        </DIV>
