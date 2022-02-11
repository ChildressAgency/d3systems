<?php get_header('trust-center'); ?>
  <?php if(get_field('our_tech_intro')): ?>
    <div class="section-intro">
      <div class="container">
        <?php the_field('our_tech_intro'); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if(get_field('our_tech_video')): ?>
    <div id="our-network-video" class="container" style="max-width:800px;">
      <div class="embed-responsive embed-responsive-16by9">
        <?php the_field('our_tech_video'); ?>
      </div>
    </div>
  <?php endif; ?>
</section>

<section id="section-2-anchor" style="background-color:transparent;box-shadow:inset 0px 8px 18px -5px #ddd;padding-top:100px;padding-bottom:0;">
  <?php
    $funcs_hero_image = get_field('functionalities_hero_image');
    $funcs_hero_image_css = get_field('functionalities_hero_image_css');
    if($funcs_hero_image): ?>
      <div class="hero" style="background-image:url(<?php echo esc_url($funcs_hero_image['url']); ?>);<?php echo esc_attr($funcs_hero_image_css); ?>">
        <div class="container">
          <?php 
            $funcs_hero_title = get_field('functionalities_hero_title');
            $funcs_hero_caption = get_field('functionalities_hero_caption');
          ?>
          <div class="hero-caption">
            <?php if($funcs_hero_title): ?>
              <h1><?php echo esc_html($funcs_hero_title); ?></h1>
            <?php endif; if($funcs_hero_caption): ?>
              <p><?php echo esc_html($funcs_hero_caption); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
  <?php endif; ?>
  <?php
    $funcs_intro = get_field('functionalities_intro');
    if($funcs_intro): ?>
      <div class="section-intro">
        <div class="container">
          <?php echo apply_filters('the_content', $funcs_intro); ?>
        </div>
      </div>
  <?php endif; ?>

  <?php if(have_rows('functionalities_cards')): ?>
    <div class="x-expander-cards">
      <div class="container">
        <?php $x = 1; while(have_rows('functionalities_cards')): the_row(); ?>
          <div class="x-expander-card">
            <div class="media">
              <?php if($x % 2 == 0): ?>

                <div class="media-body">
                  <h3 class="expander-card-title"><?php the_sub_field('functionalities_card_title'); ?></h3>
                  <div id="x-card-<?php echo $x; ?>" class="expander-card-content collapse" aria-expanded="false">
                    <?php the_sub_field('functionalities_card_content'); ?>
                  </div>
                  <a href="#x-card-<?php echo $x; ?>" role="button" class="expander collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="x-card-<?php echo $x; ?>">Read More</a>
                  <a href="#x-card-<?php echo $x; ?>" role="button" class="expander-closer collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="x-card-<?php echo $x; ?>"><i class="fas fa-chevron-up"></i></a>
                </div>
                <div class="media-right">
                  <?php
                    $expander_card_image = get_sub_field('functionalities_card_image');
                    if($expander_card_image): ?>
                      <img src="<?php echo esc_url($expander_card_image['url']); ?>" class="" alt="<?php echo esc_attr($expander_card_image['alt']); ?>" />
                  <?php endif; ?>
                </div>

              <?php else: ?>

                <div class="media-left">
                  <?php
                    $expander_card_image = get_sub_field('functionalities_card_image');
                    if($expander_card_image): ?>
                      <img src="<?php echo esc_url($expander_card_image['url']); ?>" class="" alt="<?php echo esc_attr($expander_card_image['alt']); ?>" />
                  <?php endif; ?>
                </div>
                <div class="media-body">
                  <h3 class="expander-card-title"><?php the_sub_field('functionalities_card_title'); ?></h3>
                  <div id="x-card-<?php echo $x; ?>" class="expander-card-content collapse" aria-expanded="false">
                    <?php the_sub_field('functionalities_card_content'); ?>
                  </div>
                  <a href="#x-card-<?php echo $x; ?>" role="button" class="expander collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="x-card-<?php echo $x; ?>">Read More</a>
                  <a href="#x-card-<?php echo $x; ?>" role="button" class="expander-closer collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="x-card-<?php echo $x; ?>"><i class="fas fa-chevron-up"></i></a>
                </div>

              <?php endif; ?>
            </div>
          </div>
        <?php $x++; endwhile; ?>
      </div>
    </div>
  <?php endif; ?>
</section>

<section id="section-3">
  <?php
    $adv_hero_image = get_field('advantage_hero_image');
    $adv_hero_image_css = get_field('advantage_hero_image_css');
    if($adv_hero_image): ?>
      <div class="hero" style="background-image:url(<?php echo esc_url($adv_hero_image['url']); ?>);<?php echo esc_attr($adv_hero_image_css); ?>">
        <div class="container">
          <?php
            $adv_hero_title = get_field('advantage_hero_tile');
            $adv_hero_caption = get_field('advantage_hero_caption');
          ?>
          <div class="hero-caption">
            <?php if($adv_hero_title): ?>
              <h1><?php echo esc_html($adv_hero_title); ?></h1>
            <?php endif; if($adv_hero_caption): ?>
              <p><?php echo esc_html($adv_hero_caption); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
  <?php endif; ?>
  <?php
    $adv_intro = get_field('advantage_intro');
    if($adv_intro): ?>
      <div class="section-intro">
        <div class="container">
          <?php echo apply_filters('the_content', $adv_intro); ?>
        </div>
      </div>
  <?php endif; ?>
</section>
<?php get_footer(); 