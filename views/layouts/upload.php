<?php

include_once './controllers/File_Controller.php';

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$archivo = $_FILES['file'];
$portada = $_FILES['portada'];

$upload = new Upload($titulo, $descripcion, $archivo, $portada);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Video</title>
    <link rel="stylesheet" href="./public/css/styles.css">
    <link rel="shortcut icon" href="http://localhost/miya/public/img/01.jpg" type="image/x-icon">
</head>

<body>

    <div class="upload">

        <form method="post" enctype="multipart/form-data">

            <div class="form-control">
                <label for="titulo">Titulo del video</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo del video">
            </div>
            <div class="form-control">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" placeholder="Descripción del video"></textarea>
            </div>
            <div class="form-control">
                <input type="file" name="file" id="file" accept="video/*">
            </div>
            <div class="form-control">
                <input type="file" name="portada" id="poster" accept="image/*">
            </div>
            <div class="form-control">
                <button type="submit" id="send">Subir archivo</button>
            </div>
        </form>

    </div>

</body>

</html>