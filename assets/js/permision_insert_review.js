document.addEventListener('DOMContentLoaded', function() {
    // Select all forms with the data-order-id attribute
    document.querySelectorAll('form[data-order-id]').forEach(function(form) {
        let pedido_id = form.getAttribute('data-order-id');

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
            showButton(data, form);
        })
        .catch(error => {
            console.error(error);
        });
    });
});

function showButton(response, form) {
    // Selecciona el contenedor específico dentro del formulario actual
    let botonNewCom = form.querySelector('.botonNewCom');
    let labelNewCom = form.querySelector('.labelNewCom');

    console.log('Response:', response);

    // Check if elements exist before trying to manipulate them
    if (botonNewCom && labelNewCom) {
        // Extract the permiso property from the response object
        const permiso = response && response.permiso;

        // Toggle a class based on the value of permiso
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
        console.error('Elements not found in the form.');
    }
}

