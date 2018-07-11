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
              $staff_teams[] = $staff_teams_term->name;
            }

            $staff_countries_terms = wp_get_post_terms($post->ID, 'country_expertise');
            $staff_countries_filter = array();
            $staff_countries = array();
            foreach($staff_countries_terms as $staff_countries_term){
              $staff_countries_filter[] = $staff_countries_term->slug;
              $staff_countries[] = $staff_countries_term->name;
            }

            $staff_regions_terms = wp_get_post_terms($post->ID, 'regional_expertise');
            $staff_regions_filter = array();
            $staff_regions = array();
            foreach($staff_regions_terms as $staff_regions_term){
              $staff_regions_filter[] = $staff_regions_term->slug;
              $staff_regions[] = $staff_regions_term->name;
            }

            $staff_languages_terms = wp_get_post_terms($post->ID, 'language');
            $staff_languages_filter = array();
            $staff_languages = array();
            foreach($staff_languages_terms as $staff_languages_term){
              $staff_languages_filter[] = $staff_languages_term->slug;
              $staff_languages[] = $staff_languages_term->name;
            }

            $staff_filter_items = array_merge($staff_teams_filter, $staff_regions_filter, $staff_languages_filter);
            $staff_filter_items = implode(" ", $staff_filter_items);  ?>


            <div class="grid-item circle-card <?php echo $staff_filter_items; ?>">
              <a href="#" class="circle-card-content" data-details_name="<?php the_title(); ?>" data-details_title="<?php the_field('staff_position'); ?>" data-details_bio="<?php the_field('staff_bio'); ?>" data-staff_team="<?php echo implode(', ', $staff_teams); ?>" data-staff_yearsexp="<?php the_field('years_experience'); ?>" data-staff_degrees="<?php the_field('staff_degrees'); ?>" data-staff_languages="<?php echo implode(', ', $staff_languages); ?>" data-staff_countryexp="<?php echo implode(', ', $staff_countries); ?>" data-staff_regionexp="<?php echo implode(', ', $staff_regions); ?>">
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
                <a href="#" class="circle-card-content" 
                  data-subsidiary_address="<?php the_field('subsidiary_address_1'); ?><br /><?php the_field('subsidiary_address_2'); ?><br /><?php the_field('subsidiary_address_3'); ?>" 
                  data-subsidiary_phone="<?php the_field('subsidiary_phone'); ?>" 
                  data-subsidiary_contact="<a href='<?php the_field('subsidiary_email'); ?>'><?php the_field('subsidiary_email'); ?></a><br /><a href='<?php the_field('subsidiary_website'); ?>' target='_blank'>Visit Website</a>" 
                  data-details_name="<?php the_title(); ?>" 
                  data-details_title="<?php the_field('subsidiary_title'); ?>" 
                  data-details_bio="<?php the_field('subsidiary_details'); ?>">
                  <span class="">
                    <img src="<?php the_field('subsidiary_logo'); ?>" class="img-circle center-block" alt="<?php the_title(); ?>" />
                  </span>
                  <h4><?php the_title(); ?></h4>
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
      <?php if(have_rows('client_categories')): while(have_rows('client_categories')): the_row(); ?>
        <div id="<?php echo sanitize_title(get_sub_field('client_category_title')); ?>" class="client-section">
          <div class="container">
            <h2><?php the_sub_field('client_category_title'); ?></h2>
            <div class="grid">
              <?php if(have_rows('clients')): while(have_rows('clients')): the_row(); ?>
                <div class="grid-item circle-card">
                  <div class="client-inner">
                    <img src="<?php the_sub_field('client_logo'); ?>" class="img-responsive center-block" alt="<?php the_sub_field('client_name'); ?>" />
                    <span class="client-name-overlay">
                      <span class="client-name"><?php the_sub_field('client_name'); ?></span>
                    </span>
                  </div>
                </div>
              <?php endwhile; endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </section>

<?php get_footer(); ?>