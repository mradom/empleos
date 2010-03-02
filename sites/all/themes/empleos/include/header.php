<?php
  global $user;
?>
		<!----HEADER---->
		<div id="header">
			<!----Banner Topsite---->
			<div class="banner top"> Topsite</div>
    		<!----login---->
				<?php include("user-login.php"); ?>
               <!----logo---->
    			<div id="logo">
    				<a href="?q=principal">
    					<img src="sites/all/themes/empleos/img/logo.jpg">
    				</a>
    			</div>
    			<div style="clear: both;"></div>
    			<!----menu---->
				<?php include("menu.php");?>
    			<!----browser---->
    			<div id="browser">
                <?php include("buscador.php");?>
      				<div class="white right">
        				<h1 style="margin: 10px 10% 0pt;">&iquest;Primera vez en empleoslavoz?</h1>
						<h3 style="margin: 0pt 12%; text-align: center;">Registrate de forma f&aacute;cil y segura en s&oacute;lo 3 pasos</h3>
        				<div class="pasos">
							<ul id="pasos">
								<li id="b-01">
									<a href="?q=user/register/persona"><span>tramites</span></a>
								</li>
            					<li id="b-02">
            						<a href="?q=estaciones"><span>estaciones</span></a>
            					</li>
								<li id="b-03">
									<a href="?q=estaciones"><span>estaciones</span></a>
								</li>
							</ul>
						</div>
					</div>
    			</div>
    	</div>