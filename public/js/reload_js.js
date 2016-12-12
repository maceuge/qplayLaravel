/**
 * Created by Web Developer on 11/12/2016.
 */

//
function reload_close(src) {
    $('script[src="http://localhost:8888/qplayLaravel/public/js/' +src+ '"]').remove();
    $('<script>').attr('type', 'text/javascript').attr('src', 'http://localhost:8888/qplayLaravel/public/js/'+src).appendTo('.javaplugin');
}

function reload_like(src) {
    $('script[src="http://localhost:8888/qplayLaravel/public/js/' +src+ '"]').remove();
    $('<script>').attr('type', 'text/javascript').attr('src', 'http://localhost:8888/qplayLaravel/public/js/'+src).appendTo('.javaplugin');
}
