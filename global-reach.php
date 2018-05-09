<?php
/*
  Template Name: Global Reach Template
*/

get_header(); ?>
  <div id="global-reach-nav" class="justified-nav">
    <ul class="nav nav-tabs nav-justified">
      <li<?php if(is_page('global-reach')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('global-reach'); ?>">Global Reach</a></li>
      <li<?php if(is_page('the-americas-and-the-caribbean')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('the-americas-and-the-caribbean'); ?>">The Americas and the Caribbean</a></li>
      <li<?php if(is_page('europe')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('europe'); ?>">Europe</a></li>
      <li<?php if(is_page('middle-east-and-north-africa')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('middle-east-and-north-africa'); ?>">Middle East and North Africa</a></li>
      <li<?php if(is_page('sub-saharan-africa')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('sub-saharan-africa'); ?>">Sub-Saharan Africa</a></li>
      <li<?php if(is_page('central-and-south-asia')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('central-and-south-asia'); ?>">Central and South Asia</a></li>
      <li<?php if(is_page('east-southeast-asia-and-oceana')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('east-southeast-asia-and-oceana'); ?>">East Southeast Asia and Oceana</a>
    </ul>
  </div>
  <?php if(!is_page('global-reach')): ?>
  <div class="global-reach-content">
    <div class="container">
      <div class="row parallax">
        <div class="col-sm-4" id="left">
          <nav class="nav-sidebar hidden-xs">
            <section class="sidebar-section">
              <h2 class="sidebar-section-title">Regional Expertise</h2>
              <div class="sidebar-section-content">
                <p>D3 has experience in the following countries:</p>
                <hr />
                <?php
                  $countries = get_field('experience_countries');
                  if($countries): ?>
                    <ul>
                      <?php foreach($countries as $country): ?>
                        <li><a href="<?php echo get_term_link($country); ?>"><?php echo $country->name; ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                <hr />
              </div>
              <div class="sidebar-section-footer">
                <a href="<?php echo home_url('contact'); ?>">Get in Touch<span class="glyphicon glyphicon-menu-right"></span></a>
              </div>
            </section>

            <?php
              if(get_field('post_to_display') = 'Select A Post'){
                $featured_post_id = get_field('featured_post');
                $featured_post_args = array(
                  'post_type' => 'posts',
                  'p' => $featured_post_id
                );
              }
              else{
                $random_country = $countries[array_rand($countries)];
                $featured_post_args = array(
                  'post_type' => 'posts',
                  'posts_per_page' => 1,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'country',
                      'terms' => $random_country->term_id
                    )
                  )
                );
              }

              $featured_post = new WP_Query($featured_post_args);
              if($featured_post->have_posts()): while($featured_post->have_posts()): $featured_post->the_post(); ?>
                <section class="sidebar-section">
                  <div class="post-card">
                    <?php
                      $featured_post_categories = get_the_terms(get_the_ID(), 'topic');
                    <h3 class="post-card-category" style="background-color:#f7d2d4;">Events</h3>
                    <div class="post-card-thumb">
                      <img src="images/HondurasColorTreated-01.jpg" class="img-responsive center-block" alt="" />
                      <h2 class="post-card-thumb-caption">
                        <span class="summary-card-title-part">Survey of</span>
                        <span class="summary-card-title-main">Thai People-</span>
                        <span class="summary-card-title-part">a Time of Change</span>
                      </h2>
                      <div class="post-caption-overlay"></div>
                    </div>
                    <div class="post-card-content">
                      <h4 class="post-date">Sept. 16, 2017</h4>
                      <hr />
                      <p>D3 is excited to announce that we recently designed and successfully executed a sample plan that far exceeds standard coverage for public opinion research...</p>
                      <a href="#" class="post-read-more">Read More</a>
                    </div>
                  </div>
                </section>
            <?php endwhile; endif; wp_reset_postdata(); ?>

            <section class="sidebar-section">
              <div class="sidebar-social">
                <h3>Get in Touch</h3>
                <?php get_template_part('partials/social-media'); ?>
              </div>
            </section>
          </nav>
        </div>
        <div class="col-sm-8" id="right">
          <div class="global-main-content" role="main">
            <section class="main-section">
              <header class="main-content-header">
                <h2>Region Overview</h2>
              </header>
              <div class="main-content-body">
                <h3>The Americas and the Caribbean</h3>
                <p>In a region defined by diverse cultures, political climates, and physical terrain, D3 has adapted to successfully collect data that allows clients to make informed decisions. We conduct quantitative, qualitative, and mixed-method research in this region using face-to-face paper surveys, Computer Assisted Telephone interviewing (CATI), and electronic data capture using <a href="#">Research Control Solutions (RCS) software.</a></p>
                <p>Our past performace and capabilities in the region include nationally representative public opinion polling, media research, in-depth interviews, focus groups, baseline studies, and impact / performance evaluations.</p>
              </div>
            </section>
            <section class="main-section">
              <header class="main-content-header">
                <h2>Region Overview</h2>
              </header>
              <div class="main-content-body">
                <h3>The Americas and the Caribbean</h3>
                <p>In a region defined by diverse cultures, political climates, and physical terrain, D3 has adapted to successfully collect data that allows clients to make informed decisions. We conduct quantitative, qualitative, and mixed-method research in this region using face-to-face paper surveys, Computer Assisted Telephone interviewing (CATI), and electronic data capture using <a href="#">Research Control Solutions (RCS) software.</a></p>
                <p>Our past performace and capabilities in the region include nationally representative public opinion polling, media research, in-depth interviews, focus groups, baseline studies, and impact / performance evaluations.</p>
              </div>
            </section>
            <section class="main-section">
              <header class="main-content-header">
                <h2>Region Overview</h2>
              </header>
              <div class="main-content-body">
                <h3>The Americas and the Caribbean</h3>
                <p>In a region defined by diverse cultures, political climates, and physical terrain, D3 has adapted to successfully collect data that allows clients to make informed decisions. We conduct quantitative, qualitative, and mixed-method research in this region using face-to-face paper surveys, Computer Assisted Telephone interviewing (CATI), and electronic data capture using <a href="#">Research Control Solutions (RCS) software.</a></p>
                <p>Our past performace and capabilities in the region include nationally representative public opinion polling, media research, in-depth interviews, focus groups, baseline studies, and impact / performance evaluations.</p>
              </div>
            </section>
            <section class="main-section">
              <header class="main-content-header">
                <h2>Region Overview</h2>
              </header>
              <div class="main-content-body">
                <h3>The Americas and the Caribbean</h3>
                <p>In a region defined by diverse cultures, political climates, and physical terrain, D3 has adapted to successfully collect data that allows clients to make informed decisions. We conduct quantitative, qualitative, and mixed-method research in this region using face-to-face paper surveys, Computer Assisted Telephone interviewing (CATI), and electronic data capture using <a href="#">Research Control Solutions (RCS) software.</a></p>
                <p>Our past performace and capabilities in the region include nationally representative public opinion polling, media research, in-depth interviews, focus groups, baseline studies, and impact / performance evaluations.</p>
              </div>
            </section>
            <section class="main-section">
              <header class="main-content-header">
                <h2>Region Overview</h2>
              </header>
              <div class="main-content-body">
                <h3>The Americas and the Caribbean</h3>
                <p>In a region defined by diverse cultures, political climates, and physical terrain, D3 has adapted to successfully collect data that allows clients to make informed decisions. We conduct quantitative, qualitative, and mixed-method research in this region using face-to-face paper surveys, Computer Assisted Telephone interviewing (CATI), and electronic data capture using <a href="#">Research Control Solutions (RCS) software.</a></p>
                <p>Our past performace and capabilities in the region include nationally representative public opinion polling, media research, in-depth interviews, focus groups, baseline studies, and impact / performance evaluations.</p>
              </div>
            </section>
            <section class="main-section">
              <header class="main-content-header">
                <h2>Region Overview</h2>
              </header>
              <div class="main-content-body">
                <h3>The Americas and the Caribbean</h3>
                <p>In a region defined by diverse cultures, political climates, and physical terrain, D3 has adapted to successfully collect data that allows clients to make informed decisions. We conduct quantitative, qualitative, and mixed-method research in this region using face-to-face paper surveys, Computer Assisted Telephone interviewing (CATI), and electronic data capture using <a href="#">Research Control Solutions (RCS) software.</a></p>
                <p>Our past performace and capabilities in the region include nationally representative public opinion polling, media research, in-depth interviews, focus groups, baseline studies, and impact / performance evaluations.</p>
              </div>
            </section>
            <section class="main-section">
              <header class="main-content-header">
                <h2>Region Overview</h2>
              </header>
              <div class="main-content-body">
                <h3>The Americas and the Caribbean</h3>
                <p>In a region defined by diverse cultures, political climates, and physical terrain, D3 has adapted to successfully collect data that allows clients to make informed decisions. We conduct quantitative, qualitative, and mixed-method research in this region using face-to-face paper surveys, Computer Assisted Telephone interviewing (CATI), and electronic data capture using <a href="#">Research Control Solutions (RCS) software.</a></p>
                <p>Our past performace and capabilities in the region include nationally representative public opinion polling, media research, in-depth interviews, focus groups, baseline studies, and impact / performance evaluations.</p>
              </div>
            </section>
            <section class="main-section">
              <header class="main-content-header">
                <h2>Region Overview</h2>
              </header>
              <div class="main-content-body">
                <h3>The Americas and the Caribbean</h3>
                <p>In a region defined by diverse cultures, political climates, and physical terrain, D3 has adapted to successfully collect data that allows clients to make informed decisions. We conduct quantitative, qualitative, and mixed-method research in this region using face-to-face paper surveys, Computer Assisted Telephone interviewing (CATI), and electronic data capture using <a href="#">Research Control Solutions (RCS) software.</a></p>
                <p>Our past performace and capabilities in the region include nationally representative public opinion polling, media research, in-depth interviews, focus groups, baseline studies, and impact / performance evaluations.</p>
              </div>
            </section>
            <section class="main-section">
              <header class="main-content-header">
                <h2>Region Overview</h2>
              </header>
              <div class="main-content-body">
                <h3>The Americas and the Caribbean</h3>
                <p>In a region defined by diverse cultures, political climates, and physical terrain, D3 has adapted to successfully collect data that allows clients to make informed decisions. We conduct quantitative, qualitative, and mixed-method research in this region using face-to-face paper surveys, Computer Assisted Telephone interviewing (CATI), and electronic data capture using <a href="#">Research Control Solutions (RCS) software.</a></p>
                <p>Our past performace and capabilities in the region include nationally representative public opinion polling, media research, in-depth interviews, focus groups, baseline studies, and impact / performance evaluations.</p>
              </div>
            </section>
            <section class="main-section spotlight">
              <header class="main-content-header">
                <h2>Subsidiary Spotlight:</h2>
              </header>
              <div class="main-content-body">
                <div class="circle-card">
                  <a href="#" class="circle-card-content">
                    <span class="gradient-circle-border">
                      <img src="images/subsidiaries/infinite-insight_logo.png" class="img-circle center-block" alt="" />
                    </span>
                    <h4>Infinite Insight</h4>
                    <p>Kenyan Market Research Agency</p>
                  </a>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
<?php get_footer(); ?>