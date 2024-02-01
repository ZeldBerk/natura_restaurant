document.addEventListener('DOMContentLoaded', function () {
    const idUsuario = document.querySelector('input[name="id_usuario"]').value;
    const puntosLabel = document.getElementById('puntosLabel');
    const puntosUsarInput = document.getElementById('puntosUsar');
    const showPrecioTotal = document.getElementById('showPrecioTotal');
    let puntosDisponibles = 0;

    // Fetch initial points data
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
        insertarDatosEnPuntos(data);
        puntosDisponibles = data.puntos;
        updatePrecioTotal(); // Update total price on initial load
    })
    .catch(error => {
        console.error(error);
    });

    function insertarDatosEnPuntos(data) {
        puntosLabel.textContent = data.puntos;
        puntosUsarInput.value = data.puntos;
    }

    function restarPuntos() {
        let puntosUsar = parseInt(puntosUsarInput.value, 10);
        if (puntosUsar > 0) {
            puntosUsar -= 1;
            puntosUsarInput.value = puntosUsar;
            updatePuntos(puntosUsar);
            updatePrecioTotal();
        }
    }

    function sumarPuntos() {
        let puntosUsar = parseInt(puntosUsarInput.value, 10);
        if (puntosUsar < puntosDisponibles) {
            puntosUsar += 1;
            puntosUsarInput.value = puntosUsar;
            updatePuntos(puntosUsar);
            updatePrecioTotal();
        }
    }

    function updatePuntos(puntos) {
        puntosLabel.textContent = puntos;
    }

    function updatePrecioTotal() {
        const puntosUsar = parseInt(puntosUsarInput.value, 10);
        const precioSinPuntos = parseFloat(document.getElementsByName('precioSinPuntos')[0].value);
        const equivalentAmount = puntosUsar * 0.01; // Cada punto es 0.01€
        const precioTotal = precioSinPuntos - equivalentAmount;
        showPrecioTotal.textContent = precioTotal.toFixed(2);
    
        // Actualizar precio en el boton
        const button = document.querySelector('.buttonDark');
        button.textContent = `Realizar compra | ${precioTotal.toFixed(2)}`;
    }

    document.getElementById('restarPuntos').addEventListener('click', restarPuntos);
    document.getElementById('sumarPuntos').addEventListener('click', sumarPuntos);
});