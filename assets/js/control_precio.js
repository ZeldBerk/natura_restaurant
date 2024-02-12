document.addEventListener('DOMContentLoaded', function () {
    // Obtener valores iniciales y configuración
    const propina_porcentage = document.getElementById('propina').value;
    const idUsuario = document.querySelector('input[name="id_usuario"]').value;
    const puntosLabel = document.getElementById('puntosLabel');
    const puntosUsarInput = document.getElementById('puntosUsar');
    const usarPuntosCheckbox = document.getElementById('usarPuntosCheckbox');
    const propinaCheckbox = document.getElementById('propinaCheckbox');
    const showPrecioTotal = document.getElementById('showPrecioTotal');
    const restarPuntosButton = document.getElementById('restarPuntos');
    const sumarPuntosButton = document.getElementById('sumarPuntos');
    const propinaInput = document.getElementById('propina');
    let puntosDisponibles = 0;

    // Obtener datos iniciales de puntos mediante una petición a la API
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
        // Al obtener la respuesta, actualizar valores iniciales y mostrar en la interfaz
        puntosDisponibles = data.puntos;
        insertarDatosEnPuntos(data);
        // Llamar manualmente a updatePrecioTotal para manejar el estado inicial
        updatePrecioTotal();
    })
    .catch(error => {
        console.error(error);
    });

    // Función para insertar datos iniciales de puntos en la interfaz
    function insertarDatosEnPuntos(data) {
        puntosLabel.textContent = data.puntos;
        puntosUsarInput.value = data.puntos;
    }

    // Función para restar puntos y actualizar la interfaz
    function restarPuntos() {
        let puntosUsar = parseInt(puntosUsarInput.value, 10);
        if (puntosUsar > 0) {
            puntosUsar -= 1;
            puntosUsarInput.value = puntosUsar;
            updatePuntos(puntosUsar);
            updatePrecioTotal();
        }
    }

    // Función para sumar puntos y actualizar la interfaz
    function sumarPuntos() {
        let puntosUsar = parseInt(puntosUsarInput.value, 10);
        if (puntosUsar < puntosDisponibles) {
            puntosUsar += 1;
            puntosUsarInput.value = puntosUsar;
            updatePuntos(puntosUsar);
            updatePrecioTotal();
        }
    }

    // Función para actualizar la visualización de los puntos
    function updatePuntos(puntos) {
        // Mostrar u ocultar el puntosLabel según el estado del checkbox
        puntosLabel.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
        // Actualizar el contenido del puntosLabel con la cantidad de puntos
        puntosLabel.textContent = puntos;
    }

    // Función para actualizar el precio total y la interfaz
    function updatePrecioTotal() {
        const puntosUsar = parseInt(puntosUsarInput.value, 10);
        const precioSinPuntos = parseFloat(document.getElementsByName('precioSinPuntos')[0].value);

        if (usarPuntosCheckbox.checked) {
            // Aplicar descuento solo si el checkbox está marcado
            const equivalentAmount = puntosUsar * 0.01; // Cada punto vale 0.01€
            const precioTotal = precioSinPuntos - equivalentAmount;
            showPrecioTotal.textContent = precioTotal.toFixed(2);
            // Actualizar el valor del input oculto con la cantidad de puntos a utilizar
            document.getElementById('puntosUtilizados').value = puntosUsar;
        } else {
            // Si el checkbox no está marcado, mostrar el precio sin descuento
            showPrecioTotal.textContent = precioSinPuntos.toFixed(2);
        }

        if (propinaCheckbox.checked) {
            // Aplicar propina solo si el checkbox está marcado
            const propina = (propina_porcentage/100) * precioSinPuntos;
            console.log(propina);
            const precioTotal = precioSinPuntos + propina;
            showPrecioTotal.textContent = precioTotal.toFixed(2);
            // Actualizar el valor del input oculto con la cantidad de la propina
            document.getElementById('propinaAplicada').value = propina;
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
        restarPuntosButton.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
        sumarPuntosButton.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
        puntosLabel.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
        propinaInput.style.display = propinaCheckbox.checked ? 'inline-block' : 'none';
    }

    // Añadir un event listener al checkbox para alternar la visibilidad del formulario de puntos
    usarPuntosCheckbox.addEventListener('change', updatePrecioTotal);
    propinaCheckbox.addEventListener('change', updatePrecioTotal);

    // Añadir event listeners a los botones de restar y sumar puntos
    document.getElementById('restarPuntos').addEventListener('click', restarPuntos);
    document.getElementById('sumarPuntos').addEventListener('click', sumarPuntos);
});
