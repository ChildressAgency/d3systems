<?php get_header(); ?>
  <section id="competency-cards" class="icon-cards">
    <div class="container container-sm-height">
      <div class="row row-sm-height">
        <div class="col-sm-4 col-sm-height">
          <div id="designs-card" class="icon-card">
            <h2>Designs</h2>
            <?php the_field('designs_card_content'); ?>
            <a href="<?php the_field('designs_card_link'); ?>">Read More</a>
          </div>
        </div>
        <div class="col-sm-4 col-sm-height">
          <div id="data-card" class="icon-card">
            <h2>Data</h2>
            <?php the_field('data_card_content'); ?>
            <a href="<?php the_field('data_card_link'); ?>">Read More</a>
          </div>
        </div>
        <div class="col-sm-4 col-sm-height">
          <div id="decisions-card" class="icon-card">
            <h2>Decisions</h2>
            <?php the_field('decisions_card_content'); ?>
            <a href="<?php the_field('decisions_card_link'); ?>">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>