<?php get_header(); ?>
  <nav id="page-navs" class="hidden-xs">
    <div id="page-progress" class="justified-nav our-process-main-nav">
      <ul class="nav nav-tabs nav-justified">
        <li><a href="#our-process-content" class="smooth-scroll">Designs</a></li>
        <li><a href="#data" class="smooth-scroll">Data</a></li>
        <li><a href="#decisions" class="smooth-scroll">Decisions</a></li>
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
          <li><a href="#<?php echo sanitize_title($designs_block['designs_content_block_title']; ?>" class="smooth-scroll" data-scroll_offset="220"><?php echo $designs_block['designs_content_block_title']; ?></a></li>
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
      <div class="row">
        <div class="col-sm-4">
          <div id="our-process-sidebar" class="nav-sidebar hidden-xs">
            <div class="sidebar-section">
              <section class="sidebar-sub-section" data-process_section="designs">
                <h2 class="sidebar-section-title process-notshown">Designs</h2>
                <div class="sidebar-section-content">
                  <hr />
                  <h3><?php the_field('designs_sidebar_title'); ?></h3>
                  <hr />
                  <?php the_field('designs_sidebar_content'); ?>
                  <div class="sub-section-links">
                    <?php foreach($designs_blocks as $designs_block): ?>
                      <a href="#<?php echo sanitize_title($designs_block['designs_content_block_title']); ?>" class="smooth-scroll" data-scroll_offset="220"><?php echo $designs_block['designs_content_block_title']; ?></a>
                    <?php endforeach; reset($designs_blocks); ?>
                  </div>
                </div>
              </section>
              <section class="sidebar-sub-section" data-process_section="data">
                <h2 class="sidebar-section-title process-notshown">Data</h2>
                <div class="sidebar-section-content">
                  <hr />
                  <h3><?php the_field('data_sidebar_title'); ?></h3>
                  <hr />
                  <?php the_field('data_sidebar_content'); ?>
                  <div class="sub-section-links">
                    <?php foreach($data_blocks as $data_block): ?>
                      <a href="#<?php echo sanitize_title($data_block['data_content_block_title']); ?>" class="smooth-scroll" data-scroll_offset="220"><?php echo $data_block['data_content_block_title']; ?></a>
                    <?php endforeach; reset($data_blocks); ?>
                  </div>
                </div>
              </section>
              <section class="sidebar-sub-section" data-process_section="decisions">
                <h2 class="sidebar-section-title process-notshown">Decisions</h2>
                <div class="sidebar-section-content">
                  <hr />
                  <h3><?php the_field('decisions_sidebar_title'); ?></h3>
                  <hr />
                  <?php the_field('decisions_sidebar_content'); ?>
                  <div class="sub-section-links">
                    <?php foreach($decisions_blocks as $decisions_block): ?>
                      <a href="#<?php echo sanitize_title($decisions_block['decisions_content_block_title']); ?>" class="smooth-scroll" data-scroll_offset="220"><?php echo $decisions_block['decisions_content_block_title']; ?></a>
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
            <div id="designs">
              <?php foreach($designs_blocks as $designs_block): ?>
                <section id="<?php echo sanitize_title($designs_block['designs_content_block_title']; ?>" class="main-section">
                  <header class="main-content-header">
                    <h2><?php echo $designs_block['designs_content_block_title']; ?></h2>
                  </header>
                  <div class="main-content-body">

                    <?php if($designs_block['designs_content_block_top_image']): ?>
                      <img src="<?php echo $designs_block['designs_content_block_top_image']; ?>" class="img-responsive center-block" alt="" />
                    <?php endif; ?>

                    <?php if(have_rows('designs_content_block_sections')): while(have_rows('designs_content_block_section')): the_row(); ?>
                      <div class="media">
                        <?php if(get_sub_field('designs_content_block_section_image')): ?>
                          <div class="media-left media-middle">
                            <span class="">
                              <img src="<?php the_sub_field('designs_content_block_section_image'); ?>" class="img-circle" alt="" />
                            </span>
                          </div>
                        <?php endif; ?>
                        <div class="media-body media-middle">
                          <h4 class="media-heading"><?php the_sub_field('designs_content_block_section_title'); ?></h4>
                          <?php the_sub_field('designs_content_block_section_content'); ?>
                        </div>
                      </div>
                    <?php endwhile; endif; ?>

                  </div>
                  <?php if($infographic): ?>
                    <a href="<?php echo $infographic['url']; ?>" target="_blank" class="infographic-link"><?php echo $infographic['caption']; ?></a>
                  <?php endif; ?>
                </section>
              <?php endforeach; ?>

            </div>

            <div id="data">
              <?php foreach($data_blocks as $data_block): ?>
                <section id="<?php echo sanitize_title($data_block['data_content_block_title']); ?>" class="main-section">
                  <header class="main-content-header">
                    <h2><?php echo $data_block['data_content_block_title']; ?></h2>
                  </header>
                  <div class="main-content-body">
                    <?php if($data_block['data_content_block_top_image']): ?>
                      <img src="<?php echo $data_block['data_content_block_top_image']; ?>" class="img-responsive center-block" alt="" />
                    <?php endif; ?>

                    <?php if(have_rows('data_content_block_sections')): while(have_rows('data_content_block_sections')): the_row(); ?>
                      <div class="media">
                        <?php if(get_sub_field('data_content_block_section_image')): ?>
                          <div class="media-left media-middle">
                            <span class="">
                              <img src="<?php the_sub_field('data_content_block_section_image'); ?>" class="img-circle" alt="" />
                            </span>
                          </div>
                        <?php endif; ?>
                        <div class="media-body media-middle">
                          <h4 class="media-heading"><?php the_sub_field('data_content_block_section_title'); ?></h4>
                          <?php the_sub_field('data_content_block_section_content'); ?>
                        </div>
                      </div>
                    <?php endwhile; endif; ?>

                  </div>
                  <?php if($infographic):  ?>
                    <a href="<?php echo $infographic['url']; ?>" target="_blank" class="infographic-link"><?php echo $infographic['caption']; ?></a>
                  <?php endif; ?>
                </section>
              <?php endforeach; ?>
            </div>

            <div id="decisions">
              <?php foreach($decisions_blocks as $decisions_block): ?>
                <section id="<?php echo sanitize_title($decisions_block['decisions_content_block_title']); ?>" class="main-section">
                  <header class="main-content-header">
                    <h2><?php echo $decisions_block['decisions_content_block_title']; ?></h2>
                  </header>
                  <div class="main-content-body">
                    <?php if($decisions_block['decisions_content_block_top_image']): ?>
                      <img src="<?php echo $decisions_block['decisions_content_block_top_image']; ?>" class="img-responsive center-block" alt="" />
                    <?php endif; ?>

                    <?php if(have_rows('decisions_content_block_sections')): while(have_rows('decisions_content_block_sections')): the_row(); ?>
                      <div class="media">
                        <?php if(get_sub_field('decisions_content_block_section_image')): ?>
                          <div class="media-left media-middle">
                            <span class="">
                              <img src="<?php the_sub_field('decisions_content_block_section_image'); ?>" class="img-circle" alt="" />
                            </span>
                          </div>
                        <?php endif; ?>
                        <div class="media-body media-middle">
                          <h4 class="media-heading"><?php the_sub_field('decisions_content_block_section_title'); ?></h4>
                          <?php the_sub_field('decisions_content_block_section_content'); ?>
                        </div>
                      </div>
                    <?php endwhile; endif; ?>

                  </div>
                  <a href="<?php echo $infographic['url']; ?>" target="_blank" class="infographic-link"><?php echo $infographic['caption']; ?></a>
                </section>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>