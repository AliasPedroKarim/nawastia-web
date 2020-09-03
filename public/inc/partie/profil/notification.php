<?php $notification = new \App\Utilisateur\NotificationDAO(); ?>

<!-- Modal: Activity -->
<?php if (isset($_SESSION) && isset($_SESSION['_1']) && isset($main)):
    $notificationUtilisateur = $main->getStatus('notification', ["id_notifier" => $_SESSION['_1']->getId(), "id_status_notification" => 1]); ?>

            <div class="modal fade text-dark" id="sidebarModalActivity" tabindex="-1" role="dialog" style="display: none;" aria-modal="false">
        <div class="modal-dialog modal-dialog-vertical" role="document" id="notification">
            <div class="modal-content">
                <div class="modal-header">

                    <!-- Title -->
                    <h4 class="modal-title text-dark">
                        Notifications <?= count($notificationUtilisateur) > 0 ? "<span class='badge badge-soft-danger' style='font-size: 1rem;;'>" . count($notificationUtilisateur) . "</span>" : null ?>
                    </h4>

                    <!-- Close -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">
                ×
              </span>
                    </button>

                </div>
                <div class="modal-body bg-white">

                    <!-- List group -->
                    <div class="list-group list-group-flush my-n3">
                        <?php if (isset($main)):

                            $notificationUtilisateur = array_reverse($main->getStatus('notification', ["id_notifier" => $_SESSION['_1']->getId()]));

                            if (!empty($notificationUtilisateur)):
                                foreach ($notificationUtilisateur as $item => $notif):
                                    if (in_array($notif->id_status_notification, [1, 2])):
                                    $image__notify = $main->getImageUtilisateur($utilisateurDAO, $notif->id_notifieur);
                                    ?>
                                    <a class="<?= $notif->id_status_notification == 1 ? "notification" : null ?> list-group-item px-0 position-relative" <?= $notif->id_status_notification == 1 ? "data-status=" . base64_encode($notif->id_status_notification) . " data-content=" . base64_encode($notif->id_notification) : null ?>  href="<?= $notif->lien_notification ?>">

                                        <?= $notif->id_status_notification == 1 ? "<span class='popover-body-indicator bg-danger position-absolute top' style='top: 3px; right: 0px;'></span>" : null ?>

                                        <div class="row">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <img src="<?= isset($image__notify) && $image__notify[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php?id=" . $notif->id_notifieur : $image__notify[0]['path']; ?>" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml-n2 d-flex flex-column">
                                                <div class="h6">
                                                    <?= $notif->titre_notification ?>
                                                </div>
                                                <!-- Content -->
                                                <div class="small text-muted">
                                                    <?= $notif->texte_notification ?>
                                                </div>

                                            </div>
                                            <div class="col-auto">
                                                <small class="text-muted">
                                                    <?php
                                                    $date_notify = $notif->date_notification;
                                                    $datetime2 = new DateTime($date_notify);
                                                    echo ago($datetime2);
                                                    ?>
                                                </small>
                                            </div>
                                        </div> <!-- / .row -->
                                    </a>
                                <?php endif;
                                endforeach;
                            else: ?>
                                <a class="list-group-item px-0 position-relative"  href="#">
                                    <div class="row">
                                        <div class="col-auto">
                                            &nbsp;
                                        </div>
                                        <div class="col ml-n2 d-flex flex-column">
                                            <div class="h6">
                                                Boite de notification vide
                                            </div>
                                            <!-- Content -->
                                            <div class="small text-muted">
                                                vous n'avez aucune notification.
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            &nbsp;
                                        </div>
                                    </div> <!-- / .row -->
                                </a>
                            <?php endif;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
