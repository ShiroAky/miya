<?php

    // Server URL
    if (isset($_SERVER['HTTPS'])) { $http = 'https://'; } else { $http = 'http://'; }
    $SERVER_URL = $http . $_SERVER['HTTP_HOST'] . '/';