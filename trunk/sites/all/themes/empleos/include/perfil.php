<?php
	$sql = "SELECT j.* FROM job AS j INNER JOIN node AS n ON n.nid = j.nid WHERE j.uid = ".arg(1)." AND n.uid = ".$user->uid;
	$rs = db_query($sql);
	$usuario = user_load(array("uid" => arg(1)));
	if(mysql_num_rows($rs) > 0 ){
		?><a href="javascript:history.back(-1)">Volver</a><?php
		include("cv_previsualizar.php");
	}else{
		//include("cv_previsualizar.php");
		echo "Solo perfil";
	}
?>