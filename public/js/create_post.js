/**
 * Created by ivan on 9/12/16.
 */

$(function(){

    $('#btn-crear-post').on('click',  function (e) {

        e.preventDefault();
        e.stopImmediatePropagation();

        $.ajax({
            method:  'POST',
            url:    urlCreatePost,
            data:   {
                        body:   $('#post-body').val(),
                        _token: token
                    }
        }).done(function (result) {
            console.log(result['post_body']);

            eraseText();
            var templateData = result;
            renderTemplate(templateData);
        });
    });

    function renderTemplate(data) {
        var newPost = '';
        newPost += '<div class="box box-widget bordered-palegreen" id="post-box">';

        /* begin box-header */
        newPost += '<div class="box-header with-border bordered-palegreen">';
        newPost += '<div class="user-block"  data-idpost="' + data['postId'] + '">';


        newPost += '<img src="' + urlImg + data['user_avatar'] + '" class="img-circle"  alt="User Image">';
        newPost += '<span class="usernamebox">'+ data['user_name'] + ' ' + data['user_surname'] + '</span>';

        newPost += '<a class="close clpost" id="closepost" href="#"><i class="fa fa-close fright"></i></a>';
        newPost += '<span class="description">Publicado - ' + data['fecha_post'] + '</span>';
        newPost += '</div>';
        newPost += '</div>';
        /* end box-header */

        /* begin box-body */
        newPost += '<div class="box-body" style="display: block;" data-postid="' + data['postId'] + '">';
        newPost += '<p class="posted" id="contenido'+ data['postId'] +'">' + data['post_body'] + '</p>';

        newPost += '<a href="" class="btn btn-warning btn-xs" id="edit"><i class="fa fa-edit"></i> Editar</a>';
        newPost += '<a href="" class="btn btn-info btn-xs"><i class="fa fa-thumbs-up"></i> Me Gusta</a>';
        newPost += '<a href="" class="btn btn-danger btn-xs"><i class="fa fa-thumbs-down"></i> No me Gusta</a>';
        newPost += '<span class="pull-right text-muted"><span class="badge">0</span> Comentarios</span>';

        newPost += '</div>';
        /* end box-body */

        /* begin box-footer */

        newPost += '<div class="box-footer" style="display: block;">';

        newPost += '</div>';
        newPost += '</div>';
        newPost += '</div>';
        newPost += '</div>';



        newPost += '</div>';
        /* end box-footer */
        
        newPost += '</div>';

        $('#new-post').append(newPost);
    }

    function eraseText() {
        document.getElementById("post-body").value = "";
    }

});
