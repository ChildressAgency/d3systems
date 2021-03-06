<?php get_header(); ?>
  <section id="our-work">
    <div class="container">
      <?php get_template_part('partials/our-work-filters'); ?>
      <div id="our-work-grid">
        <div class="grid-sizer col-sm-6 col-md-4"></div>
        <?php echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="9" transition="masonry" masonry_selector=".work-grid-item" container_type="div" images_loaded="true" button_label="Load More" scroll="false"]'); ?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>