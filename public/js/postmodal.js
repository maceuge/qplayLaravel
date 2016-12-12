/**
 * Created by Web Developer on 11/12/2016.
 */

$(document).ready(function () {
    $('.posttext').focusin(function () {
        $('.modalox').fadeIn(500);
    });

    $('.posttext').focusout(function () {
        $('.modalox').fadeOut(500);
    });

});