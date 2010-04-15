<div class="menu top">
   <ul>
     <li><a title="Buscar" href="?q=buscar" <?php if (arg(0)=='buscar')  echo ' class="active"'; ?> >Buscar</a></li>
     <li><a title="Empresas" href="?q=empresa"  <?php if (arg(0)=='empresa')  echo ' class="active"'; ?> >Empresas</a></li>
     <li><a title="Consultoras" href="?q=consultora"  <?php if (arg(0)=='consultora')  echo ' class="active"'; ?> >Consultoras</a></li>
     <li><a title="Preguntas frecuentes" href="?q=faq" <?php if (arg(0)=='faq') echo "class='active'"; ?>>Preguntas frecuentes</a></li>
   </ul>
</div>