<?php get_header(); ?>
  <section id="our-work">
    <div class="container">
      <?php get_template_part('partials/our-work-filters'); ?>
      <?php if(have_posts()): ?>
        <div id="our-work-grid">
          <div class="grid-sizer col-sm-4"></div>
          <?php while(have_posts()): the_post(); ?>
            <div class="work-grid-item col-sm-4">
              <?php get_template_part('partials/post-card'); ?>
            </div>
          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <main class="post">
          <article>
            <p>Sorry, there is nothing to display.</p>
          </article>
        </main>
      <?php endif; ?>
    </div>
  </section>
<?php get_footer(); ?>