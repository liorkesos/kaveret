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
  <div id="header" class="span-24 last">

      
      <?php  // if ($search_box): ?>
      <!--  <div id="search-box" class="span-8 last prepend-16">-->
          <?php // print $search_box; ?>
       <!-- </div> <!-- /#search-box -->
      <?php //endif; ?>
      
    <?php print $header ?>
    <?php //if (isset($primary_links)) : ?>
      <?php //print theme('links', $primary_links, array('id' => 'nav', 'class' => 'links primary-links')) ?>
    <?php //endif; ?>
    <?php //if (isset($secondary_links)) : ?>
      <?php //print theme('links', $secondary_links, array('id' => 'subnav', 'class' => 'links secondary-links')) ?>
    <?php //endif; ?>
  </div>
  <div id="second_header">
     <?php print $second_header; ?>
  </div>

  <?php if ($left): ?>
    <div class="span-5"><?php print $left; ?></div>
  <?php endif ?>

  <div class="span-18">
    <?php
      //if ($breadcrumb != '') {
       // print $breadcrumb;
      //}

      if ($tabs != '') {
        print '<div class="tabs">'. $tabs .'</div>';
      }

      if ($messages != '') {
        print '<div id="messages">'. $messages .'</div>';
      }
      //$t = print_r($node->nid , true);
      //die($t);
      if ( $node->nid == "1" ) {
        print '<h1>'. $title .'</h1>';
      }
      print $help; // Drupal already wraps this one in a class
      print $content;
      print $feed_icons;
      if ($site-full-width): 
        print $site-full-width; 
      endif;
    ?>
  </div> 
  <?php if ($right): ?>
    <div class="span-4"><?php print $right; ?></div>
  <?php endif ?>
</div> <!--/* END OF container */-->
  <?php  if ($site_full_width): ?>
    <div id="site_full_width"><?php print $site_full_width; ?> </div>
   <?php endif ?>
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
  <?php print $scripts ?>
  <?php print $closure; ?>
</body>
</html>
