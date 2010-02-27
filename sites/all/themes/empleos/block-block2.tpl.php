<ul>
<?php 
$pcia = taxonomy_get_tree("17");
//print_r($areas);
foreach($pcia as $value){
	echo "<li class='side'>&gt; <a href='?q=taxonomy/term/17/$value->tid'>".$value->name." (".taxonomy_term_count_nodes($value->tid, 0).")"."</a></li>";
}
?>
</ul>