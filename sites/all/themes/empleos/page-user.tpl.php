<?php 
 global $user;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
<?php include("include/head.php");?>
<?php include("include/varios.php");?>
<body>
<div id="wrapper">
  <!-- HEADER -->
  <?php include("include/header.php");?>
  <!-- MIDDLE -->
  <div id="midle">
  <?php 
    if ($user->uid) {
    if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='' and (!in_array('empresa', array_values($user->roles)))) include("include/encabezado_mi_info.php");
    if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='' and (in_array('empresa', array_values($user->roles))))  include("include/encabezado_mi_infoe.php");
    if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=="Empleado" ) include("include/encabezado_mi_datos.php");
    if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=="" and (!in_array('empresa', array_values($user->roles)))) include("include/encabezado_mi_datosi.php");
    if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=="Empresa" and (in_array('empresa', array_values($user->roles))))  include("include/encabezado_mi_datose.php");
    if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=="" and (in_array('empresa', array_values($user->roles))))  include("include/encabezado_mi_datosei.php");
} else {
  if (arg(0)=='user' and arg(1)=='register') print '<div style="border:0; height:10px; width:990px; padding:0px; float:left;"></div>
';
}
    If (!$user->uid and arg(1) <>'register') include("include/encabezado_login.php");
    ?> 
    <!-- RIGHT -->
    <?php
	if ($user->uid) {
	if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='' and (!in_array('empresa', array_values($user->roles)))) {
	  print '<div id="right_column">';
	  Form_ayuda('Tip', 'PersonaHome'); 
	  include("include/col_derecha-sin.php");	
      print '</div>';
	}
	if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='' and (in_array('empresa', array_values($user->roles)))) {
	  print '<div id="right_column">';
	  Form_ayuda('Tip', 'EmpresaHome'); 
	  include("include/col_derecha-sin.php");	  
      print '</div>';
	}
    if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=="Empleado" ) {
	  print '<div id="right_column">';
	  Form_ayuda('Tip', 'EmpleadoEdicion'); 
	  include("include/col_derecha-sin.php");	  
      print '</div>';
	}
	if (arg(0)=='user' and arg(1)==$user->uid and arg(2)=='edit' and arg(3)=="Empresa" and (in_array('empresa', array_values($user->roles)))) {
	  print '<div id="right_column">';
	  Form_ayuda('Tip', 'EmpresaEdicion'); 
  	  include("include/col_derecha-sin.php");
      print '</div>';
	}
	} else {
	  If (arg(1)=='register') {
	  print '<div id="right_column">';
	  Form_ayuda('Ayuda', 'Registracion'); 
  	  include("include/col_derecha-sin.php");
      print '</div>';
    } 
	if (arg(0)=='user' and arg(1)=="password" ) {
	  print '<div id="right_column">';
	  Form_ayuda('Tip', 'OlvidoPassword'); 
	  include("include/col_derecha-sin.php");	  
      print '</div>';
	}
	 If (arg(1)=='') {
	  print '<div id="right_column">';
	  Form_ayuda('Ayuda', 'Login'); 
  	  include("include/col_derecha-sin.php");
      print '</div>';
    } 
	}

    ?>
    <!-- CENTRAL -->
    <!-- ini central -->
    <div id="central_column">
          <?php
		      //print "[".arg(0)."]-[".arg(1)."]-[".arg(2)."]=[".$user->uid."]<br />";
			  If (arg(1)=='password') print $content; 
              If (!$user->uid and arg(1)<>'password' and arg(1) <>'register') include ('user-login.php');
			  If (arg(1)=='register' and arg(2)=='persona'  ) print '<div>'.$content.'</div><br />'; 
			  If (arg(1)=='register' and arg(2)=='empresa') print '<div>'.$content.'</div><br />';
			  if ($user->uid and arg(1)==$user->uid){
			  	 print $content;
			  } 
				if (arg(0)=='user' and arg(1) != $user->uid and is_null(arg(2))){
					include("include/perfil.php");
				}
  ?>
  <!-- fin central -->
 <!-- paso 2 -->
  <?php include("include/banners-central.php");?>
  </div>
  <!-- paso 3 -->
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>