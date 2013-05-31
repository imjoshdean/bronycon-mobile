<article>
  <h1><?php print $title; ?></h1>
  <summary>
    Posted <?php print format_date($created, 'custom', 'n/j/Y');?>
  </summary>
  <?php 
    if (!empty($node->field_image)) :
      $image = field_get_items('node', $node, 'field_image');
      $output = field_view_value('node', $node, 'field_image', $image[0], array(
        'type' => 'image'
      ));

      print render($output);
    endif;
  ?>
  <?php print $node->body[LANGUAGE_NONE][0]['value']; ?>
</article>
