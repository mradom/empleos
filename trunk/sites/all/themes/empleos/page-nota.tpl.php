<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
    <!-- banner -->
    <?php //include("include/banners-boxes.php");?>
    <?php include("include/encabezado_nota.php");?>
    <!-- RIGHT -->
    <div id="right_column">    
        <?php 
		  include("include/col_derecha-sin.php");
	  
	      $busco = arg(1);
		  // cuando este en produccion sacar la lnea de abajo
		  $busco = 'noticias';
		  $sql_base   = "SELECT * FROM node_revisions AS nr INNER JOIN node AS n ON n.nid = nr.nid ";
		  $inner_join = "INNER JOIN content_type_notas AS w ON w.nid = n.nid ";

		  $where = "WHERE n.type = 'notas' AND field_tipo_value = '".$busco."' AND n.nid <> '".arg(2)."' AND n.status = 1 ";
		  $where = $where . " ORDER BY w.field_fecha_value DESC, w.field_orden_value DESC LIMIT 30 ";
		  
		  $sql = $sql_base.$inner_join.$where;
		  //print '['.$sql.']';
		  $rs = db_query($sql);

		   print '<div class="noticias">';
				print '<div class="nav"><h2>Novedades:</h2></div>';
				while($fila = mysql_fetch_object($rs)){
					$nota = node_load($fila->nid);
					//print '<pre>';
					//print_r($nota);					
					//print '<pre>';					
					print '<div class="note">';      
					print '<a href="/nota/'.$busco.'/'.$nota->nid.'" target="_top" title="'.htmlspecialchars($nota->title).'"></a>';
					print '<div class="date">'.date("d-m-Y",strtotime(substr($nota->field_fecha[0]['value'],0,10))).'</div>';
					
					print '<div class="phot">';
					print '<a href="/nota/'.$busco.'/'.$nota->nid.'" target="_top" title="'.htmlspecialchars($nota->title).'"><img src="/'.$nota->field_foto[0]['filepath'].'" alt="'.htmlspecialchars($nota->title).'" /></a>';
					print '</div>';
					print '<div class="title"><a href="/nota/'.$busco.'/'.$nota->nid.'" target="_top" title="'.htmlspecialchars($nota->title).'">'.htmlspecialchars(substr($nota->title,0,55)).'</a></div>';
                    print '<div class="body-note"><a href="/nota/'.$busco.'/'.$nota->nid.'" target="_top" title="'.htmlspecialchars($nota->title).'">'.htmlspecialchars(substr($nota->field_resumen[0]['value'],0,180)).'</a></div>';
                    print '';
					print '<div class="clr"></div>';
					print '</div>';
					$nov_nota+= 1;
				}
				print '</div>';	
	  ?> 
    </div>    
    
    <!-- CENTRAL -->
    <div id="central_column">
		<div class="postdate">
        <?php
		
        $num_nota = arg(2);
		$nodo = node_load($num_nota);
		
		$d_dia = substr($nodo->field_fecha[0]['value'],8,2);
		$d_mes = substr($nodo->field_fecha[0]['value'],5,2);		
		$d_ano = substr($nodo->field_fecha[0]['value'],0,4);		
		//print '['.$d_dia.'-'.$d_mes.'-'.$d_ano.']';
        print '<div class="month m-'.$d_mes.'">'.$d_mes.'</div>';
        print '<div class="day d-'.$d_dia.'">'.$d_dia.'</div>';
        print '<div class="year y-'.$d_ano.'">'.$d_ano.'</div>';
        print '</div>';

		print '<div class="contentNotas">';
		print '<div class="nota"><h2>'.htmlspecialchars($nodo->title).'</h2> <h3>Nota publicada por empleoslavoz</h3> </div>';
		If (strlen($nodo->field_foto[0]['filepath'])>0) {
	      // tiene imagen
		  print '<div ><img class="photo" src="'.'/'.$nodo->field_foto[0]['filepath'].'" title="" alt=""/></div>';
		} else {
		  // NO tiene imagen
		  print '<div></div>';
		}
		print '<div class="bajada">'.htmlspecialchars($nodo->field_resumen[0]['value']).'</div>';
		print '<div class="cuerpo">'.htmlspecialchars($nodo->body).'</div>';
		print '</div>';

		
        ?>
        
      <?php include("include/banners-central.php");?>
    </div>
   </div>
   <?php include("include/footer.php");?>
 </div>
</body>
</html>