<?php
  global $user;
?>      <!-- ini -->
		<div id="header">
			<!-- Banner Topsite -->
            <?php include("sites/all/themes/empleos/include/banners-top.php");?>
			<div class="clearfix"></div>
    		<!-- login -->
				<?php include("sites/all/themes/empleos/include/user-login.php"); ?>
               <!-- logo -->
               <div id="logo"><a title="Home" href="/principal"><img src="<?php print check_url($logo); ?>"></a></div>
    		   <div style="clear: both;"></div>
    		   <!-- menu -->
			   <?php include("sites/all/themes/empleos/include/menu.php");?>
               
               <?php If ((arg(0)<>'buscar') and (arg(0)<>'principal')) { ?><div id="browser" class="inside"> </div><?php } ?>

               <?php If ( (arg(0)=='principal') or (arg(0)=='buscar') ) { ?>
                <!-- browser -->
    			<div id="browser">
                <?php include("sites/all/themes/empleos/include/busqueda.php");?>
      				<div class="white right">
      					<?php if(arg(0) != "principal"){?>
                       <?php if (!$user->uid) {
                            print '<h1 style="margin-top:10px; text-align:center">&iquest;Primera vez en empleoslavoz?</h1>'; 
        					print '<h3 style="text-align:center; margin:0 12%">Registrate de forma f&aacute;cil y segura en s&oacute;lo 3 pasos</h3>'; 
        					print '<div class="pasos">';
          					print '<ul id="pasos">'; 
							print '<li id="b-01"><a href="form.html"><span>registrate</span></a></li>'; 
							print '<li id="b-02"><a href=”#”><span>carga tu cv</span></a></li>';
							print '<li id="b-03"><a href=”#”><span>postulate</span></a></li>';
							print '</ul></div>';
					   } else {
                           if (in_array('Empresa', array_values($user->roles))){
							print '<div>';
                            print '<ul id="adver">'; 
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/04.jpg"/></a></li>';
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/05.jpg"/></a></li>';
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/06.jpg"/></a></li>';
                            print '</ul>';
							print '</div>';							
						} else {
							print '<div>';
							print '<ul id="adver">'; 
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/03.jpg"/></a></li>';
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/01.jpg"/></a></li>';
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/02.jpg"/></a></li>';
                            print '</ul>';
							print '</div>';
						}
					   }?>
					   <?php }else{
							print '<div>';
							print '<ul id="adver">'; 
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/03.jpg"/></a></li>';
                            print '</ul>';
							print '</div>';
					   }?>
      			</div>
        <?php } ?>
   	</div>
<!-- fin -->
