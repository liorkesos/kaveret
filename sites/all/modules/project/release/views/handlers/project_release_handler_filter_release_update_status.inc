<?php

/**
 * Filter release nodes based on their update status.
 */
class project_release_handler_filter_release_update_status extends views_handler_filter_in_operator {
  function get_value_options() {
    $this->value_options = project_release_update_status();
  }
}

