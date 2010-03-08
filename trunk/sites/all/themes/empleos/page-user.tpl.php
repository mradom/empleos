<?php 
global $user;
include("include/head.php");?>
<body>
<div id="wrapper">
  <!----HEADER---->
    <?php include("include/header.php");?>
    <!------MIDDLE------>
    <div id="midle">

    <!------RIGHT colum------>
   	  <div id="right_column">
        <!----banner box---->
        <div class="banner boxes"><img src="sites/all/themes/empleos/img/banner/login.jpg"></div>  
      </div>

    <!--------CENTRAL colum-------->
    <DIV id="central_column">
      <?php
	       If (arg(0)=='user') {
              If (!$user->uid) include ('user-login.php');
			  If (arg(1)=='register' and arg(2)=='persona'  ) include ('register-persona.php'); //    registracion de personas			  
			  If (arg(1)=='register' and arg(2)=='empleador') include ('register-empleador.php'); //    registracion de personas
			  if ($user->uid) print '<div style="border: 1px solid #ccc ;">'.$content.'</div>';			   
		   }
	  ?>
		


		 
    <div class=" content_banners">
        <div class="banner minibox" style="margin-right:26px">
          Minibox 1 </div>
        <div class="banner minibox" style="margin-right:27px">
          Minibox 2 </div>
        <div class="banner minibox" style="margin-right:27px">
          Minibox 3 </div>
        <div class="banner minibox">

          Minibox 4 </div>
      </div>
  </DIV>
  </DIV>  
  <!--FOOTER-->
    <?php include("include/footer.php");?>
</DIV>
</BODY>
</HTML>