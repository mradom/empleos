<?php 
 //echo '[[[[[[[[[[[[[[[[[[[['.arg(0)."-".arg(1).']]]]]]]]]]]]]]]]]]]]]]]]]<br>';
 $uri_request_id = $_SERVER['REQUEST_URI'];
 $section = explode("/", $uri_request_id);
 //print_r($section);
?>
    <div class="menu top">
      <ul>
        <li><a href="?q=buscar" <?php if (arg(0)=='') echo "class='active'"; ?>>Buscar</a></li>
        <li><a href="?q=empleadores">Empresas</a></li>
        <li><a href="?q=consultoras">Consultoras</a></li>
        <li><a href="?q=faq" <?php if (arg(0)=='faq') echo "class='active'"; ?>>Preguntas frecuentes</a></li>
      </ul>
    </div>