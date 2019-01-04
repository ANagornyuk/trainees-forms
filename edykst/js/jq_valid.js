jQuery(function($) {
    $('#form_login').on('submit', function(event) {
        if ( validate_form_login('#form_login') ) {
            event.preventDefault();
        }
    });
    $('#form_sign').on('submit', function(event) {
        if ( validate_form_sign('#form_sign') ) {
            event.preventDefault();
        }
    });

    $('#form_sign_ajax').submit(    function(e){

        e.preventDefault();
        var $form = $(this);

        validate_form_sign();
        // check if the input is valid
        if(! $form.valid()) return false;

        $.ajax({
            type: 'POST',
            url: 'add.php',
            data: $('#form').serialize(),
            success: function(response) {
                $("#answers").html(response);
            }

        });
    });

    $('#form_login_ajax').on('submit', function(event) {
        event.preventDefault();
        if ( validate_form_login() ) {
            return false;
        }
        // тут ajax запрос
    });

    function validate_form_login(form) {

        (form == "#form_login")?(login = "#login_js", pass = "#pass_js"):(login = "#login_ajax", pass = "#pass_ajax");

        $(".text-error-log").remove();

        var reg = /^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i;
        var el_login = $(login);

        var v_login = el_login.val()?false:true;
        if ( v_login ) {
            el_login.after('<span class="text-error-log for-login">E-mail is required</span>');
            $(".for-login").css({top: el_login.position().top + el_login.outerHeight() + 2});
            $(".for-login").css({left: el_login.position().left  + 9});
        } else if ( !reg.test( el_login.val() ) ) {
            v_login = true;
            el_login.after('<span class="text-error-log for-login">You entered an invalid email address</span>');
            $(".for-login").css({top: el_login.position().top + el_login.outerHeight() + 2});
            $(".for-login").css({left: el_login.position().left  + 9});
        }
        $(login).toggleClass('error', v_login );

        var el_pass = $(pass);
        var v_pass = el_pass.val()?false:true;
        if ( el_pass.val().length < 8 ) {
            var v_pass = true;
            el_pass.after('<span class="text-error-log for-pass">Password must be at least 8 characters</span>');
            $(".for-pass").css({top: el_pass.position().top + el_pass.outerHeight() + 2});
            $(".for-pass").css({left: el_pass.position().left  + 9});
        }
        $(pass).toggleClass('error', v_pass );

        return ( v_login || v_pass);
    }

    function validate_form_sign(form) {

        (form == "#form_sign")?(fn = "#fn_js", ln = "#ln_js", email = "#email_js", pass1 = "#pass1_js", pass2 = "#pass2_js"):(fn = "#fn", ln = "#ln", email = "#email", pass1 = "#pass1", pass2 = "#pass2");

        $(".text-error").remove();

        var el_fn = $(fn);
        var el_ln = $(ln);
        var v_fn = el_fn.val()?false:true;
        var v_ln = el_ln.val()?false:true;
        if ( el_fn.val().length < 4 ) {
            v_fn = true;
            el_fn.after('<span class="text-error for-fn">FirstName at least 4 char</span>');
            $(".for-fn").css({top: el_fn.position().top + el_fn.outerHeight() + 2});
            $(".for-fn").css({left: el_fn.position().left  + 9});
        }
        if ( el_ln.val().length < 4 ) {
            v_ln = true;
            el_ln.after('<span class="text-error for-ln">LastName at least 4 char</span>');
            $(".for-ln").css({top: el_ln.position().top + el_ln.outerHeight() + 2});
            $(".for-ln").css({left: el_ln.position().left  + 14});
        }
        $(fn).toggleClass('error', v_fn );
        $(ln).toggleClass('error', v_ln );

        var reg = /^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i;
        var el_e = $(email);
        var v_email = el_e.val()?false:true;
        if ( v_email ) {
            el_e.after('<span class="text-error for-email">E-mail is required</span>');
            $(".for-email").css({top: el_e.position().top + el_e.outerHeight() + 2});
            $(".for-email").css({left: el_e.position().left  + 9});
        } else if ( !reg.test( el_e.val() ) ) {
            v_email = true;
            el_e.after('<span class="text-error for-email">You entered an invalid email address</span>');
            $(".for-email").css({top: el_e.position().top + el_e.outerHeight() + 2});
            $(".for-email").css({left: el_e.position().left  + 9});
        }
        $(email).toggleClass('error', v_email );

        var el_p1 = $(pass1);
        var el_p2 = $(pass2);
        var v_pass1 = el_p1.val()?false:true;
        var v_pass2 = el_p1.val()?false:true;
        if ( el_p1.val() != el_p2.val() ) {
            var v_pass1 = true;
            var v_pass2 = true;
            el_p1.after('<span class="text-error for-pass1">Passwords do not match!</span>');
            $(".for-pass1").css({top: el_p1.position().top + el_p1.outerHeight() + 2});
            $(".for-pass1").css({left: el_e.position().left  + 9});
        } else if ( el_p1.val().length < 8 ) {
            var v_pass1 = true;
            var v_pass2 = true;
            el_p2.after('<span class="text-error for-pass1">Password must be at least 8 characters</span>');
            $(".for-pass1").css({top: el_p1.position().top + el_p1.outerHeight() + 2});
            $(".for-pass1").css({left: el_e.position().left  + 9});
        }
        $(pass1).toggleClass('error', v_pass1 );
        $(pass2).toggleClass('error', v_pass2 );

        return ( v_fn || v_ln || v_email || v_pass1 || v_pass2 );
    }
});