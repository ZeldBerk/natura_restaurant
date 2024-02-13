document.addEventListener('DOMContentLoaded', function () {
    // Recoger id de usuario
    const idUsuario = document.querySelector('input[name="id_usuario"]').value;

    document.getElementById('checkoutForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Evita que el formulario se envíe normalmente

        // Obtén el contenido que deseas en el código QR (en este caso, la URL)
        const url = 'http://naturarestaurant.com/index.php/?controller=producto&action=detallesQR&idUsuario=' + idUsuario;

        // Genera el código QR en una nueva instancia de QRCode
        const qr = new QRCode(document.createElement('div'), {
            text: url,
            width: 300,
            height: 300,
        });

        // Crea un elemento HTML para contener el código QR
        const qrContainer = document.createElement('div');
        qrContainer.appendChild(qr._el);

        // Utiliza SweetAlert para mostrar el código QR
        Swal.fire({
            title: 'Código QR',
            html: qrContainer.innerHTML,
            showCloseButton: true,
            showConfirmButton: false,
            allowOutsideClick: false, // Evita cerrar haciendo clic fuera del cuadro de alerta
        }).then(() => {
            // Cuando el usuario cierra la alerta, envía el formulario al backend para finalizar la compra
            document.getElementById('checkoutForm').submit();
        });
    });
});
