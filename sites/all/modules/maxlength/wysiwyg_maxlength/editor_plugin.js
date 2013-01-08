(function() {
  tinymce.create('tinymce.plugins.maxlengthPlugin', {
  
    getInfo : function() {
      return {
        longname : 'Drupal maxlength',
        author : 'Drupal',
        authorurl : '',
        infourl : '',
        version : '$Revision: 1.0 $'
      };
    },
    /**
     * Gets executed when a TinyMCE editor instance is initialized.
     *
     * @param {TinyMCE_Control} Initialized TinyMCE editor control instance. 
     */
    init : function(ed, url) {      
      ed.onKeyDown.addToTop(this.handler);
      ed.onPaste.addToTop(this.handler);
      ed.onRedo.addToTop(this.handler);
      ed.onUndo.addToTop(this.handler);
      ed.onClick.addToTop(this.handler);
    },
    handler : function(e) {
      
      txt = strip_tags(tinyMCE.activeEditor.getContent().split('&nbsp;').join(' '));
      element = e.id;
            
      for (var id in Drupal.settings.maxlength) {      
        if (id == element) {
          var limit = Drupal.settings.maxlength[id];
          // calculate the remaining count of chars
          var remainingCnt = limit - txt.length;
          // update the remaing chars text
          $('#maxlength-'+element.substr(5) + ' span.maxlength-counter-remaining').html(remainingCnt.toString());
          
          if (remainingCnt == 0) {
            tinyMCE.activeEditor.execCommand('mceAddUndoLevel');
          }
          
          if (remainingCnt < 0) {
            tinyMCE.activeEditor.execCommand('Undo');
          }
        }
      }
    }
  
  });

  // Register plugin
  tinymce.PluginManager.add('maxlength', tinymce.plugins.maxlengthPlugin);
  
})();

function strip_tags (input, allowed) {
  // Strips HTML and PHP tags from a string  
  allowed = (((allowed || "") + "")
      .toLowerCase()
      .match(/<[a-z][a-z0-9]*>/g) || [])
      .join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
  var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
    commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
  return input.replace(commentsAndPhpTags, '').replace(tags, function($0, $1){
    return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
  });
}