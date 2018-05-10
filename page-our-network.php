<?php get_header('our-network'); ?>
  <?php if(get_field('staff_section_intro')): ?>
    <div class="section-intro">
      <div class="container">
        <?php the_field('staff_section_intro'); ?>
      </div>
    </div>
  <?php endif; ?>
    <div class="container">
      <ul id="filter-nav" class="nav nav-tabs">
        <li class="active"><a href="#" class="filter" data-filter=".all">All Staff</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Team</a>
          <ul class="dropdown-menu">
            <?php
              $teams = get_terms('team', array('hide_empty' => 0));
              foreach($teams as $team){
                echo '<li><a href="#" class="filter" data-filter=".' . $team->slug . '">' . $team->name . '</a></li>';
              }
            ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Regional Expertise</a>
          <ul class="dropdown-menu">
            <?php
              $regional_expertise = get_terms('regional_expertise', array('hide_empty' => 0));
              foreach($regional_expertise as $region){
                echo '<li><a href="#" class="filter" data-filter=".' . $region->slug . '">' . $region->name . '</a></li>';
              }
            ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Languages</a>
          <ul class="dropdown-menu">
            <?php
              $languages = get_terms('language', array('hide_empty' => 0));
              foreach($languages as $language){
                echo '<li><a href="#" class="filter" data-filter=".' . $language->slug . '">' . $language->name . '</a></li>';
              }
            ?>
          </ul>
        </li>
      </ul>
      <div id="staff_grid" class="grid row">
        <?php
          $staff = new WP_Query(array(
            'post_type' => 'staff',
            'posts_per_page' => -1,
            'post_status' => 'publish'
          ));

          if($staff->have_posts()): while($staff->have_posts()): $staff->the_post();
            $staff_teams_terms = wp_get_post_terms($post->ID, 'team');
            $staff_teams_filter = array();
            $staff_teams = array();
            foreach($staff_teams_terms as $staff_teams_term){
              $staff_teams_filter[] = $staff_teams_term->slug;
              $staff_teams[] = $staff_team_term->name;
            }

            $staff_regions_terms = wp_get_post_terms($post->ID, 'region_expertise');
            $staff_regions_filter = array();
            $staff_regions = array();
            foreach($staff_regions_terms as $staff_regions_term){
              $staff_regions_filter[] = $staff_regions_term->slug;
              $staff_regions[] = $staff_regions_term->name;
            }

            $staff_languages_terms = wp_get_post_terms($post-ID, 'language');
            $staff_languages_filter = array();
            $staff_languages = array();
            foreach($staff_languages_terms as $staff_languages_term){
              $staff_languages_filter[] = $staff_languages_term->slug;
              $staff_languages[] = $staff_languages_term->name;
            }

            $staff_filter_items = array_merge($staff_teams_filter, $staff_regions_filter, $staff_languages_filter);
            $staff_filter_items = implode(" ", $staff_filter_items);  ?>


            <div class="grid-item circle-card <?php echo $staff_filter_items; ?>">
              <a href="#" class="circle-card-content" data-details_name="<?php the_title(); ?>" data-details_title="<?php the_field('staff_position'); ?>" data-details_bio="<?php the_field('staff_bio'); ?>" data-staff_team="<?php echo implode(', ', $staff_teams); ?>" data-staff_degrees="<?php the_field('staff_degrees'); ?>" data-staff_languages="<?php echo implode(', ', $staff_languages); ?>" data-staff_countryexp="<?php echo implode(', ', $staff_regions); ?>">
                <img src="<?php the_field('staff_image'); ?>" class="img-circle center-block" alt="<?php the_title(); ?>" />
                <h4><?php the_title(); ?></h4>
                <p><?php the_field('staff_position'); ?></p>
              </a>
            </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div><!--grid-->
    </div>
  </section><?php //this section starts in header-our-network.php ?>

  <section id="subsidiaries">
    <div class="hero" style="background-image:url(<?php the_field('subsidiaries_hero_background_image'); ?>); <?php the_field('subsidiaries_hero_background_image_css'); ?>">
      <div class="container">
        <div class="hero-caption">
          <h1><?php the_field('subsidiaries_hero_title'); ?></h1>
          <p><?php the_field('subsidiaries_hero_caption'); ?></p>
        </div>
      </div>
    </div>
    <?php if(get_field('subsidiaries_section_intro')): ?>
      <div class="section-intro">
        <div class="container">
          <?php the_field('subsidiaries_section_intro'); ?>
        </div>
      </div>
    <?php endif; ?>
    <div id="subsidiaries-grid">
      <div class="container">
        <div id="subsidiaries_grid" class="grid">
          <?php
            $subsidiaries = new WP_Query(array(
              'post_type' => 'subsidiary',
              'posts_per_page' => -1,
              'post_status' => 'publish'
            ));

            if($subsidiaries->have_posts()): while($subsidiaries->have_posts()): $subsidiaries->the_post(); ?>
              <div class="grid-item circle-card">
                <a href="#" class="circle-card-content" data-subsidiary_address="<?php the_field('subsidiary_address_1'); ?><br /><?php the_field('subsidiary_address_2'); ?><br /><?php the_field('subsidiary_address_3'); ?>" data-subsidiary_phone="<?php the_field('subsidiary_phone'); ?>" data-subsidiary_contact="<?php if(get_field('subsidiary_email')){ echo "<a href='" . get_field('subsidiary_email') . "'>" . get_field('subsidiary_email') . "</a><br />"; } if(get_field('subsidiary_website')){ echo "<a href='" . get_field('subsidiary_website') . ">Visit Website</a>"; ?>" data-details_name="<?php the_field('subsidiary_name'); ?>" data-details_title="<?php the_field('subsidiary_title'); ?>" data-details_bio="<?php the_field('subsidiary_details'); ?>">
                  <span class="gradient-circle-border">
                    <img src="<?php the_field('subsidiary_logo'); ?>" class="img-circle center-block" alt="<?php the_field('subsidiary_name'); ?>" />
                  </span>
                  <h4><?php the_field('subsidiary_name'); ?></h4>
                  <p><?php the_field('subsidiary_title'); ?></p>
                </a>
              </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>

  <section id="clients">
    <div class="hero" style="background-image:url(<?php the_field('clients_hero_background_image'); ?>); <?php the_field('clients_hero_background_image_css'); ?>">
      <div class="container">
        <div class="hero-caption">
          <h1><?php the_field('clients_hero_title'); ?></h1>
          <p><?php the_field('clients_hero_caption'); ?></p>
        </div>
      </div>
    </div>
    <?php if(get_field('clients_section_intro')): ?>
      <div class="section-intro">
        <div class="container">
          <?php the_field('clients_section_intro'); ?>
        </div>
      </div>
    <?php endif; ?>
    <div id="clients-grid">
      <?php 
        $client_divisions = get_terms('client_division', array('hide_empty' => 0, 'meta_key' => 'display_order', 'orderby' => 'meta_value'));
        foreach($client_divisions as $client_division): ?>
          <div id="<?php echo $client_division->slug; ?>" class="client-section">
            <div class="container">
              <h2><?php echo $client_division->name; ?></h2>
              <div class="grid">
                <?php
                  $clients = new WP_Query(array(
                    'post_type' => 'client',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'client_division',
                        'terms' => $client_division->term_id
                      )
                    )
                  ));

                  if($clients->have_posts()): while($clients->have_posts()): $clients->the_post(); ?>
                    <div class="grid-item circle-card">
                      <a href="<?php the_sub_field('client_link'); ?>" class="circle-card-content">
                        <img src="<?php the_sub_field('client_logo'); ?>" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                        <h4><?php the_title(); ?></h4>
                      </a>
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
              </div><!-- .grid -->
            </div><!-- .container -->
          </div><!-- .client-section -->
        <?php endforeach; ?>
    </div>
  </section>

<?php get_footer(); ?>