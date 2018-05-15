<ul id="our-work-nav" class="nav nav-tabs">
  <li class="nav-tab-label">Filter Options:</li>
  <li class="dropdown<?php if(is_tax('category')){ echo ' active'; } ?>">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Type</a>
    <ul class="dropdown-menu">
      <li><a href="<?php echo home_url('our-work'); ?>">Show All</a></li>
      <?php
        $categories = get_categories(array('orderby' => 'name', 'order' => 'ASC'));
        foreach($categories as $category){
          echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->name . '</a></li>';
        }
      ?>
    </ul>
  </li>
  <li class="dropdown<?php if(is_tax('topic')){ echo ' active'; } ?>">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Topic</a>
    <ul class="dropdown-menu">
      <li><a href="<?php echo home_url('our-work'); ?>">Show All</a></li>
      <?php
        $topics = get_terms('topic', array('hide_empty' => 0));
        foreach($topics as $topic){
          echo '<li><a href="' . esc_url(get_term_link($topic)) . '">' . $topic->name . '</a></li>';
        }
      ?>
    </ul>
  </li>
  <li class="dropdown<?php if(is_tax('country')){ echo ' active'; } ?>">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Country</a>
    <ul class="dropdown-menu">
      <li><a href="<?php echo home_url('our-work'); ?>">Show All</a></li>
      <?php
        $countries = get_terms('country', array('hide_empty' => 0));
        foreach($countries as $country){
          echo '<li><a href="' . esc_url(get_term_link($country)) . '">' . $country->name . '</a></li>';
        }
      ?>
    </ul>
  </li>
  <li class="dropdown<?php if(is_year()){ echo ' active'; } ?>">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Date</a>
    <ul class="dropdown-menu">
      <li><a href="<?php echo home_url('our-work'); ?>">Show All</a></li>
      <?php wp_get_archives(array('type' => 'yearly')); ?>
    </ul>
  </li>
</ul>