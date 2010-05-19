<?php 
switch (arg(2)) {
	case 'p-educacion':
		include 'page-mi-educacion.php';
		return;
	case 'p-idiomas':
		include 'page-mi-idiomas.php';
		return;
	case 'p-cursos':
		include 'page-mi-cursos.php';
		return;
    case 'p-informatica':
		include 'page-mi-informatica.php';
		return;					
    case 'p-otros-conocimientos':
		include 'page-mi-otros-conocimientos.php';
		return;			
    case 'p-experiencia-laboral':
		include 'page-mi-experiencia-laboral.php';
		return;	
    case 'p-referencia':
		include 'page-mi-referencia.php';
		return;
	case 'p-objetivo-laboral':
		include 'page-mi-objetivo-laboral.php';
		return;		
	case 'e-aviso':
		include 'page-e-aviso.tpl.php';
		return;				
	default:
		print $content;
		break;
}
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language ?>" lang="<?php print $language ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <style type="text/css" media="print">@import "<?php print base_path() . path_to_theme() ?>/print.css";</style>
    <!--[if lt IE 7]>
    <style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/fix-ie.css";</style>
    <![endif]-->
  </head>
  <body<?php print phptemplate_body_class($sidebar_left, $sidebar_right); ?>>

<!-- Layout -->
  <div id="header-region" class="clear-block"><?php print $header; ?></div>

    <div id="wrapper">
    <div id="container" class="clear-block">

      <div id="header">
        <div id="logo-floater">
        <?php
          // Prepare header
          $site_fields = array();
          if ($site_name) {
            $site_fields[] = check_plain($site_name);
          }
          if ($site_slogan) {
            $site_fields[] = check_plain($site_slogan);
          }
          $site_title = implode(' ', $site_fields);
          $site_fields[0] = '<span>'. $site_fields[0] .'</span>';
          $site_html = implode(' ', $site_fields);

          if ($logo || $site_title) {
            print '<h1><a href="'. check_url($base_path) .'" title="'. $site_title .'">';
            if ($logo) {
              print '<img src="'. check_url($logo) .'" alt="'. $site_title .'" id="logo" />';
            }
            print $site_html .'</a></h1>';
          }
        ?>
        </div>

        <?php if (isset($primary_links)) : ?>
          <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
        <?php endif; ?>
        <?php if (isset($secondary_links)) : ?>
          <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
        <?php endif; ?>

      </div> <!-- /header -->

      <?php if ($sidebar_left): ?>
        <div id="sidebar-left" class="sidebar">
          <?php if ($search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
          <?php print $sidebar_left ?>
          <?php
          $term_id = 1; 
		  include("block-block1.tpl.php");
      ?>
        </div>
      <?php endif; ?>

      <div id="center"><div id="squeeze"><div class="right-corner"><div class="left-corner">
          <?php if ($breadcrumb): print $breadcrumb; endif; ?>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>

          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
          <?php if ($tabs): print $tabs .'</div>'; endif; ?>

          <?php if (isset($tabs2)): print $tabs2; endif; ?>

          <?php if ($help): print $help; endif; ?>
          <?php if ($messages): print $messages; endif; ?>
          <?php print $content ?>
          <span class="clear"></span>
          <?php print $feed_icons ?>
          <div id="footer"><?php print $footer_message ?></div>
      </div></div></div></div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->

      <?php if ($sidebar_right): ?>
        <div id="sidebar-right" class="sidebar">
          <?php if (!$sidebar_left && $search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
          <?php print $sidebar_right ?>
        </div>
      <?php endif; ?>

    </div> <!-- /container -->
  </div>
<!-- /layout -->

  <?php print $closure ?>
  </body>
</html>


<!--<html>
<?php //include("include/head.php");?>
<body>
<div id="wrapper">
  <!-- HEADER-- -->
  <?php //include("include/header.php");?>
  <!-- --MIDDLE---- -->
  <div id="midle">
    <!-- banners boxes-- -->
    <?php //include("include/banners-boxes.php");?>
    <!-- --RIGHT colum---- -->
    <?php //include("include/col_derecha.php");?>
    <!-- ----CENTRAL colum------ -->
    <DIV id="central_column">
          <div class="bar_blue"><div class="corner_blue _2"></div>
          <div class="corner_blue">Listado de Rubros</div></div>
        	<div class="box center">
		    <?php //include("include/lista_rubros.php");?>
		    </div>
  </div>
  <!-- -banners-minibox-- -->
  <?php //include("include/banners-central.php");?>
  </div>
<?php //include("include/footer.php");?>
</div>
</body>
</html> -->