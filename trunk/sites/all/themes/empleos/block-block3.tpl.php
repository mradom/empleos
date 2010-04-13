<ul class="brands">
<?php 
$sql = "SELECT u.* FROM users AS u
INNER JOIN users_roles AS ur ON ur.uid = u.uid
WHERE STATUS = 1 AND ur.rid = 5";
$rs = db_query($sql);
while($fila = mysql_fetch_object($rs)){
	$empresa = user_load(array('uid' => $fila->uid));
	//print_r($empresa);
	//die();
	echo "<li class='side brands'><div class='brand'>";
	print theme('imagecache','logo_empresa_52_34',$empresa->picture,$empresa->picture,$empresa->name);
	echo "</div><a href='?q=empresa/$empresa->uid'>$empresa->name</a></li>";
}
?>
</ul>