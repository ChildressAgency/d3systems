<?php get_header(); ?>
<div class="container">
  <main class="post">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <?php if(is_singular()): ?>

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
            <hr style="border-color:#999;" />
            <h4 class="post-date"><?php echo get_the_date('M\. j, Y'); ?></h4>
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
      
      <?php else: ?>

        <div class="index-summary">
          <h2><?php the_title(); ?></h2>
          <?php the_excerpt(); ?>
          <a href="<?php the_permalink(); ?>" class="post-read-more">Read More</a>
        </div>

      <?php endif; ?>
    <?php endwhile; endif; ?>
  </main>
</div>
<?php get_footer(); ?>