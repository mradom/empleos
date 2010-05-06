<?php
  print '<div class="content_banners boxes">';
  // banner 1
  print '<div class="banner boxes" style="margin-right:45px;">'; 
    $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_boxes_home1',);
	$columna= panels_mini_content($conf, $panel_args, $contexts);
    print ($columna->content); 	
	print '</div>';
  // banner 2	
  print '<div class="banner boxes">';
    $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_boxes_home2',);
	$columna= panels_mini_content($conf, $panel_args, $contexts);
    print ($columna->content); 	
    print '</div>';  
  // banner 3	
  print '<div class="banner boxes" style="float:right">';
    $conf= Array ('style' => 'block', 'override_title' => '0','override_title_text' => '', 'css_id' => '', 
		    'css_class' => '', 'name' => 'banner_boxes_home3',);
	$columna= panels_mini_content($conf, $panel_args, $contexts);
    print ($columna->content); 	
	print '</div>';
  print '</div>';
?>
