document.addEventListener('DOMContentLoaded', function () {

    const idUsuario = document.querySelector('input[name="id_usuario"]').value;

    fetch("http://naturarestaurant.com/index.php/?controller=api&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'show_puntos',
            idUsuario: idUsuario,
        }),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log(data);
        insertarDatosEnPuntos(data);
    })
    .catch(error => {
        console.error(error);
    });
});

function insertarDatosEnPuntos(data) {
    let puntosLabel = document.querySelector('.puntos');
    puntosLabel.textContent += " " + data.puntos;
}