
(function($) {
    'use strict';

    $.entwine('sirtrevoreditor', function($){
      // new SirTrevor.Editor({ el: $('.js-sirtrevorfield') });
      $('textarea.sirtrevoreditor').entwine({
        Editor: null,
        onadd: function() {
        },
        getEditor: function() {
        },
        onmatch: function() {
          // FIXME: this prohibits multiple instances on same page
          var editor = SirTrevor.getInstance();
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

      // Undo SilverStripe's Overly Attached Selector
      $('.sirtrevoreditor button, .st-format-bar button').entwine({
        onadd: function() {
          this.removeClass('ss-ui-button');
          if(this.data('button'))
            this.button('destroy');
        },
      });

    });

    // $.entwine('ss', function($){
    //   $('.sirtrevoreditor button, .st-format-bar button').entwine({
    //     onadd: function() {
    //       this.removeClass('ss-ui-button');
    //       if(this.data('button'))
    //         this.button('destroy');
    //     }
    //   });
    // });


    var addTypographyClass = function(target) {
      if(target) {
        target.$el.find('.st-block__inner').addClass('typography');
      }
    };

    SirTrevor.EventBus.on('block:create:existing', addTypographyClass);
    SirTrevor.EventBus.on('block:create:new', addTypographyClass);

})(jQuery);
