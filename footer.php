<?php if(!is_page('contact')): ?>
  <section id="super-footer">
    <div class="container">
      <h2><?php the_field('superfooter_title'); ?></h2>
      <a href="<?php the_field('superfooter_link'); ?>" class="btn-main"><?php the_field('superfooter_link_text'); ?></a>
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
            <li>Research: <span class="value"><?php the_field('research_email', 'option'); ?></span></li>
            <li>Recruitment: <span class="value"><?php the_field('recruitment_email', 'option'); ?></span></li>
            <li>General: <span class="value"><?php the_field('general_email', 'option'); ?></span></li>
          </ul>
          <p><?php the_field('street_address', 'option'); ?><br /><?php the_field('city_state_zip', 'option'); ?><br /><span class="value"><?php the_field('phone', 'option'); ?></span></p>
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
</body>

</html>