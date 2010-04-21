<?php		
    print '<div class="banner rectangle">';
    $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_derecha1',);
	$columna= panels_mini_content($conf, $panel_args, $contexts);
    print ($columna->content); 	
	print '</div>';
?>
