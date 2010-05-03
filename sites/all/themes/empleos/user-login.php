<?php 
if($_REQUEST['destination'] != ""){
	$action = "/user&destination=".$_REQUEST['destination'];
}else{
	$action = "/user";
}
?>
<div class="mycv log" style="margin-right:15px;">
  <form method="post" accept-charset="UTF-8" action="<?php echo $action;?>">
    <div class="itemTitle orange" style="padding-left:10px">Ya est&aacute;s registrado?</div>
    <div class="bloque" style="margin-top:20px">
      <div class="item req"  style="width:90px;">Usuario:</div>
      <div class="datos"  style="width:150px">
        <input type="text" class="req" tabindex="1" value="" size="30" id="edit-name" name="name" maxlength="60">
      </div>
      <div class="item req"  style="width:90px">Contrase&ntilde;a:</div>
      <div class="datos" style="width:150px">
        <input type="password" class="req" tabindex="2" size="30" id="edit-pass" name="pass">
      </div>
    </div>
    <div class="bloque puntos" style="width:300px; margin-top:20px;">
      <div class="datos button" style="padding-left:120px; margin-bottom:20px;">
        <input type="hidden" value="user_login" id="edit-user-login" name="form_id">
        <input type="submit" class="button" tabindex="3" value="Ingresar" id="edit-submit" name="op">
      </div>
      <div style="margin-top:10px; text-align:center"><strong>Olvidaste tu contrase&ntilde;a?</strong> &gt;&gt; <a href="/user/password">ingresa aqu&iacute;</a></div>
    </div>
  </form>
</div>


<div class="mycv log">
  <div>
    <div class="itemTitle" style="padding-left:10px;">A&uacute;n no te resgistraste?</div>
    <ul style="padding:0 10px;">
      <li class="blue"><strong>Registrarte en empleoslavoz te permitir&aacute;:</strong></li>
      <li class="bulet_o"> Cargar tu curr&iacute;culum y que todas las empresas que realicen b&uacute;squedas en nuestra accedan a &eacute;l</li>
      <li class="bulet_o"> Postularte a miles de ofertas de trabajo</li>
      <li class="bulet_o"> Recibir ofertas laborales en tu e-mail</li>
    </ul>
  </div>
  <div class="bloque puntos" style="width:300px;  margin-top:20px;"></div>
   <div class="blue" style="padding-left:11px; margin:10px 0 30px 0;"><strong>Regristrate como:</strong></div>
  <div class="btn_gral b" style=" margin-left:80px;"><a href="/user/register/persona">Persona</a></div>
  <div class="btn_gral b" style=" margin-left:30px;"><a href="/user/register/empleador">Empresa</a></div>
</div>
  <script>
  $(document).ready(function() {
	  $("#edit-name").focus();
	  });
  </script>