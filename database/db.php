<?php

    /**
     * Clase de la conexión a la base de datos 
     */

    class DB extends mysqli
    {
        
        function __construct()
        {
            
            $DB_HOST = 'localhost';
            $DB_USER = 'root';
            $DB_PASS = '';
            $DB_NAME = 'videos';

            parent::connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
            $this->set_charset('utf8');

        }

    }
    