<?php 
$sql = "SELECT u.* FROM users AS u
INNER JOIN users_roles AS ur ON ur.uid = u.uid
WHERE STATUS = 1 AND ur.rid = 5";
$rs = db_query($sql);
?>
<ul class="brands">
<?php
while($fila = mysql_fetch_object($rs)){
	$empresa = user_load(array('uid' => $fila->uid));
?>
	<li class="center">
		<div class="brand">
			<?php print theme('imagecache','logo_empresa_52_34',$empresa->picture,$empresa->picture,$empresa->name);?>
            </div>
			<a href="?q=avisosporempresa/<?php echo $empresa->uid;?>" ><?php echo $empresa->name;?></a>
		
	</li>
<?php } ?>
</ul>