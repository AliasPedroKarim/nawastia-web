<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 06/03/2019
 * Time: 01:20
 */

use App\MainSecurity;

require_once 'inc/function.php';

$displaySecure = new MainSecurity();

$title =  $debug . "Profile - " . $_SESSION['_1']->getPseudo() . $main_name_web;

//Get the status and decode the JSON
$status = json_decode(file_get_contents('https://api.mcsrvstat.us/1/play.jaime-la-survie.com')); //nawa.mcpe.eu:19145

?><!DOCTYPE html>
<html lang="en">
    <?php require_once 'inc/partie/head.php'; ?>
    <body style="background-image: url('assets/img/background/bg-test.jpg');">
    <div style="width: 100%; height: 100vh; background-color: rgba(0,0,0,.25); z-index: -1; position: absolute;"></div>
        <main class="covered-top-center full-center d-flex flex-column vh-100">
            <?php require_once 'inc/partie/navbar-main.php'; ?>
            <div class="container position-relative">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body position-relative">
                        <div class="row position-absolute" style="left: 20px; top: -50px;">
                            <div class="col-sm-3">
                                <div class="img-profil__user" style="background-image: url('<?= $_SESSION['_1']->getPhotoProfil(); ?>');">

                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <h5 class="card-title">Dark card title</h5>
                                <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                                <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                                <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-dark mb-3 ml-3 position-absolute" style="width: 75%; right: 40px; top: -50px;">
                    <div class="card-header position-relative">
                        <h5><?= $displaySecure->format_charac($_SESSION['_1']->getPseudo()); ?></h5>
                        <small class="distinct-element"><?= $displaySecure->format_charac($_SESSION['_1']->getPseudoDiscord()); ?></small>
                    </div>
                    <div class="card-body text-dark">
                        <div class="row">
                            <h5 class="card-title">Dark card title</h5>
                            <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                            <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                            <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                            <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                            <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                            <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                            <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                            <p class="card-text">jsyhkfensfehfise,fhsefhsefhsefhsefuh</p>
                        </div>
                        <div class="row">

                        </div>
                        <hr class="mb-4">
                        <div class="text-center">
                            <h5 class="card-title">Biographie</h5>
                            <div class="card text-white bg-dark mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Pourquoi Biographie xD </h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores aut, consequatur dignissimos doloremque ex facilis harum magni, minus natus neque nesciunt non numquam praesentium, recusandae rem unde velit voluptatem.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- BS JavaScript -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <!-- Have fun using Bootstrap JS -->
    <script type="text/javascript">

    </script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</html>