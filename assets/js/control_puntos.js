document.addEventListener('DOMContentLoaded', function () {
    const idUsuario = document.querySelector('input[name="id_usuario"]').value;
    const puntosLabel = document.getElementById('puntosLabel');
    const puntosUsarInput = document.getElementById('puntosUsar');
    const usarPuntosCheckbox = document.getElementById('usarPuntosCheckbox');
    const showPrecioTotal = document.getElementById('showPrecioTotal');
    const restarPuntosButton = document.getElementById('restarPuntos');
    const sumarPuntosButton = document.getElementById('sumarPuntos');
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
        puntosDisponibles = data.puntos;
        insertarDatosEnPuntos(data);
        // Manually call updatePrecioTotal to handle initial state
        updatePrecioTotal();
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
        // Show or hide the puntosLabel based on checkbox state
        puntosLabel.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
    
        puntosLabel.textContent = puntos;
    }

    function updatePrecioTotal() {
        const puntosUsar = parseInt(puntosUsarInput.value, 10);
        const precioSinPuntos = parseFloat(document.getElementsByName('precioSinPuntos')[0].value);

        if (usarPuntosCheckbox.checked) {
            // Aplicar descuento solo si el checkbox está marcado
            const equivalentAmount = puntosUsar * 0.01; // Cada punto vale 0.01€
            const precioTotal = precioSinPuntos - equivalentAmount;
            showPrecioTotal.textContent = precioTotal.toFixed(2);
            document.getElementById('puntosUtilizados').value = puntosUsar;
        } else {
            // Si el checkbox no está marcado, mostrar el precio sin descuento
            showPrecioTotal.textContent = precioSinPuntos.toFixed(2);
        }

        // Actualizar campos ocultos para enviar al formulario
        document.getElementById('precioConDescuento').value = showPrecioTotal.textContent;

        // Actualizar el texto del botón con el precio total
        const button = document.querySelector('.buttonDark');
        button.textContent = `Realizar compra | ${showPrecioTotal.textContent}`;

        // Mostrar u ocultar elementos basados en el estado del checkbox
        const puntosForm = document.getElementById('puntosForm');
        restarPuntosButton.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
        sumarPuntosButton.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
        puntosLabel.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
    }

    // Add an event listener to the checkbox to toggle points form visibility
    usarPuntosCheckbox.addEventListener('change', updatePrecioTotal);

    document.getElementById('restarPuntos').addEventListener('click', restarPuntos);
    document.getElementById('sumarPuntos').addEventListener('click', sumarPuntos);
});
