// $Id: share_link.js,v 1.1.2.1 2008/11/11 22:11:35 greenskin Exp $

if (Drupal.jsEnabled) {
  $(document).ready(function() {
    var shares = Drupal.settings.share;
    for (var i in shares) {
      var share = shares[i];
      var link = $("li.share_" + share.shareID + "_" + share.nid);
      $(link).append(share.popup);

      var popup = $(link).children('.share-popup');
      var left = link.get(0).offsetLeft - 2;
      var top = link.get(0).offsetTop + link.height();
      popup.css({ left: left, top: top });
    }
    shareInit();
  });
}