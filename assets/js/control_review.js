//link http://naturarestaurant.com/index.php/?controller=api&action=api
document.addEventListener('DOMContentLoaded', function(){
    fetch("http://naturarestaurant.com/index.php/?controller=api&action=api", {
        method : 'POST',
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
    .then(data => {
        mostrarReviews(data);
    })
    .catch(error => {
        console.error(error);
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

function mostrarReviews(reviews) {
    let reviewsContenedor = document.querySelector('.row');
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