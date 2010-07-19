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
               <div id="logo"><a title="Home" href="/principal"><img src="<?php print check_url($logo); ?>" alt="Home" /></a></div>
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
                            print '<div>';
                            print '<ul id="adver">'; 
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/05.jpg" alt="" /></a></li>';
                            print '</ul>';
							print '</div>';		
					   } else {
                           if (in_array('Empresa', array_values($user->roles))){
							print '<div>';
                            print '<ul id="adver">'; 
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/03.jpg" alt="" /></a></li>';
							//print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/05.jpg" alt="" /></a></li>';
							//print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/06.jpg" alt="" /></a></li>';
                            print '</ul>';
							print '</div>';							
						} else {
							print '<div>';
							print '<ul id="adver">'; 
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/05.jpg" alt="" /></a></li>';
							//print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/01.jpg" alt="" /></a></li>';
							//print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/02.jpg" alt="" /></a></li>';
                            print '</ul>';
							print '</div>';
						}
					   }?>
					   <?php }else{
						   if (in_array('Empresa', array_values($user->roles))){
							print '<div>';
							print '<ul id="adver">'; 
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/03.jpg"  alt="" /></a></li>';
							//print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/01.jpg"  alt="" /></a></li>';
							//print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/02.jpg" alt="" /></a></li>';
                            print '</ul>';
							print '</div>';
						} else {
							print '<div>';
							print '<ul id="adver">'; 
							print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/05.jpg" alt="" /></a></li>';
							//print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/01.jpg" alt="" /></a></li>';
							//print '<li><a href="#"><img src="/sites/all/themes/empleos/img/banners-empleos/02.jpg" alt="" /></a></li>';
                            print '</ul>';
							print '</div>';
						}
					   }?>

      			</div>
                </div>
        <?php } ?>
   	</div>
<!-- fin -->
