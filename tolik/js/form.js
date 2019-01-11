$(document).ready(function () {

  // Swich tab
  $("div.log-in-tab").click(function () {
    $(".message div").remove();
    if (!$(this).hasClass("active")) {
      $("div.log-in-tab, div.sign-up-tab").toggleClass("active");
      $("div#log-in, div#sign-up").toggleClass("active");
    }
  });

  $("div.sign-up-tab").click(function () {
    $(".message div").remove();
    if (!$(this).hasClass("active")) {
      $("div.log-in-tab, div.sign-up-tab").toggleClass("active");
      $("div#log-in, div#sign-up").toggleClass("active");
    }
  });

  if ($('.message div.err').text().indexOf("You have entered") >= 0) {
    $("div.log-in-tab, div.sign-up-tab").toggleClass("active");
    $("div#log-in, div#sign-up").toggleClass("active");
  }

  $(".next-form").css('cursor', 'pointer').click(function (event) {
    $("body").load("../views/secondForm.php");
  });


});
