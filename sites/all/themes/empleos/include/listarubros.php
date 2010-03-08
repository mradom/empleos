<?php 
/*
 * Muestra un listado de rubros en columna central
 * TODO: Ver porque repite algunas categorias
 * FIXME: test
 * */

?>
<ul>
<?php 

$areas = taxonomy_get_tree(1,0,0);

$limit = 200;
$i = 1;
foreach($areas as $value){
	if($i <= $limit){
		$sql = "SELECT COUNT(*) as total FROM node AS n
INNER JOIN term_node AS tn ON tn.nid = n.nid
INNER JOIN term_data AS td ON td.tid = tn.tid
WHERE n.status = 1 AND td.vid = 1
AND td.tid = 2
AND n.type = 'e_aviso'";
		$rs = db_query($sql);
		$cantidad_nodos = mysql_fetch_object($rs);
		if($cantidad_nodos->total > 0){
			$sql = "SELECT COUNT(n.nid) AS total FROM node AS n INNER JOIN term_node AS tn ON tn.nid = n.nid WHERE n.type = 'e_aviso' AND tn.tid = $value->tid";
			$rs = db_query($sql);
			$total_nodos = mysql_fetch_object($rs);
			echo "<li class='side'>&gt; <a href='?q=taxonomy/term/$value->tid'>".$value->name." <span>(".$total_nodos->total.")</span>"."</a></li>";
			$i++;	
		}	
	}else{
		break;
	}
}
?>
</ul>