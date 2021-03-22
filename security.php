<?php
/*
  Template Name: Security Template
*/

get_header('security'); ?>
<div class="section-intro">
  <div class="container">
    <?php the_field('security_page_intro'); ?>
  </div>
</div>

<?php if(have_rows('security_sections')): ?>
  <div class="security-carousel">
    <div class="container">
      <?php
        $slide = 0;
        if($_GET['slide']){
          $slide = $_GET['slide'] - 1;
        }
      ?>
      <div class="swiper-container" data-initial-slide="<?php echo $slide; ?>">
        <div class="swiper-wrapper">
          <?php while(have_rows('security_sections')): the_row(); ?>
            <div class="swiper-slide">
              <?php the_sub_field('security_section_content'); ?>
            </div>
          <?php endwhile; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>        
      </div>
    </div>
  </div>
<?php endif; ?>
<?php get_footer();