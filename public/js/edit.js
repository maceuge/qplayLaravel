window.onload = function(){

    var botonesEditar = document.getElementsByClassName('botonEditar');

    for(var i = 0; i < botonesEditar.length; i++){
        botonesEditar[i].addEventListener('click', editarPost);
    }
}

function editarPost (){
    console.log('this= ' + this);
    var post = this.parentNode;
    console.log('post = ' + post);
    var id = this.id.substring(4);
    console.log('id= ' + id);
    var contenidoId = 'contenido' + id;
    console.log('contenidoId= ' + contenidoId);
    var texto = document.getElementById(contenidoId).innerText;
    console.log('texto= ' + texto);

    console.log("anduvo");

    post.innerHTML = '<div><form method="post" action="/edition/' + id +
        '"><input type="text" class="form-control input-lg p-text-area" name="post" cols="40" rows="3" value="'+texto+'" autofocus></input></form></div>';
}

