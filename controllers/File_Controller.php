<?php

/**
 * Controlador de la subida de videos 
 */

class Upload
{

    function __construct($titulo, $descripcion, $file, $poster)
    {

        // Archivo de conexión
        include_once './database/db.php';
        include_once './config/server.php';

        // Instancia de la conexión
        $DB = new DB();

        // Variables de archivo
        $dir = './public/video/';
        $poster_dir = './public/img/';

        $temporal_name = $file['tmp_name'];
        $temporal_poster_name = $poster['tmp_name'];

        // Nuevo nombre del archivo
        $path = pathinfo($file['name'], PATHINFO_EXTENSION);
        $poster_path = pathinfo($poster['name'], PATHINFO_EXTENSION);

        // Generador de nombre
        $New_File_Name = uniqid() . '-' . time() . '.' . $path;
        $New_Poster_Name = uniqid() . '-' . time() . '.' . $poster_path;

        $token = md5($New_File_Name);

        // Subida del archivo al servidor y comprovación de subida
        $move = move_uploaded_file($temporal_name, $dir . $New_File_Name);
        $movePoster = move_uploaded_file($temporal_poster_name, $poster_dir . $New_Poster_Name);

        if ($move && $movePoster) {
            // Mensaje de exito 
            // echo 'Video subido correctamente';

            // URL para la base de datos
            $file_url = $SERVER_URL . 'miya/' . $dir . $New_File_Name;
            $poster_url = $SERVER_URL . 'miya/' . $poster_dir . $New_Poster_Name;

            // Inserción de los datos en la base de datos 
            $DB->query("INSERT INTO `video` (token, titulo, descripcion, portada, video) VALUES ('$token', '$titulo', '$descripcion', '$poster_url', '$file_url')");

            header('location: http://localhost/miya/');

        } else {
            // echo 'Fallo al subir el video';
        }

    }

}
