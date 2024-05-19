<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package project-name
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="initial-scale=1">
	<meta name="viewport" content="maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>


	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>
  data-component="class-toggle"
  data-class-toggle-target-class="menu-open">
	<!-- <div id="mobile-menu-overlay"></div> -->
 <header
    id="main-header"
    class="active structure-block"
    data-component="collapsible-header">
    <div class="header__content">
      <a
        aria-label="ir para home"
        id="logo-anchor"
        href="<?php echo get_home_url(); ?>">
        <img alt="logo Gui Mattos" src="<?php echo get_template_directory_uri() ?>/resources/icons/logo-gui-mattos.png">
      </a>

      <button
        aria-label="abrir menu mobile"
        id="mobile-menu-trigger"
        data-component="trigger"
        data-trigger-target="body">
        <div>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </button>

      <nav
        class="header-menu-container"
        id="main-menu-container"
        data-component="menu">
        <?php 
          if (is_archive()) {
              echo '<div id="menu-filter">Filtrar por 
              <img id="open-filter"alt="abrir filtro" src="'.get_template_directory_uri().'/resources/icons/seta-top.png">
              </div>';
          }
        ?>
        <?php
          wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'menu_id'        => 'main-menu',
          ));
        ?>

        <a
          class="cc-menu-search link link--icon-lg"
          href="<?php echo get_home_url(); ?>?s=">
        </a>
      </nav>
    </div> 
	  <div class="corner-element left"></div>
    <div class="corner-element right"></div>
	</header>
