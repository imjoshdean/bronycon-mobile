<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<h1>Other Hotels</h1>
<?php foreach ($rows as $id => $row): ?>
<article>
    <?php print $row; ?>
  </article>
<?php endforeach; ?>