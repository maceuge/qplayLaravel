/**
 * Creado por el Desarrollador Eugenio Vorontsov en 9/12/2016.
 */

var postBodyElement = null;
var postId = 0;

$(document).ready(function () {
    // Codigo para etitar el post
    $('.box-body').find("#edit").on('click', function (evt) {
        evt.preventDefault();
        postBodyElement = evt.target.parentNode.childNodes[1];
        var postBody = postBodyElement.textContent;
        postId = evt.target.parentNode.dataset['postid'];
        $('#post-body').val(postBody);
        $('#edit-modal').modal();
    })

    $('#modal-save').on('click', function () {
        $.ajax({
            method: 'POST',
            url: url,
            data: {body: $('#post-body').val(), postId: postId, _token: token}
        })
        .done(function (msg) {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });
    });

});
