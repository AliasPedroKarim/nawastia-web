<!-- Modal -->
<div class="modal fade" id="info-server" tabindex="-1" role="dialog" aria-labelledby="title_info_server" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_info_server">Information sur le serveur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad asperiores aut beatae earum facilis iste iure labore laboriosam molestias obcaecati perspiciatis praesentium, quisquam, quod rerum sunt unde, ut vitae.
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal">
                    <span class="badge badge-secondary" style="font-size: 100%;"><i class="fe fe-x"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="status-server" tabindex="-1" role="dialog" aria-labelledby="title_status_server" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_status_server">Etat du serveur Minecraft</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (isset($main) && isset($info_serveur_minecraft) && !isset($info_serveur_minecraft->offline)):
                    ?>
                    <h5>Statuts</h5>
                    <div class="card bg-dark">
                        <div class="card-body position-relative">
                            <div class="row d-flex align-items-center">
                                <div class="col-2 col">
                                    <?php if (isset($info_serveur_minecraft->icon)): ?>
                                        <img class="mb-2" src="<?= $info_serveur_minecraft->icon ?>" alt="" width="50" height="50">
                                    <?php else: ?>
                                        <img class="mb-2" src="assets/img/icon/default_icon_serveur.png" alt="" width="50" height="50">
                                    <?php endif; ?>

                                </div>
                                <div class="col-auto">
                                    <?php if (isset($info_serveur_minecraft->hostname)): ?>
                                        <h6 class="text-muted"><?= $info_serveur_minecraft->hostname ?></h6>
                                    <?php elseif (isset($info_serveur_minecraft->debug->dns->a[0]->host)): ?>
                                        <h6 class="text-muted"><?= $info_serveur_minecraft->debug->dns->a[0]->host ?></h6>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="position-absolute d-flex flex-column h-100 p-2" style="top: 0px; right: 35px; align-items: center;">
                                <div class="row h-100 d-flex align-items-center">
                                    <h6 class="text-muted" style="margin-bottom: unset"><?= $info_serveur_minecraft->players->online ?>/<?= $info_serveur_minecraft->players->max ?></h6>&nbsp;&nbsp;
                                    <span class="popover-body-indicator" style="background-color: <?= !isset($info_serveur_minecraft->offline) ? "#43b581" : "#f04747" ?>; width: 1rem; height: 1rem;"></span>
                                </div>
                                <div class="row h-100 d-flex align-items-center">
                                <?php if (isset($info_serveur_minecraft->version)): ?>
                                    <h6 class="text-muted"><?= $info_serveur_minecraft->version ?></h6>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <h5>MOTD</h5>

                <div class="card bg-dark">
                    <div class="card-body">
                        <?php
                            if (isset($info_serveur_minecraft->motd->html) && is_array($info_serveur_minecraft->motd->html)){
                                foreach ($info_serveur_minecraft->motd->html as $key => $motd): ?>
                                    <div class="row align-items-center">
                                        <div class="col">

                                            <!-- Title -->
                                            <h5 class="mb-0">
                                                <?= $motd ?>
                                            </h5>

                                        </div>
                                    </div> <!-- / .row -->
                                    <?php if ($key != count($info_serveur_minecraft->motd->html) -1): ?>
                                        <!-- Divider -->
                                        <hr>
                                    <?php endif; ?>
                                <?php endforeach;
                            }
                        ?>
                    </div>
                </div>

                <h5>Message serveur</h5>

                <div class="card bg-dark">
                    <div class="card-body">
                        <?php
                            if (isset($info_serveur_minecraft->info->html) && is_array($info_serveur_minecraft->info->html)){
                                foreach ($info_serveur_minecraft->info->html as $key => $info): ?>
                                    <div class="row align-items-center">
                                        <div class="col">

                                            <!-- Title -->
                                            <h5 class="mb-0">
                                                <?= $info ?>
                                            </h5>

                                        </div>
                                    </div> <!-- / .row -->
                                    <?php if ($key != count($info_serveur_minecraft->info->html) -1): ?>
                                        <!-- Divider -->
                                        <hr>
                                    <?php endif; ?>
                                <?php endforeach;
                            }
                        ?>
                    </div>
                </div>
                <h5>Information Technique</h5>

                <div class="card bg-dark">
                    <div class="card-body">
                        <?php if (isset($info_serveur_minecraft->software)): ?>
                            <h6 class="text-white">Software serveur</h6> <h6 class="text-muted"><?= $info_serveur_minecraft->software ?></h6>
                        <?php endif; ?>

                        <?php if (isset($info_serveur_minecraft->version)): ?>
                            <h6 class="text-white">Version serveur</h6> <h6 class="text-muted"><?= $info_serveur_minecraft->version ?></h6>
                        <?php endif; ?>

                        <?php if (isset($info_serveur_minecraft->ip)): ?>
                            <h6 class="text-white">IP serveur</h6> <h6 class="text-muted"><?= $info_serveur_minecraft->ip ?></h6>
                        <?php endif; ?>

                        <?php if (isset($info_serveur_minecraft->port)): ?>
                            <h6 class="text-white">Port serveur</h6> <h6 class="text-muted"><?= $info_serveur_minecraft->port ?></h6>
                        <?php endif; ?>
                    </div>
                </div>

                <?php else: ?>

                    <div class="card bg-dark">
                        <div class="card-body position-relative">
                            <div class="row d-flex align-items-center">
                                <h6 class="text-muted">Status serveur indiponible !</h6>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal">
                    <span class="badge badge-secondary" style="font-size: 100%;"><i class="fe fe-x"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>
