document.addEventListener('DOMContentLoaded', function () {
    // Recoger id de usuario
    const idUsuario = document.querySelector('input[name="id_usuario"]').value;

    document.getElementById('checkoutForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Evita que el formulario se envíe normalmente

        // Obtén el contenido que deseas en el código QR (en este caso, la URL)
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
            showCloseButton: true, // Mostrar el botón de cierre
            allowOutsideClick: false, // Evitar que se cierre haciendo clic fuera del cuadro
            willClose: () => {
                // Enviar el formulario al cerrar el SweetAlert
                document.getElementById('checkoutForm').submit();
            }
        });
    });
});
