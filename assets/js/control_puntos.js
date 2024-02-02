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
        // Set the initial checkbox state based on points availability
        usarPuntosCheckbox.checked = data.puntos > 0;
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
        const equivalentAmount = puntosUsar * 0.01; // Each point is worth 0.01€
        const precioTotal = precioSinPuntos - equivalentAmount;
        showPrecioTotal.textContent = precioTotal.toFixed(2); // Format to two decimal places
    
        // Update the text content of the button
        const button = document.querySelector('.buttonDark');
        button.textContent = `Realizar compra | ${precioTotal.toFixed(2)}`;
    
        // Show or hide the points form and buttons based on checkbox state
        const puntosForm = document.getElementById('puntosForm');
        restarPuntosButton.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
        sumarPuntosButton.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
    
        // Show or hide the puntosLabel based on checkbox state
        puntosLabel.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';

    }

    // Add an event listener to the checkbox to toggle points form visibility
    usarPuntosCheckbox.addEventListener('change', updatePrecioTotal);

    document.getElementById('restarPuntos').addEventListener('click', restarPuntos);
    document.getElementById('sumarPuntos').addEventListener('click', sumarPuntos);
});
