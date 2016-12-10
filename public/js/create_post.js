/**
 * Created by ivan on 9/12/16.
 */

$(function(){
    $('#btn-crear-post').on('click',  function (e) {
        e.preventDefault();
        $.ajax({
            method:  'POST',
            url:    urlCreatePost,
            data:   {
                        body:   $('#post-body').val(),
                        _token: token
                    }
        }).done(function (message) {
            console.log(message['post_body']);
            var templateData = message;
            renderTemplate(templateData);
        });
    });
    //var urlTemplatePost;
    function renderTemplate(data) {
        var newPost = '';
        newPost += '<div class="box box-widget bordered-palegreen" id="post-box">';
        newPost += '<div class="box-header with-border bordered-palegreen">';
        newPost += '<div class="user-block"  data-idpost="' + data['postId'] + '">';


        newPost += '<img src="' + urlImg + data['user_avatar'] + '" class="img-circle"  alt="User Image">';
        newPost += '<span class="usernamebox">'+ data['user_name'] + ' ' + data['user_surname'] + '</span>';

        newPost += '<a class="close clpost" id="closepost" href=""><i class="fa fa-close fright"></i></a>';
        newPost += '<span class="description">Publicado - ' + data['fecha_post'] + '</span>';
        newPost += '</div>';
        newPost += '</div>';



        newPost += '<div class="box-body" style="display: block;" data-postid="' + data['postId'] + '">';
        newPost += '<p class="posted" id="contenido'+ data['postId'] +'">' + data['post_body'] + '</p>';
        newPost += '</div>';

        
        newPost += '</div>';

        newPost += '';

        $('#new-post').append(newPost);
    }
    console.log(urlTemplatePost);

});
