document.addEventListener('DOMContentLoaded', function () {
    // Obtener el formulario y el botón
    const reviewForm = document.getElementById('reviewForm'); // Puedes descomentar esta línea si es necesario
    const addButton = document.getElementById('insertReview');

    // Agregar un event listener al botón
    addButton.addEventListener('click', function (event) {
        // Evitar que el formulario se envíe de inmediato
        event.preventDefault();

        // Obtener los datos del formulario
        const comentario = document.querySelector('input[name="comentario"]').value;
        const rate = document.querySelector('input[name="rate"]:checked').value;

        // Crear un objeto con los datos del formulario
        const formData = {
            comentario: comentario,
            rate: rate,
            accion: 'insert_reviews'
        };

        // Realizar la solicitud POST a la API
        fetch("http://naturarestaurant.com/index.php/?controller=api&action=api", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        })
        .then(response => {
            response.json();
        })
        .then(data => {
            mostrarMensaje(data);
        })
        .catch(error => {
            // Manejar el error si la solicitud falla
            console.error(error);
        });
    });
});

function mostrarMensaje(mensaje) {
    // Obtener el elemento div con ID "msg"
    var msgDiv = document.getElementById('msg');

    // Crear un elemento de párrafo
    var parrafo = document.createElement('p');

    // Establecer el contenido del párrafo como el mensaje proporcionado
    parrafo.textContent = mensaje;

    // Agregar el párrafo al div
    msgDiv.appendChild(parrafo);
}

