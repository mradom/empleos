<?php 
if (arg(0)=='node') print "<h1 class='blue hTitle'>Preguntas Frecuentes - ".$title."</h1>";
print $node->body;
print "<br>";
print "<p><a href='/?q=faq'>Volver</a></p>";
?>
 