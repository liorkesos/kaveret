<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>">
<head>
  <title><?php print $head_title ?></title>
  <meta http-equiv="content-language" content="<?php print $language->language ?>" />
  <?php print $meta; ?>
  <?php print $head; ?>
  <?php 
    if ($language->language === 'he') {
      print '<link rel="stylesheet" href="'.$base_path . $bp_library_path.'blueprint/plugins/rtl/screen.css" type="text/css" media="screen, projection">';
    }
  ?>  
  <?php print $styles; ?>

  <!--[if lte IE 7]>
    <link rel="stylesheet" href="<?php print $base_path . $bp_library_path; ?>blueprint/ie.css" type="text/css" media="screen, projection">
    <link href="<?php print $path_parent; ?>css/ie.css" rel="stylesheet"  type="text/css"  media="screen, projection" />
    <?php $styles_ie_rtl['ie']; ?>
  <![endif]-->
  <!--[if lte IE 6]>
    <link href="<?php print $path_parent; ?>css/ie6.css" rel="stylesheet"  type="text/css"  media="screen, projection" />
    <?php $styles_ie_rtl['ie6']; ?>
  <![endif]-->
</head>

<body class="<?php print $body_classes; ?>">

<div class="container">
  <div id="header" class="span-24">
<a href="http://www.hakaveret.org.il/<?php print $language->language ?>/node/965"><div id="hecshel-logo"></div></a>
      <?php print $header; ?>
      <a href="http://www.greenchange.co.il/"  target="_blank"><div id="shinoy" ></div></a>
<div id="top-icons"><ul>
<a href="http://www.facebook.com/HeschelCenter"  target="_blank">
<li id="sprite-facebook" >facebook</li></a>
	<a href="http://www.youtube.com/user/theheschelcenter?feature=results_main"  target="_blank">
<li id="sprite-youtube" >youtube</li>
</a>
		  </ul>
	 </div>	
      <?php if ($search_box): ?>
        <div id="search-box">
          <?php print $search_box; ?>
        </div> <!-- /#search-box -->
      <?php endif; ?>
    
    <?php  //if (  isset($primary_links)) : ?>
      <?php // print theme('links', $primary_links, array('id' => 'nav', 'class' => 'links primary-links')) ?>
    <?php  // endif; ?>
    <?php // if (   isset($secondary_links)) : ?>
      <?php // print theme('links', $secondary_links, array('id' => 'subnav', 'class' => 'links secondary-links')) ?>
    <?php // endif; ?>
  </div>

  <?php if ( $node->nid !== 965 ): ?>
    <div class="span-5"><?php print $left; ?></div>
  <?php endif ?>

  <div class="<?php if ( $node->nid == 965 ){ print 'heschel-homepage';}else{print 'heschel-not-homepage' ;} ?>">
    <?php
      //if ($breadcrumb != '') {
      //  print $breadcrumb;
      //}
	 // $t = print_r($node);  
	  
	 // die($t);  // $tabs != ''
    if (  $user->uid == 1  ) {
        print '<div class="tabs">'. $tabs .'</div>';
    }

      if ($messages != '') {
        print '<div id="messages">'. $messages .'</div>';
      }
     
      if (($title != '')  AND  ( $node->nid  !=  965) ) {
        print '<h1 class="page-title">'. $title .'</h1>';
      }

      print $help; // Drupal already wraps this one in a class

      print $content;
      print $feed_icons;
    ?>

    <?php if ($footer_message || $footer): ?>
      <div id="footer" class="clear">
        <?php if ($footer): ?>
          <?php print $footer; ?>
        <?php endif; ?>
        <?php if ($footer_message): ?>
          <div id="footer-message"><?php print $footer_message; ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php  ?>
  <?php  if ( $node->nid !== '965' ):  ?>
  <?php //die(print_r($node->nid));?>
  <div class="heschel-right"><?php print $right; ?></div>
    <?php // print $right_classes; ?>
  <?php endif ?>

  <?php print $scripts ?>
  <?php print $closure; ?>

</div>

</body>
</html>
