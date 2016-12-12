/**
 * Creado por el Desarrollador Eugenio Vorontsov en 9/12/2016.
 */

$(document).ready(function () {

    // Codigo para etitar el post
    $('.post').on('click', function (e) {

        var elementTarget = e.target;

        var elementId = elementTarget.getAttribute('id');

        if (elementId === 'edit') {
            e.preventDefault();
            e.stopImmediatePropagation();

            var parent = elementTarget.parentNode.parentNode.parentNode;

            var parentId = parent.hasAttribute('id');

            var postId = elementTarget.parentNode.dataset['postid'];

            if (parentId === true) {

                var postElement = elementTarget.parentNode;
                var postBox = postElement.childNodes[0];
                var postContent = postBox.textContent;

                $('#edit-modal').modal();
                $('#edit-modal').find('#post-body').val(postContent);

            } else {
                var postElement = elementTarget.parentNode;
                var postBox = postElement.childNodes[1];
                var postContent = postBox.textContent;


                $('#edit-modal').modal();
                $('#edit-modal').find('#post-body').val(postContent);
            }

        }

        $('#modal-save').on('click', function () {
            e.preventDefault();

            var postModificado = $('#edit-modal').find('#post-body').val();

            //console.log(postId, postModificado);

            $.ajax({
                method: 'POST',
                url: urledit,
                data: {
                    postContent: postModificado,
                    postId: postId,
                    _token: token
                }
            }).done(function (result) {

                //$(postBox).text(result['postModificado']);
                $(postElement).find('.posted').text(result['postModificado']);

                $('#edit-modal').modal('hide');
            });
        });

    });

    /*
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
     url: urledit,
     data: {body: $('#post-body').val(), postId: postId, _token: token}
     })
     .done(function (msg) {
     $(postBodyElement).text(msg['new_body']);
     $('#edit-modal').modal('hide');
     });
     });
     */

});
