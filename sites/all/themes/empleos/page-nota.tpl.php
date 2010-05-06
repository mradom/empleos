<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
	  
	      $busco = 'noticias';
		  $sql_base   = "SELECT * FROM node_revisions AS nr INNER JOIN node AS n ON n.nid = nr.nid ";
		  $inner_join = "INNER JOIN content_type_notas AS w ON w.nid = n.nid ";

		  $where = "WHERE n.type = 'notas' AND field_tipo_value = '".$busco."' AND n.nid <> '".arg(1)."' AND n.status = 1 ";
		  $where = $where . " ORDER BY w.field_fecha_value DESC, w.field_orden_value DESC LIMIT 30 ";
		  
		  $sql = $sql_base.$inner_join.$where;
		  //print '['.$sql.']';
		  $rs = db_query($sql);
		   
		  print '<div>';
		  print '<div>Novedades:</div>';
		  while($fila = mysql_fetch_object($rs)){
			  $nota = node_load($fila->nid);
			  //print '<pre>';
			  //print_r($nota);					
			  //print '<pre>';					
			  print '<div>';
			  print '<img src="/'.$nota->field_foto_0[0]['filepath'].'">';			  
			  print '<div>'.substr($nota->field_fecha[0]['value'],0,10).'</div>';
			  print '<div><span>'.$nota->field_title.'</span></div>';
			  print '<a href="/novedades/'.$nota->nid.'" target="_top" title="'.$nota->title.'">';
			  print '<div><span>'.$nota->field_resumen[0]['value'].'</span></div>';
			  print '</a>';
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
		
        $num_nota = arg(1);
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
		print '<div class="nota"><h2>'.$nodo->title.'</h2> <h3>Nota publicada por empleoslavoz</h3> </div>';
		
		print '<div ><img class="photo" src="'.'/'.$nodo->field_foto[0]['filepath'].'" title=""></img></div>';
		
		print '<div class="bajada">'.$nodo->field_resumen[0]['value'].'</div>';
		print '<div class="cuerpo">'.$nodo->body.'</div>';
		//print '<pre>';
		//print_r($nodo);
		//print '<pre>';
        //print $content;
		print '</div>';
        ?>
        
      <?php include("include/banners-central.php");?>
    </div>
   </div>
   <?php include("include/footer.php");?>
 </div>
</body>
</html>