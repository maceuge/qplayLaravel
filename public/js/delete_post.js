/**
 * Creado por el Desarrollador Eugenio Vorontsov en 9/12/2016.
 */

$(document).ready(function () {

    // Codigo para eliminar el post
    // $('.user-block').find('#closepost').on('click', function (evt) {
    //     evt.preventDefault();
    //     postId = evt.target.parentNode.parentNode.dataset['idpost'];
    //     var box = evt.target.parentNode.parentNode.parentNode.parentNode;
    //
    //     $.ajax({
    //         method: 'DELETE',
    //         url: urldelete,
    //         data: {postId: postId, _token: token}
    //     })
    //     .done(function (msg) {
    //         console.log(msg['mensaje']);
    //         $(box).fadeOut('slow');
            // $(box).fadeTo(100, 1000).slideUp(1000, function(){
            //     $(box).slideUp(1000);


    // Delete post
    $('.post').on('click', function (e) {

        var target = e.target.parentNode;
        var targetElementId = target.getAttribute('id');

        if (targetElementId === 'closepost') {
            e.preventDefault();
            e.stopImmediatePropagation();

            var postId = e.target.parentNode.parentNode.dataset['idpost'];
            var box = e.target.parentNode.parentNode.parentNode.parentNode;

            $.ajax({
                method: 'DELETE',
                url: urldelete,
                data: {postId: postId, _token: token}
            }).done(function (result) {
                    $(box).slideUp(700);
            });
        }
    });
});