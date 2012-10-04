<?php

/**
 * Implementation of hook_strongarm().
 */
function roles_within_group_strongarm() {
  $export = array();

  $strongarm = new stdClass;
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'og_user_roles_default_admin_role';
  $strongarm->value = '8';
  $export['og_user_roles_default_admin_role'] = $strongarm;

  $strongarm = new stdClass;
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'og_user_roles_default_role';
  $strongarm->value = '0';
  $export['og_user_roles_default_role'] = $strongarm;

  $strongarm = new stdClass;
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'og_user_roles_roles_casetracker_basic_project';
  $strongarm->value = array(
    8 => 8,
    9 => 9,
    7 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0,
  );
  $export['og_user_roles_roles_casetracker_basic_project'] = $strongarm;

  $strongarm = new stdClass;
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'og_user_roles_roles_group';
  $strongarm->value = array(
    8 => 8,
    9 => 9,
    7 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0,
  );
  $export['og_user_roles_roles_group'] = $strongarm;

  return $export;
}
