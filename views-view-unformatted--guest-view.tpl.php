<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div data-role="collapsible-set" data-inset="false">
<?php foreach ($rows as $id => $row): ?>
  <div <?php if ($classes_array[$id]) { print 'class="bio ' . $classes_array[$id] .'"';  } ?> data-role="collapsible">
    <?php print $row; ?>
    <div class="clear"></div>
  </div>
<?php endforeach; ?>
</div>