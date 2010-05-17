        <!-- Tabs de Empleos destacados -->
        <div id="tab-container">
        <div style="display: block;" class="tab-content">
            <h1 class="tab" title="empleos destacados">Ofertas de empleos destacados</h1>
            <div class="widget">
              <div class="s_frame"> <a href="#" class="next"></a> <a href="#" class="previous"></a>
                <div class="widget_style">
                  <!-- right colum -->
                  
                  <?php
				    $base_query = "SELECT * FROM node_revisions AS nr INNER JOIN node AS n ON n.nid = nr.nid ";
					$inner_join = "INNER JOIN content_type_e_aviso AS w ON w.nid = n.nid ";
					// ojo tiene que ser select * si o si para que funcione el paginador
					$where = "WHERE n.type = 'e_aviso' AND n.status = 1 ";
					$where = $where . " ORDER BY w.field_tipo_de_aviso_format, n.created DESC  ";
	
					$sql = $base_query.$inner_join.$where;
					//Print "<pre>".$sql."<pre>";
	
				    //$rs = db_query($sql);
				    $rs = mysql_query($sql) or die(mysql_errors());
				    //echo $sql;
					$tot = mysql_num_rows($rs);
					if( $tot> 0){
						$ren = 0;
						$colu = 0;
						print '<ul class="left">';
        	    	    while($fila = mysql_fetch_object($rs)){
        			        $nodo = node_load($fila->nid);
							foreach($nodo->taxonomy as $value){
								if ($value->vid == 1){$area = $value->tid; break;}
							}
							$ren+= 1;
						    print '<li class="destacado">';
							if ($nodo->field_tipo_de_aviso[0]["value"] > 2) {
 					  			print '<div class="brand">';
								print l(theme('imagecache','logo_empresa_resultado_busqueda_86_53',$nodo->picture,$nodo->name.'',$nodo->name.''),'node/'.$nodo->nid, NULL , NULL,  NULL,  FALSE, TRUE);
								print '</div>';
							} else {
								print '<div class="brand"></div>';
							}
							print '<p class="date">'.date("d-m-Y",strtotime(substr($nodo->field_fecha_hasta[0]["value"],0,10))).'</p>';
					  		print '<p class="name">'.l(substr($nodo->title,0,40),'node/'.$nodo->nid ).'</p>';
					  		print '<p class="job">'.l($nodo->taxonomy[$area]->name,'taxonomy/term/'.$area ).'</p>';
					  		print '</li>';	
							if (($ren == round($tot/2)) ) { 
								 print '</ul><ul class="rigth">'; 
						    }		 
						}
						print '</ul>';
					}
 
				  ?>
                  <div class="arrow" style="clear: both;"><a href="/buscar">Ver m&aacute;s</a></div>
                  <div class="pub15 coment " style="width:auto;	float:left;"><?php print Variable_get('empresas_recientes',1);?>  avisos publicados en los ultimos 15 dias.</div>
                </div>
              </div>
            </div>
          </div>
        <script type="text/javascript" src="/sites/all/themes/empleos/js/tabs.js"></script>
        </div>




        <!-- Banner meddle -->
        <div class="banner middle"> <?php
            $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_central_home',);
			$columna= panels_mini_content($conf, $panel_args, $contexts);
    		print ($columna->content); ?>	
        </div>
        

        <!-- SLIDE NOTICIAS -->
        <div class="ContNyG clearfix">
        <div class="clearfix">
          <div class="SolCont clearfix">
            <ul class="Sol clearfix">
              <li class="Act clearfix" id="S_Opi1"> <a href="javascript:;" title="Noticias" onclick="SolChange('Opi1','S_Opi1','RssG','RssNot')">Noticias</a> </li>
              <li class="clearfix" id="S_Opi2"> <a href="javascript:;" title="Formaci&oacute;n" onclick="SolChange('Opi2','S_Opi2','RssNot','RssG')">Formaci&oacute;n</a> </li>
              <li class="clearfix" id="S_Opi3"> <a href="javascript:;" title="Gu&iacute;a de Consultoras" onclick="SolChange('Opi3','S_Opi3','RssNot','RssG')">Gu&iacute;a de Consultoras</a> </li>
            </ul>
          </div>
        </div>
        <div class="ContInf">
          <!-- CONTENIDO NOTICIAS -->
          <div style="display: block;" class="Box" id="Opi1">
            <div class="SliderFotos clearfix" id="CajaImagenes"> <a href="javascript:;" title="Anterior" class="Ant" onclick="ChangeDot('Ant');SliderImagenes.previous();return false;"></a> <a href="javascript:;" title="Siguiente" class="Sig" onclick="ChangeDot('Sig');SliderImagenes.next();return false;"></a>
              <div class="scroller">
                <div class="content">
                  <!-- seccion -->
                <?php 
				$not_pagina=0;
				$not_nota=4;
				$not_tipo='noticias';
				$sql_base   = "SELECT * FROM node_revisions AS nr INNER JOIN node AS n ON n.nid = nr.nid ";
				$inner_join = "INNER JOIN content_type_notas AS w ON w.nid = n.nid ";

				$where = "WHERE n.type = 'notas' AND w.field_tipo_value = '".$not_tipo."' AND n.status = 1 ";
				$where = $where . " ORDER BY w.field_fecha_value DESC, w.field_orden_value DESC LIMIT 12 ";
				
				$sql = $sql_base.$inner_join.$where;
				//print '['.$sql.']';
				//$sql = "SELECT * FROM node WHERE status = 1 AND type='notas' LIMIT 12";
				
				$rs = db_query($sql);
				while($fila = mysql_fetch_object($rs)){
					$nota = node_load($fila->nid);
					if ($not_nota==4) {
						if ($not_pagina > 0) print '</ul></div>';
						print '<div class="section"><ul class="clearfix">';
						$not_pagina+=1;
						$not_nota = 0;
					}
					print '<li class="FloR"><a target="_top" href="/nota/'.$not_tipo.'/'.$nota->nid.'" title="'.$nota->title.'" class="LinkNot"><img src="'.$nota->field_foto[0]['filepath'].'" class="alignnone size-full wp-image-886">';
                    print '<div class="Not" id="Not2"> <span>'.$nota->field_resumen[0]['value'].'</span></div>';
                    print '</a></li>';
					$not_nota+= 1;
				}
				if ($not_pagina >0 ) print '</ul></div>';
				?>
                </div>
              </div>
              <?php 
			  //$not_pagina = 4;
			  if ($not_pagina > 0) print '<div class="NotPag"><span class="NotAct" id="Dot1"></span>';
			  if ($not_pagina > 1) print '<span class="" id="Dot2"></span>';			  
			  if ($not_pagina > 2) print '<span class="" id="Dot3"></span>';			  
			  if ($not_pagina > 0) print '</div>';			  
			  ?>
            </div>
            <script type="text/javascript" charset="utf-8">
			        var Dots = <?php print $not_pagina; ?>;			
					var SliderImagenes = new Glider('CajaImagenes', {duration:0.5});
				</script>
          </div>
          <!-- CONTENIDO FORMACION -->
          <div class="Box" id="Opi2" style="display: none;">
            <div class="SliderFotos clearfix" id="CajaImagenes2"> <a href="javascript:;" title="Anterior" class="Ant" onclick="ChangeDot2('Ant');SliderImagenes2.previous();return false;"></a> <a href="javascript:;" title="Siguiente" class="Sig" onclick="ChangeDot2('Sig');SliderImagenes2.next();return false;"></a>
              <div class="scroller">
                <div class="content">
                <?php 
				$not_pagina=0;
				$not_nota=4;
				$not_tipo='noticias';
			    $sql_base   = "SELECT * FROM node_revisions AS nr INNER JOIN node AS n ON n.nid = nr.nid ";
				$inner_join = "INNER JOIN content_type_notas AS w ON w.nid = n.nid ";

				$where = "WHERE n.type = 'notas' AND w.field_tipo_value = '".$not_tipo."' AND n.status = 1 ";
				//$where = $where . " ORDER BY w.field_fecha_value DESC, w.field_orden_value DESC LIMIT 12 ";
				$where = $where . " ORDER BY rand() DESC LIMIT 12 ";
				
				$sql = $sql_base.$inner_join.$where;

				// OJO cambiar notas por formacion al final				
				$rs = db_query($sql);
				while($fila = mysql_fetch_object($rs)){
					$nota = node_load($fila->nid);
					if ($not_nota==4) {
						if ($not_pagina > 0) print '</ul></div>';
						print '<div class="section"><ul class="clearfix">';
						$not_pagina+=1;
						$not_nota = 0;
					}
					print '<li class="FloR"><a target="_top" href="/nota/'.$not_tipo.'/'.$nota->nid.'" title="'.$nota->title.'" class="LinkNot"><img src="'.$nota->field_foto[0]['filepath'].'" class="alignnone size-full wp-image-886">';
                    print '<div class="Not" id="Not2"> <span>'.$nota->field_resumen[0]['value'].'</span></div>';
                    print '</a></li>';
					$not_nota+= 1;
				}
				if ($not_pagina >0 ) print '</ul></div>';
				?>
                </div>
              </div>
              <?php 
			  if ($not_pagina > 0) print '<div class="NotPag"><span class="NotAct" id="2Dot1"></span>';
			  if ($not_pagina > 1) print '<span class="" id="2Dot2"></span>';			  
			  if ($not_pagina > 2) print '<span class="" id="2Dot3"></span>';			  
			  if ($not_pagina > 0) print '</div>';			  
			  ?>
            </div>
            <script type="text/javascript" charset="utf-8">
			        var Dots2 = <?php print $not_pagina; ?>;	
					var SliderImagenes2 = new Glider('CajaImagenes2', {duration:0.5});
				</script>
          </div>
          <!-- CONTENIDO GUIA DE CONSULTORAS -->
          <div class="Box" id="Opi3" style="display: none;"> 
          <div class="SliderFotos clearfix" id="CajaImagenes3"> <a href="javascript:;" title="Anterior" class="Ant" onclick="ChangeDot3('Ant');SliderImagenes3.previous();return false;"></a> <a href="javascript:;" title="Siguiente" class="Sig" onclick="ChangeDot3('Sig');SliderImagenes3.next();return false;"></a>
              <div class="scroller">
                <div class="content">
                <?php 
				$not_pagina=0;
				$not_nota=4;
				$not_tipo='noticias';				
			    $sql_base   = "SELECT * FROM node_revisions AS nr INNER JOIN node AS n ON n.nid = nr.nid ";
				$inner_join = "INNER JOIN content_type_notas AS w ON w.nid = n.nid ";

				$where = "WHERE n.type = 'notas' AND w.field_tipo_value = '".$not_tipo."' AND n.status = 1 ";
				//$where = $where . " ORDER BY w.field_fecha_value DESC, w.field_orden_value DESC LIMIT 12 ";
				$where = $where . " ORDER BY rand() DESC LIMIT 12 ";				
				// OJO cambiar notas por consultoras al final
				$rs = db_query($sql);
				while($fila = mysql_fetch_object($rs)){
					$nota = node_load($fila->nid);
					if ($not_nota==4) {
						if ($not_pagina > 0) print '</ul></div>';
						print '<div class="section"><ul class="clearfix">';
						$not_pagina+=1;
						$not_nota = 0;
					}
					print '<li class="FloR"><a target="_top" href="/nota/'.$not_tipo.'/'.$nota->nid.'" title="'.$nota->title.'" class="LinkNot"><img src="'.$nota->field_foto[0]['filepath'].'" class="alignnone size-full wp-image-886">';
                    print '<div class="Not" id="Not2"> <span>'.$nota->field_resumen[0]['value'].'</span></div>';
                    print '</a></li>';
					$not_nota+= 1;
				}
				if ($not_pagina >0 ) print '</ul></div>';
				?>
                </div>
              </div>
              <?php 
			  if ($not_pagina > 0) print '<div class="NotPag"><span class="NotAct" id="3Dot1"></span>';
			  if ($not_pagina > 1) print '<span class="" id="3Dot2"></span>';			  
			  if ($not_pagina > 2) print '<span class="" id="3Dot3"></span>';			  
			  if ($not_pagina > 0) print '</div>';			  
			  ?>
            </div>
            <script type="text/javascript" charset="utf-8">
			        var Dots3 = <?php print $not_pagina; ?>;
					var SliderImagenes3 = new Glider('CajaImagenes3', {duration:0.5});
				</script>
          </div>          
        </div>
                </div>