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

        // Realizar la solicitud POST a la API
        fetch("http://naturarestaurant.com/index.php/?controller=api&action=api", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                accion: 'insert_reviews',
                comentario: comentario,
                rate: rate,
            }),
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data)
        })
        .catch(error => {
            console.error(error);
        });
    });
});