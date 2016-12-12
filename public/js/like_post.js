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

            var parent = evt.target.parentNode.parentNode.parentNode.parentNode;

            var parentId = parent.hasAttribute('id');

            var isLike = evt.target.previousElementSibling == null;
            var postId = evt.target.parentNode.parentNode.dataset['postid'];

            if (parentId === true) {
                $.ajax({
                    method: 'POST',
                    url: urllike,
                    data: {isLike: isLike, postId: postId, _token: token}
                }).done(function (msg) {
                    var liked = msg['islike'];

                    if (isLike) {
                        if (liked != undefined) {
                            evt.target.childNodes[2].innerText = parseInt(evt.target.childNodes[2].innerText) + 1;
                        } else {
                            evt.target.childNodes[2].innerText = parseInt(evt.target.childNodes[2].innerText) - 1;
                        }
                    } else {
                        if (liked != undefined) {
                            evt.target.childNodes[2].innerText = parseInt(evt.target.childNodes[2].innerText) + 1;
                        } else {
                            evt.target.childNodes[2].innerText = parseInt(evt.target.childNodes[2].innerText) - 1;
                        }
                    }

                    if (isLike) {
                        if (evt.target.nextElementSibling.childNodes[2].innerText == '0') {
                            evt.target.nextElementSibling.childNodes[2].innerText = 0;
                        } else {
                            evt.target.nextElementSibling.childNodes[2].innerText = parseInt(evt.target.nextElementSibling.childNodes[2].innerText) - 1;
                        }
                    } else {
                        if (evt.target.previousElementSibling.childNodes[2].innerText == '0' ) {
                            evt.target.previousElementSibling.childNodes[2].innerText = 0;
                        } else {
                            evt.target.previousElementSibling.childNodes[2].innerText = parseInt(evt.target.previousElementSibling.childNodes[2].innerText) - 1;
                        }
                    }
                });

            } else {
                $.ajax({
                    method: 'POST',
                    url: urllike,
                    data: {isLike: isLike, postId: postId, _token: token}
                }).done(function (msg) {
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
            }
        }
    });
});
