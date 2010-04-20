        <!-- Tabs de Empleos destacados -->
        <div id="tab-container">
        <div style="display: block;" class="tab-content">
            <h1 class="tab" title="empleos destacados">Ofertas de empleos destacados</h1>
            <div class="widget">
              <div class="s_frame"> <a href="#" class="next"></a> <a href="#" class="previous"></a>
                <div class="widget_style">
                  <!-- right colum -->
                  <ul class="rigth">
                    <li class="destacado">
                      <div class="brand"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                      <div class="brand"><img src="/sites/all/themes/empleos/img/02_002.jpg"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                      <div class="brand"><img src="/sites/all/themes/empleos/img/03.jpg"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                      <div class="brand"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                      <div class="brand"><img src="/sites/all/themes/empleos/img/05.jpg"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                      <div class="brand"><img src="/sites/all/themes/empleos/img/06.jpg"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                    <div class="brand"><img src="/sites/all/themes/empleos/img/07.jpg"></div>
                    <p class="date">15-05-2010</p>
                    <p class="name">on the fly wall</p>
                    <p class="job">Gerente de Ventas</p>
                    </li>
                  </ul>
                  <!-- left colum -->
                  <ul class="left">
                    <li class="destacado">
                      <div class="brand"><img src="/sites/all/themes/empleos/img/01_002.jpg"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                      <div class="brand"><img src="/sites/all/themes/empleos/img/02_002.jpg"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                      <div class="brand"><img src="/sites/all/themes/empleos/img/03.jpg"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                      <div class="brand"><img src="/sites/all/themes/empleos/img/04.jpg"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                      <div class="brand"><img src="/sites/all/themes/empleos/img/05.jpg"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                      <div class="brand"></div>
                      <p class="date">15-05-2010</p>
                      <p class="name">on the fly wall</p>
                      <p class="job">Gerente de Ventas</p>
                    </li>
                    <li class="destacado">
                    <div class="brand"><img src="/sites/all/themes/empleos/img/07.jpg"></div>
                    <p class="date">15-05-2010</p>
                    <p class="name">on the fly wall</p>
                    <p class="job">Gerente de Ventas</p>
                    </li>
                  </ul>
                  <div class="arrow" style="clear: both;"><a href="#">Ver m&aacute;s</a></div>
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
              <li class="Act clearfix" id="S_Opi1"> <a href="javascript:;" title="departamentos" onclick="SolChange('Opi1','S_Opi1','RssG','RssNot')">Noticias</a> </li>
              <li class="clearfix" id="S_Opi2"> <a href="javascript:;" title="casas" onclick="SolChange('Opi2','S_Opi2','RssNot','RssG')">Formac&oacute;n</a> </li>
              <li class="clearfix" id="S_Opi3"> <a href="javascript:;" title="countries" onclick="SolChange('Opi3','S_Opi3','RssNot','RssG')">Gu&iacute;a de Consultoras</a> </li>
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
				$sql = "SELECT * FROM node
				WHERE status = 1 AND type='notas' LIMIT 12";
				$rs = db_query($sql);
				while($fila = mysql_fetch_object($rs)){
					$nota = node_load($fila->nid);
					if ($not_nota==4) {
						if ($not_pagina > 0) print '</ul></div>';
						print '<div class="section"><ul class="clearfix">';
						$not_pagina+=1;
						$not_nota = 0;
					}
					print '<li class="FloR"><a target="_top" href="/nota/'.$nota->nid.'" title="'.$nota->title.'" class="LinkNot"><img src="'.$nota->field_foto[0]['filepath'].'" class="alignnone size-full wp-image-886">';
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
				$sql = "SELECT * FROM node
				WHERE status = 1 AND type='notas' ORDER BY RAND() LIMIT 12";
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
					print '<li class="FloR"><a target="_top" href="/nota/'.$nota->nid.'" title="'.$nota->title.'" class="LinkNot"><img src="'.$nota->field_foto[0]['filepath'].'" class="alignnone size-full wp-image-886">';
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
				$sql = "SELECT * FROM node
				WHERE status = 1 AND type='notas' ORDER BY RAND() LIMIT 12";
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
					print '<li class="FloR"><a target="_top" href="/nota/'.$nota->nid.'" title="'.$nota->title.'" class="LinkNot"><img src="'.$nota->field_foto[0]['filepath'].'" class="alignnone size-full wp-image-886">';
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