<?php

print '<div class="content_banners" style="margin-bottom:20px;">';
  // banner 1
  print '<div class="banner minibox" style="margin-right:26px;">'; 
    $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_central_home1',);
	$columna= panels_mini_content($conf, $panel_args, $contexts);
    print ($columna->content); 	
	print '</div>';
  // banner 2	
  print '<div class="banner minibox" style="margin-right:27px;">';
    $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_central_home2',);
	$columna= panels_mini_content($conf, $panel_args, $contexts);
    print ($columna->content); 	
    print '</div>';  
  // banner 3	
  print '<div class="banner minibox" style="margin-right:27px;">';
    $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_central_home3',);
	$columna= panels_mini_content($conf, $panel_args, $contexts);
    print ($columna->content); 	
	print '</div>';
  // banner 4	
  print '<div class="banner minibox">'; 
    $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_central_home4',);
	$columna= panels_mini_content($conf, $panel_args, $contexts);
    print ($columna->content); 	
	print '</div>';
print '</div>';

?>
