
(function($) {
    'use strict';

    $.entwine('sirtrevoreditor', function($){
      // new SirTrevor.Editor({ el: $('.js-sirtrevorfield') });
      $('textarea.sirtrevoreditor').entwine({
        Editor: null,
        onadd: function() {
          console.log('onadd');
        },
        getEditor: function() {
        },
        onmatch: function() {
          // FIXME: this prohibits multiple instances on same page
          var editor = SirTrevor.getInstance();
          console.log(editor);
          if(editor) {
            editor.reinitialize({el: this});
          }
          else {
            new SirTrevor.Editor({ el: this });
          }
        },

        'from .cms-edit-form': {
          onbeforesubmitform: function(e) {
            // this.getEditor().save();
            SirTrevor.onBeforeSubmit();
            console.log('onbeforesubmitform');
            this._super();
          }
        },
      });
    });

})(jQuery);
