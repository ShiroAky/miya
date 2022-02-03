<?php

    /**
     * Clase del ruteador de las vistas 
     */

     class Router
     {
         
        function __construct()
        {
            
            if (isset($_GET['route'])) {

                $ruta = explode('/', $_GET['route']);
            
                switch ($ruta[0]) {
                    case 'video':
                        include_once './views/layouts/video.php';
                        break;
                    case 'upload':
                        include_once './views/layouts/upload.php';
                        break;
                    default:
                        return;
                        break;
                }    
            
            } else {
                include_once './views/layouts/home.php';
            }

        }

     }
     