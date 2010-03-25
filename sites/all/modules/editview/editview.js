// $Id: editview.js,v 1.3.2.3 2008/11/25 00:34:07 agileware Exp $

function editviewFormCapture() {
  var form_id = $('[@name=form_id]', this).val();
  var delete_form = (form_id == 'editview_delete_form');
  var node_form = form_id && form_id.match(/^editview_node_form_\d+/);
  // This doesn't catch new node forms, we want them to submit normally
  if (node_form || delete_form) {
    var form = this;
    var wrapper = $(form).parent();
    var message = $('#editview_messages');
    var options = {
      url: $('#editview-submit-url').html(),
      dataType: 'json',
      beforeSubmit: function() {
        wrapper.slideUp('slow').hide();
        message.fadeOut('slow').empty();
      },
      success: function(data, status) {
        if (status == 0) {
          alert('Error submitting form');
        }
        if (data['message']) {
          message.append(data['message']).fadeIn('slow');
        }
        wrapper.empty();
        wrapper.append(data['form']).slideDown('slow');

        // TODO: Need a way to generalise required JS for form elements, don't manually call them all
        // Capture the form elements as if the page was just loaded
        $('form', wrapper).each(editviewFormCapture);
        $("input[@type='text'].jscalendar", wrapper).each(jscalendarCapture);
        $('fieldset.collapsible > legend', wrapper).each(editviewFieldsetCapture);
        $('form', wrapper).each(Drupal.textareaAttach);
      }
    }
    // we would just use ajaxForm, except that when you use a
    // file upload field, jquery.form.js has a bug that doesn't
    // send the right 'op', meaning that drupal doesn't know
    // which button was pushed.
    $('input:submit', form).click(function() {
      if ($(this).attr('name') == 'op') {
        $(form).append('<input type="hidden" name="op" value="' + $(this).attr('value') + '" />');
        $(form).ajaxSubmit(options);
        return false;
      }
    });
    // still use this in case the form is submitted without
    // clicking a button (pressing enter in a text field for
    // example)
    $(form).ajaxForm(options);
  }
}

// Ripped out of the ready function for collapse.js in core because it doesn't work
function editviewFieldsetCapture() {
  var fieldset = $(this.parentNode);
  // Expand if there are errors inside
  if ($('input.error, textarea.error, select.error', fieldset).size() > 0) {
    fieldset.removeClass('collapsed');
  }

  // Turn the legend into a clickable link and wrap the contents of the fieldset
  // in a div for easier animation
  var text = this.innerHTML;
  $(this).empty().append($('<a href="#">'+ text +'</a>').click(function() {
    var fieldset = $(this).parents('fieldset:first')[0];
    // Don't animate multiple times
    if (!fieldset.animating) {
      fieldset.animating = true;
      Drupal.toggleFieldset(fieldset);
    }
    return false;
  })).after($('<div class="fieldset-wrapper"></div>').append(fieldset.children(':not(legend)')));
}

$(function(){ if (Drupal.jsEnabled) $("form").each(editviewFormCapture); });
