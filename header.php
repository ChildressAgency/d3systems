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

<body <?php 
  body_class(); 
  if(is_page_template('global-reach.php') || is_page('our-network')){ 
    echo ' data-spy="scroll" data-target="#page-progress" data-offset="150"';
  }
  elseif(is_page('our-process')){
    echo ' data-spy="scroll" data-target="#page-progress" data-offset="200"';
  } ?>>
  <?php if(is_front_page()): ?>
    <div class="landing-page-wrapper">
      <div class="landing-page-wrapper-inner">
  <?php endif; ?>

  <nav id="header-nav" <?php if(!is_front_page()){ echo 'class="sticky"'; } ?>>
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
<?php if(is_front_page()): ?>
  <section id="hero" class="hp-hero">
    <div class="container">
      <h1>D3: Designs, Data, Decisions&mdash;</h1>
      <p id="write-in">
        <?php the_field('landing_page_text'); ?>
      </p>
    </div>
  </section>
    </div><!-- landing-page-wrapper-inner -->
    <a href="#competency-cards" id="scroll-down" class="smooth-scroll"></a>
  </div><!-- landing-page-wrapper -->
<?php elseif(is_page('our-network')): ?>
  <section id="staff">
    <div class="hero" style="background-image:url(<?php the_field('hero_background_image'); ?>); <?php the_field('hero_background_image_css'); ?>">
      <div class="container">
        <div class="hero-caption">
          <h1><?php the_field('hero_title'); ?></h1>
          <p><?php the_field('hero_caption'); ?></p>
        </div>
      </div>
    </div>
<?php elseif(is_page_template('global-reach.php')): ?>
  <div class="hero-global hero">
    <div class="container-fluid">
      <?php 
        $region = '';
        if(!is_page('global-reach')){
          $region = get_field('globe_region_id');
        }
      ?>
      <div class="globe-wrapper <?php echo $region; ?>">
        <?php get_template_part('partials/global-reach-map'); ?>
        <a id="americas-marker" href="" title="" class="red-marker" style="position: absolute; left: 21.21%; top: 31.85%; z-index: 2;">
          <span class="pulse"></span>
          <span class="pulse"></span>
          <span class="pulse"></span>
        </a>
        <a id="europe-marker" href="" title="" class="red-marker" style="position: absolute; left: 47.15%; top: 26.3%; z-index: 2;">
          <span class="pulse"></span>
          <span class="pulse"></span>
          <span class="pulse"></span>
        </a>
        <a id="sub-saharan-marker" href="" title="" class="red-marker" style="position: absolute; left: 53.66%; top: 59.23%; z-index: 2;">
          <span class="pulse"></span>
          <span class="pulse"></span>
          <span class="pulse"></span>
        </a>
        <a id="south-central-asia-marker" href="" title="" class="red-marker" style="position: absolute; left: 60.95%; top: 33.58%; z-index: 2;">
          <span class="pulse"></span>
          <span class="pulse"></span>
          <span class="pulse"></span>
        </a>
        <a id="east-asia-oceania-marker" href="" title="" class="red-marker" style="position: absolute; left: 72.44%; top: 55.42%; z-index: 2;">
          <span class="pulse"></span>
          <span class="pulse"></span>
          <span class="pulse"></span>
        </a>
      </div>
      <div class="hero-caption">
        <h1><?php the_field('hero_title'); ?></h1>
        <p><?php the_field('hero_caption'); ?></p>
      </div>
    </div>
  </div>
<?php else:
  $hero_background_image = get_stylesheet_directory_uri() . '/images/urban-thailand.jpg';
  $hero_background_image_css = '';

  if(get_field('hero_background_image')){
    $hero_background_image = get_field('hero_background_image');
    $hero_background_image_css = get_field('hero_background_image_css');
  } ?>

  <div class="hero" style="background-image:url(<?php echo $hero_background_image; ?>); <?php echo $hero_background_image_css; ?>">
    <div class="container">
      <div class="hero-caption">
        <h1><?php the_field('hero_title'); ?></h1>
        <p><?php the_field('hero_caption'); ?></p>
      </div>
    </div>
  </div>
<?php endif; ?>