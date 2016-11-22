var fullPost = document.getElementById('fullPost')
var editButton = document.getElementById('editPost')
var texto = fullPost.childNodes[0].innerText

editButton.addEventListener('click', editarPost)

function editarPost (){
    fullPost.innerHTML = '<form method="get" action="/show/postEditado" >
        <textarea name="Post " cols="40" rows="7"></textarea>
         <button type="submit">
        </form>'
}

//EN EL CONTROLLER DE POSTS, EN POSTEDITADO VA UN UPDATE CON EL ID DEL POST QUE NO SE COMO SACARLO Y
//VA COMO TEXTO LO QUE HAY EN EL TEXTAREA