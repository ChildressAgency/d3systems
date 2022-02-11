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

<body <?php body_class(); ?> data-spy="scroll" data-target="#page-progress" data-offset="200">
  <nav id="header-nav" class="sticky">
    <div class="container">
      <div class="navbar-header">
        <a href="<?php echo home_url(); ?>" class="header-logo">
          <?php
            $header_logo = get_stylesheet_directory_uri() . '/images/logo.png';
            if(get_field('header_logo', 'option')){
              $header_logo = get_field('header_logo', 'option');
            }
          ?>
          <img src="<?php echo $header_logo; ?>" class="img-responsive" alt="D3 Systems Logo" />
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
    <?php if(have_rows('section_titles')): ?>
      <div id="page-progress" class="justified-nav">
        <ul class="nav nav-tabs nav-justified">
          <?php $t = 1; while(have_rows('section_titles')): the_row(); ?>
            <?php
              $anchor = $t;
              if($t == 2){ $anchor = $t . '-anchor'; }
            ?>
            <li><a href="#section-<?php echo $anchor; ?>"><?php the_sub_field('section_title'); ?></a></li>
          <?php $t++; endwhile; ?>
        </ul>
      </div>
    <?php endif; ?>
  </nav>

  <section id="section-1">
    <div class="hero" style="background-image:url(<?php the_field('hero_background_image'); ?>); <?php the_field('hero_background_image_css'); ?>">
      <div class="container">
        <div class="hero-caption">
          <h1><?php the_field('hero_title'); ?></h1>
          <p><?php the_field('hero_caption'); ?></p>
        </div>
      </div>
    </div>
  <?php //section intentionally not closed here ?>

