document.addEventListener('DOMContentLoaded', function () {
    // Obtener valores iniciales y configuración
    let propina_porcentage = 3;
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
        let precioTotal = precioSinPuntos;
        
        if (usarPuntosCheckbox.checked) {
            // Aplicar descuento solo si el checkbox está marcado
            const equivalentAmount = puntosUsar * 0.01; // Cada punto vale 0.01€
            precioTotal -= equivalentAmount;
            // Actualizar el valor del input oculto con la cantidad de puntos a utilizar
            document.getElementById('puntosUtilizados').value = puntosUsar;
        }

        if (propinaCheckbox.checked) {
            // Aplicar propina solo si el checkbox está marcado
            const propina = (propina_porcentage/100) * precioSinPuntos;
            precioTotal += propina;
            // Actualizar el valor del input oculto con la cantidad de la propina
            document.getElementById('propinaAplicada').value = propina;
        }

        // Actualizar el texto del botón con el precio total
        const button = document.querySelector('.buttonDark');
        button.textContent = `Realizar compra | ${precioTotal.toFixed(2)}`;

        // Mostrar u ocultar elementos basados en el estado del checkbox
        restarPuntosButton.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
        sumarPuntosButton.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
        puntosLabel.style.display = usarPuntosCheckbox.checked ? 'inline-block' : 'none';
        propinaInput.style.display = propinaCheckbox.checked ? 'inline-block' : 'none';

        // Mostrar el precio total en la interfaz
        showPrecioTotal.textContent = precioTotal.toFixed(2);
        document.getElementById('precioConDescuento').value = precioTotal;
    }

    // Añadir un event listener al checkbox para alternar la visibilidad del formulario de puntos
    usarPuntosCheckbox.addEventListener('change', updatePrecioTotal);
    propinaCheckbox.addEventListener('change', updatePrecioTotal);
    // Añadir event listener al input de propina para el evento 'input'
    propinaInput.addEventListener('input', function(event) {
        // Obtener el nuevo valor directamente del evento
        propina_porcentage = parseFloat(event.target.value);
        if (!isNaN(propina_porcentage)) {
            // Si el valor del input de propina es un número válido, actualizar la propina
            propinaInput.value = propina_porcentage; // Actualizar el valor del input
            updatePrecioTotal();
        }
    });


    // Añadir event listeners a los botones de restar y sumar puntos
    document.getElementById('restarPuntos').addEventListener('click', restarPuntos);
    document.getElementById('sumarPuntos').addEventListener('click', sumarPuntos);
});
