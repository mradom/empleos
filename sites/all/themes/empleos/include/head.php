<head>
<?php print $head ?>
<!-- fin auto head  -->
<?php 
//drupal_add_css("css/forms.css", "", "all", TRUE);
//drupal_add_css("empleos/css/IN-noticias.css", "theme", "all", TRUE);
?>
<title><?php print $head_title ?></title>
<!-- styles  --> 	
<?php print $styles ?>
<!-- fin auto styles -->
<link rel="stylesheet" type="text/css" href="/sites/all/themes/empleos/css/forms.css">
<link rel="stylesheet" type="text/css" href="/sites/all/themes/empleos/css/tabs.css">
<link rel="stylesheet" type="text/css" href="/sites/all/themes/empleos/css/IN-noticias.css">
<link rel="stylesheet" type="text/css" href="/sites/all/themes/empleos/css/ui.all.css">
<link rel="stylesheet" type="text/css" href="/sites/all/themes/empleos/css/notas.css">
<link rel="stylesheet" type="text/css" href="/sites/all/modules/faq/faq.css">
<link rel="stylesheet" type="text/css" href="/sites/all/themes/empleos/css/fade.css">
<script type="text/javascript" src="/sites/all/modules/jquery_ui/jquery.ui/ui/ui.core.js"></script>
<script type="text/javascript" src="/sites/all/modules/jquery_ui/jquery.ui/ui/ui.tabs.js"></script>
<script type="text/javascript" src="/sites/all/modules/jquery_ui/jquery.ui/ui/jquery.ui.all.js"></script>
<script type="text/javascript" src="/sites/all/modules/jquery_ui/jquery.ui/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="/sites/all/modules/jquery_update/compat.js"></script>
<script type="text/javascript" src="/sites/all/themes/empleos/js/jquery.innerfade.js"></script>
<script type="text/javascript" src="/sites/all/themes/empleos/js/jquery.innerfade.page.js"></script>
<?php if (arg(0) == "principal") {?>
<script type="text/javascript" src="/sites/all/themes/empleos/js/prototype.js" ></script>
<script type="text/javascript" src="/sites/all/themes/empleos/js/effects.js" ></script>
<script type="text/javascript" src="/sites/all/themes/empleos/js/glider.js" ></script>
<script type="text/javascript" src="/sites/all/themes/empleos/js/scriptPag.js" ></script>
<?php }?>
<!-- scripts  -->
<?php print $scripts ?>
<!-- fin auto scripts -->
</head>
