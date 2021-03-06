<div class="post-card">
  <?php 
    $category_color = '#f7d2d4';
    $cur_categories = get_the_terms(get_the_ID(), 'category');
    if(!empty($cur_categories)){
      $cur_category = $cur_categories[0];
    }
    else{
      $cur_category = get_term_by('slug', 'd3-news', 'category');
    }
    $acf_cat_id = 'category_' . $cur_category->term_id;

    if(get_field('category_color', $acf_cat_id)){
      $category_color = get_field('category_color', $acf_cat_id);
    }

    if(has_post_thumbnail()){
      //$featured_image_url = wp_get_attachment_url(get_post_thumbnail_id());
      $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
    }
  ?>
  <h3 class="post-card-category" style="background-color:<?php echo $category_color; ?>;"><?php echo $cur_category->name; ?></h3>
  <div class="post-card-thumb">
    <a href="<?php the_permalink(); ?>">
      <img src="<?php echo $featured_image_url; ?>" class="img-responsive center-block" alt="" />
      <h2 class="post-card-thumb-caption">
        <span class="summary-card-title-part" style="color:<?php the_field('post_pre_title_color'); ?>;"><?php the_field('post_pre_title'); ?></span>
        <span class="summary-card-title-main" style="color:<?php the_field('post_main_title_color'); ?>;"><?php the_field('post_main_title'); ?></span>
        <span class="summary-card-title-part" style="color:<?php the_field('post_sub_title_color'); ?>;"><?php the_field('post_sub_title'); ?></span>
      </h2>
      <div class="post-caption-overlay"></div>
    </a>
  </div>
  <div class="post-card-content">
    <h4 class="post-date"><?php echo get_the_date('M\. j, Y'); ?></h4>
    <hr style="border-color:<?php echo $category_color; ?>;" />
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="post-read-more">Read More</a>
  </div>
</div>
