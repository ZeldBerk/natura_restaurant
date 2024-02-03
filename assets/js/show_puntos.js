// Esperar a que el DOM esté completamente cargado antes de ejecutar el código
document.addEventListener('DOMContentLoaded', function () {
    // Obtener el ID del usuario del input oculto en el formulario
    const idUsuario = document.querySelector('input[name="id_usuario"]').value;

    // Realizar una petición a la API para obtener los puntos del usuario
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
        // Convertir la respuesta a formato JSON
        return response.json();
    })
    .then(data => {
        // Imprimir los datos en la consola y llamar a la función para insertarlos en la interfaz
        console.log(data);
        insertarDatosEnPuntos(data);
    })
    .catch(error => {
        // Manejar errores en la consola
        console.error(error);
    });
});

// Función para insertar los datos de puntos en la interfaz
function insertarDatosEnPuntos(data) {
    // Seleccionar el elemento con la clase 'puntos' y agregar la cantidad de puntos
    let puntosLabel = document.querySelector('.puntos');
    puntosLabel.textContent += " " + data.puntos;
}
