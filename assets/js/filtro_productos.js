document.addEventListener('DOMContentLoaded', function() {
    // Obtén todos los checkboxes
    let checkboxes = document.querySelectorAll('.filtro-checkbox');

    // Agrega un evento de cambio a cada checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', actualizarFiltro);
    });

    function actualizarFiltro() {
        // Obtiene todos los productos
        let productos = document.querySelectorAll('.productos');

        // Obtiene los tipos seleccionados
        let tiposSeleccionados = obtenerTiposSeleccionados();

        // Itera sobre cada producto y muestra u oculta según las categorías seleccionadas
        productos.forEach(function(producto) {
            let tipoProducto = producto.dataset.tipo;

            // Comprueba si el tipo del producto está entre los tipos seleccionados
            if (tiposSeleccionados.includes(tipoProducto) || tiposSeleccionados.length === 0) {
                producto.style.display = 'block'; // Muestra el producto
            } else {
                producto.style.display = 'none'; // Oculta el producto
            }
        });
    }

    // Función para obtener los tipos seleccionados
    function obtenerTiposSeleccionados() {
        let tiposSeleccionados = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                tiposSeleccionados.push(checkbox.value);
            }
        });
        return tiposSeleccionados;
    }

    // Actualiza el filtro al cargar la página
    actualizarFiltro();
});