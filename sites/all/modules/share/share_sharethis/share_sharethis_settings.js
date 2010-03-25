// $Id: share_sharethis_settings.js,v 1.1.2.1 2008/12/01 21:03:49 greenskin Exp $

if (Drupal.jsEnabled) {
  $(document).ready(function() {
    var services = Array();
	  $("#share-sharethis-settings-services input").each(function(i) {
      if ($(this).attr('checked')) {
        services.push($(this).val());
      }
      $(this).click(function() {
        var servicesOrder = $("#edit-services-order").val();
        servicesOrder = servicesOrder.split(',');
        if ($(this).attr('checked')) {
          servicesOrder.push($(this).val());
        } else {
          removeItem(servicesOrder, $(this).val());
        }
        $("#edit-services-order").val(servicesOrder);
      });
    });
    $("#edit-services-order").val(services);
  });
}

function removeItem(array, item) {
  for (var i in array) {
    if (array[i] == item) {
      array.splice(i, 1);
    } else {
      i++;
    }
  }
  return array;
}
