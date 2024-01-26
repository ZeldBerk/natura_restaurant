// Declarar data en un ámbito más amplio
let data;

document.addEventListener('DOMContentLoaded', function () {
    fetch("http://naturarestaurant.com/index.php/?controller=api&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'mostrar_reviews',
        }),
    })
    .then(response => {
        return response.json();
    })
    .then(receivedData => {
        // Asignar la data recibida a la variable data
        data = receivedData;
        
        // Mostrar las reseñas al cargar la página
        mostrarReviews(data);
    })
    .catch(error => {
        console.error(error);
    });

    // Añadir un evento de cambio al desplegable
    document.getElementById('ordenarSelect').addEventListener('change', function () {
        // Obtener el valor seleccionado en el desplegable
        const orden = this.value;

        // Llamar a la función para mostrar las reseñas con el nuevo orden
        mostrarReviews(data, orden);
    });
});


// Función para convertir la puntuación en estrellas
function convertirAPuntuacionEstrellas(puntuacion) {
    let estrellas = '';
    for (let i = 1; i <= 5; i++) {
        if (i <= puntuacion) {
            estrellas += '★'; // Agrega una estrella llena
        } else {
            estrellas += '☆'; // Agrega una estrella vacía
        }
    }
    return estrellas;
}

// Función para mostrar reseñas con filtro de orden
function mostrarReviews(reviews, orden) {
    let reviewsContenedor = document.querySelector('.show_reseñas');
    
    // Limpia el contenedor antes de agregar las reseñas ordenadas
    reviewsContenedor.innerHTML = '';

    // Ordena las reseñas según la opción seleccionada
    if (orden === 'ascendente') {
        reviews.sort((a, b) => a.valoracion - b.valoracion);
    } else if (orden === 'descendente') {
        reviews.sort((a, b) => b.valoracion - a.valoracion);
    }

    // Agrega las reseñas ordenadas al contenedor
    reviews.forEach(review => {
        let reviewDiv = document.createElement('div');
        reviewDiv.classList.add('review', 'col-sm-12', 'col-md-6', 'col-lg-4', 'col-xl-4');
        reviewDiv.innerHTML = `
            <h3>${review.nombre_usuario}</h3>
            <p>${review.review}</p>
            <p>Puntuación: ${convertirAPuntuacionEstrellas(review.valoracion)}</p>
        `;
        reviewsContenedor.appendChild(reviewDiv);
    });
}