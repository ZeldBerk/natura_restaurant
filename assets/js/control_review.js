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
            data = receivedData;
            mostrarReviews(data);
        })
        .catch(error => {
            console.error(error);
        });

        document.getElementById('ordenarSelect').addEventListener('change', function () {
            const orden = this.value;
            mostrarReviews(data, orden);
        });

        // Añadir un evento de cambio a cada checkbox
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const valoracionesSeleccionadas = obtenerValoracionesSeleccionadas();
                mostrarReviews(data, document.getElementById('ordenarSelect').value, valoracionesSeleccionadas);
            });
        });
    });

    function obtenerValoracionesSeleccionadas() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        const valoracionesSeleccionadas = Array.from(checkboxes).map(checkbox => parseInt(checkbox.value));
        return valoracionesSeleccionadas;
    }

    function mostrarReviews(reviews, orden, valoracionesFiltradas = []) {
        let reviewsContenedor = document.querySelector('.show_reseñas');
        reviewsContenedor.innerHTML = '';

        if (valoracionesFiltradas.length === 0) {
            // Si no hay valoraciones seleccionadas, mostrar todas las reseñas
            reviews.forEach(review => agregarReviewAlContenedor(review));
        } else {
            // Filtrar reseñas según las valoraciones seleccionadas
            const reseñasFiltradas = reviews.filter(review => valoracionesFiltradas.includes(review.valoracion));
            reseñasFiltradas.forEach(review => agregarReviewAlContenedor(review));
        }
    }

    function agregarReviewAlContenedor(review) {
        let reviewDiv = document.createElement('div');
        reviewDiv.classList.add('review', 'col-sm-12', 'col-md-6', 'col-lg-4', 'col-xl-4');
        reviewDiv.innerHTML = `
            <h3>${review.nombre_usuario}</h3>
            <p>${review.review}</p>
            <p>Puntuación: ${convertirAPuntuacionEstrellas(review.valoracion)}</p>
        `;
        document.querySelector('.show_reseñas').appendChild(reviewDiv);
    }

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