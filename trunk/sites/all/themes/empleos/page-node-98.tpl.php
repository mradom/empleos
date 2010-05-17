<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<?php include("sites/all/themes/empleos/include/varios.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="browser" class="inside"> </div>  
  <div id="midle">
    <?php include("include/encabezado_mi_postulantes.php");?> 
    <!-- RIGHT -->
    <div id="right_colum">
	</div>    
    <!-- CENTRAL -->
    <div id="central_column">
	  <?php print $content;?>
	  <?php //if (arg(1)<>'add' and arg(2)<>'edit' and arg(2)<>'delete') print "<div class='btn_gral b'><a href='/node/add/p-cursos'>Agregar</a></div><br>";?>
      <?php include("include/banners-central.php");?>
    </div>      
  </div>
  <?php include("include/footer.php");?>
</div>
</body>
</html>



while($fila = mysql_fetch_object($rs)){
						$nodo = node_load($fila->nid);
						$usuario = user_load(array('uid' => $nodo->uid));
						print '<tr>';
						print '<td><a href="/user/'.$nodo->uid.'" target="_top" title="'.$usuario->name.'">';
						print $usuario->name.'</td>';
						print '<td>'.date('d-m-Y', $fila->timestamp).'</td>';
						print '<td><a href="/job/clear/'.$nodo->nid.'/'.$user->uid.'&destination=/user/me" title="Borrar"><div class="arrow cancel"></div></a></td>';
						print '</tr>';