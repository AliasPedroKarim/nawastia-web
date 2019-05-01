<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 19/02/2019
 * Time: 14:45
 */

require_once 'inc/function.php';

if (isset($_SESSION['_1'])){
    header("Location: /");
}

$title =  $debug . "Inscription" . $main_name_web;

require_once 'inc/pre-load-function.php';

?><!DOCTYPE html>
<html lang="en">
    <?php require_once 'inc/partie/main/head.php'; ?>
    <body style="background: url(<?= $main_bg ?>) fixed;">

    <div class="container">
        <div class="row">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">

                <div class="modal fade show" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="padding-right: 17px; display: block;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form id="form_register" action="inc/traitement/connexion-inscription.php" enctype="multipart/form-data" class="needs-validation" style="text-align: center;" method="post">

                                    <div class="col-md-12 d-flex justify-content-between">
                                        <a href="\">
                                            <span class="badge badge-primary" style="font-size: 100%;"><i class="fe fe-home"></i></span>
                                        </a>
                                        <a href="connexion.php">
                                            <span class="badge badge-secondary" style="font-size: 100%;"><i class="fe fe-log-in"></i></span>
                                        </a>
                                    </div>

                                    <div class="col-md-12" style="display: flex; justify-content: center; align-content: center;">
                                        <div class="mb-4 covered-top-center" style="width: 71px; height: 71px; background-image: url('assets/img/icon/icon-website.webp'); text-align: center;">

                                        </div>
                                    </div>

                                    <h1 class="h3 mb-3 font-weight-normal">Veuillez vous inscrire</h1>
                                    <?php if (isset($_GET['errorCreateUser']) && $_GET['errorCreateUser'] == "true"): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Attention, l'utilisateur existe déjà !
                                    </div>
                                    <?php elseif (isset($_GET['errorCreateUser']) && $_GET['errorCreateUser'] == "false"): ?>
                                    <div class="alert alert-success" role="alert">
                                        Votre compte a été creer, vous pouvez vous connectez en <a href="connexion.php">cliquant ici </a> !
                                    </div>
                                    <?php endif; ?>

                                    <div class="form-row">
                                        <div class="col-md-3">&nbsp;</div>
                                        <div class="col-md-6 mb-3">
                                            <label for="pseudo">Pseudo <span class="small-caractere">(in game, si possible)</span></label>
                                            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo">
                                            <div class="invalid-feedback">
                                                Un nom d'utilisateur est requis pour pouvoir s'incrire.
                                            </div>
                                        </div>
                                        <div class="col-md-3">&nbsp;</div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nom">Nom</label>
                                            <input type="text" class="form-control" id="nom" name="nom" placeholder="François">
                                            <div class="invalid-feedback">
                                                Veuillez s'il vous plait precisez votre nom.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="prenom">Prenom</label>
                                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Sama">
                                            <div class="invalid-feedback">
                                                Veuillez s'il vous plait precisez votre prenom.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="new_password__register">Mot de passe</label>
                                            <input type="password" class="form-control" id="new_password__register" name="new_password__register" placeholder="secret">
                                            <div class="invalid-feedback">
                                                Le mot de passe est nécessaire pour pouvoir s'inscrire.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="similary_password__register">Mot de passe <span class="small-caractere">confirmation</span></label>
                                            <input type="password" class="form-control" id="similary_password__register" name="similary_password__register" placeholder="secret confirm...">
                                            <div class="invalid-feedback">
                                                Veuillez confirmer le mot de passe que vous avez choisi s'il vous plait.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-12 col-md-12 order-md-2">

                                            <!-- Card -->
                                            <div class="card bg-light border">
                                                <div class="card-body">

                                                    <p class="mb-2 text-primary">
                                                        Exigences de mot de passe
                                                    </p>

                                                    <p class="small text-muted mb-2">
                                                        Pour créer un nouveau mot de passe, vous devez satisfaire à toutes les exigences suivantes :
                                                    </p>

                                                    <ul class="small text-muted pl-4 mb-0">
                                                        <li class="exigence-1">
                                                            Minimum 8 caractères
                                                        </li>
                                                        <li class="exigence-2">
                                                            Au moins un caractère spécial <br>
                                                            <code class="badge badge-soft-primary">!@#$%^&*()_+-=\[]{};':"\|,.<>\/?</code>
                                                        </li>
                                                        <li class="exigence-3">
                                                            Au moins un numéro
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                </div>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="inputGroupPrepend">
                                                <div class="invalid-feedback">
                                                    Veuillez s'il vous plait précisez un Email.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-7 mb-3">
                                            <label for="pseudo_discord">Pseudo Discord</label>
                                            <input type="text" class="form-control" id="pseudo_discord" name="pseudo_discord" placeholder="ex : Nawarious#5353, ...">
                                            <div class="invalid-feedback">
                                                ...
                                            </div>
                                        </div>
                                        <div class="col-md-4 offset-1 mb-3" style="text-align: left;">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customControlValidation2" name="genre" value="homme">
                                                <label class="custom-control-label" for="customControlValidation2">Homme</label>
                                                <div class="invalid-feedback">...</div>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customControlValidation3" name="genre" value="femme">
                                                <label class="custom-control-label" for="customControlValidation3">Femme</label>
                                                <div class="invalid-feedback">...</div>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customControlValidation4" name="genre" value="non spécifier">
                                                <label class="custom-control-label" for="customControlValidation4">Non spécifier</label>
                                                <div class="invalid-feedback">...</div>
                                            </div>

                                        </div>
                                    </div>

                                    <hr class="mb-2">

                                    <div class="form-row d-flex justify-content-center">
                                        <ul class="nav nav-pills mb-3 d-flex justify-content-around w-50" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <span class="nav-link badge badge-primary active" id="pills-photo-file-tab" data-toggle="pill" href="#pills-photo-file" role="tab" aria-controls="pills-photo-file" aria-selected="true">
                                                    <i class="fe fe-image" style="font-size: 1.45em;"></i>
                                                </span>
                                            </li>
                                            <li class="nav-item">
                                                <span class="nav-link badge badge-primary" id="pills-photo-url-tab" data-toggle="pill" href="#pills-photo-url" role="tab" aria-controls="pills-photo-url" aria-selected="false">
                                                    <i class="fe fe-link" style="font-size: 1.45em;"></i>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-row full-center d-flex align-items-center">
                                        <div class="tab-content w-100" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-photo-file" role="tabpanel" aria-labelledby="pills-photo-file-tab">
                                                <div class="row d-flex justify-content-around align-items-center">
                                                    <div class="col-md-6 mb-3">
                                                        <h4>Photo de profil</h4>
                                                    </div>
                                                    <div class="col-md-4 mb-3 d-flex justify-content-center">
                                                        <div class="preview-img" id="p-img" style="background-image: url('http://cravatar.eu/helmhead/Nawarious/128.png');">
                                                            <label for="photo-profil" class="label-img">
                                                                <i class="fas fa-plus" style="color: white; font-size: 3.0em;"></i>
                                                            </label>
                                                        </div>
                                                        <input type="hidden" name="profil-default" value="http://cravatar.eu/helmhead/Nawarious/128.png">
                                                        <input type="file" class="form-control" id="photo-profil" name="photo-profil" aria-describedby="inputGroupPrepend" style="display: none;" onchange="document.getElementById('p-img').style.backgroundImage = `url('${window.URL.createObjectURL(this.files[0])}')`">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-photo-url" role="tabpanel" aria-labelledby="pills-photo-url">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <!-- Label -->
                                                        <label for="photo-profil-default__edit">
                                                            URL de l'image
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">&nbsp;</div>
                                                    <div class="col-md-8 mb-3 d-flex justify-content-center">
                                                        <!-- Input -->
                                                        <input type="text" id="photo-profil-default__edit" name="photo-profil-default" class="form-control" placeholder="http://url...">
                                                    </div>
                                                    <div class="col-md-2">&nbsp;</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-2">

                                    <div class="form-group text-left">
                                        <div class="form-row">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="visibilite_utilisateur" name="visibilite_utilisateur" checked>
                                                <label class="custom-control-label" for="visibilite_utilisateur">Activer la visilité du compte</label>
                                            </div>
                                        </div>
                                        <hr class="mb-2">
                                        <div class="form-row">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="followers_utilisateur" name="followers_utilisateur" checked>
                                                <label class="custom-control-label" for="followers_utilisateur">Activer les followers</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                            <label class="form-check-label" for="invalidCheck">
                                                J'accepte les conditions d'utilisation.
                                            </label>
                                            <div class="invalid-feedback">
                                                Vous n'avez pas accepter les conditions d'utilisation.
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" name="inscription" id="inscription" type="submit">S'inscrire</button>
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
    <script src="assets/js/register_profil.js" type="application/javascript"></script>
    <!-- Have fun using Bootstrap JS -->
    <script type="text/javascript">
        $(window).load(function() {
            $('#connexionModal').modal('show');
        });

        $(window).on('hidden.bs.modal', function() {
            $('#connexionModal').modal('show');
        });

        $.ajax({
            type: "GET",
            url: "https://geo.api.gouv.fr/departements?fields=nom,code,codeRegion",
            success: function(rep){
                rep.forEach((rows, key) =>{
                    $('#cp').append(`<option value='${rep[key].codeRegion}'>${rep[key].code}, ${rep[key].nom}</option>`);
                });

            },
            error: function(msg){
                // On alerte d'une erreur
                //alert('Erreur');
            }
        }).done(function () {
            //...
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</html>