<body>
    <section class="container-lg mt-5">
        <div class="row">
            <!-- Desplegable para filtrar el orden -->
            <select id="ordenarSelect">
                <option value="default">Selecciona el orden</option>
                <option value="ascendente">Ascendente</option>
                <option value="descendente">Descendente</option>
            </select>
            <!-- Filtrar por valoracion -->
            <label><input type="checkbox" id="valoracion1" value="1"> 1 Estrella</label>
            <label><input type="checkbox" id="valoracion2" value="2"> 2 Estrellas</label>
            <label><input type="checkbox" id="valoracion3" value="3"> 3 Estrellas</label>
            <label><input type="checkbox" id="valoracion4" value="4"> 4 Estrellas</label>
            <label><input type="checkbox" id="valoracion5" value="5"> 5 Estrellas</label>
        </div>
        <div class="separacion_big"></div>
        <div class="row show_reseñas">
            
        </div>
    </section>
    <div class="separacion_big"></div>
    <!-- Incluimos el archivo js para las reseñas -->
    <script src="../assets/js/control_review.js"></script>
</body>