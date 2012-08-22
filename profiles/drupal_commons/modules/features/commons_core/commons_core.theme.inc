<?php

/**
 * @file
 *   Theme callbacks for commons_core
 */

/**
 * Theme handler for user stats block
 */
function theme_commons_core_user_stats_block($data) {
  $content = '<ul>';
  foreach($data as $item) {
    $content .= '<li>' . $item . '</li>';
  }
  $content .= '</ul>';
  
  return $content;
}

/**
 * Theme handler for the Commons information block
 * 
 * This is used in the footer to link back to acquia.com
 */
function theme_commons_core_info_block() {
 
  $content = '';
 
  /* shahar
      $content .= '<div id="acquia-footer-message">';
      $content .= ' Add Case | Case List ';
      $content .= '</div>';
  */
          
  //shahar
  global $user ;
  if($user->uid != 0){
  $content .= '<div id="fusion-footer-message">';
  $content .= '<a href="/he/node/add/casetracker-basic-case?gids[0]=3">הוספת משימה</a> |
      <a href="/he/casetracker">רשימת משימות</a> |
      <a href="/node/add/casetracker-basic-case?gids[0]=3">Add Case</a> |
      <a href="/casetracker">Case List</a> ';
  $content .= '</div>';
  }                                                    
  return $content;
}

/**
 * Theme handler for the group members and managers block
 */
function theme_commons_core_group_members_block($managers, $members, $link) {
  $content = '';
  if ($managers) {
    $content .= '<div class="group-managers-label">' . t('Managers:') . '</div>';
    $content .= '<div class="group-managers">' . $managers . '</div>';
  }
  if ($members) {
    $content .= '<div class="group-members-label">' . t('Recent members:') . '</div>';
    $content .= '<div class="group-members">' . $members . '</div>';
  }
  if ($link) {
    $content .= '<div class="group-members-link">' . $link . '</div>';
  }
  return $content;
}

/**
 * Remove relationship link
 */
function theme_commons_core_unfollow_link($uid, $rid) {
  return l(
    t('Unfollow'),
    "user/{$uid}/relationships/{$rid}/remove",
    array(
      'title' => array('title' => t('Unfollow')),
      'query' => drupal_get_destination(),
      'attributes' => array('class' => 'user_relationships_popup_link'),
    )
  );
}