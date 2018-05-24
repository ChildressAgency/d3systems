<div class="social">
  <?php if(get_field('facebook', 'option')): ?>
    <a href="<?php the_field('facebook', 'option'); ?>" class="facebook" title="Facebook" target="_blank"></a>
  <?php endif; if(get_field('linkedin', 'option')): ?>
    <a href="<?php the_field('linkedin', 'option'); ?>" class="linkedin" title="LinkedIn" target="_blank"></a>
  <?php endif; if(get_field('newsletter', 'option')): ?>
    <a href="<?php the_field('newsletter', 'option'); ?>" class="newsletter" title="Newsletter" target="_blank"></a>
  <?php endif; ?>
  <a href="<?php echo home_url('our-work'); ?>" class="d3" title="Our Work"></a>
</div>
