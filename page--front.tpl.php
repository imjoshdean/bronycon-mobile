<?php
  global $base_url;
?>
<div data-role="page" class="front"> 
  <div data-role="header">
    <h1>BronyCon 2013</h1>
  </div> 
  <div data-role="content">
    <section class="secondary-header">
      <?php print render($page['secondary_header']); ?>
    </section>
    <?php print drupal_render(menu_tree('main-menu')); ?>

    <div>
      <?php if ($page['footer_left']): ?>
        <?php print render($page['footer_left']); ?>
      <?php endif; ?>
      <?php if ($page['footer_right']): ?>
        <?php print render($page['footer_right']); ?>
      <?php endif; ?>
    </div>
  </div> 
  <footer>
    <small>&copy;<?php print date('Y');?> BronyCon. My Little Pony: Friendship is Magic and related media belong exclusively to Hasbro, Inc. and Studio B/DHX Media Ltd.</small>
    <a href="<?php print str_replace('m.', '', $base_url); ?>/?nomobi=true" data-ajax="false">Go to full site</a>
  </footer> 
</div> 