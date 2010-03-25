// $Id: share_settings.js,v 1.2 2008/07/23 22:34:38 greenskin Exp $

if (Drupal.jsEnabled) {
  $(document).ready(function() {
    shareOpenTab("div.tab-title");
    shareOpenTab("div.double-arrows");
  });
}

function shareOpenTab(name) {
  $(name).each(function(i) {
    var id = $(this).parent().parent().attr('id');
    $(this).click(function() {
      var image = $(this).parent();
      $("#" + id + " div.tab-settings").animate({
        height: 'toggle'
      },function() {
        $(image).toggleClass('opened');
      });
    });
  });
}
