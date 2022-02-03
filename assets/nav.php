<nav>

    <!-- Logo -->
    <div class="logo">
        <span>MiYa</span>
    </div>

    <!-- Enlaces de la barra de navegación -->
    <div class="items">

        <a href="/miya/upload">Agregar</a>

        <?php
            // Parseo de la url y segmentación
            $url = explode('/', $_GET['route']);

            // Comprovación de url
            if (isset($_GET['route'])) { echo '<a href="/miya/">Inicio</a>'; } else { return; }
        ?>

    </div>

</nav>
