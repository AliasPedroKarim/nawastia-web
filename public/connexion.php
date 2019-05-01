<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 19/02/2019
 * Time: 11:38
 */

require_once 'inc/function.php';

if (isset($_SESSION['_1'])){
    header("Location: /");
}

$title =  $debug . "Connexion" . $main_name_web;

require_once 'inc/pre-load-function.php';

?><!DOCTYPE html>
<html lang="en">
    <?php require_once 'inc/partie/main/head.php'; ?>
    <body style="background: url(<?= $main_bg ?>) fixed ;">

        <div class="container">
            <div class="row">
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-4">

                    <div class="modal fade show" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="padding-right: 17px; display: block;">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form id="form_sign_in" class="needs-validation" style="text-align: center;" method="post" action="inc/traitement/connexion-inscription.php" novalidate>

                                        <div class="col-md-12 d-flex justify-content-between">
                                            <a href="\">
                                                <span class="badge badge-primary" style="font-size: 100%;"><i class="fe fe-home"></i></span>
                                            </a>
                                            <a href="inscription.php">
                                                <span class="badge badge-secondary" style="font-size: 100%;"><i class="fe fe-edit"></i></span>
                                            </a>
                                        </div>

                                        <div class="col-md-12" style="display: flex; justify-content: center; align-content: center;">
                                            <div class="mb-4 covered-top-center" style="width: 71px; height: 71px; background-image: url('assets/img/icon/icon-website.webp'); text-align: center;">

                                            </div>
                                        </div>

                                        <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>

                                        <?php if (isset($_GET['userNoExist']) && $_GET['userNoExist'] == "true"): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Attention, l'utilisateur n'existe pas !
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="identificateur">Nom D'utilisateur ou Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="identificateur" name="identificateur" placeholder="Identifiant" aria-describedby="inputGroupPrepend">
                                                    <div class="invalid-feedback">
                                                        Veuillez s'il vous plait précisez un Nom D'utilisateur ou Email.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="motDePasse">Mot de passe</label>
                                                <input type="password" class="form-control" id="motDePasse" name="motDePasse" placeholder="Mot de passe">
                                                <div class="invalid-feedback">
                                                    Veuillez s'il vous plait donnez votre mot de passe.
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-primary" name="connexion" type="submit">Connexion</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">&nbsp;</div>
            </div>
        </div>

    </body>

    <script src="assets/js/main.js" type="application/javascript"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="assets/js/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="assets/js/jquery/jquery-1.11.0.js"></script>
    <!-- BS JavaScript -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <!-- Have fun using Bootstrap JS -->
    <script type="text/javascript">
        $(window).load(function() {
            $('#connexionModal').modal('show');
        });

        $(window).on('hidden.bs.modal', function() {
            $('#connexionModal').modal('show');
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


</html>