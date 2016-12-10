/**
 * Created by ivan on 10/12/16.
 */
$(function(){
    console.log('add comment');


    $('.post').click(function (e) {
        //console.log(e.target, e.target.attributes[0].value);

        var idComment = e.target.attributes[0].value;

        var boxComment = e.target.parentNode.parentNode.parentNode.parentNode;



        console.log(boxComment);

        if (idComment === 'add-comment') {

            var postId = e.target.parentNode.parentNode.parentNode.dataset['idpost'];

            var form = $('#form-add-comment');

            var url = form.attr('action').replace(':postId', postId);

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
                        data.url = url;
                        $(boxComment).append(showComment(data));
                    });
                    //var comment = e.target.value;

                    //console.log(comment);
                }
                //console.log(e);
            });
        }
    });

    function showComment(data) {
        var newComment = '';


        newComment += '<div class="box-footer box-comments" style="display: block;">';
        newComment += '<div class="box-comment">';
        newComment += ' <img src="{{ $coments->user->avatar }}" class="img-circle img-sm" alt="User Image">';
        newComment += '<div>';
        newComment += '<div>';
        newComment += '<div>';
        newComment += '<div>';



        newComment += '</div>';
        newComment += '</div>';

        newComment += '<div class="box-footer" style="display: block;" data-idpost="' + data['postId'] + '">';
        newComment += '<form action="' + data['url'] + '" method="post" id="form-add-comment">';
        newComment += '<div>';
        newComment += '<div>';
        newComment += '<div>';

        newComment += '<div>';
        newComment += '<div>';
        newComment += '<div>';


        newComment += '</form>';
        newComment += '</div>';




        return newComment;
    }

});
