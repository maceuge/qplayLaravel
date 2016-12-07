
$(document).ready(function () {
    $(".user-block").ready(function () {
        $(".clpost").hide();
    });

        $(".comment-text").ready(function () {
           $(".clcoment").hide();
        });

    $(".user-block").on("mouseout", function () {
        $(this).find(".clpost").hide();
    });

        $(".comment-text").on("mouseout", function () {
           $(this).find(".clcoment").hide();
        });

    $(".user-block").on("mouseover", function () {
        $(this).find(".clpost").show();
    });

        $(".comment-text").on("mouseover", function () {
            $(this).find(".clcoment").show();
        });
});
