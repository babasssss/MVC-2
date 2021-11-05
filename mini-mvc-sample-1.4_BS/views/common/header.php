<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini MVC Sample</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/style/main3.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">

    <link rel="icon" href="./public/img/logo.png" />



</head>

<body class="<?= isset($_GET['id']) ? 'brick' : '' ?>">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">


            <?php


            if (strstr($_SERVER['REQUEST_URI'],"/todo/liste"))
            {

                ?>
                <a class="navbar-brand titre" href="../">T L</a>
                <ul class="nav nav-pills">
                <li class="nav-item"><a href="../about" class="nav-link">À propos</a></li>
                <?php
                if (\utils\SessionHelpers::isLogin())
                {
                    echo '<li class="nav-item"><a href="../me" class="nav-link">Mon compte</a></li>';
                }
                else
                {
                    echo '<li class="nav-item"><a href="../login" class="nav-link">Connexion</a></li>';
                }

            }
            else
            {
                ?>
                <a class="navbar-brand titre" href="./">T L</a>
                <ul class="nav nav-pills">
                <li class="nav-item"><a href="./about" class="nav-link">À propos</a></li>
                <?php
                if (\utils\SessionHelpers::isLogin())
                {
                    echo '<li class="nav-item"><a href="./me" class="nav-link">Mon compte</a></li>';
                }
                else
                {
                    echo '<li class="nav-item"><a href="./login" class="nav-link">Connexion</a></li>';
                }


                }
            ?>


            
            
        </ul>
    </div>
</nav>