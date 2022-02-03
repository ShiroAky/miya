<?php
include_once './config/server.php';
include_once './database/db.php';
$DB = new DB();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video </title>
    <link rel="stylesheet" href="<?php echo $SERVER_URL . 'miya/'; ?>public/css/styles.css">
    <link rel="shortcut icon" href="http://localhost/miya/public/img/01.jpg" type="image/x-icon">
</head>

<body>

    <!-- Barra de navegación -->
    <?php include_once './assets/nav.php'; ?>

    <?php
    // Obtención del token del video
    $token = $url[1];

    // Sentencia sql de la obtención de los datos
    $result = $DB->query("SELECT `titulo`, `descripcion`, `portada`, `video`, `create_at` FROM `video` WHERE token = '$token' ");

    // Bucle para mostrar los datos
    while ($video = mysqli_fetch_assoc($result)) {
    ?>

        <!-- Contenedor de los videos -->
        <div class="video-principal">

            <!-- Contenedor de la información del video -->
            <div class="video-content">

                <!-- Caja del video -->
                <div class="video" id="video-all">

                    <!-- Video seleccionado -->
                    <video src="<?php echo $video['video']; ?>" poster="<?php echo $video['portada']; ?>" id="video"></video>

                    <!-- Controles del video -->
                    <div class="controls">

                        <div class="progress">
                            <progress value="0" max="100" id="progress"></progress>
                        </div>

                        <div class="btns">

                            <div class="left-controls">

                                <div class="btn-play"><i class="fas fa-play" id="btn-play"></i></div>

                                <div class="volume">
                                    <div class="btn-volume"><i class="fas fa-volume-up" id="btn-volume"></i></div>
                                    <input type="range" min="0" value="100" max="100" step="1" id="volume">
                                </div>

                            </div>

                            <div class="btn-screen" id="btn-screen"><i class="fas fa-expand"></i></div>

                        </div>

                    </div>

                </div>

                <!-- Detalles del video -->
                <div class="details">

                    <!-- Titulo y fecha de subida del video -->
                    <div class="title">
                        <div class="video-title"><?php echo $video['titulo']; ?></div>
                        <div class="date"><?php echo $video['create_at']; ?></div>
                    </div>

                    <!-- Descripción del video -->
                    <div class="description">
                        <div class="video-description"><?php echo $video['descripcion']; ?></div>
                    </div>

                </div>

            </div>

            <!-- Sugerencias de videos -->
            <div class="sugerents">
                <h1>Test</h1>
            </div>

        </div>

    <?php
    }
    ?>

    <!-- Scripts generales -->
    <script src="/miya/public/js/main.js"></script>
    <script src="https://kit.fontawesome.com/3521024e4a.js" crossorigin="anonymous"></script>

</body>

</html>