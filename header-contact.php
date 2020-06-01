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
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-30535612-130"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-30535612-130');
</script>

</head>

<body <?php body_class(); ?>>
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
  </nav>
  <div class="hero contact-hero">
    <?php if(get_field('contact_hero_setting') == 'carousel'): ?>

      <div id="hero-carousel" class="carousel slide" data-interval="false" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <?php if(have_rows('carousel_slides')): $cs=0; while(have_rows('carousel_slides')): the_row(); ?>
            <div class="item<?php if($cs == 0){ echo ' active'; } ?>" style="background-image:url(<?php the_sub_field('carousel_slide_image'); ?>);"></div>
          <?php endwhile; endif; ?>
          <div class="hero-caption">
            <h1><?php the_sub_field('hero_title'); ?></h1>
            <p><?php the_sub_field('hero_caption'); ?></p>
          </div>
        </div>
      </div>
      <div class="carousel-progress-bar"></div>

    <?php else: 
      $test = '';
      $hero_background_image = get_field('default_hero_background_image', 'option');
      $hero_background_image_css = '';

      if(get_field('hero_background_image', $test)){
        $hero_background_image = get_field('hero_background_image', $test);
        $hero_background_image_css = get_field('hero_background_image_css', $test);
      } ?>

      <div class="hero" style="background-image:url(<?php echo $hero_background_image; ?>); <?php echo $hero_background_image_css; ?>">
        <div class="container">
          <div class="hero-caption">
            <h1><?php the_field('hero_title', $test); ?></h1>
            <p><?php the_field('hero_caption', $test); ?></p>
          </div>
        </div>        
      </div>

    <?php endif; ?>
  </div>