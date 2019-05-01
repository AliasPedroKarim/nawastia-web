<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">

            <div class="card">
                <div class="card-body">
                    <!-- Header -->
                    <div class="header mt-md-2">
                        <div class="header-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Pretitle -->
                                    <h6 class="header-pretitle">
                                        Vue d'ensemble
                                    </h6>

                                    <!-- Title -->
                                    <h1 class="header-title">
                                        Réglages
                                    </h1>

                                </div>
                            </div> <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-overflow header-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="profil-edit-general-tab" data-toggle="tab" href="#profil-edit-general" role="tab" aria-controls="profil-edit-general" aria-selected="true">
                                                Général
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profil-edit-profil-tab" data-toggle="tab" href="#profil-edit-profil" role="tab" aria-controls="profil-edit-profil" aria-selected="true">
                                                Profil
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profil-edit-notification-tab" data-toggle="tab" href="#profil-edit-notification" role="tab" aria-controls="profil-edit-notification" aria-selected="true">
                                                Notifications
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                    <div class="container-fluid tab-content">
                        <div class="tab-pane fade show active" id="profil-edit-general" role="tabpanel" aria-labelledby="profil-edit-general-tab">
                            <form class="mb-4 mt-4" method="post">
                                <div class="row">
                                    <div class="col-12 col-md-12">

                                        <!-- First name -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label for="pseudo__edit">
                                                Pseudo
                                            </label>

                                            <!-- Input -->
                                            <input type="text" name="pseudo" id="pseudo__edit" value="<?= $displaySecure->format_charac((isset($_SESSION['_1']) && !empty($_SESSION['_1'])) ? $_SESSION['_1']->getPseudo() : "insponible") ?>" class="form-control">
                                            <input type="hidden" name="id" id="id__edit" value="<?= $displaySecure->format_charac((isset($_SESSION['_1']) && !empty($_SESSION['_1'])) ? $_SESSION['_1']->getId() : "") ?>">

                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- First name -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label for="nom__edit">
                                                Nom <small class="badge badge-soft-primary"><?= $displaySecure->format_charac((isset($_SESSION['_1']) && !empty($_SESSION['_1'])) ? $_SESSION['_1']->getNom() : "insponible") ?></small>
                                            </label>

                                            <!-- Input -->
                                            <input type="text" id="nom__edit" name="nom" value="<?= $displaySecure->format_charac((isset($_SESSION['_1']) && !empty($_SESSION['_1'])) ? $_SESSION['_1']->getNom() : "insponible") ?>" class="form-control">

                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Last name -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label for="prenom__edit">
                                                Prenom
                                            </label>

                                            <!-- Input -->
                                            <input type="text" id="prenom__edit" name="prenom" value="<?= $displaySecure->format_charac((isset($_SESSION['_1']) && !empty($_SESSION['_1'])) ? $_SESSION['_1']->getPrenom() : "insponible") ?>" class="form-control">

                                        </div>

                                    </div>
                                    <div class="col-12">

                                        <!-- Email address -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label class="mb-1" for="email__edit">
                                                Email
                                            </label>

                                            <!-- Form text -->
                                            <small class="form-text text-muted">
                                                Ce contact ne sera pas montré publiquement aux autres, faites comme vous le sentez.
                                            </small>

                                            <!-- Input -->
                                            <input type="email" id="email__edit" name="email" value="<?= $displaySecure->format_charac((isset($_SESSION['_1']) && !empty($_SESSION['_1'])) ? $_SESSION['_1']->getEmail() : "insponible") ?>" class="form-control">

                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Phone -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label for="pseudo_discord__edit">
                                                Pseudo <small class="badge mr-4" style="background-color: #7289da; color: #fff;">Discord</small>
                                            </label>

                                            <!-- Input -->
                                            <input type="text" name="pseudo_discord" id="pseudo_discord__edit" value="<?= $displaySecure->format_charac((isset($_SESSION['_1']) && !empty($_SESSION['_1'])) ? $_SESSION['_1']->getPseudoDiscord() : "insponible") ?>" class="form-control mb-3" placeholder="(*_*)"> <!--data-mask="(000) 000-0000" autocomplete="off" maxlength="14"-->

                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Birthday -->
                                        <div class="form-group">

                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="femme__edit" name="genre__edit" value="femme" <?= (isset($_SESSION['_1']) && $_SESSION['_1']->getGenre() === "femme") ? "checked='checked'" : ""  ?> required>
                                                <label class="custom-control-label" for="femme__edit">Femme</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="homme__edit" name="genre__edit" value="homme" <?= (isset($_SESSION['_1']) && $_SESSION['_1']->getGenre() === "homme") ? "checked='checked'" : ""  ?> required>
                                                <label class="custom-control-label" for="homme__edit">Homme</label>
                                            </div>
                                            <div class="custom-control custom-radio mb-3">
                                                <input type="radio" class="custom-control-input" id="non_specifier__edit" name="genre__edit" value="non spécifier" <?= (isset($_SESSION['_1']) && $_SESSION['_1']->getGenre() === "non spécifier") ? "checked='checked'" : ""  ?> required>
                                                <label class="custom-control-label" for="non_specifier__edit">Non spécifier</label>
                                                <div class="invalid-feedback">...</div>
                                            </div>

                                        </div>

                                    </div>
                                </div> <!-- / .row -->

                                <!-- Divider -->
                                <hr class="mt-4 mb-5">

                                <div class="row">
                                    <div class="col-12 col-md-6">

                                        <!-- Public profile -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label class="mb-1">
                                                Profil public
                                            </label>

                                            <!-- Form text -->
                                            <small class="form-text text-muted">
                                                Rendre votre profil public signifie que tout le monde sur le réseau Dashkit pourra vous trouver.
                                            </small>

                                            <div class="row">
                                                <div class="col-auto">

                                                    <!-- Switch -->
                                                    <div class="custom-control custom-switch mt-1">
                                                        <input type="checkbox" name="visilite_utilisateur" class="switch-visibled custom-control-input" id="visilite_utilisateur__edit" <?= (isset($_SESSION['_1']) && $_SESSION['_1']->getVisibiliteUtilisateur() == 1) ? "checked" : "" ?>>
                                                        <label class="custom-control-label" for="visilite_utilisateur__edit"></label>
                                                    </div>

                                                </div>
                                                <div class="col ml-n2">

                                                    <!-- Help text -->
                                                    <small class="text-muted">
                                                        Vous êtes actuellement invisible.
                                                    </small>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Allow for additional Bookings -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label class="mb-1">
                                                Followers
                                            </label>

                                            <!-- Form text -->
                                            <small class="form-text text-muted">
                                                En activant cette option, tout le monde peut vous suivre.
                                            </small>

                                            <div class="row">
                                                <div class="col-auto">

                                                    <!-- Switch -->
                                                    <div class="custom-control custom-switch mt-1">
                                                        <input type="checkbox" name="followers_utilisateur" class="switch-followers custom-control-input" id="followers_utilisateur__edit" <?= (isset($_SESSION['_1']) && $_SESSION['_1']->getFollowersUtilisateur() == 1) ? "checked" : "" ?>>
                                                        <label class="custom-control-label" for="followers_utilisateur__edit"></label>
                                                    </div>

                                                </div>
                                                <div class="col ml-n2">

                                                    <!-- Help text -->
                                                    <small class="text-muted">
                                                        On peut vous suivre.
                                                    </small>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>

                                    </div>

                                    <div class="col-12 col-md-12 mt-3">
                                        <!-- Submit -->
                                        <button type="submit" id="edit_profil_genaral" name="edit_profil_genaral" attr_encrypt='<?= base64_encode("../../inc/traitement/profil/edit_profil__async.php") ?>' class="btn btn-primary">
                                            Mettre à jour
                                        </button>
                                    </div>
                                </div> <!-- / .row -->
                            </form>

                            <!-- Divider -->
                            <hr class="mt-4 mb-5">

                            <form class="mb-4 mt-4" method="post">
                                <div class="row">
                                    <div class="col-12 col-md-6 order-md-2">

                                        <!-- Card -->
                                        <div class="card bg-light border ml-md-4">
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
                                                        Au moins un caractère spécial
                                                        <code class="badge badge-soft-primary">!@#$%^&*()_+-=\[]{};':"\|,.<>\/?</code>
                                                    </li>
                                                    <li class="exigence-3">
                                                        Au moins un numéro
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <!-- Password -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label for="old_password__edit">
                                                Ancien mots de passe
                                            </label>

                                            <!-- Input -->
                                            <input type="password" name="old_password" id="old_password__edit" class="form-control">
                                            <input type="hidden" name="id" id="id_password__edit" value="<?= $displaySecure->format_charac((isset($_SESSION['_1']) && !empty($_SESSION['_1'])) ? $_SESSION['_1']->getId() : "") ?>">
                                            <div class="invalid-feedback">
                                                Ce mot de passe ne correspond pas à l'ancien.
                                            </div>
                                            <div class="valid-feedback">
                                                Votre mot de pass est bon.
                                            </div>
                                        </div>

                                        <!-- New password -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label for="new_password__edit">
                                                Nouveau mots de passe
                                            </label>

                                            <!-- Input -->
                                            <input type="password" name="new_password" id="new_password__edit" class="form-control">
                                            <div class="invalid-feedback">
                                                Les mots de passe ne sont pas similaire ou les champs sont vides.
                                            </div>
                                            <div class="valid-feedback">
                                                Les mots de passe sont similaire.
                                            </div>
                                        </div>

                                        <!-- Confirm new password -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label for="similary_password__edit">
                                                Confirme mots de passe
                                            </label>

                                            <!-- Input -->
                                            <input type="password" name="similary_password" id="similary_password__edit" class="form-control">
                                            <div class="invalid-feedback">
                                                Les mots de passe ne sont pas similaire ou les champs sont vides.
                                            </div>
                                            <div class="valid-feedback">
                                                Les mots de passe sont similaire.
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <button type="submit" name="edit_profil_password" id="edit_profil_password__edit" attr_encrypt='<?= base64_encode("../../inc/traitement/profil/edit_profil__async.php") ?>' class="btn btn-primary">
                                            Mettre à jour
                                        </button>

                                    </div>
                                </div> <!-- / .row -->
                            </form>
                        </div>

                        <div class="tab-pane fade" id="profil-edit-profil" role="tabpanel" aria-labelledby="profil-edit-profil-tab">
                            <form id="form_edit_profil_avatar" action="inc/traitement/profil/edit_profil__async.php" enctype="multipart/form-data" class="mb-4 mt-4" method="post">

                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <!-- First name -->
                                        <div class="form-group d-flex justify-content-center">

                                            <!-- Label -->

                                            <div class="preview-img border-1 border-secondary" id="p-img" style="background-image: url('<?= isset($infoImageProfle) && $infoImageProfle[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php" : $infoImageProfle[0]['path']; ?>'); width: 300px; height: 300px; box-shadow: unset;" >
                                                <label for="photo-profil__edit" class="label-img d-flex justify-content-center align-items-center" style=" width: 300px; height: 300px;">
                                                    <i class="fe fe-edit-2" style="color: white; font-size: 6.0em;"></i>
                                                </label>
                                            </div>
                                            <input type="hidden" name="profil-default" value="http://cravatar.eu/helmhead/Nawarious/128.png">
                                            <input type="hidden" name="id" id="id_photo-profil__edit" value="<?= $displaySecure->format_charac((isset($_SESSION['_1']) && !empty($_SESSION['_1'])) ? $_SESSION['_1']->getId() : "") ?>">
                                            <input type="file" class="form-control" id="photo-profil__edit" name="photo-profil" aria-describedby="inputGroupPrepend" style="display: none;" onchange="document.getElementById('p-img').style.backgroundImage = `url('${window.URL.createObjectURL(this.files[0])}')`">


                                        </div>

                                    </div>
                                </div> <!-- / .row -->

                                <!-- Divider -->
                                <hr class="mt-4 mb-5">

                                <div class="row">
                                    <div class="col-12 col-md-6 offset-3">

                                        <!-- Last name -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label for="photo-profil-default">
                                                Image
                                            </label>

                                            <!-- Input -->
                                            <input type="text" id="photo-profil-default__edit" name="photo-profil-default" class="form-control" placeholder="http://url..." value="<?= isset($infoImageProfle) && $infoImageProfle[0]['blob'] == 1 ? $infoImageProfle[0]['nom_d_origine'] : $infoImageProfle[0]['path']; ?>">

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <button type="submit" value="true" name="edit_profil_avatar" id="edit_profil_avatar__edit" attr_encrypt='<?= base64_encode("../../inc/traitement/profil/edit_profil__async.php") ?>' class="btn btn-primary">
                                        Mettre à jour
                                    </button>
                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="profil-edit-notification" role="tabpanel" aria-labelledby="profil-edit-notification-tab">
                            <form class="mb-4" id="edit_profil_notification" method="post" action="<?= base64_encode("../../inc/traitement/profil/edit_profil__async.php") ?>">

                                <!-- Divider -->
                                <hr class="mt-4 mb-5">

                                <div class="row">
                                    <div class="col-12 col-md-6">

                                        <!-- Public profile -->
                                        <div class="form-group">

                                            <!-- Label -->
                                            <label class="mb-1">
                                                Notification des activités
                                            </label>

                                            <!-- Form text -->
                                            <small class="form-text text-muted">
                                                En activant cette option, vous serez notifié lorsqu'il y aura de nouvelle activité.
                                            </small>

                                            <div class="row mt-3">
                                                <div class="col-auto">

                                                    <!-- Switch -->
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="switch-notification-activite custom-control-input" id="notification_activite__edit" name="notification_activite__edit" <?= (isset($_SESSION['_1']) && $_SESSION['_1']->getNotificationActivite() == 1) ? "checked" : "" ?>>
                                                        <label class="custom-control-label" for="notification_activite__edit"></label>
                                                    </div>

                                                </div>
                                                <div class="col ml-n2">

                                                    <!-- Help text -->
                                                    <small class="text-muted">
                                                        You're currently invisible
                                                    </small>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">

                                        &nbsp;

                                    </div>
                                </div> <!-- / .row -->

                                <div class="row">
                                    <button type="submit" value="true" name="edit_profil_notification_submit" id="edit_profil_notification_submit__edit" class="btn btn-primary">
                                        Mettre à jour
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- / .row -->
</div>