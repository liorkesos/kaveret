<?php
// $Id: node.tpl.php,v 1.1.2.1 2008/11/13 08:07:26 tombigel Exp $

/**
 * @file node.tpl.php
 *
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_user().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

<?php print $picture ?>

<?php if (!$page): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>


  <div id="all-upper-title">
    <div id="upper-title"><?php print $title;?></div>
  </div>
    
  <div class="content">
    <?php //print $content ?>
	<?php print $node->body; ?>
  </div>
  
  <div id="inner-image"><?php print theme('imagecache', 'side-inner' , $node->field_inner_image[0]['filepath']); ?></div>
  
  
  <div class="meta">
  <?php if ($submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <?php if ($terms): ?>
    <strong>תגיות:</strong>
    <div class="terms terms-inline">

      <?php
	    $my_country = '';
        if (count($taxonomy)):
          $vocabularies = taxonomy_get_vocabularies();
                 foreach($vocabularies as $vocabulary) {
            if ($vocabularies) {
           $terms = taxonomy_node_get_terms_by_vocabulary($node, $vocabulary->vid);
		   
            $vocab = $vocabulary->name;

            $termlist = '';
              if ($terms) {
                print '<div class="myfield"><div class="label1">' . $vocabulary->name . ': </div> <div class="text1">';
                foreach ($terms as $term) {
				
				  if ($vocab == 'עקרונות') {$termlist = $termlist . l($term->name, str_replace(" ","-",$vocab . "/" . $term->name)) . ', '; $my_country = $term->name; }
				  if ($vocab == 'רשות') $termlist = $termlist . l($term->name, str_replace(" ","-",$vocab . "/" . $term->name)) . ', ';
				  if ($vocab == 'אזור רלוונטי') $termlist = $termlist . l($term->name, str_replace(" ","-",$vocab . "/" . $term->name)) . ', ';
				  //$termlist = $termlist . l($term->name, "term/".$term->tid) . ', ';
                }
                print trim($termlist, ", ");
				print '</div></div>';
              }
            }
          }
          print '<!-- /end of terms -->';
        endif;
      ?>	
	</div>
  <?php endif;?>
  </div>


  <?php print $links; ?>
</div>