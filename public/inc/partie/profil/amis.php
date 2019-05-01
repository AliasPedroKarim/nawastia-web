<div class="container-fluid">
    <div class="row">
        <?php foreach ($allUtilisateur as $utilisateur):
            if (isset($utilisateur->id_utilisateur) && $utilisateur->id_utilisateur !== $_SESSION['_1']->getId()):
            ?>
            <div class="col-12 col-md-6 col-xl-4">

                <!-- Card -->
                <div class="card">

                    <div class="dropdown card-dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle text-white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                                Action
                            </a>
                            <a href="#!" class="dropdown-item">
                                Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                                Something else here
                            </a>
                        </div>
                    </div>

                    <?php

                    if (empty($utilisateur->bg_profil)){
                        $bg_profil_amis = "assets/img/background/bg-test-1.png";
                    }else{
                        $bg_profil_amis = $utilisateur->bg_profil;
                    }

                    ?>

                    <img src="<?= $bg_profil_amis ?>" alt="..." class="card-img-top">

                    <div class="card-body text-center">

                        <?php $image__amis = getImageUtilisateur($utilisateurDAO, $utilisateur->id_utilisateur);?>

                        <a href="#" class="avatar avatar-xl card-avatar card-avatar-top">
                            <img src="<?= isset($image__amis) && $image__amis[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php?id=" . $utilisateur->id_utilisateur : $image__amis[0]['path']; ?>" class="avatar-img rounded-circle border border-4 border-card" alt="...">
                        </a>

                        <h2 class="card-title">
                            <a href="#"><?= $utilisateur->pseudo ?></a>
                        </h2>

                        <p class="card-text text-muted">
                            <small>
                                <?= $utilisateur->note ?>
                            </small>
                        </p>

                        <p class="card-text">
                            <?php
                            $all_role_utilisateur = $utilisateurDAO->getAllRole($utilisateur->id_utilisateur);
                            foreach ($all_role_utilisateur as $role_utilisateur):

                                $role__amis = $utilisateurDAO->findRole($role_utilisateur->id_status);
                                ?>
                                <span class="badge badge-soft-secondary" style="color: white; background-color: <?= $role__amis[0]->couleur_status ?>">
                                    <?= $role__amis[0]->libelle_status ?>
                                </span>
                            <?php endforeach; ?>
                        </p>

                        <hr>

                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">

                                <small>
                                    <span class="secondary">●</span> Offline
                                </small>

                            </div>
                            <div class="col-auto">

                                <?php


                                $status__amis = $main->getStatus('amis', ["id_joueur_demandeur" => $_SESSION['_1']->getId(), "id_joueur_demander" => $utilisateur->id_utilisateur]);
                                $demmandeur = true;
                                if (empty($status__amis)){
                                    $status__amis = $main->getStatus('amis', ["id_joueur_demandeur" => $utilisateur->id_utilisateur, "id_joueur_demander" => $_SESSION['_1']->getId()]);
                                    $demmandeur = false;
                                }

                                if (empty($status__amis) || $status__amis[0]->id_status_amis == 4):
                                ?>

                                <a href="#" data-content="<?= base64_encode($utilisateur->id_utilisateur)?>" data-status="<?= base64_encode(1)?>" class="amis btn btn-sm btn-primary">
                                    Demmander en amis
                                </a>
                                <?php elseif($status__amis[0]->id_status_amis == 1): ?>
                                    <?php if ($demmandeur === true): ?>
                                    <a href="#" data-content="<?= base64_encode($utilisateur->id_utilisateur)?>" data-status="<?= base64_encode(5)?>" class="amis btn btn-sm btn-danger">
                                        Annuler la demande
                                    </a>
                                    <?php else: ?>
                                    <a href="#" data-content="<?= base64_encode($utilisateur->id_utilisateur)?>" data-status="<?= base64_encode(2)?>" class="amis btn btn-sm btn-success">
                                        Accepter la demande
                                    </a>
                                    <a href="#" data-content="<?= base64_encode($utilisateur->id_utilisateur)?>" data-status="<?= base64_encode(4)?>" class="amis btn btn-sm btn-success">
                                        Refuser la demande
                                    </a>

                                    <?php endif; ?>
                                <?php elseif($status__amis[0]->id_status_amis == 3): ?>
                                <a href="#" data-content="<?= base64_encode($utilisateur->id_utilisateur)?>" data-status="<?= base64_encode(4)?>" class="amis btn btn-sm btn-success">
                                    Retirer des amis
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        <?php
            endif;
        endforeach; ?>
    </div>

</div>