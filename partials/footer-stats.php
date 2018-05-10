<div id="stats" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <?php if(have_rows('footer_stats', 'option')): $fs=0; while(have_rows('footer_stats', 'option')): the_row(); ?>
      <div class="item<?php if($fs==0){ echo ' active'; } ?>">
        <div class="row">
          <div class="col-sm-3">
            <p><?php the_sub_field('stat_title'); ?></p>
          </div>
          <div class="col-xs-4 col-sm-3">
            <p><?php the_sub_field('stat_1_year'); ?>: <span><?php the_sub_field('stat_1_value'); ?></span></p>
          </div>
          <div class="col-xs-4 col-sm-3">
            <p><?php the_sub_field('stat_2_year'); ?>: <span><?php the_sub_field('stat_2_value'); ?></span></p>
          </div>
          <div class="col-xs-4 col-sm-3">
            <p><?php the_sub_field('stat_3_year'); ?>: <span><?php the_sub_field('stat_3_value'); ?></span></p>
          </div>
        </div>
      </div>
    <?php $fs++; endwhile; endif; ?>
  </div>
</div>
