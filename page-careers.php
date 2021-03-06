<?php get_header(); ?>
<div class="container">
  <main id="main">
  <div class="post">
    <header class="post-header">
      <?php if(get_field('post_pre_title') || get_field('post_main_title') || get_field('post_sub_title')): ?>
        <h1>
          <span class="post-title-part"><?php the_field('post_pre_title'); ?></span>
          <span class="post-title-main"><?php the_field('post_main_title'); ?></span>
          <span class="post-title-part"><?php the_field('post_sub_title'); ?></span>
        </h1>
      <?php else: ?>
        <h1>
          <span class="post-title-part"><?php echo get_the_title(); ?></span>
        </h1>
      <?php endif; ?>
    </header>
    <article>
      <?php 
        if(have_posts()){
          while(have_posts()){
            the_post();
            the_content();
          }
        }
        else{
          echo '<p>Sorry, there was no content.</p>';
        }
      ?>
    </article>
  </div>
  <div class="post">
    <header class="post-header">
      <h2>Current Opportunities</h2>
    </header>
    <article>
      <?php
        $no_actives = true;
        if(have_rows('career_opportunities')){
          while(have_rows('career_opportunities')){
            the_row();
            if(get_sub_field('archive') == 0){
              $no_actives = false;
              echo '<div class="career_opp">' . get_sub_field('career_opportunity') . '</div>';
            }
          }
          if($no_actives == true){
            echo '<p>There are no open opportunities at the moment. Please check back at a later time.</p>';
          }
        }
        else{
          echo '<p>There are no open opportunities at the moment. Please check back at a later time.</p>';
        }
      ?>
    </article>
  </div>
  <div class="post">
    <header class="post-header">
      <h2>Benefits</h2>
    </header>
    <article>
      <?php the_field('benefits'); ?>
    </article>
  </div>
  </main>
</div>
<?php get_footer(); ?>