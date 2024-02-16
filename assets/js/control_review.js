let data; // Variable global para almacenar los datos de las reseñas

// Evento que se ejecuta cuando el DOM está completamente cargado
document.addEventListener('DOMContentLoaded', function () {
    // Realizar una petición a la API para obtener los datos de las reseñas
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
        data = receivedData; // Almacenar los datos globalmente
        mostrarReviews(data); // Mostrar las reseñas al recibir los datos
        cargarFiltrosGuardados(); // Cargar los filtros guardados al cargar la página
    })
    .catch(error => {
        console.error(error);
    });

    // Añadir un evento de cambio al selector de ordenamiento
    document.getElementById('ordenarSelect').addEventListener('change', function () {
        const orden = this.value; // Obtener la opción de orden seleccionada
        const valoracionesSeleccionadas = obtenerValoracionesSeleccionadas();
        guardarFiltrosEnLocalStorage(orden, valoracionesSeleccionadas); // Guardar filtros en localStorage
        mostrarReviews(data, orden, valoracionesSeleccionadas);
    });

    // Añadir un evento de cambio a cada checkbox de valoración
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const valoracionesSeleccionadas = obtenerValoracionesSeleccionadas();
            const orden = document.getElementById('ordenarSelect').value;
            guardarFiltrosEnLocalStorage(orden, valoracionesSeleccionadas); // Guardar filtros en localStorage
            mostrarReviews(data, orden, valoracionesSeleccionadas);
        });
    });
});

// Función para obtener las valoraciones seleccionadas mediante checkboxes
function obtenerValoracionesSeleccionadas() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    const valoracionesSeleccionadas = Array.from(checkboxes).map(checkbox => parseInt(checkbox.value));
    return valoracionesSeleccionadas;
}

// Función para guardar los filtros en localStorage
function guardarFiltrosEnLocalStorage(orden, valoracionesSeleccionadas) {
    localStorage.setItem('ordenReviews', orden);
    localStorage.setItem('valoracionesSeleccionadasReviews', JSON.stringify(valoracionesSeleccionadas));
}

// Función para cargar los filtros guardados desde localStorage al cargar la página
function cargarFiltrosGuardados() {
    const ordenGuardado = localStorage.getItem('ordenReviews');
    const valoracionesSeleccionadasGuardadas = localStorage.getItem('valoracionesSeleccionadasReviews');

    if (ordenGuardado) {
        document.getElementById('ordenarSelect').value = ordenGuardado;
    }

    if (valoracionesSeleccionadasGuardadas) {
        const valoracionesSeleccionadas = JSON.parse(valoracionesSeleccionadasGuardadas);
        valoracionesSeleccionadas.forEach(valoracion => {
            document.getElementById(`valoracion${valoracion}`).checked = true;
        });
        // Después de cargar los filtros, llamamos a mostrarReviews
        mostrarReviews(data, ordenGuardado, valoracionesSeleccionadas);
    }
}

// Función para mostrar las reseñas en el contenedor
function mostrarReviews(reviews, orden, valoracionesFiltradas = []) {
    let reviewsContenedor = document.querySelector('.show_reseñas');
    reviewsContenedor.innerHTML = ''; // Limpiar el contenedor antes de agregar nuevas reseñas

    let reseñasFiltradas = [...reviews];

    // Filtrar reseñas según las valoraciones seleccionadas
    if (valoracionesFiltradas.length > 0) {
        reseñasFiltradas = reseñasFiltradas.filter(review => valoracionesFiltradas.includes(review.valoracion));
    }

    // Ordenar reseñas según la opción seleccionada
    if (orden === 'ascendente') {
        reseñasFiltradas.sort((a, b) => a.valoracion - b.valoracion);
    } else if (orden === 'descendente') {
        reseñasFiltradas.sort((a, b) => b.valoracion - a.valoracion);
    }

    // Agregar las reseñas filtradas y ordenadas al contenedor
    reseñasFiltradas.forEach(review => {
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

// Función para convertir una puntuación numérica a estrellas
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
