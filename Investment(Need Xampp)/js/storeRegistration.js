
$(document).on('change', 'input', function() {
    // Get the input value
    var value = $(this).val();
  
    // Send the data to the server
    $.ajax({
      url: '',
      method: 'POST',
      data: {
        field: $(this).attr('name'),
        value: value
      }
    });
  });
  