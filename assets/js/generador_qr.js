document.addEventListener('DOMContentLoaded', function () {
    const checkoutForm = document.getElementById('checkoutForm');

    checkoutForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Evita que el formulario se envíe normalmente

        // Realizar la solicitud AJAX para enviar el formulario
        const formData = new FormData(checkoutForm);

        // Fetch para enviar el formulario de manera asíncrona
        fetch(checkoutForm.action, {
            method: checkoutForm.method,
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al enviar el formulario');
            }
            return response.json();
        })
        .then(data => {
            // Obtener la url del qr
            const idUsuario = document.querySelector('input[name="id_usuario"]').value;
            const url = 'http://naturarestaurant.com/index.php/?controller=producto&action=detallesQR&idUsuario=' + idUsuario;

            // Utilizr qrcodejs para generar el código QR
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
                window.location.href = 'http://naturarestaurant.com/index.php/?controller=producto'; 
            });
        })
        .catch(error => {
            console.error(error);
        });
    });
});
