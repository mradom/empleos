// $Id: share.js,v 1.2.2.3 2008/11/11 22:11:35 greenskin Exp $

if (Drupal.jsEnabled) {
  $(document).ready(function() {
    shareInit();
  });
}

function shareInit() {
  $("a.share-link").each(function(i) {
    var share = $(this).parent();
    var shareLink = $(this);
    var sharePopup = share.children("div.share-popup");
    var shareHeader = sharePopup.children("div.share-header");
    var shareMenu = shareHeader.children("ul.share-menu").find('a');
    var shareContent = sharePopup.children("div.share-content");

    // Only set click functions if sharePopup.html() is != null
    if (sharePopup.html()) {
      // Open/Close Share popup
      shareLink.click(function() {
        $(sharePopup).animate({
          'height': 'toggle'
        }, 'fast');
        return false;
      });

      // Close Share popup
      shareHeader.children("a.share-close").click(function() {
        $(sharePopup).animate({
          'height': 'hide'
        }, 'fast');
        return false;
      });

      $.each(shareMenu, function(j, n) {
        $(this).click(function() {
          var tabContent = 'div.'+ $(this).parent().attr('class');
          if (sharePopup.find(tabContent).css('display') == 'none') {
            $.each(shareMenu, function(k, o) {
              var otherTabContent = 'div.'+ $(this).parent().attr('class');
              if (sharePopup.find(otherTabContent).css('display') != 'none') {
                sharePopup.find(otherTabContent).animate({
                  'height': 'hide',
                  'opacity': 'hide'
                });
                $(this).toggleClass('selected');
              }
            });
            $(this).toggleClass('selected');
            sharePopup.find(tabContent).animate({
              'height': 'show',
              'opacity': 'show'
            });
          }
          return false;
        });
      });
    }
  });
}
