<?php if(!is_page('contact')): ?>
  <section id="super-footer">
    <div class="container">
      <?php 
        if(get_field('super_footer_title')){
          echo '<h2>' . get_field('super_footer_title') . '</h2>';
          if(get_field('super_footer_link')){
            echo '<a href="' . get_field('super_footer_link') . '" class="btn-main">' . get_field('super_footer_link_text') . '</a>';
          }
        }
        else{
          echo '<h2>' . get_field('default_super_footer_title', 'option') . '</h2>';
          if(get_field('default_super_footer_link', 'option')){
            echo '<a href="' . get_field('default_super_footer_link', 'option') . '" class="btn-main">' . get_field('default_super_footer_link_text','option') . '</a>';
          }
        }
      ?>
    </div>
  </section>
<?php endif; ?>
  <footer id="footer">
    <div class="container">
      <h2>D3: Designs, Data, Decisions</h2>
      <hr />
      <div class="row">
        <div class="col-sm-4">
          <h3>Contact Us</h3>
          <ul class="list-unstyled">
            <li>Research: <a href="<?php echo add_query_arg('subject', 'Partner+With+Us', home_url('contact')); ?>" class="value"><?php the_field('research_email', 'option'); ?></a></li>
            <li>Recruitment: <a href="<?php echo add_query_arg('subject', 'Recruiting+Inquiry', home_url('contact')); ?>" class="value"><?php the_field('recruitment_email', 'option'); ?></a></li>
            <li>General: <a href="<?php echo add_query_arg('subject', 'Request+a+Proposal', home_url('contact')); ?>" class="value"><?php the_field('general_email', 'option'); ?></a></li>
          </ul>
          <p>
            <a href="<?php the_field('google_map_link', 'option'); ?>" class="google-map-link" target="_blank"><?php the_field('street_address', 'option'); ?><br /><?php the_field('city_state_zip', 'option'); ?></a>
            <br /><span class="value"><?php the_field('phone', 'option'); ?></span>
          </p>
        </div>
        <div class="col-sm-5">
          <h3>Subsidiaries</h3>
          <ul class="list-unstyled">
            <?php if(have_rows('subsidiaries_list', 'option')): while(have_rows('subsidiaries_list', 'option')): the_row(); ?>
              <li><a href="<?php the_sub_field('subsidiary_link'); ?>"><?php the_sub_field('subsidiary_name'); ?> <span class="location"><?php the_sub_field('subsidiary_location'); ?></span></a></li>
            <?php endwhile; endif; ?>
          </ul>
        </div>
        <div class="col-sm-3">
          <h3>Social Media</h3>
          <?php get_template_part('partials/social-media'); ?>
        </div>
      </div>
      <hr />
      <?php get_template_part('partials/footer-stats'); ?>
      <div class="colophon">
        <p>&copy;<?php echo date('Y'); ?> D3 Systems, Inc.</p>
        <p>website created by <a href="https://childressagency.com" target="_blank">The Childress Agency</a></p>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  <?php if(is_archive()): ?>
    <script>
      jQuery(document).ready(function($) {
        $.fn.almEmpty = function(alm){
          $('.alm-masonry').css({'opacity': '1'});
          var el = $(alm.content),
          msg = 'Sorry, there is nothing to display.';
          el.append('<main class="post"><article><p>' + msg +'</p></article></main>'); // Append to ALM		
          //console.log("Nothing found in this Ajax Load More query :(");
        };
      });
    </script>
  <?php endif; ?>
</body>

</html>