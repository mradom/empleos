<?php
// $Id: cck_map.inc,v 1.4 2007/11/18 01:26:50 beeradb Exp $
function theme_cck_map($node, $field, $items, $teaser, $page, $prefix){
  $ouptut = '';
  
  if ($field['widget']['label'])
    $output .= "<h3>".$field['widget']['label']."</h3>";
 
  //the $prefix."mapArea" div is targetted by the javascript to insert the map element in. You need an element with this id for the map to display properly.
  $output .= "<div id='".$prefix."mapArea'  class='mapArea' style=\"width: ".$field['widget']['mapx']."px; height: ".$field['widget']['mapy']."px\"></div>";
  return $output;
  
}

?>