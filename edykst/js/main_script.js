function showHide(element_id) {

    but_act = document.querySelector('.div_input');

    if(element_id.indexOf('blok') + 1)
        (element_id !== "blok_js")?(hide_blok = "blok_js"):(hide_blok = "blok_css");
    else if(element_id.indexOf('form') + 1)
        if(element_id !== "form_login") {
            hide_blok = "form_login";
            but_act.children[0].classList.add("input_inactive");
            but_act.children[1].classList.add("input_active");
            but_act.children[0].classList.remove("input_active");
            but_act.children[1].classList.remove("input_inactive");
        } else {
            hide_blok = "form_sign";
            but_act.children[0].classList.add("input_active");
            but_act.children[1].classList.add("input_inactive");
            but_act.children[0].classList.remove("input_inactive");
            but_act.children[1].classList.remove("input_active");
        }

    if (document.getElementById(element_id)) {
        var obj = document.getElementById(element_id);
        if (obj.style.display !== "block") {
            obj.style.display = "block";
            document.getElementById(hide_blok).style.display = "none"}
    }
}
