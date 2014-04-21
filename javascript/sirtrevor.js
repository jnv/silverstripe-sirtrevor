(function($) {
    'use strict';
    $.entwine('sirtrevorfield', function($){
      $('.js-sirtrevorfield').entwine({
        onmatch: function() {
          this.instance = new SirTrevor.Editor({ el: this });
        }
      });
    });

})(jQuery);
