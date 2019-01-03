$(document).ready(function () {

  // Swich tab
  $("div.log-in-tab").click(function () {
    if (!$(this).hasClass("active")) {
      $("div.log-in-tab, div.sign-up-tab").toggleClass("active");
      $("div#log-in, div#sign-up").toggleClass("active");
    }
  });

  $("div.sign-up-tab").click(function () {
    if (!$(this).hasClass("active")) {
      $("div.log-in-tab, div.sign-up-tab").toggleClass("active");
      $("div#log-in, div#sign-up").toggleClass("active");
    }
  });

  // Swich to next form
  // $(".next-form").css('cursor', 'pointer').click(function () {
  //   window.location.replace('secondForm.html');
  // });

  $(".next-form").click(function (event) {
    $("body").load("secondForm.html");
  });


});
