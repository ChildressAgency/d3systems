<?php get_header('contact'); ?>
  <div id="contact-page">
    <div class="container">
      <main class="contact-form">
        <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
      </main>
    </div>
  </div>
<?php get_footer(); ?>