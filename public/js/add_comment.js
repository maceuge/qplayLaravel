/**
 * Created by ivan on 10/12/16.
 */
$(function(){

    $('.post').on('click keypress',function (e) {

        var idComment = e.target.attributes[0].value;

        if (idComment === 'add-comment') {

            if ( e.which === 13 ) {
                e.preventDefault();
                e.stopImmediatePropagation();

                var commentInput = e.target;

                var boxComment = e.target.parentNode.parentNode.parentNode.parentNode;

                var newCommentBox = boxComment.querySelector('#new-comment');

                var countComment = boxComment.querySelector('.box-body').querySelector('.comentbadge');

                var form = e.target.parentNode.parentNode;

                var url = form.getAttribute('action');

                var comment = commentInput.value;

                $.ajax({
                    method: 'POST',
                    url: url,
                    data:   {
                        comment:    comment,
                        _token:     token
                    }
                }).done(function (result) {

                    commentInput.value = '';

                    if (result['user_avatar'] == '/default_male.jpg' || result['user_avatar'] == '/default_female.jpg' || result['user_avatar'] == '/default_other.jpg') {
                        urlImg = '/img';
                    } else {
                        urlImg = '';
                    }

                    var data = result;
                    data.url = urlDelComment.replace(':commentId', data['commentId']);
                    data.user_avatar = data['user_avatar'];

                    renderTemplate(data, newCommentBox);

                    countComment.textContent = parseInt(countComment.textContent) + 1;

                    $(".clcoment").hide();

                    $(".comment-text").on("mouseover", function () {
                        $(this).find(".clcoment").show();
                    });
                    $(".comment-text").on("mouseleave", function () {
                        $(this).find(".clcoment").hide();
                    });
                });
            }
        }
    });

    function renderTemplate(data, commentBox) {
        var newComment = '';

        /* Begin Comment Box */

        newComment += '<div class="box-footer box-comments" style="display: block;">';
        newComment += '<div class="box-comment" data-commentId="' + data['commentId'] + '">';
        newComment += '<img src="'+ urlImg + data['user_avatar'] + '" class="img-circle img-sm" alt="User Image">';
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

        $(newComment).appendTo(commentBox).hide().slideDown();
    }
});
