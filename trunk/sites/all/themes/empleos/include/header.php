<?php
  global $user;
?>
		<!----HEADER---->
		<div id="header">
			<!----Banner Topsite---->
			<div class="banner top"> Topsite</div>
    		<!----login---->
            <?php if (!$user->uid) {   ?>                                                       
				<div id="login"><ul class="log"><li><a href="?q=user">Ingresar  </a> </li> I&nbsp;
					<li><a href="?q=user/register/usuario">  Registrarse</a></li>I&nbsp;
					<li><a href="?q=user/me">  Mi cuenta</a></li> I&nbsp;<li><a href="#">Contacto  </a> </li>
					<li class="destacar"><a href="?q=user/register/empleador"><span style="color:#FFF">Ingreso Empleadores</span></a>&nbsp;&nbsp;&nbsp;<a href="?q=contacto">C&oacute;mo publico un aviso?  </a> </li></ul>
				</div>				<?php }                                                                           
				else {  ?>
				<div id="login"><ul class="log"><li><a href="?q=user/me">Hola <strong><?php print $user->name; ?></strong></li> I&nbsp;
					<li><a href="?q=user/me">  Mi cuenta</a></li> I&nbsp;
					<li><a href="?q=logout"> Salir</a></li>I&nbsp;
					<li><a href="#">Contacto  </a> </li>
					<li class="destacar"><a href="?q=user/register/empleador"><span style="color:#FFF">Ingreso Empleadores</span></a>&nbsp;&nbsp;&nbsp;<a href="?q=contacto">C&oacute;mo publico un aviso?  </a> </li></ul>
				</div>
				<?php  }
				  //$output .= t('<p class="user-info">Hola !user, bienvenido.</p>', array('!user' => theme('username', $user)));
				  //$output .= theme('item_list', array(
					//l(t('Mi Cuenta'), 'user/'.$user->uid, array('title' => t('Editar tu cuenta.'))),
					//l(t('Salir'), 'logout')));
				 ?>
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
									<a href="?q=user/register"><span>tramites</span></a>
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