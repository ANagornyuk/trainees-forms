$(document).ready(function () {

  function readImage(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#preview').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#image').change(function () {
    readImage(this);
  });

  $('.edit form').on('submit', (function (e) {
    // e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      type: 'POST',
      url: 'index.php',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        console.log(e);
        printMessage('.message', data);
      },
      error: function (data) {
        console.log(data);
      }
    });
  }));
});
