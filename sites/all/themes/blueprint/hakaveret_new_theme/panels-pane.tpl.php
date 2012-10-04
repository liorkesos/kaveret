<?php
/**
 * @file panels-pane.tpl.php
 * Main panel pane template
 *
 * Variables available:
 * - $pane->type: the content type inside this pane
 * - $pane->subtype: The subtype, if applicable. If a view it will be the
 *   view name; if a node it will be the nid, etc.
 * - $title: The title of the content
 * - $content: The actual content
 * - $links: Any links associated with the content
 * - $more: An optional 'more' link (destination only)
 * - $admin_links: Administrative links associated with the content
 * - $feeds: Any feed icons or associated with the content
 * - $display: The complete panels display object containing all kinds of
 *   data including the contexts and all of the other panes being displayed.
 */
?>
<div class="<?php print $classes; ?>" <?php print $id; ?>>
  <div class="panel-pane-border">
	  <?php if ($admin_links): ?>
	    <div class="admin-links panel-hide">
	      <?php print $admin_links; ?>
	    </div>
	  <?php endif; ?>
	
	  <?php if ($pane->subtype=="kav_group_block_events_latest" 
	  			|| $pane->subtype=="kav_group_block_blog_latest"
	  			|| $pane->subtype=="kav_group_block_members"): // see http://drupal.org/node/991384#comment-4004824 ?>
	    <div class="panel-pane-header <?php print $pane->subtype; ?>-header">
	      <div class="panel-pane-header-right <?php print $pane->subtype; ?>-header-right">
	  <?php endif; ?>
	
	  <?php if ($title): ?>
	    <h2 class="pane-title"><?php print $title; ?></h2>
	  <?php endif; ?>
	
	  <?php if ($pane->subtype=="kav_group_block_events_latest"
	  			|| $pane->subtype=="kav_group_block_blog_latest"
	  			|| $pane->subtype=="kav_group_block_members"):// see http://drupal.org/node/991384#comment-4004824 ?>
	      </div>
		    <div class="panel-pane-more-link <?php print $pane->subtype; ?>-more-link panel-pane-header-left">
		      <?php if ($pane->subtype=="kav_group_block_members"):?>
                <a href="not yet">הזמנת חברים</a>
		      <?php else :?>
		        <a href="<?php print "not yet"; //$more; ?>">ראה הכל</a>
		      <?php endif;?>

		    </div>
	    </div>
	  <?php endif; ?>
	
	  <?php if ($feeds): ?>
	    <div class="feed">
	      <?php print $feeds; ?>
	    </div>
	  <?php endif; ?>
	
	  <div class="pane-content">
	    <?php print $content; ?>
	  </div>
	
	  <?php if ($links): ?>
	    <div class="links">
	      <?php print $links; ?>
	    </div>
	  <?php endif; ?>
	
	  <?php if ($more): ?>
	    <div class="more-link">
	      <?php print $more; ?>
	    </div>
	  <?php endif; ?>
  </div>
</div>