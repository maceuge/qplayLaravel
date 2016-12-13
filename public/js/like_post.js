/**
 * Creado por el Desarrollador Eugenio Vorontsov en 10/12/2016.
 */

$(document).ready(function () {

    $('.post').on('click', function (evt) {

        var targetElement = evt.target;
        var elementClass = targetElement.className;

        if (elementClass === 'btn btn-info btn-xs like' || elementClass === 'btn btn-danger btn-xs like') {
            evt.preventDefault();
            evt.stopImmediatePropagation();

            var isLike = evt.target.previousElementSibling == null;
            var postId = evt.target.parentNode.parentNode.dataset['postid'];

            var elementoParent = evt.target.parentNode;

            var likedBadge = $(elementoParent).find('.liked');
            var unLikeBadge = $(elementoParent).find('.disliked');

            $.ajax({
                method: 'POST',
                url: urllike,
                data: {isLike: isLike, postId: postId, _token: token}
            }).done(function (result) {

                likedBadge.text(result['likeNumber']);
                unLikeBadge.text(result['unLikeNumber']);

                //console.log('post viejo:', likedBadge);
            });
        }
    });
});
