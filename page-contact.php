<?php get_header('contact'); ?>
  <div id="contact-page">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <main class="contact-form">
            <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
          </main>
        </div>
        <div class="col-sm-4">
          <aside id="contact-sidebar">
            <section class="sidebar-section sidebar-details">
              <h3>Contract Details</h3>
              <?php the_field('contract_details'); ?>
            </section>
          </aside>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>