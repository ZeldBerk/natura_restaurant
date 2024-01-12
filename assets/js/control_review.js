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

// Función para mostrar las reseñas
function mostrarReseñas(reseñas) {
    let reseñasContenedor = document.querySelector('.row');
    reseñas.forEach(reseña => {
        let reseñaDiv = document.createElement('div');
        reseñaDiv.classList.add('reseña', 'col-sm-12', 'col-md-6', 'col-lg-4', 'col-xl-4');
        reseñaDiv.innerHTML = `
            <h3>${reseña.nombre}</h3>
            <p>${reseña.comentario}</p>
            <p>Puntuación: ${convertirAPuntuacionEstrellas(reseña.puntuacion)}</p>
        `;
        reseñasContenedor.appendChild(reseñaDiv);
    });
}

let reseñas = [
    {nombre: "pablito", comentario: "mala calidad", puntuacion: 2},
    {nombre: "susanita", comentario: "buena atención al cliente", puntuacion: 4},
    {nombre: "manolito", comentario: "Tiempo de reparto mejorable", puntuacion: 3},
    {nombre: "manolito", comentario: "Tiempo de reparto mejorable", puntuacion: 3},
    {nombre: "manolito", comentario: "Tiempo de reparto mejojlgfkyutdfydfludfludlyutdfljfludfultdflutflufrable", puntuacion: 3},
    {nombre: "manolito", comentario: "Tiempo de hy7unhyju7hyjusekhfgiuagsluygfLWUejorable mejorable", puntuacion: 3},
    {nombre: "manolito", comentario: "Tiempo de reparto m hy7unhyju7hyjusekhfgiuagsluygfLWUejorable", puntuacion: 3},
];

mostrarReseñas(reseñas);
