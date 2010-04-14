<?php
  global $user;
    drupal_add_js('sites/all/themes/empleos/js/jquery.innerfade.js', 'theme');
    drupal_add_js('sites/all/themes/empleos/js/jquery.innerfade.page.js', 'theme');
    drupal_add_css('sites/all/themes/empleos/css/fade.css', 'theme', 'all');

?>      <!-- ini -->
		<div id="header">
			<!-- Banner Topsite-- -->
			<div class="banner top"> Topsite</div>
			<div class="clearfix"></div>
    		<!-- login-- -->
				<?php include("user-login.php"); ?>
               <!-- logo-- -->
               <div id="logo"><a href="?q=principal"><img src="sites/all/themes/empleos/img/logo.jpg"></a></div>
    		   <div style="clear: both;"></div>
    		   <!-- menu-- -->
			   <?php include("menu.php");?>
               
               <?php If (($user->uid) and ((arg(0)<>'node') and (arg(1)<>19)) or(arg(1)==25)) { ?><div id="browser" class="inside"> </div><?php } ?>

               <?php If ((!$user->uid) or (((arg(0)=='node') and (arg(1)==19)) and ($user->uid))) { ?>
                <!-- browser-- -->
    			<div id="browser">
                <?php include("buscador.php");?>
      				<div class="white right">
                       <?php if (!$user->uid) {
                            print '<h1 style="margin-top:10px; text-align:center">&iquest;Primera vez en empleoslavoz?</h1>'; 
        					print '<h3 style=" text-align:center; margin:0 12%">Registrate de forma f&aacute;cil y segura en s&oacute;lo 3 pasos</h3>'; 
        					print '<div class="pasos">';
          					print '<ul id="pasos">'; 
							print '<li id="b-01"><a href="form.html"><span>registrate</span></a></li>'; 
							print '<li id="b-02"><a href=”#”><span>carga tu cv</span></a></li>';
							print '<li id="b-03"><a href=”#”><span>postulate</span></a></li>';
							print '</ul></div>';
					   } else {
                           if (in_array('Empresa', array_values($user->roles))){
                            print '<ul id="adver">'; 
							print '<li><a href="#"><img src="sites/all/themes/empleos/img/banners-empleos/04.jpg" /></a></li>';
							print '<li><a href="#"><img src="sites/all/themes/empleos/img/banners-empleos/05.jpg" /></a></li>';
							print '<li><a href="#"><img src="sites/all/themes/empleos/img/banners-empleos/06.jpg"/></a></li>';
                            print '</ul>';
						} else {
							print '<ul id="adver">'; 
							print '<li><a href="#"><img src="sites/all/themes/empleos/img/banners-empleos/03.jpg" /></a></li>';
							print '<li><a href="#"><img src="sites/all/themes/empleos/img/banners-empleos/01.jpg" /></a></li>';
							print '<li><a href="#"><img src="sites/all/themes/empleos/img/banners-empleos/02.jpg"/></a></li>';
                            print '</ul>';
						}
					   }?>
      			</div>
        <?php } ?>
   	</div>

<!-- fin -->
