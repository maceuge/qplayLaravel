/**
 * Created by ivan on 10/12/16.
 */
$(function(){
    // Delete comment

    $('.post').click(function (e) {

        var commentDelete = e.target.parentNode;

        var commentAttrId = commentDelete.getAttribute('id');

        if (commentAttrId === 'close-comment') {

            e.preventDefault();
            e.stopImmediatePropagation();

            var box = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;

            var commentId = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.dataset['commentid'];

            var url = urlDelComment.replace(':commentId', commentId);

            var boxComment = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;

            var countComment = boxComment.querySelector('.box-body').querySelector('.badge');

            $.ajax({
                method: 'DELETE',
                url: url,
                data: {
                    commentId: commentId,
                    _token: token
                }
            }).done(function (msg) {
                    //$(box).fadeOut('slow');
                    $(box).fadeTo(100, 500).slideUp(500, function(){
                        $(box).slideUp(500);
                    });
                    countComment.textContent = parseInt(countComment.textContent) - 1;
            });
        }
    });
});