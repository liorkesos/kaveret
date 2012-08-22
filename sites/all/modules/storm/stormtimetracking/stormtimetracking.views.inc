<?php

function stormtimetracking_views_data() {
  $data['stormtimetracking']['table']['group']  = 'Storm Timetracking';
  $data['stormtimetracking']['table']['join'] = array(
    'node' => array(
      'left_field' => 'vid',
      'field' => 'vid',
    ),
  );
  
  $data['stormtimetracking']['organization_nid'] = array(
    'title' => t('Organization'),
    'help' => t('Timetracking -> Organization'),
    'relationship' => array(
      'base' => 'node',
      'field' => 'nid',
      'handler' => 'views_handler_relationship',
      'label' => t('Timetracking -> Organization'),
    ),
  );
  
  $data['stormtimetracking']['organization_title'] = array(
    'title' => t('Organization'),
    'help' => t('Storm Timetracking Organization (title only)'),
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
  
  $data['stormtimetracking']['project_nid'] = array(
    'title' => t('Project'),
    'help' => t('Timetracking -> Project'),
    'relationship' => array(
      'base' => 'node',
      'field' => 'nid',
      'handler' => 'views_handler_relationship',
      'label' => t('Timetracking -> Project'),
    ),
  );
  
  $data['stormtimetracking']['project_title'] = array(
    'title' => t('Project'),
    'help' => t('Storm Timetracking Project (title only)'),
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
  
  $data['stormtimetracking']['task_nid'] = array(
    'title' => t('Task'),
    'help' => t('Timetracking -> Task'),
    'relationship' => array(
      'base' => 'node',
      'field' => 'nid',
      'handler' => 'views_handler_relationship',
      'label' => t('Timetracking -> Task'),
    ),
  );
  
  $data['stormtimetracking']['task_stepno'] = array(
    'title' => t('Task Step Number'),
    'help' => t('Storm Timetracking Task Step Number'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_numeric',
    ),
  );
  
  $data['stormtimetracking']['task_title'] = array(
    'title' => t('Task'),
    'help' => t('Storm Timetracking Task (title only)'),
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
  
  $data['stormtimetracking']['ticket_nid'] = array(
    'title' => t('Ticket'),
    'help' => t('Timetracking -> Ticket'),
    'relationship' => array(
      'base' => 'node',
      'field' => 'nid',
      'handler' => 'views_handler_relationship',
      'label' => t('Timetracking -> Ticket'),
    ),
  );
  
  $data['stormtimetracking']['ticket_title'] = array(
    'title' => t('Ticket'),
    'help' => t('Storm Timetracking Ticket (title only)'),
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
  
  $data['stormtimetracking']['trackingdate'] = array(
    'title' => t('Tracking Date'),
    'help' => t('Storm Timetracking Tracking Date'),
    'field' => array(
      'click sortable' => TRUE,
      'handler' => 'views_handler_field_date',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort_date',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_date',
    ),
  );
  
  $data['stormtimetracking']['timebegin'] = array(
    'title' => t('Time Begin'),
    'help' => t('Storm Timetracking Time Begin'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );
  
  $data['stormtimetracking']['timeend'] = array(
    'title' => t('Time End'),
    'help' => t('Storm Timetracking Time End'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );
  
  $data['stormtimetracking']['duration'] = array(
    'title' => t('Duration'),
    'help' => t('Storm Timetracking Duration'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );
  
  $data['stormtimetracking']['billing_duration'] = array(
    'title' => t('Billing Duration'),
    'help' => t('Storm Timetracking Billing Duration'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );
  
  $data['stormtimetracking']['billable'] = array(
    'title' => t('Billable'),
    'help' => t('Storm Timetracking Billable'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
  );
  
  $data['stormtimetracking']['billed'] = array(
    'title' => t('Billed'),
    'help' => t('Storm Timetracking Billed'),
    'field' => array(
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
  );
  
  return $data;
}

function stormtimetracking_views_handlers() {
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
