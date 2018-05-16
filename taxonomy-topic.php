<?php get_header(); ?>
  <section id="our-work">
    <div class="container">
      <?php get_template_part('partials/our-work-filters'); ?>
      <div id="our-work-grid">
        <div class="grid-sizer col-sm-6 col-md-4"></div>
        <?php
          $queried_object = get_queried_object();
          $tax = $queried_object->taxonomy;
          $tax_name = $queried_object->name;
          $tax_term = $queried_object->slug;
          
          if(is_tax()){	
            echo do_shortcode('[ajax_load_more taxonomy="'. $tax .'" taxonomy_terms="'. $tax_term .'" taxonomy_operator="IN" posts_per_page="9" transition="masonry" masonry_selector=".work-grid-item" container_type="div" images_loaded="true"]');
          } 
        ?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>