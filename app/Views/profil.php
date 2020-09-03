<div class="container-fluid padding-header-top-default">
    <?php //require_once 'inc/partie/navbar-linear.php'; ?>
    <div class="row m-0">

        <?php require_once 'inc/partie/navbar-admin.php'; ?>

        <div class="col-md-10">
            <div class="header w-100 bg-white">

                <?php
                // default : assets/img/background/bg-test-1.png

                $bg_profil_session = $_SESSION['_1']->getBgProfil();
                if (empty($bg_profil_session)){
                    $bg_profil = "assets/img/background/bg-test-1.png";
                }else{
                    $bg_profil = $_SESSION['_1']->getBgProfil();
                }
                ?>

                <!-- Image -->
                <div style="background-image: url('<?= $bg_profil ?>')" class="covered-center header-img-top">

                </div>

                <div class="container-fluid">

                    <!-- Body -->
                    <div class="header-body mt-n5 mt-md-n6">
                        <div class="row align-items-end">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-xxl header-avatar-top">
                                    <img src="<?= isset($profil_image) && $profil_image[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php" : $profil_image[0]['path']; ?>" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col mb-3 ml-n3 ml-md-n2">

                                <!-- Pretitle -->
                                <h6 class="header-pretitle">
                                    <?php
                                        if (isset($_SESSION['_1'])){
                                            foreach($allRole as $value):
                                                $role = $utilisateurDAO->findRole($value->id_status);
                                                ?>
                                                <small class="badge" style="color: white; background-color: <?= $role[0]->couleur_status ?>"><?= $role[0]->libelle_status ?></small>
                                            <?php endforeach;
                                        }
                                    ?>
                                </h6>

                                <!-- Title -->
                                <h1 class="header-title">
                                    <?= $displaySecure->format_charac($_SESSION['_1']->getPseudo()); ?>
                                </h1>

                            </div>
                            <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3 d-flex justify-content-end">

                                <!-- Badge discord -->
                                <small class="badge mr-4" style="background-color: #7289da; color: #fff;">
                                    <?= $displaySecure->format_charac($_SESSION['_1']->getPseudoDiscord()); ?>
                                </small>

                            </div>
                        </div> <!-- / .row -->
                        <div class="row align-items-center">
                            <div class="col-md-12">

                                <!-- Nav -->
                                <ul class="nav nav-tabs nav-overflow header-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="new-activites-tab" data-toggle="tab" href="#new-activites" role="tab" aria-controls="new-activites" aria-selected="true">
                                            Activités
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="maj-tab" data-toggle="tab" href="#maj" role="tab" aria-controls="maj" aria-selected="true">
                                            M.A.J
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="events-tab" data-toggle="tab" href="#events" role="tab" aria-controls="events" aria-selected="true">
                                            Events
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="amis-tab" data-toggle="tab" href="#amis" role="tab" aria-controls="amis" aria-selected="true">
                                            Amis
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div> <!-- / .header-body -->

                </div>
            </div>

            <br>
            <div class="container-fluid tab-content">
                <div class="tab-pane fade show active" id="new-activites" role="tabpanel" aria-labelledby="new-activites-tab">
                    <?php require_once 'inc/partie/profil/new-activites.php'?>
                </div>

                <div class="tab-pane fade" id="maj" role="tabpanel" aria-labelledby="maj-tab">
                    <?php require_once 'inc/partie/profil/maj.php'?>
                </div>

                <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab">
                    <?php require_once 'inc/partie/profil/events.php'?>
                </div>

                <div class="tab-pane fade" id="amis" role="tabpanel" aria-labelledby="amis-tab">
                    <?php require_once 'inc/partie/profil/amis.php'?>
                </div>

                <div class="tab-pane fade" id="profil-edit" role="tabpanel" aria-labelledby="profil-edit-tab">
                    <?php require_once 'inc/partie/profil/edit.php'; ?>
                </div>

                <div class="tab-pane fade" id="profil-reglement" role="tabpanel" aria-labelledby="profil-reglement-tab">
                    <?php require_once 'inc/partie/profil/reglement.php'; ?>
                </div>
                <div class="tab-pane fade" id="nouvelle-activite" role="tabpanel" aria-labelledby="nouvelle-activite-tab">
                    <?php require_once 'inc/partie/administration/nouvelle-activite.php'; ?>
                </div>
            </div>

            <br>


        </div>
    </div>
</div>