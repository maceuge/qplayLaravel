/**
 * Created by ivan on 9/12/16.
 */
$(function(){

    // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    //console.log('documento listo!!!');

    $('#users-list').click(function (e) {

        e.preventDefault();

        var row = e.target.parentNode;

        var id = row.dataset.id;

        var btnFollow = row.firstElementChild;

        var btnDelete = row.lastElementChild;

        if ( e.target.className == 'btn btn-danger btn-dropFollow show-btn') {

            var form = $('#form-delete-friend');

            var url = form.attr('action').replace(':Friend_id', id);

            var data = form.serialize();

            $.post(url, data, function (result) {
                //console.log(result);

                btnDelete.classList.remove('show-btn');
                btnDelete.classList.add('hide-btn');
                btnFollow.classList.remove('hide-btn');
                btnFollow.classList.add('show-btn');

                x.innerText = result;
                // Add the "show" class to DIV
                x.className = "show";
                // After 3 seconds, remove the show class from DIV
                setTimeout(function() {
                    x.className = x.className.replace("show", "");
                }, 3000);

            }).fail(function () {
                x.innerText = 'Se produjo un error!';
                // Add the "show" class to DIV
                x.className = "show";
                // After 3 seconds, remove the show class from DIV
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

            });

        } else if ( e.target.className == 'btn btn-info btn-follow show-btn') {


            var form = $('#form-add-friend');

            var url = form.attr('action').replace(':Friend_id', id);

            var data = form.serialize();

            $.post(url, data, function (result) {
                //console.log(result);

                btnFollow.classList.remove('show-btn');
                btnFollow.classList.add('hide-btn');
                btnDelete.classList.remove('hide-btn');
                btnDelete.classList.add('show-btn');

                x.innerText = result;
                // Add the "show" class to DIV
                x.className = "show";
                // After 3 seconds, remove the show class from DIV
                setTimeout(function() {
                    x.className = x.className.replace("show", "");
                }, 3000);

            }).fail(function () {
                x.innerText = 'Se produjo un error!';
                // Add the "show" class to DIV
                x.className = "show";
                // After 3 seconds, remove the show class from DIV
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            });
        }
    });
});
