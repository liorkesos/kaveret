<?php

/**
 * Show attribute values rather than keys in Storm Views fields.
 */

class stormattribute_handler_field_attributes_domain extends views_handler_field {

  function render($values) {
    $key = $values->{$this->field_alias};
    $value = stormattribute_value($this->definition['domain'], $key);
    return check_plain($value);
  }

}