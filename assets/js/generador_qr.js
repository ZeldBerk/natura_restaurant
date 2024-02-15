document.addEventListener('DOMContentLoaded', function () {
    // Recoger id de usuario
    const idUsuario = document.querySelector('input[name="id_usuario"]').value;

    document.getElementById('checkoutForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Evita que el formulario se envíe normalmente

        // Obtén el contenido que deseas en el código QR (en este caso, la URL)
        const url = 'http://naturarestaurant.com/index.php/?controller=producto&action=detallesQR&idUsuario=' + idUsuario;

        // Genera el código QR en una imagen
        const qr = new QRCode(document.createElement('div'), {
            text: url,
            width: 300,
            height: 300,
            colorDark: '#000000',
            colorLight: '#ffffff',
            correctLevel: QRCode.CorrectLevel.H,
        });

        qr.makeImage()
        .then(qrImage => {
            // Utiliza SweetAlert para mostrar el código QR
            Swal.fire({
                title: 'Código QR',
                imageUrl: qrImage.toDataURL(),
                imageAlt: 'Código QR',
                showCloseButton: true,
                showConfirmButton: false,
                allowOutsideClick: false,
            }).then(() => {
                // Cuando el usuario cierra la alerta, envía el formulario al backend para finalizar la compra
                document.getElementById('checkoutForm').submit();
            });
        })
        .catch(error => {
            console.error('Error generating QR code image:', error);
        });
    
    });
});
