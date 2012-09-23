Drupal.behaviors.placeholder = function(context) {
  $('input[type=text].placeholder:not([disabled])')
    .focus(function(){ this.value = ''; })
    .removeClass('placeholder');
};
