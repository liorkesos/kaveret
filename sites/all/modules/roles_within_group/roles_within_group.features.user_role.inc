<?php

/**
 * Implementation of hook_user_default_roles().
 */
function roles_within_group_user_default_roles() {
  $roles = array();

  // Exported role: לנהל את הקבוצה שלי
  $roles['לנהל את הקבוצה שלי'] = array(
    'name' => 'לנהל את הקבוצה שלי',
  );

  // Exported role: לערוך תוכן בקבוצה שלי
  $roles['לערוך תוכן בקבוצה שלי'] = array(
    'name' => 'לערוך תוכן בקבוצה שלי',
  );

  return $roles;
}
