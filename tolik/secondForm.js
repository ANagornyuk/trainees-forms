$(document).ready(function () {

  // Add class to elements
  $("#sign-up-tab, #sign-up").addClass('active');
  $("#login-button").addClass('background-green');
  $("#button").addClass('background-yellow');

  // Add styles
  $("body").css({"width": "475px"});

  // Top tabs
  $("div#log-in-tab").click(function () {
    if (!$(this).hasClass("active")) {
      $("div#log-in-tab, div#sign-up-tab").toggleClass("active");
      $("div#log-in, div#sign-up").toggleClass("active");
    }
  });
  $("div#sign-up-tab").click(function () {
    if (!$(this).hasClass("active")) {
      $("div#log-in-tab, div#sign-up-tab").toggleClass("active");
      $("div#log-in, div#sign-up").toggleClass("active");
    }
  });

  // Switch to next form
  // $(".next-form").css('cursor', 'pointer').click(function () {
  //   window.location.replace('form.html')
  // });
  $(".next-form").click(function (event) {
    $("body").load("form.html");
  });

  // Sign Up form Validate
  $("#button").click(function (event) {

    $(".errors div").remove();

    // Validate First Name
    if (!$("#fname").val().trim()) {
      $(".errors").append("<div class='err-fname'>Please enter your First Name</div>");
    }

    // Validate Last Name
    if (!$("#lname").val().trim()) {
      $(".errors").append("<div class='err-lname'>Please enter your Last Name</div>");
    }

    // Validate email
    if (!$("#email").val().trim()) {
      $(".errors").append("<div class='err-email'>Please enter your E-mail</div>");
    } else {
      var emailPattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,6}\.)?[a-z]{2,6}$/i;
      if (!emailPattern.test($('#email').val())) {
        $(".errors").append("<div class='err-email'>You have entered incorrect E-mail</div>");
      }
    }

    // Validate Password
    if (!$("#password").val().trim()) {
      $(".errors").append("<div class='err-pass'>Please enter your Password</div>");
    } else {
      var passPattern = /^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i;
      if (!passPattern.test($('#password').val())) {
        $(".errors").append("<div class='err-pass'>Password must have UpperCase, LowerCase, Number/SpecialChar and min 8 Chars</div>");
      }
    }

    // If there are errors, the button is not active
    if ($(".errors").find("div").length > 0) {
      event.preventDefault()
    }
  });

  // Log In form Validate
  $("#login-button").click(function (event) {

    $(".errors div").remove();

    // Validate login
    if (!$("#login").val().trim()) {
      $(".errors").append("<div class='err-login'>Please enter your Login</div>");
    } else {
      var emailPattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,6}\.)?[a-z]{2,6}$/i;
      if (!emailPattern.test($('#login').val())) {
        $(".errors").append("<div class='err-login'>You have entered incorrect Login</div>");
      }
    }

    // Validate Password
    if (!$("#login-password").val().trim()) {
      $(".errors").append("<div class='err-pass'>Please enter your Password</div>");
    } else {
      var passPattern = /^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i;
      if (!passPattern.test($('#login-password').val())) {
        $(".errors").append("<div class='err-pass'>Password must have UpperCase, LowerCase, Number/SpecialChar and min 8 Chars</div>");
      }
    }

    // If there are errors, the button is not active
    if ($(".errors").find("div").length > 0) {
      event.preventDefault()
    }
  });

  // Remove errors when user change tab
  $("#tabs div").click(function (event) {
    $(".errors div").remove();
  });

});
