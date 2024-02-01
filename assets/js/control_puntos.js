document.addEventListener('DOMContentLoaded', function () {
    const idUsuario = document.querySelector('input[name="id_usuario"]').value;
    const puntosLabel = document.getElementById('puntosLabel');
    const puntosUsarInput = document.getElementById('puntosUsar');
    let puntosDisponibles = 0;

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
    .then(response => response.json())
    .then(data => {
        console.log(data);
        insertarDatosEnPuntos(data);
        puntosDisponibles = data.puntos
    })
    .catch(error => {
        console.error(error);
    });

    function insertarDatosEnPuntos(data) {
        puntosLabel.textContent = data.puntos;
        puntosUsarInput.value = data.puntos; // Inicialmente, no se usan puntos
    }

    document.getElementById('restarPuntos').addEventListener('click', restarPuntos);
    document.getElementById('sumarPuntos').addEventListener('click', sumarPuntos);

    function restarPuntos() {
        let puntosUsar = parseInt(puntosUsarInput.value, 10);
        if (puntosUsar > 0) {
            puntosUsar -= 1;
            puntosUsarInput.value = puntosUsar;
            // Puedes mostrar la nueva cantidad de puntos en otro lugar si es necesario
            console.log("Puntos a usar: " + puntosUsar);
            updatePuntos(puntosUsar);
        }
    }

    function sumarPuntos() {
        let puntosUsar = parseInt(puntosUsarInput.value, 10);
        // Asegúrate de que el usuario no pueda usar más puntos de los que tiene
        if (puntosUsar < puntosDisponibles) {
            puntosUsar += 1;
            puntosUsarInput.value = puntosUsar;
            // Puedes mostrar la nueva cantidad de puntos en otro lugar si es necesario
            console.log("Puntos a usar: " + puntosUsar);
            updatePuntos(puntosUsar);
        }
    }

    function updatePuntos(puntos) {
        puntosLabel.textContent = puntos;
    }
});