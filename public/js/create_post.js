/**
 * Created by ivan on 9/12/16.
 */

$(document).ready( function(){

    $('#btn-crear-post').on('click',  function (e) {

        e.preventDefault();
        e.stopImmediatePropagation();
        $('.modalox').fadeOut(500);
        $.ajax({
            method:  'POST',
            url:    urlCreatePost,
            data:   {
                        body:   $('#post-body').val(),
                        _token: token
                    }
        }).done(function (result) {

            eraseText();

            var urlAddCommentReplace = urlAddComment.replace(':postId', result['postId']);

            result.urlAddComment = urlAddCommentReplace;
            result.token = token;
            renderTemplate(result);

            $(".clpost").hide();

            $(".user-block").on("mouseover", function () {
                $(this).find(".clpost").show();
            });
            $(".user-block").on("mouseleave", function () {
                $(this).find(".clpost").hide();
            });
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
        newPost += '<p class="posted">' + data['post_body'] + '</p>';

        newPost += '<a href="" class="btn btn-warning btn-xs" id="edit"><i class="fa fa-edit"></i> Editar</a> ';
        newPost += '<span>';

        newPost += '<a href="" class="btn btn-info btn-xs like">';
        newPost += '<i class="fa fa-thumbs-up"></i>';
        newPost += ' Me Gusta ';
        newPost += '<span class="badge liked">0</span>';
        newPost += '</a> ';

        newPost += '<a href="" class="btn btn-danger btn-xs like"><i class="fa fa-thumbs-down"></i> No me Gusta <span class="badge disliked">0</span></a>';
        newPost += '</span>';
        newPost += '<span class="pull-right text-muted"><span class="badge comentbadge">0</span> Comentarios</span>';

        newPost += '</div>';
        /* end box-body */

        /* begin new-comment */
        newPost += '<div id="new-comment">';
        newPost += '</div>';
        /* end new-comment */

        /* begin box-footer */
        newPost += '<div class="box-footer" style="display: block;">';

        newPost += '<form action="' + data['urlAddComment'] + '" method="post" id="form-add-comment">';
        newPost += '<input type="hidden" value="'+ data['token'] +'" name="_token">';
        newPost += '<img  src="' + urlImg + data['user_avatar'] + '" class="img-responsive img-circle img-sm" alt="Alt Text">';
        newPost += '<div class="img-push">';
        newPost += '<input id="add-comment" type="text" name="coment" class="form-control input-sm bordered-palegreen" placeholder="Presiona Enter para comentar">';

        newPost += '</div>';
        newPost += '</form>';
        newPost += '</div>';
        /* end box-footer */
        
        newPost += '</div>';

        $(newPost).prependTo('#new-post').hide().slideDown();

    }

    function eraseText() {
        document.getElementById("post-body").value = "";
    }

});
