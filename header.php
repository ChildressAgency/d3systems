<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title>D3 Systems</title>

  <?php wp_head(); ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>
  <nav id="header-nav" class="sticky">
    <div class="container">
      <div class="navbar-header">
        <a href="<?php echo home_url(); ?>" class="header-logo">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" class="img-responsive" alt="D3 Systems Logo" />
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="expanded" aria-controls="navbar">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <?php
          $header_nav_args = array(
            'theme_location' => 'header-nav',
            'menu' => '',
            'container' => '',
            'container_id' => '',
            'container_class' => '',
            'menu_class' => 'nav navbar-nav',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'd3systems_header_fallback_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new wp_bootstrap_navwalker()
          );
          wp_nav_menu($header_nav_args);
        ?>
        <?php get_search_form(); ?>
      </div>
    </div>
  </nav>
  <?php
    $hero_background_image = get_stylesheet_directory_uri() . '/images/urban-thailand.jpg';
    $hero_background_image_css = '';

    if(get_field('hero_background_image')){
      $hero_background_image = get_field('hero_background_image');
      $hero_background_image_css = get_field('hero_background_image_css');
    } 
  ?>

  <div class="hero" style="background-image:url(<?php echo $hero_background_image; ?>); <?php echo $hero_background_image_css; ?>">
    <div class="container">
      <div class="hero-caption">
        <h1><?php the_field('hero_title'); ?></h1>
        <p><?php the_field('hero_caption'); ?></p>
      </div>
    </div>
  </div>
