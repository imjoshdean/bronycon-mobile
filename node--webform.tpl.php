<article>
  <h1><?php print $title; ?></h1>
  <?php print $node->body[LANGUAGE_NONE][0]['value']; ?>
  <?php print render($content['webform']); ?>
</article>