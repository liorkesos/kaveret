<?php

/**
 * Implementation of hook_user_default_permissions().
 */
function roles_within_group_user_default_permissions() {
  $permissions = array();

  // Exported permission: configure member roles
  $permissions['configure member roles'] = array(
    'name' => 'configure member roles',
    'roles' => array(
      '0' => 'site admin',
    ),
  );

  // Exported permission: override group default role
  $permissions['override group default role'] = array(
    'name' => 'override group default role',
    'roles' => array(
      '0' => 'site admin',
    ),
  );

  return $permissions;
}
