<?php
Function form_ayuda($ayuda, $busca){
global $user;
	
   if (arg(1)=='add' or arg(2)=='edit' or (arg(0)=='node' and arg(1)==55) or (arg(0)=='user' and arg(1)==$user->uid))  { 
 	  $sql = 'SELECT body FROM {node_revisions} WHERE title = "'.$busca.'" ';
	  $result = db_query($sql);
	  $texto = db_result($result);
	  if ($texto=='' ) $texto = 'Titulo:['.$busca.']';
	  switch ($ayuda) {
	    case 'Ayuda':	  
			Print '<div id="right_column">';
			Print '<div class="contentBoxTips">';
			Print '<div class="ico"><img src="/sites/all/themes/empleos/img/help.png" alt="Ayuda" /></div>';
			Print '<div class="box tips">';
			Print '<h3 class="orange">Ayuda</h3><br />';
			Print $texto;
			Print '</div></div></div>';
			break;
	    case 'Tip':	  
			Print '<div id="right_column">';
			Print '<div class="contentBoxTips">';
			Print '<div class="ico"><img src="/sites/all/themes/empleos/img/tips.png" alt="Tip" /></div>';
			Print '<div class="box tips">';
			Print '<h3 class="orange">Tips</h3><br />';
			Print $texto;
			Print '</div></div></div>';
			break;
	    case 'Importante':	  
			Print '<div id="right_column">';
			Print '<div class="contentBoxTips">';
			Print '<div class="ico"><img src="/sites/all/themes/empleos/img/important.png" alt="Importante" /></div>';
			Print '<div class="box tips">';
			Print '<h3 class="orange">Importante</h3><br />';
			Print $texto;
			Print '</div></div></div>';
			break;
	    default:	  
			Print '<div id="right_column">';
			Print '<div class="contentBoxTips">';
			Print '<div class="ico"><img src="/sites/all/themes/empleos/img/help.png" alt="Ayuda" /></div>';
			Print '<div class="box tips">';
			Print '<h3 class="orange">Ayuda</h3><br />';
			Print $texto;
			Print '</div></div></div>';
	  
	  }
}
}


Function Empleos_ayuda($ayuda, $busca){
	  $sql = 'SELECT body FROM {node_revisions} WHERE title = "'.$busca.'" ';
	  $result = db_query($sql);
	  $texto = db_result($result);
	  if ($texto=='' ) $texto = 'Titulo:['.$busca.']';
	  switch ($ayuda) {
	    case 'Ayuda':	  
			Print '<div id="right_column">';
			Print '<div class="contentBoxTips">';
			Print '<div class="ico"><img src="/sites/all/themes/empleos/img/help.png" alt="Ayuda" /></div>';
			Print '<div class="box tips">';
			Print '<h3 class="orange">Ayuda</h3><br />';
			Print $texto;
			Print '</div></div></div>';
			break;
	    case 'Tip':	  
			Print '<div id="right_column">';
			Print '<div class="contentBoxTips">';
			Print '<div class="ico"><img src="/sites/all/themes/empleos/img/tips.png" alt="Tip" /></div>';
			Print '<div class="box tips">';
			Print '<h3 class="orange">Ayuda</h3><br />';
			Print $texto;
			Print '</div></div></div>';
			break;
	    case 'Importante':	  
			Print '<div id="right_column">';
			Print '<div class="contentBoxTips">';
			Print '<div class="ico"><img src="/sites/all/themes/empleos/img/important.png" alt="Importante" /></div>';
			Print '<div class="box tips">';
			Print '<h3 class="orange">Ayuda</h3><br />';
			Print $texto;
			Print '</div></div></div>';
			break;
	    default:	  
			Print '<div id="right_column">';
			Print '<div class="contentBoxTips">';
			Print '<div class="ico"><img src="/sites/all/themes/empleos/img/help.png" alt="Ayuda" /></div>';
			Print '<div class="box tips">';
			Print '<h3 class="orange">Ayuda</h3><br />';
			Print $texto;
			Print '</div></div></div>';
	  
	  }

}
?>

