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

        // Guarda los tipos seleccionados en localStorage
        localStorage.setItem('tiposSeleccionados', JSON.stringify(tiposSeleccionados));

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

    // Recupera los tipos seleccionados desde localStorage al cargar la página
    function cargarFiltrosGuardados() {
        let tiposSeleccionadosGuardados = localStorage.getItem('tiposSeleccionados');

        if (tiposSeleccionadosGuardados) {
            tiposSeleccionadosGuardados = JSON.parse(tiposSeleccionadosGuardados);

            checkboxes.forEach(function(checkbox) {
                checkbox.checked = tiposSeleccionadosGuardados.includes(checkbox.value);
            });
        }

        // Actualiza el filtro después de cargar los tipos seleccionados
        actualizarFiltro();
    }

    // Actualiza el filtro al cargar la página
    cargarFiltrosGuardados();
});
