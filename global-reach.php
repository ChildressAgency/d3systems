<?php
/*
  Template Name: Global Reach Template
*/

get_header('global-reach'); ?>
  <div id="global-reach-nav" class="justified-nav">
    <ul class="nav nav-tabs nav-justified">
      <li<?php if(is_page('global-reach')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('global-reach'); ?>">Global Reach</a></li>
      <li<?php if(is_page('the-americas-and-the-caribbean')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('the-americas-and-the-caribbean'); ?>">The Americas and the Caribbean</a></li>
      <li<?php if(is_page('europe')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('europe'); ?>">Europe</a></li>
      <li<?php if(is_page('middle-east-and-north-africa')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('middle-east-and-north-africa'); ?>">Middle East and North Africa</a></li>
      <li<?php if(is_page('sub-saharan-africa')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('sub-saharan-africa'); ?>">Sub-Saharan Africa</a></li>
      <li<?php if(is_page('central-and-south-asia')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('central-and-south-asia'); ?>">Central and South Asia</a></li>
      <li<?php if(is_page('east-southeast-asia-and-oceana')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('east-southeast-asia-and-oceana'); ?>">East Southeast Asia and Oceana</a>
    </ul>
  </div>
  <?php if(!is_page('global-reach')): ?>
  <div class="global-reach-content">
    <div class="container">
      <div class="row parallax">
        <div class="col-sm-4" id="left">
          <nav class="nav-sidebar hidden-xs">
            <section class="sidebar-section">
              <h2 class="sidebar-section-title">Regional Expertise</h2>
              <div class="sidebar-section-content">
                <p>D3 has experience in the following countries:</p>
                <hr />
                <?php
                  $countries = get_field('experience_countries');
                  if($countries): ?>
                    <ul>
                      <?php foreach($countries as $country): ?>
                        <li><a href="<?php echo get_term_link($country); ?>"><?php echo $country->name; ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                <hr />
              </div>
              <div class="sidebar-section-footer">
                <a href="<?php echo home_url('contact'); ?>">Get in Touch<span class="glyphicon glyphicon-menu-right"></span></a>
              </div>
            </section>

            <?php
              if(get_field('post_to_display') = 'Select A Post'){
                $featured_post_id = get_field('featured_post');
                $featured_post_args = array(
                  'post_type' => 'posts',
                  'p' => $featured_post_id
                );
              }
              else{
                $random_country = $countries[array_rand($countries)];
                $featured_post_args = array(
                  'post_type' => 'posts',
                  'posts_per_page' => 1,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'country',
                      'terms' => $random_country->term_id
                    )
                  )
                );
              }

              $featured_post = new WP_Query($featured_post_args);
              if($featured_post->have_posts()): while($featured_post->have_posts()): $featured_post->the_post(); ?>
                <section class="sidebar-section">
                  <?php get_template_part('partials/post-card'); ?>
                </section>
            <?php endwhile; endif; wp_reset_postdata(); ?>

            <section class="sidebar-section">
              <div class="sidebar-social">
                <h3>Get in Touch</h3>
                <?php get_template_part('partials/social-media'); ?>
              </div>
            </section>
          </nav>
        </div>
        <div class="col-sm-8" id="right">
          <div class="global-main-content" role="main">
            <?php 
              if(have_rows('global_reach_main_layout')): while(have_rows('global_reach_main_layout')): the_row();
                if(get_row_layout() == 'content_box'): ?>

                  <section class="main-section">
                    <header class="main-content-header">
                      <h2><?php the_sub_field('content_box_title'); ?></h2>
                    </header>
                    <div class="main-content-body">
                      <?php the_sub_field('content_box_content'); ?>
                    </div>
                  </section>

                <?php elseif(get_row_layout() == 'spotlight'): ?>

                  <section class="main-section spotlight">
                    <header class="main-content-header">
                      <h2><?php the_sub_field('spotlight_title'); ?></h2>
                    </header>
                    <div class="main-content-body">
                      <div class="circle-card">
                        <a href="<?php the_sub_field('spotlight_link'); ?>" class="circle-card-content">
                          <span class="gradient-circle-border">
                            <img src="<?php the_sub_field('spotlight_image'); ?>" class="img-circle center-block" alt="" />
                          </span>
                          <?php the_sub_field('spotlight_content'); ?>
                        </a>
                      </div>
                    </div>
                  </section>

                <?php endif; ?>
            <?php endwhile; endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
<?php get_footer(); ?>