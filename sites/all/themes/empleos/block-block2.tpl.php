<ul>
<?php 
$pcia = taxonomy_get_tree(get_vocabulary_by_name('Provincias'));

//print_r($areas);
foreach($pcia as $value){
	echo "<li class='side'>&gt; <a href='/?q=rubro/17/$value->tid'>".$value->name." (".taxonomy_term_count_nodes($value->tid, 0).")"."</a></li>";
}
?>
</ul>