<?php get_header('trust-center'); ?>
  <?php if(get_field('trust_center_intro')): ?>
    <div class="section-intro">
      <div class="container">
        <?php the_field('trust_center_intro'); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if(get_field('trust_center_video')): ?>
    <div id="our-network-video" class="container" style="max-width: 800px;">
      <div class="embed-responsive embed-responsive-16by9">
        <?php the_field('trust_center_video'); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if(have_rows('trust_center_cards')): ?>
    <div class="x-expander-cards">
      <div class="container">
        <?php $x = 1; while(have_rows('trust_center_cards')): the_row(); ?>
          <div class="x-expander-card">
            <div class="media">
              <?php if($x % 2 == 0): ?>
                <div class="media-body">
                  <h3 class="expander-card-title"><?php the_sub_field('trust_center_card_title'); ?></h3>
                  <div id="x-card-<?php echo $x; ?>" class="expander-card-content collapse" aria-expanded="false">
                    <?php the_sub_field('trust_center_card_content'); ?>
                  </div>
                  <a href="#x-card-<?php echo $x; ?>" role="button" class="expander collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="x-card-<?php echo $x; ?>">Read More</a>
                  <a href="#x-card-<?php echo $x; ?>" role="button" class="expander-closer collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="x-card-<?php echo $x; ?>"><i class="fas fa-chevron-up"></i></a>
                </div>
                <div class="media-right">
                  <?php 
                    $expander_card_image = get_sub_field('trust_center_card_image'); 
                    if($expander_card_image): ?>
                      <img src="<?php echo esc_url($expander_card_image['url']); ?>" class="" alt="<?php echo esc_attr($expander_card_image['alt']); ?>" />
                  <?php endif; ?>
                </div>
              <?php else: ?>
                <div class="media-left">
                  <?php 
                    $expander_card_image = get_sub_field('trust_center_card_image'); 
                    if($expander_card_image): ?>
                      <img src="<?php echo esc_url($expander_card_image['url']); ?>" class="" alt="<?php echo esc_attr($expander_card_image['alt']); ?>" />
                  <?php endif; ?>
                </div>
                <div class="media-body">
                  <h3 class="expander-card-title"><?php the_sub_field('trust_center_card_title'); ?></h3>
                  <div id="x-card-<?php echo $x; ?>" class="expander-card-content collapse" aria-expanded="false">
                    <?php the_sub_field('trust_center_card_content'); ?>
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

<?php if(have_rows('security_cards')): ?>
<style>
 #section-2-anchor{
  display: block;
  margin-top:-200px;
  padding-bottom:200px;
 }
</style>
<span id="section-2-anchor"></span>
<section id="section-2" class="anchor-offset">
  <div class="container-fluid">
    <div class="security-cards">
      <?php $s = 0; while(have_rows('security_cards')): the_row(); ?>
        <div class="security-card<?php if($s == 0){ echo ' security-card-first'; } ?>">
          <div class="security-card-body">
            <?php the_sub_field('security_card_content'); ?>
          </div>
          <?php
            $security_link = get_sub_field('security_card_link');
            if($security_link): ?>
              <div class="security-card-footer">
                <a href="<?php echo esc_url($security_link); ?>" class="post-read-more">Read More</a>
              </div>
          <?php endif; ?>
        </div>
      <?php $s++; endwhile; ?>
    </div>
  </div>
</section>

<section id="section-3">
  <?php 
    $compliance_hero_image = get_field('compliance_hero_image');
    $compliance_hero_image_css = get_field('compliance_hero_image_css');
    if($compliance_hero_image): ?>
      <div class="hero" style="background-image:url(<?php echo esc_url($compliance_hero_image['url']); ?>);<?php echo esc_attr($compliance_hero_image_css); ?>">
        <div class="container">
          <?php 
            $hero_title = get_field('compliance_hero_title');
            $hero_caption = get_field('compliance_hero_caption');
          ?>
          <div class="hero-caption">
            <?php if($hero_title): ?>
              <h1><?php echo esc_html($hero_title); ?></h1>
            <?php endif; if($hero_caption): ?>
              <p><?php echo esc_html($hero_caption); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
  <?php endif; ?>
  <?php 
    $compliance_intro = get_field('compliance_intro');
    if($compliance_intro): ?>
      <div class="section-intro">
        <div class="container">
          <?php echo apply_filters('the_content', $compliance_intro); ?>
        </div>
      </div>
  <?php endif; ?>

  <?php if(have_rows('compliance_cards')): ?>
    <div class="compliance-cards-wrapper">
    <div class="container-fluid">
      <div class="compliance-cards">
        <?php $c = 0; while(have_rows('compliance_cards')): the_row(); ?>
          <div class="compliance-card">
            <?php $compliance_card_image = get_sub_field('compliance_card_image'); ?>
            <img src="<?php echo esc_url($compliance_card_image['url']); ?>" class="img-responsive center-block" alt="<?php echo esc_attr($compliance_card_image['url']); ?>" />
            <div class="compliance-card-body">
              <h3><?php the_sub_field('compliance_card_title'); ?></h3>
              <div id="v-card-<?php echo $c; ?>" class="expander-card-content collapse" aria-expanded="false">
                <?php the_sub_field('compliance_card_content'); ?>
              </div>
              <a href="#v-card-<?php echo $c; ?>" role="button" class="expander collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="v-card-<?php echo $c; ?>">Read More</a>
              <a href="#v-card-<?php echo $c; ?>" role="button" class="expander-closer collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="v-card-<?php echo $c; ?>"><i class="fas fa-chevron-up"></i></a>
            </div>
          </div>
        <?php $c++; endwhile; ?>
      </div>
    </div>
    </div>
  <?php endif; ?>
</section>
<?php endif; ?>
<?php get_footer(); 