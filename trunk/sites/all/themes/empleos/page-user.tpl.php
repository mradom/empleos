<html>
<?php include("include/head.php");?>
<body>
<div id="wrapper">
  <!----HEADER---->
  <?php include("include/header.php");?>
  <!------MIDDLE------>
  <div id="midle">
    <!----banners boxes---->
    <?php include("include/banners-boxes.php");?>
    <!------RIGHT colum------>
    <?php include("include/col_derecha.php");?>
    <!--------CENTRAL colum-------->
    <DIV id="central_column">
          <?php
	       If (arg(0)=='user') {
			  If (arg(1)=='password') print $content; 
              If (!$user->uid and arg(1)<>'password' and arg(1) <>'register') include ('user-login.php');
			  //if (!$user->uid) print '<div style="border: 1px solid #ccc ;">'.$content.'</div>';			   
			  If (arg(1)=='register' and arg(2)=='persona'  ) print '<div style="border: 1px solid #cbb ;">'.$content.'</div><br>'; //    registracion de personas			  
			  If (arg(1)=='register' and arg(2)=='empleador') print '<div style="border: 1px solid #ccc ;">'.$content.'</div><br>'; //include ('include/register-empleador.php'); //    registracion de personas
			  if ($user->uid) { print '<div style="border: 1px solid #ccc ;">'.$content.'</div><pre>';
			     print_r($content).'</pre>'; }	
			  //print $content;
		   }
	     ?>
  </DIV>
  <!-----banners-minibox---->
  <?php include("include/banners-central.php");?>
  </div>
<?php include("include/footer.php");?>
</div>
</body>
</html>