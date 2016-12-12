/**
 * Created by ivan on 10/12/16.
 */
$(function(){

    $('.post').click(function (e) {

        var idComment = e.target.attributes[0].value;

        if (idComment === 'add-comment') {
            e.preventDefault();
            e.stopImmediatePropagation();

            $(this).keypress(function (e) {

                var commentInput = e.target;

                var boxComment = e.target.parentNode.parentNode.parentNode.parentNode;

                var newComment = boxComment.querySelector('#new-comment');

                var countComment = boxComment.querySelector('.box-body').querySelector('.comentbadge');

                var form = e.target.parentNode.parentNode;

                var url = form.getAttribute('action');

                if ( e.which === 13 ) {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    var comment = commentInput.value;

                    $.ajax({
                        method: 'POST',
                        url: url,
                        data:   {
                            comment:    comment,
                            _token:     token
                        }
                    }).done(function (result) {
                        var data = result;
                        data.url = urlDelComment.replace(':commentId', data['commentId']);
                        data.user_avatar = assetImg + data['user_avatar'];
                        countComment.textContent = parseInt(countComment.textContent) + 1;
                        $(newComment).append(showComment(data));
                        commentInput.value = '';

                        $(".clcoment").hide();

                        $(".comment-text").on("mouseover", function () {
                            $(this).find(".clcoment").show();
                        });
                        $(".comment-text").on("mouseleave", function () {
                            $(this).find(".clcoment").hide();
                        });
                    });



                }
            });
        }
    });

    function showComment(data) {
        var newComment = '';

        /* Begin Comment Box */

        newComment += '<div class="box-footer box-comments" style="display: block;">';
        newComment += '<div class="box-comment" data-commentId="' + data['commentId'] + '">';
        newComment += '<img src="'+ data['user_avatar'] + '" class="img-circle img-sm" alt="User Image">';
        newComment += '<div class="comment-text">';
        newComment += '<span class="usernamecom">' + data['user_name'] + ' ' + data['user_surname'];

        newComment += '<span><a class="clcoment" id="close-comment" href="' + data['url'] + '"><i class="fa fa-close fright fa-lg"></i></a></span>';
        newComment += '<span class="text-muted pull-right">' + data['fecha_comment'] + '</span>';

        newComment += '</span>';

        newComment += data['comment'];

        newComment += '</div>';
        newComment += '</div>';
        newComment += '</div>';

        /* End Comment Box*/

        return newComment;
    }

});
