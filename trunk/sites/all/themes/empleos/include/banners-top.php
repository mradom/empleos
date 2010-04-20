<?php		
  if (arg(0)=='principal') {
    print '<div class="banner top">';
    $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_top_home',);
	$columna= panels_mini_content($conf, $panel_args, $contexts);
    print ($columna->content); 	
	print '</div>';
  } else {
    print '<div class="banner top">';
    $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_top_interna',);
	$columna= panels_mini_content($conf, $panel_args, $contexts);
    print ($columna->content); 	
	print '</div>';	  
  }
?>
