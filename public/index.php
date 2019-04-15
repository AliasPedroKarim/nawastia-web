<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 26/02/2019
 * Time: 23:53
 */

require_once 'inc/function.php';

$title =  $debug . "Accueil" . $main_name_web;

//Get the status and decode the JSON
$status = json_decode(file_get_contents('https://api.mcsrvstat.us/1/play.jaime-la-survie.com')); //nawa.mcpe.eu:19145

?><!DOCTYPE html>
<html lang="en">
    <?php require_once 'inc/partie/head.php'; ?>
    <body style="background-image: url('assets/img/background/bg-test.jpg');">
        <div style="width: 100%; height: 100vh; background-color: rgba(0,0,0,.25); z-index: -1; position: absolute;"></div>

        <main class="covered-top-center full-center d-flex flex-column vh-100">
            <?php require_once 'inc/partie/navbar-main.php'; ?>
            <section class="jumbotron text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="jumbotron-heading">Encore plus de pvp </h1>
                            <small style="font-family: sans-serif;">Rejoigner-nous sur, ip : <a style="text-decoration: underline;">play.nawastia.com</a> | port : <span style="text-decoration: underline;">19145</span></small>
                            <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam asperiores aspernatur culpa dolorem ea, eveniet, in modi neque nihil odio officia pariatur quae quibusdam quos reprehenderit sequi suscipit tempore!</p>
                            <?php if (!isset($_SESSION['_1'])): ?>
                            <p>
                                <a href="connexion.php" class="btn btn-outline-primary my-2">Se connecter</a>
                                <a href="inscription.php" class="btn btn-outline-secondary my-2">S'inscrire</a>
                            </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php require_once 'inc/partie/footer.php'; ?>

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