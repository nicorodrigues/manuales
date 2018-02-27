window.addEventListener('load', function() {
    let todosPermisos = document.querySelectorAll('.ios8-switch');

    todosPermisos.forEach(function(elem) {
        elem.addEventListener('click', (evento) => togglePermission(evento, elem));
    });

    function togglePermission(evento, elem) {
        evento.preventDefault();

        axios.post('/permission', {
            id: elem.parentElement.children[0].value
        })
        .then(
            datos => {
                if (datos.data.status === 'ok') {
                    if (elem.checked) {
                        elem.checked = false;
                        elem.parentElement.children[2].innerHTML = 'No Permitido';
                    } else {
                        elem.checked = true;
                        elem.parentElement.children[2].innerHTML = 'Permitido';
                    }
                }
            }
        );
    }
});
