$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // change designations when department changes with ajax
  $('#cmbDept').change(function() {
    $dept_id = $(this).val();
    // console.log($dept_id);
    //Disable our button
    $('#cmbDesig').attr("disabled", true);
    $.ajax({
      url: 'change_designations',
      type: 'POST',
      data: {
        dept_id: $dept_id,
      },
      datatype: 'json',
      success: function(response) {
        $('#cmbDesig').empty();
        for($i = 0; $i < response.length; $i++) {
          console.log(response[$i].name);
          $('#cmbDesig').append('<option value="' + response[$i].id + '">' + response[$i].name + '</option>');
        }
        $('#cmbDesig').attr("disabled", false);
      },
      error: function (data, textStatus, errorThrown) {
        console.log(data);
      }
    });
  });

});
