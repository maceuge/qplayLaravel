/**
 * Creado por el Desarrollador Eugenio Vorontsov en 9/12/2016.
 */

var postId = 0;

$(document).ready(function () {
    // Codigo para eliminar el post
    $('.user-block').find('#closepost').on('click', function (evt) {
        evt.preventDefault();
        postId = evt.target.parentNode.parentNode.dataset['idpost'];
        var box = evt.target.parentNode.parentNode.parentNode.parentNode;

        $.ajax({
            method: 'DELETE',
            url: urldelete,
            data: {postId: postId, _token: token}
        })
        .done(function (msg) {
            console.log(msg['mensaje']);
            //$(box).fadeOut('slow');
            $(box).fadeTo(100, 1000).slideUp(1000, function(){
                $(box).slideUp(1000);
            });
        });
    });
});