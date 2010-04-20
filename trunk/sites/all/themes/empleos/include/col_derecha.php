      <div id="right_column">
       <?php
          print '<div class="banner rectangle">';
		  $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_derecha1',);
		  $columna= panels_mini_content($conf, $panel_args, $contexts);
	      print ($columna->content); 	
	      print '</div>';
		?>
        
        <div class="bar_blue">
          <div class="corner_blue _2"></div>
          <div class="corner_blue">Ofertas de trabajo por &Aacute;rea / Rubro</div>
        </div>
        <div class="box side">
        	<?php include("sites/all/themes/empleos/block-block1.tpl.php"); ?>
        </div>

        <div class="bar_blue">
          <div class="corner_blue _2"></div>
          <div class="corner_blue">Ofertas de trabajo por Empresas</div>
        </div>
        
        <div class="box side">
           <?php include("sites/all/themes/empleos/block-block3.tpl.php"); ?>
           <div class="arrow"><a href="/empresa">Ver m&aacute;s</a></div>
        </div>
      </div>