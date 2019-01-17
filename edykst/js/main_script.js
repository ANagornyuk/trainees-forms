function showHide(element_id) {

    if (element_id.indexOf('blok') + 1){
        switch (element_id) {
            case 'blok_js':
                hide_blok_one = "blok_css";
                hide_blok_two = "blok_ajax";
                break;
            case 'blok_css':
                hide_blok_one = "blok_js";
                hide_blok_two = "blok_ajax";
                break;
            case 'blok_ajax':
                hide_blok_one = "blok_css";
                hide_blok_two = "blok_js";
                break;
        }
        document.getElementById(hide_blok_one).style.display = "none";
        document.getElementById(hide_blok_two).style.display = "none";
    }
    else if(element_id.indexOf('form') + 1) {
        but_act = document.querySelector((element_id.indexOf('ajax') + 1) ? '#but_ajax' : '#but_js');
        if ((element_id !== "form_login") && (element_id !== "form_login_ajax")) {
            document.getElementById((element_id.indexOf('ajax') + 1) ? 'form_login_ajax' : 'form_login').style.display = "none";
            but_act.children[0].classList.add("input_inactive");
            but_act.children[1].classList.add("input_active");
            but_act.children[0].classList.remove("input_active");
            but_act.children[1].classList.remove("input_inactive");
        } else {
            document.getElementById((element_id.indexOf('ajax') + 1) ? 'form_sign_ajax' : 'form_sign').style.display = "none";
            but_act.children[0].classList.add("input_active");
            but_act.children[1].classList.add("input_inactive");
            but_act.children[0].classList.remove("input_inactive");
            but_act.children[1].classList.remove("input_active");
        }
    }

    if (document.getElementById(element_id)) {
        var obj = document.getElementById(element_id);
        if (obj.style.display !== "block") {
            obj.style.display = "block";
        }
    }
}

$(document).ready(function() {
    $('#ajax').click(function() {
        showHide('blok_ajax');
        $('#blok_ajax').load('view/form_js.php');
        $('#blok_ajax').css('display', 'block');
    })
})