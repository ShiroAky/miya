<?php

include_once './database/db.php';
$DB = new DB();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./public/css/styles.css">
    <link rel="shortcut icon" href="http://localhost/miya/public/img/01.jpg" type="image/x-icon">
</head>

<body>

    <nav>
        <div class="logo">
            <span>MiYa</span>
        </div>
        <div class="items">
            <a href="./upload">Agregar</a>
        </div>
    </nav>

    <div class="wrapper">

        <?php

            $result = $DB->query("SELECT * FROM `video` ORDER BY id");
            while ($item = mysqli_fetch_assoc($result)) {

        ?>

            <div class="item">
                <a href="./video/<?php echo $item['token']; ?>">
                    <div class="item-poster">
                        <img src="<?php echo $item['portada']; ?>" alt="<?php echo $item['titulo']; ?>">
                    </div>
                    <div class="item-details">
                        <div class="item-title"><?php echo $item['titulo']; ?></div>
                        <div class="item-date"><?php echo $item['create_at']; ?></div>
                    </div>
                </a>
            </div>

        <?php
            }
        ?>

    </div>

</body>

</html>