<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="<?php print $classes; ?> ">
 <?php
 //$t = print_r($block);
  //die($t);
 ?>
 <div class="frame">
    <?php if ($block->subject): ?>
      <h2><?php print $block->subject ?></h2>
    <?php endif;?>
  
    <div class="content">
      <?php print $block->content?>
    </div>
  </div>
</div>
