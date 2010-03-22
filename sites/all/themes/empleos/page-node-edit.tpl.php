<html>
<?php include("include/head.php");?>
<BODY> 
<DIV id="wrapper"> 
  <!----HEADER---->
  <?php include("include/header.php");?>
  <!------MIDDLE------> 
  <DIV id="midle"> 
	<?php include("include/buscador-banner.php"); ?>
    <!-----submenu-----> 
	<?php include("include/submenu-usuarios.php");?> 
     <!-----tabla-----> 
  	<?php 
  		global $user;
  		if ($user->uid){
			?>
				<div class="mycv">
				<?php print $content; ?>
				</div> 
			<?php
  			//print "<div class='mycv'>".$content."</div>";
  		}else{
  	?>
    <!----FORM----> 
		No tienes privilegios para aplicar cambios
  <?php } ?>
  <!--FOOTER--> 
<?php include("include/footer.php");?>
</DIV> 
</DIV></BODY></HTML>