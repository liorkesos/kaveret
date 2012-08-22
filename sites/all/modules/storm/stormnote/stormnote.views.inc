<?php

function stormnote_views_data() {
  $data['stormnote']['table']['group']  = t('Storm Note');
  $data['stormnote']['table']['join'] = array(
    'node' => array(
      'left_field' => 'vid',
      'field' => 'vid',
    ),
  );
  
  $data['stormnote']['organization_nid'] = array(
    'title' => t('Organization'),
    'help' => t('Note -> Organization'),
    'relationship' => array(
      'base' => 'node',
      'field' => 'nid',
      'handler' => 'views_handler_relationship',
      'label' => t('Note -> Organization'),
    ),
  );
  
  $data['stormnote']['organization_title'] = array(
    'title' => t('Organization'),
    'help' => t('Storm Note Organization (title only)'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_string',
    ),
  );
  
  $data['stormnote']['project_nid'] = array(
    'title' => t('Project'),
    'help' => t('Note -> Project'),
    'relationship' => array(
      'base' => 'node',
      'field' => 'nid',
      'handler' => 'views_handler_relationship',
      'label' => t('Note -> Project'),
    ),
  );
  
  $data['stormnote']['project_title'] = array(
    'title' => t('Project'),
    'help' => t('Storm Note Project (title only)'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_string',
    ),
  );
  
  $data['stormnote']['task_nid'] = array(
    'title' => t('Task'),
    'help' => t('Note -> Task'),
    'relationship' => array(
      'base' => 'node',
      'field' => 'nid',
      'handler' => 'views_handler_relationship',
      'label' => t('Note -> Task'),
    ),
  );
  
  $data['stormnote']['task_stepno'] = array(
    'title' => t('Task Step Number'),
    'help' => t('Storm Note Task Step Number'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_string',
    ),
  );
  
  $data['stormnote']['task_title'] = array(
    'title' => t('Task'),
    'help' => t('Storm Note Task (title only)'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_string',
    ),
  );
  
  return $data;
}

function stormnote_views_handlers() {
  return array(
    'info' => array(
      'path' => drupal_get_path('module', 'stormattribute'),
    ),
    'handlers' => array(
      'stormattribute_handler_filter_attributes_domain' => array(
        'parent' => 'views_handler_filter_in_operator',
    ),
    ),
  );
}
