document.addEventListener('DOMContentLoaded', function () {
    // Obtener el formulario y el botón
    const addButton = document.getElementById('insertReview');

    // Agregar un event listener al botón
    addButton.addEventListener('click', function (event) {
        // Evitar que el formulario se envíe de inmediato
        event.preventDefault();

        // Obtener los datos del formulario
        const pedido_id = document.querySelector('input[name="pedido_id"]').value;
        const comentario = document.querySelector('input[name="comentario"]').value;
        const rate = document.querySelector('input[name="rate"]:checked').value;

        // Realizar la solicitud POST a la API
        fetch("http://naturarestaurant.com/index.php/?controller=api&action=api", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                accion: 'insert_reviews',
                pedido_id: pedido_id,
                comentario: comentario,
                rate: rate,
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Verificar si la operación fue exitosa
            if (data.success) {
                // Mostrar notificación de éxito
                notie.alert({
                    type: 'success',
                    text: data.message,
                    time: 5 // Tiempo en segundos para que la notificación se cierre automáticamente
                });
                 // Redirigir la página después de 5 segundos
                 setTimeout(function() {
                    window.location.href = 'http://naturarestaurant.com/index.php/?controller=review';
                }, 5000);

            } else {
                // Mostrar notificación de error si la operación no fue exitosa
                notie.alert({
                    type: 'error',
                    text: data.message,
                    time: 5 // Tiempo en segundos para que la notificación se cierre automáticamente
                });
            }
        })
        .catch(error => {
            console.error(error);
        });
    });
});
