
function khonghienthidanhsach(id,cc){

    $(`#${cc}`).toggleClass("undisplay");
    if($(`#plus-${id}`).hasClass("undisplay")) {
        $(`#minus-${id}`).addClass("undisplay");
        $(`#plus-${id}`).addClass("display");
        $(`#plus-${id}`).removeClass("undisplay");
    }
    else {
        $(`#plus-${id}`).addClass("undisplay");
        $(`#minus-${id}`).addClass("display");
        $(`#minus-${id}`).removeClass("undisplay");
    }
}
