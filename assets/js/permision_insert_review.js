// Espera a que el DOM esté completamente cargado antes de ejecutar el código
document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los formularios con el atributo data-order-id
    document.querySelectorAll('form[data-order-id]').forEach(function(form) {
        // Obtiene el valor del atributo data-order-id
        let pedido_id = form.getAttribute('data-order-id');

        // Realiza una petición a la API para verificar el permiso de insertar una reseña
        fetch("http://naturarestaurant.com/index.php/?controller=api&action=api", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                accion: 'permision_insert_review',
                pedido_id: pedido_id,
            }),
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Llama a la función showButton para mostrar u ocultar elementos en el formulario
            showButton(data, form);
        })
        .catch(error => {
            console.error(error);
        });
    });
});

// Función para mostrar u ocultar elementos en el formulario basándose en la respuesta de la API
function showButton(response, form) {
    // Selecciona elementos específicos dentro del formulario actual
    let botonNewCom = form.querySelector('.botonNewCom');
    let labelNewCom = form.querySelector('.labelNewCom');

    console.log('Response:', response);

    // Verifica si los elementos existen antes de intentar manipularlos
    if (botonNewCom && labelNewCom) {
        // Extrae la propiedad permiso del objeto de respuesta
        const permiso = response && response.permiso;

        // Alterna una clase basada en el valor de permiso
        if (permiso === true) {
            // Si permiso es true, muestra la etiqueta y oculta el botón
            labelNewCom.classList.add('hidden');
            botonNewCom.classList.remove('hidden');
        } else {
            // Si permiso no es true, muestra el botón y oculta la etiqueta
            botonNewCom.classList.add('hidden');
            labelNewCom.classList.remove('hidden');
        }
    } else {
        console.error('Elementos no encontrados en el formulario.');
    }
}
