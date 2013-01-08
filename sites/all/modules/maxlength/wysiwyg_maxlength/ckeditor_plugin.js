(function() {
  CKEDITOR.plugins.add('maxlength', {
    init: function(e, pluginPath) {
      element = e.name;
      for (var id in Drupal.settings.maxlength) {
        if (id == element) {
          var limit = Drupal.settings.maxlength[id];
          var raw = e.getData().length;
          var text = maxlength_strip_html(e.getData()).length;
          Drupal.settings.maxlength[id] = Drupal.settings.maxlength_original[id];
        }
      }
      maxlength_handler(e);
      setInterval(function() {maxlength_handler(e);}, 500);
    }
  });
})();

function maxlength_handler(e) {
  txt = maxlength_strip_html(e.getData());
  element = e.name;
        
  for (var id in Drupal.settings.maxlength) {
    if (id == element) {
      var limit = Drupal.settings.maxlength[id];
      // calculate the remaining count of chars
      var remainingCnt = limit - txt.length;
      // update the remaing chars text
      $('#maxlength-'+element.substr(5) + ' span.maxlength-counter-remaining').html(remainingCnt.toString());
      
      if (remainingCnt >= 0) {
        e.fire( 'saveSnapshot' );
      }

      if (remainingCnt < 0) {
        e.execCommand( 'undo' );
      }
    }
  }
}

function maxlength_strip_html(value) {
  //1. remove html tags
  //2. replace multiple spaces by only one
  //3. consider HTML entities (&eacute; for example) as one character (artificially replaced by the character 'X')
  //4. remove white spaces at the beginning and end of the text.
  // return value.replace(/<[^>]*>/g, '').replace(/\s+/g, ' ').replace(/&\w+;/g ,'X').replace(/^\s*/g, '').replace(/\s*$/g, '');
  return value.replace(/[\r\n]+/g, 'X').replace(/<[^>]*>/g, '').replace(/&\w+;/g ,'X');
}