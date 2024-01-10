//funcion para mostrar las reseñas
function mostrarReseñas(reseñas) {
    let reseñasContenedor = document.querySelector('.reseñas-contenedor');
    reseñas.forEach(reseña => {
        let reseñaDiv = document.createElement('div');
        reseñaDiv.classList.add('reseña');
        reseñaDiv.innerHTML = `
            <h3>${reseña.nombre}</h3>
            <p>${reseña.comentario}</p>
            <p>Puntuación: ${reseña.puntuacion}</p>
        `;
        reseñasContenedor.appendChild(reseñaDiv);
    });
}

let reseñas = [
    {nombre: "pablito", comentario: "mala calidad", puntuacion: 2},
    {nombre: "susanita", comentario: "buena atención al cliente", puntuacion: 4},
    // ...
];

mostrarReseñas(reseñas);