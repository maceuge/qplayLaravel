/**
 * Creado por el Desarrollador Eugenio Vorontsov en 10/12/2016.
 */

$(document).ready(function () {

    $('.like').on('click', function (evt) {
        evt.preventDefault();
        var isLike = evt.target.previousElementSibling == null;
        var postId = evt.target.parentNode.parentNode.dataset['postid'];
        $.ajax({
            method: 'POST',
            url: urllike,
            data: {isLike: isLike, postId: postId, _token: token}
        })
        .done(function (msg) {
            var liked = msg['islike'];

            if (isLike) {
                if (liked != undefined) {
                    evt.target.childNodes[3].innerText = parseInt(evt.target.childNodes[3].innerText) + 1;
                } else {
                    evt.target.childNodes[3].innerText = parseInt(evt.target.childNodes[3].innerText) - 1;
                }
            } else {
                if (liked != undefined) {
                    evt.target.childNodes[3].innerText = parseInt(evt.target.childNodes[3].innerText) + 1;
                } else {
                    evt.target.childNodes[3].innerText = parseInt(evt.target.childNodes[3].innerText) - 1;
                }
            }

            if (isLike) {
                if (evt.target.nextElementSibling.childNodes[3].innerText == '0') {
                    evt.target.nextElementSibling.childNodes[3].innerText = 0;
                } else {
                    evt.target.nextElementSibling.childNodes[3].innerText = parseInt(evt.target.nextElementSibling.childNodes[3].innerText) - 1;
                }
            } else {
                if (evt.target.previousElementSibling.childNodes[3].innerText == '0' ) {
                     evt.target.previousElementSibling.childNodes[3].innerText = 0;
                } else {
                    evt.target.previousElementSibling.childNodes[3].innerText = parseInt(evt.target.previousElementSibling.childNodes[3].innerText) - 1;
                }
            }

        });
    });

});
