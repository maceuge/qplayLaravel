/**
 * Created by ivan on 10/12/16.
 */
$(function(){
    console.log('add comment!!!');


    $('.post').click(function (e) {
        //console.log(e.target, e.target.attributes[0].value);

        var idComment = e.target.attributes[0].value;

        var commentInput = e.target;

        var boxComment = e.target.parentNode.parentNode.parentNode.parentNode;

        var newComment = boxComment.querySelector('#new-comment');

        var countComment = boxComment.querySelector('.box-body').querySelector('.badge');

        if (idComment === 'add-comment') {

            var postId = e.target.parentNode.parentNode.parentNode.dataset['idpost'];

            var form = e.target.parentNode.parentNode;

            var url = form.getAttribute('action');

            $(this).keypress(function (e) {
                if ( e.which == 13 ) {
                    e.preventDefault();
                    var comment = e.target.value;

                    $.ajax({
                        method: 'POST',
                        url: url,
                        data:   {
                            comment:    comment,
                            _token:     token
                        }
                    }).done(function (result) {
                        console.log(result['comment']);
                        var data = result;
                        data.url = urlDelComment.replace(':commentId', data['commentId']);
                        data.user_avatar = assetImg + data['user_avatar'];
                        countComment.textContent = parseInt(countComment.textContent) + 1;
                        $(newComment).append(showComment(data));
                        commentInput.value = '';
                    });
                }
            });
        }
    });

    function showComment(data) {
        var newComment = '';

        /* Begin Comment Box */

        newComment += '<div class="box-footer box-comments" style="display: block;">';
        newComment += '<div class="box-comment">';
        newComment += '<img src="'+ data['user_avatar'] + '" class="img-circle img-sm" alt="User Image">';
        newComment += '<div class="comment-text">';
        newComment += '<span class="usernamecom">' + data['user_name'] + ' ' + data['user_surname'];


        newComment += '<span><a class="clcoment" href="' + data['url'] + '"><i class="fa fa-close fright fa-lg"></i></a></span>';
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
