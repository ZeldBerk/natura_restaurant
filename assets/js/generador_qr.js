document.addEventListener('DOMContentLoaded', function () {
    const checkoutForm = document.getElementById('checkoutForm');

    checkoutForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Evita que el formulario se envíe normalmente

        // Realizar la solicitud AJAX para enviar el formulario
        const formData = new FormData(checkoutForm);

        // Puedes usar la API Fetch para enviar el formulario de manera asíncrona
        fetch(checkoutForm.action, {
            method: checkoutForm.method,
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al enviar el formulario');
            }
            return response.json(); // Puedes ajustar esto según la respuesta esperada
        })
        .then(data => {
            // Obtén el contenido que deseas en el código QR (en este caso, la URL)
            const idUsuario = document.querySelector('input[name="id_usuario"]').value;
            const url = 'http://naturarestaurant.com/index.php/?controller=producto&action=detallesQR&idUsuario=' + idUsuario;

            // Utiliza qrcodejs para generar el código QR
            const qrCode = new QRCode(document.createElement('div'), {
                text: url,
                width: 128,
                height: 128
            });

            // Acceder al lienzo (canvas) del código QR
            const canvas = qrCode._el.childNodes[0];

            // Convertir el canvas a datos de URL
            const qrCodeDataURL = canvas.toDataURL();

            // Mostrar el código QR usando SweetAlert con el botón de cierre
            Swal.fire({
                title: 'QR Detalles del Pedido',
                imageUrl: qrCodeDataURL,
                imageAlt: 'Código QR',
                showCancelButton: false,
                showConfirmButton: false,
                showCloseButton: true,
                allowOutsideClick: false
            }).then(() => {
                // Redirigir a la página de inicio después de cerrar la alerta
                window.location.href = 'URL_DE_INICIO'; // Reemplaza con la URL correcta de tu página de inicio
            });
        })
        .catch(error => {
            // Manejar errores, puedes mostrar un mensaje de error si es necesario
            console.error(error);
        });
    });
});
