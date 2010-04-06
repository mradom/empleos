<?php
  global $user;
    //drupal_add_js('sites/all/themes/empleos/js/jquery.innerfade.js', 'empleos');
    //drupal_add_js('sites/all/themes/empleos/js/jquery.innerfade.page.js', 'empleos');
    //drupal_add_css('sites/all/themes/empleos/css/fade.css', 'module', 'all');

?>
		<div id="header">
			<!----Banner Topsite---->
			<div class="banner top"> Topsite</div>
    		<!----login---->
				<?php include("user-login.php"); ?>
               <!----logo---->
               <div id="logo">
    				<a href="?q=principal"><img src="sites/all/themes/empleos/img/logo.jpg"></a>
    		   </div>
    		   <div style="clear: both;"></div>
    		   <!----menu---->
			   <?php include("menu.php");?>
               
               <?php If (($user->uid) and ((arg(0)<>'node') and (arg(1)<>19)) or(arg(1)==25)) { ?><div id="browser" class="inside"> </div><?php } ?>

               <?php If ((!$user->uid) or (((arg(0)=='node') and (arg(1)==19)) and ($user->uid))) { ?>
                <!----browser---->
    			<div id="browser">
                <?php include("buscador.php");?>
      				<div class="white right">
                    <ul id="adver">					
                                <li>
                                    <a href="#"><img src="sites/all/themes/empleos/img/banners-empleos/03.jpg" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="sites/all/themes/empleos/img/banners-empleos/01.jpg" /></a>
                                </li>					
                                <li>
                                    <a href="#"><img src="sites/all/themes/empleos/img/banners-empleos/02.jpg"/></a>
                                </li>								
                            </ul>        
                    </div>
					</div>
    			</div>
        <?php } ?>
   	</div>		