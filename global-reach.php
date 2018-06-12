<?php
/*
  Template Name: Global Reach Template
*/

get_header('global-reach'); ?>
  <div id="page-navs" class="justified-nav">
    <ul class="nav nav-tabs nav-justified">
      <li<?php if(is_page('global-reach')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('global-reach'); ?>">Global Reach</a></li>
      <li<?php if(is_page('the-americas-and-the-caribbean')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('the-americas-and-the-caribbean'); ?>">The Americas and the Caribbean</a></li>
      <li<?php if(is_page('europe')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('europe'); ?>">Europe</a></li>
      <li<?php if(is_page('middle-east-and-north-africa')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('middle-east-and-north-africa'); ?>">Middle East and North Africa</a></li>
      <li<?php if(is_page('sub-saharan-africa')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('sub-saharan-africa'); ?>">Sub-Saharan Africa</a></li>
      <li<?php if(is_page('central-and-south-asia')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('central-and-south-asia'); ?>">Central and South Asia</a></li>
      <li<?php if(is_page('east-asia-southeast-asia-and-oceana')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('east-asia-southeast-asia-and-oceana'); ?>">East Asia, Southeast Asia, & Oceana</a>
    </ul>
  </div>
  <?php if(!is_page('global-reach')): ?>
  <div class="global-reach-content parallax-scroll">
    <div class="container">
      <div class="row parallax">
        <div class="col-sm-4" id="left">
          <nav class="nav-sidebar hidden-xs">
            <section class="sidebar-section">
              <h2 class="sidebar-section-title">Regional Expertise</h2>
              <div class="sidebar-section-content">
                <hr />
                <h3>D3 has experience in the following countries:</h3>
                <hr />
                <?php
                  $countries = get_field('experience_countries');
                  $countries_with_posts = array();
                  if($countries): ?>
                    <ul>
                      <?php foreach($countries as $country):
                        if($country->count > 0): $countries_with_posts[] = $country->term_id; ?>
                          <li><a href="<?php echo get_term_link($country); ?>"><?php echo $country->name; ?></a></li>
                        <?php else: ?>
                          <li><?php echo $country->name; ?></li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
              </div>
              <div class="sidebar-section-footer">
                <a href="<?php echo home_url('contact'); ?>">Get in Touch<span class="glyphicon glyphicon-menu-right"></span></a>
              </div>
            </section>

            <?php 
              $type_selected = get_field('post_to_display');
              if($type_selected == 'Select A Post'){
                $post_to_display = get_field('featured_post');
                $featured_post_args = array('p' => $post_to_display);
              }
              else{
                $country_to_display = $countries_with_posts[array_rand($countries_with_posts)];
                $featured_post_args = array(
                  'post_type' => 'post',
                  'posts_per_page' => 1,
                  'orderby' => 'rand',
                  'order' => 'ASC',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'country',
                      'field' => 'term_id',
                      'terms' => $country_to_display
                    )
                  )
                );
              }

              //$post_to_show = (int)$post_to_display;
              //var_dump($post_to_show);
              $featured_post = new WP_Query($featured_post_args);
              if($featured_post->have_posts()): while($featured_post->have_posts()): $featured_post->the_post(); ?>
                <section class="sidebar-section">
                  <?php get_template_part('partials/post-card'); ?>
                </section>
            <?php endwhile; endif; wp_reset_postdata(); ?>
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
                        <a href="<?php the_sub_field('spotlight_link'); ?>" class="circle-card-content" target="_blank">
                          <span class="">
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