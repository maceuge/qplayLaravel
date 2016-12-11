/**
 * Creado por el Desarrollador Eugenio Vorontsov en 9/12/2016.
 */

$(document).ready(function () {
    // Codigo para eliminar el post
    $('.post').on('click', function (e) {

        e.preventDefault();
        e.stopImmediatePropagation();

        var target = e.target.parentNode;

        var targetElementId = target.getAttribute('id');

        if (targetElementId === 'closepost') {

            var postId = e.target.parentNode.parentNode.dataset['idpost'];

            var box = e.target.parentNode.parentNode.parentNode.parentNode;

            $.ajax({
                method: 'DELETE',
                url: urldel,
                data: {postId: postId, _token: token}
            }).done(function (msg) {
                    console.log(msg['mensaje']);
                    //$(box).fadeOut('slow');
                    $(box).fadeTo(100, 1000).slideUp(1000, function(){
                        $(box).slideUp(1000);
                    });
            });

            console.log(postId, box);

        }


        /*
        $.ajax({
            method: 'DELETE',
            url: urldel,
            data: {postId: postId, _token: token}
        })
        .done(function (msg) {
            console.log(msg['mensaje']);
            //$(box).fadeOut('slow');
            $(box).fadeTo(100, 1000).slideUp(1000, function(){
                $(box).slideUp(1000);
            });
        });
        */
    });
});