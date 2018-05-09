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

<body>
  <div class="landing-page-wrapper">
    <div class="landing-page-wrapper-inner">
      <nav id="header-nav">
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