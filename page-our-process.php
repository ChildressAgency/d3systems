<?php get_header('our-process'); ?>
  <nav id="page-navs" class="hidden-xs sticky-nav"<?php if(get_field('our_process_video')){ echo ' data-video_enabled="true"'; } ?>>
    <div id="page-progress" class="justified-nav our-process-main-nav">
      <ul class="nav nav-tabs nav-justified">
        <li><a href="#designs" class="smooth-scroll" data-scroll_offset="180">Designs</a></li>
        <li><a href="#data" class="smooth-scroll" data-scroll_offset="200">Data</a></li>
        <li><a href="#decisions" class="smooth-scroll" data-scroll_offset="200">Decisions</a></li>
      </ul>
    </div>
    <?php
      $designs_blocks = get_field('designs_content_blocks');
      $data_blocks = get_field('data_content_blocks');
      $decisions_blocks = get_field('decisions_content_blocks');
      $infographic = get_field('infographic_file');
    ?>
    <div id="sub-progress" class="justified-nav">
      <ul class="nav nav-tabs nav-justified">
        <?php foreach($designs_blocks as $designs_block): ?>
          <li><a href="#<?php echo sanitize_title($designs_block['designs_content_block_title']); ?>" class="smooth-scroll" data-scroll_offset="220"><?php echo $designs_block['designs_content_block_title']; ?></a></li>
        <?php endforeach; reset($designs_blocks); ?>
        <?php foreach($data_blocks as $data_block): ?>
          <li><a href="#<?php echo sanitize_title($data_block['data_content_block_title']); ?>" class="smooth-scroll" data-scroll_offset="220"><?php echo $data_block['data_content_block_title']; ?></a></li>
        <?php endforeach; reset($data_blocks); ?>
        <?php foreach($decisions_blocks as $decisions_block): ?>
          <li><a href="#<?php echo sanitize_title($decisions_block['decisions_content_block_title']); ?>" class="smooth-scroll" data-scroll_offset="220"><?php echo $decisions_block['decisions_content_block_title']; ?></a></li>
        <?php endforeach; reset($decisions_blocks); ?>
      </ul>
      <div class="scroll-indicator-container">
        <div id="scroll-indicator"></div>
      </div>
    </div>
  </nav>

  <div id="our-process-content">
    <div class="container">
      <div class="row" id="designs">
        <div class="col-sm-4">
          <div class="nav-sidebar hidden-xs our-process-sidebar2">
            <div class="sidebar-section">

              <section class="sidebar-sub-section" data-process_section="designs">
                <h2 class="sidebar-section-title">Designs</h2>
                <div class="sidebar-section-content">
                  <hr />
                  <h3><?php the_field('designs_sidebar_title'); ?></h3>
                  <hr />
                  <?php the_field('designs_sidebar_content'); ?>
                  <div class="sub-section-links">
                    <?php foreach($designs_blocks as $designs_block): ?>
                      <a href="#<?php echo sanitize_title($designs_block['designs_content_block_title']); ?>" class="smooth-scroll"><?php echo $designs_block['designs_content_block_title']; ?></a>
                    <?php endforeach; reset($designs_blocks); ?>
                  </div>
                </div>
              </section>

            </div>
          </div>
        </div>

        <div class="col-sm-8">
          <div class="process-main-content" role="main">
            <div id="designs-main">
              <!--<span class="our-process-offset"></span>-->
              <?php $i=1; $len=count($designs_blocks); foreach($designs_blocks as $designs_block): ?>
                <section id="<?php echo sanitize_title($designs_block['designs_content_block_title']); ?>" class="main-section">
                  <header class="main-content-header">
                    <h2><?php echo $designs_block['designs_content_block_title']; ?></h2>
                  </header>
                  <div class="main-content-body">

                    <?php if($designs_block['designs_content_block_top_image']): ?>
                      <img src="<?php echo $designs_block['designs_content_block_top_image']; ?>" class="img-responsive center-block" alt="" />
                    <?php endif; ?>

                    <?php foreach($designs_block['designs_content_block_sections'] as $designs_block_section): ?>
                      <div class="media">
                        <?php if($designs_block_section['designs_content_block_section_image']): ?>
                          <div class="media-left media-middle">
                            <span class="">
                              <img src="<?php echo $designs_block_section['designs_content_block_section_image']; ?>" class="" alt="" />
                            </span>
                          </div>
                        <?php endif; ?>
                        <div class="media-body media-middle">
                          <h4 class="media-heading"><?php echo $designs_block_section['designs_content_block_section_title']; ?></h4>
                          <?php echo $designs_block_section['designs_content_block_section_content']; ?>
                        </div>
                      </div>
                    <?php endforeach; ?>

                  </div>
                  <?php if($infographic && $i==$len): ?>
                    <a href="<?php echo $infographic['url']; ?>" target="_blank" class="infographic-link"><?php echo $infographic['caption']; ?></a>
                  <?php endif; ?>
                </section>
              <?php $i++; endforeach; ?>

            </div><!-- #designs-main -->
          </div><!-- .process-main-content -->
        </div><!-- .col-sm-8 -->
      </div><!-- #designs.row -->

      <div class="row" id="data">
        <div class="col-sm-4">
          <div class="nav-sidebar hidden-xs our-process-sidebar2">
            <div class="sidebar-section">

              <section class="sidebar-sub-section" data-process_section="data">
                <h2 class="sidebar-section-title">Data</h2>
                <div class="sidebar-section-content">
                  <hr />
                  <h3><?php the_field('data_sidebar_title'); ?></h3>
                  <hr />
                  <?php the_field('data_sidebar_content'); ?>
                  <div class="sub-section-links">
                    <?php foreach($data_blocks as $data_block): ?>
                      <a href="#<?php echo sanitize_title($data_block['data_content_block_title']); ?>" class="smooth-scroll"><?php echo $data_block['data_content_block_title']; ?></a>
                    <?php endforeach; reset($data_blocks); ?>
                  </div>
                </div>
              </section>

            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="process-main-content" role="main">
            <div id="data-main">
              <!--<span class="our-process-offset"></span>-->
              <?php $i=1; $len=count($data_blocks); foreach($data_blocks as $data_block): ?>
                <section id="<?php echo sanitize_title($data_block['data_content_block_title']); ?>" class="main-section">
                  <header class="main-content-header">
                    <h2><?php echo $data_block['data_content_block_title']; ?></h2>
                  </header>
                  <div class="main-content-body">
                    <?php if($data_block['data_content_block_top_image']): ?>
                      <img src="<?php echo $data_block['data_content_block_top_image']; ?>" class="img-responsive center-block" alt="" />
                    <?php endif; ?>

                    <?php foreach($data_block['data_content_block_sections'] as $data_block_section): ?>
                      <div class="media">
                        <?php if($data_block_section['data_content_block_section_image']): ?>
                          <div class="media-left media-middle">
                            <span class="">
                              <img src="<?php echo $data_block_section['data_content_block_section_image']; ?>" class="" alt="" />
                            </span>
                          </div>
                        <?php endif; ?>
                        <div class="media-body media-middle">
                          <h4 class="media-heading"><?php echo $data_block_section['data_content_block_section_title']; ?></h4>
                          <?php echo $data_block_section['data_content_block_section_content']; ?>
                        </div>
                      </div>
                    <?php endforeach; ?>

                  </div>
                  <?php if($infographic && $i==$len):  ?>
                    <a href="<?php echo $infographic['url']; ?>" target="_blank" class="infographic-link"><?php echo $infographic['caption']; ?></a>
                  <?php endif; ?>
                </section>
              <?php $i++; endforeach; ?>
            </div><!-- #data-main -->
          </div><!-- .process-main-content -->
        </div><!-- .col-sm-8 -->
      </div><!-- #data.row -->
          
      <div class="row" id="decisions">
        <div class="col-sm-4">
          <div class="nav-sidebar hidden-xs our-process-sidebar2">
            <div class="sidebar-section">

              <section class="sidebar-sub-section" data-process_section="decisions">
                <h2 class="sidebar-section-title">Decisions</h2>
                <div class="sidebar-section-content">
                  <hr />
                  <h3><?php the_field('decisions_sidebar_title'); ?></h3>
                  <hr />
                  <?php the_field('decisions_sidebar_content'); ?>
                  <div class="sub-section-links">
                    <?php foreach($decisions_blocks as $decisions_block): ?>
                      <a href="#<?php echo sanitize_title($decisions_block['decisions_content_block_title']); ?>" class="smooth-scroll"><?php echo $decisions_block['decisions_content_block_title']; ?></a>
                    <?php endforeach; reset($decisions_blocks); ?>
                  </div>
                </div>
              </section>
              
              <div class="sidebar-section-footer">
                <a href="<?php echo home_url('contact'); ?>">Get in Touch<span class="glyphicon glyphicon-menu-right"></span></a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="process-main-content" role="main">
            <div id="decisions-main">
              <!--<span class="our-process-offset"></span>-->
              <?php $i=1; $len=count($decisions_blocks); foreach($decisions_blocks as $decisions_block): ?>
                <section id="<?php echo sanitize_title($decisions_block['decisions_content_block_title']); ?>" class="main-section">
                  <header class="main-content-header">
                    <h2><?php echo $decisions_block['decisions_content_block_title']; ?></h2>
                  </header>
                  <div class="main-content-body">
                    <?php if($decisions_block['decisions_content_block_top_image']): ?>
                      <img src="<?php echo $decisions_block['decisions_content_block_top_image']; ?>" class="img-responsive center-block" alt="" />
                    <?php endif; ?>

                    <?php foreach($decisions_block['decisions_content_block_sections'] as $decisions_block_section): ?>
                      <div class="media">
                        <?php if($decisions_block_section['decisions_content_block_section_image']): ?>
                          <div class="media-left media-middle">
                            <span class="">
                              <img src="<?php echo $decisions_block_section['decisions_content_block_section_image']; ?>" class="" alt="" />
                            </span>
                          </div>
                        <?php endif; ?>
                        <div class="media-body media-middle">
                          <h4 class="media-heading"><?php echo $decisions_block_section['decisions_content_block_section_title']; ?></h4>
                          <?php echo $decisions_block_section['decisions_content_block_section_content']; ?>
                        </div>
                      </div>
                    <?php endforeach; ?>

                  </div>
                  <?php if($infographic && $i==$len): ?>
                    <a href="<?php echo $infographic['url']; ?>" target="_blank" class="infographic-link"><?php echo $infographic['caption']; ?></a>
                  <?php endif; ?>
                </section>
              <?php $i++; endforeach; ?>
            </div><!-- #decisions-main -->
          </div><!-- .process-main-content -->
        </div><!-- .col-sm-8 -->
      </div><!-- #decisions.row -->
    </div><!-- .container -->
  </div><!-- #our-process-content -->

<?php get_footer(); ?>