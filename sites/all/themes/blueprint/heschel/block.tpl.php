<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="<?php print $classes; ?> <?php print block_class($block); ?>">

<?php if ($block->subject): ?>
  <h3><?php print $block->subject ?></h3>
<?php endif;?>

  <div class="content"><?php print $block->content ?></div>
  <?php print $edit_links; ?>

</div>
