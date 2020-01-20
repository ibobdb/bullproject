<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- MY CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow|Roboto&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="vendor/fontawesome/fontawesome-free-5.8.2-web/css/all.css">
    <title>Selamat Datang</title>
</head>
<?php
session_start();
include "koneksi.php";
error_reporting(E_ERROR | E_PARSE);

?>

<body>
    <!-- Background -->
    <div class="bg">
        <img src="img/bg.jpg" alt="">
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  ">
        <a class=" navbar-brand" href="index.php">
            <h4 style="font-weight:bold; color:white;">BULL PROJECT</h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION['ss_user'])) { ?>
                    <li class="nav-item dropdown dropleft">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo "$_SESSION[ss_user]"; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="?p=spek">Spesification</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?p=keluar">Keluar</a>
                        </div>
                    </li>
                <?php
                } else { ?>
                    <form action="login.php" method="post" class="form-inline my-2 my-lg-0">
                        <input class="form-control-sm mr-sm-2" type="text" placeholder="Username" name="nama">
                        <input class="form-control-sm mr-sm-2" type="password" placeholder="Password" name="pass">
                        <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit">Masuk</button>
                    </form>
                    <a href="?p=daftar" class="btn btn-outline-warning btn-sm  my-2 my-sm-0"> Daftar</a>
                <?php }

                ?>





            </ul>
        </div>
    </nav>
    <!-- Title -->
    <hr><br><br><br>
    <div class="title">
        <div class="container">
            <br>
            <div class="row ">
                <div class="col-2"></div>
                <div class="col-8">
                    <?php
                    if ($_GET['p'] === "daftar") {
                        include "daftar.php";
                    } elseif ($_GET['p'] === "keluar") {
                        include "keluar.php";
                    } elseif ($_GET['p'] === "game") {
                        include "game.php";
                    } elseif ($_GET['id']) {
                        include "game.php";
                    } elseif ($_GET['p'] === "spek") {
                        include "spek.php";
                    } elseif ($_GET['p'] === "edit") {
                        include "edit.php";
                    } else {
                        include "home.php";
                    }



                    ?>

                </div>
            </div>

        </div>
    </div>
























    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>