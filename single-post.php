<?php get_header(); ?>
  <div id="our-work-single">
    <div class="container">
      <?php get_template_part('partials/our-work-filters'); ?>
      <section id="main-article">
        <div class="row">
          <div class="col-sm-8">
            <main class="post">
              <?php $countries_list = array(); $topics_list = array(); $post_id = ''; ?>
              <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <?php 
                  $category_color = '#f7d2d4';
                  $cur_categories = get_the_terms(get_the_ID(), 'category');
                  if(!empty($cur_categories)){
                    $cur_category = $cur_categories[0];
                  }
                  else{
                    $cur_category = get_term_by('slug', 'd3-news', 'category');
                  }
                  $acf_cat_id = 'category_' . $cur_category->term_id;
                  $post_id = $post->ID;

                  if(get_field('category_color', $acf_cat_id)){
                    $category_color = get_field('category_color', $acf_cat_id);
                  }
                ?>
                <h3 class="post-category" style="background-color:<?php echo $category_color; ?>;"><?php echo $cur_category->name; ?></h3>
                <header class="post-header">
                  <h1>
                    <span class="post-title-part"><?php the_field('post_pre_title'); ?></span>
                    <span class="post-title-main"><?php the_field('post_main_title'); ?></span>
                    <span class="post-title-part"><?php the_field('post_sub_title'); ?></span>
                  </h1>
                  <hr style="border-color:<?php echo $category_color; ?>;" />
                  <h4 class="post-date"><?php echo get_the_date('M\. j, Y'); ?></h4>
                </header>
                <article>
                  <?php the_content(); ?>
                </article>
                <footer>
                  <div class="footnotes">
                    <?php if(have_rows('footnotes')): while(have_rows('footnotes')): the_row(); ?>
                      <p><?php the_sub_field('footnote'); ?></p>
                    <?php endwhile; endif; ?>
                  </div>
                  <p>This entry was posted on <?php echo get_the_date('F j, Y'); ?>, <?php the_author(); ?>
                  <p>Countries: 
                    <?php
                      $countries_list = wp_get_post_terms($post->ID, 'country');
                      $c = 0;
                      $country_count = count($countries_list);
                      foreach($countries_list as $country){
                        echo '<a href="' . esc_url(get_term_link($country)) . '">' . $country->name . '</a>';
                        if($c < $country_count){ echo ' | '; }
                        $c++;
                      }
                    ?>
                  </p>
                  <p>Topics: 
                    <?php
                      $topics_list = wp_get_post_terms($post->ID, 'topic');
                      $t = 0;
                      $topics_count = count($topics_list);
                      foreach($topics_list as $topic){
                        echo '<a href="' . esc_url(get_term_link($topic)) . '">' . $topic->name . '</a>';
                        if($t < $topics_count){ echo ' | '; }
                        $t++;
                      }
                    ?>
                  </p>
                </footer>
              <?php endwhile; else: ?>
                <p>Sorry, there is nothing to display.</p>
              <?php endif; ?>
            </main>
          </div>
          <div class="col-sm-4">
            <aside id="work-sidebar">
              <section class="sidebar-section sidebar-details">
                <h3>Filter Results:</h3>
                <ul>
                  <li>Type: <?php echo $cur_category->name; ?></li>
                  <li>Topic: 
                    <?php 
                      $t = 0;
                      foreach($topics_list as $topic){
                        echo '<a href="' . esc_url(get_term_link($topic)) . '">' . $topic->name . '</a>';
                        if($t < $topics_count){ echo ', '; } 
                        $t++;
                      }
                    ?>
                  </li>
                  <li>Country: 
                    <?php
                      $c=0;
                      foreach($countries_list as $country){
                        echo '<a href="' . esc_url(get_term_link($country)) . '">' . $country->name . '</a>';
                        if($c < $country_count){ echo ', '; }
                        $c++;
                      }
                    ?>                    
                  </li>
                  <li>Date: <?php echo get_the_date('Y'); ?></li>
                </ul>
                <div class="sidebar-section-footer">
                  <a href="<?php echo home_url('contact'); ?>">Get in Touch <span class="glyphicon glyphicon-menu-right"></span></a>
                </div>
              </section>
              <?php
                if(!empty($topics_list)){
                  $topic = $topics_list[0];
                  $sidebar_topic = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'post__not_in' => array($post_id),
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'topic',
                        'terms' => $topic->term_id
                      )
                    )
                  ));

                  if($sidebar_topic->have_posts()): while($sidebar_topic->have_posts()): $sidebar_topic->the_post(); ?>
                    <section class="sidebar-section">
                      <?php get_template_part('partials/post-card'); ?>
                    </section>
                  <?php endwhile; endif; wp_reset_postdata();
                }

                if(!empty($countries_list)){
                  $country = $countries_list[0];
                  $sidebar_country = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'post__not_in' => array($post_id),
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'country',
                        'terms' => $country->term_id
                      )
                    )
                  ));

                  if($sidebar_country->have_posts()): while($sidebar_country->have_posts()): $sidebar_country->the_post(); ?>
                    <section class="sidebar-section">
                      <?php get_template_part('partials/post-card'); ?>
                    </section>
                  <?php endwhile; endif; wp_reset_postdata();
                } ?>
              <section class="sidebar-section">
                <div class="sidebar-social">
                  <h3>Get in Touch</h3>
                  <?php get_template_part('partials/social-media'); ?>
                </div>
              </section>
            </aside>
          </div>
        </div>
      </section>
    </div>
  </div>
<?php get_footer(); ?>