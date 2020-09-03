<div class="row">
    <div class="col-12 col-xl-8">

        <?php

        $allActivite = $activite->getActivite();

        foreach ($allActivite as $key => $value):

            if (isset($allActivite) && $allActivite[$key]->id_status_activite != 3):
                $status = $allActivite[$key]->id_status_activite;

                $image = $activite->getImageActivite($value->id_activite);

                $poster = $utilisateurDAO->findUtilisateurNoOjbet($value->id_poster);
                if (isset($poster) && !empty($poster)){
                    $img_poster = $utilisateurDAO->getImageUtilisateur($poster[0]['id_image_utilisateur']);
                }else{
                    $img_poster = null;
                }
                ?>

                <!-- Card -->
                <div class="card">
                    <div class="card-body">

                        <!-- Header -->
                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="#!" class="avatar">
                                        <img src="<?= isset($img_poster) && $img_poster[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php?id=" . $value->id_poster : $img_poster[0]['path']; ?>" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml-n2">

                                    <!-- Title -->
                                    <h4 class="card-title mb-1">
                                        <?= isset($poster) && !empty($poster) ? $poster[0]['pseudo'] : 'delete_user' ?> <?= isset($status) && $status == 2 ? "<a href='#!' class='badge badge-soft-primary'>modifié</a>" : "" ;?>
                                    </h4>

                                    <!-- Time -->
                                    <p class="card-text small text-muted">
                                        <span class="fe fe-clock"></span> <time datetime="<?= getDefaulftDateTime($value->date_activite, true) ?>"><?= getDefaulftDateTime($value->date_activite) ?></time>
                                        <?= isset($status) && $status == 2 ? "<span class='fe fe-clock'></span> <time datetime='" . getDefaulftDateTime($value->date_dernier_activte, true) . "'> " . getDefaulftDateTime($value->date_dernier_activte) . "</time>" : "" ;?>
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- / .row -->
                        </div>

                        <!-- Text -->
                        <p class="mb-3"> <!-- <a href="#!" class="badge badge-soft-primary">@...</a> -->
                            <?= $main->formatMesssage($value->text_activite); ?>
                        </p>

                        <!--<p class="mb-4">
                            What do you y'all think? Would love some feedback from <a href="#!" class="badge badge-soft-primary">@Ab</a> or <a href="#!" class="badge badge-soft-primary">@Adolfo</a>?
                        </p>-->

                        <!-- Image -->
                        <?php if (!empty($image)): ?>
                        <p class="text-center mb-3">
                            <img src="<?= isset($image) ? $image[0]->url_or_path : null ?>" alt="..." class="img-fluid rounded">
                        </p>
                        <?php endif; ?>

                        <!-- Buttons -->
                        <div class="mb-3">
                            <div class="row mb-2">
                                <?php

                                $allReactionActivite = $activite->getReactionActivite($status);

                                $list_reaction = array();
                                $list_user = array();
                                foreach ($allReactionActivite as $k){
                                    if (!in_array($k->id_reaction, $list_reaction)){
                                        $list_reaction[] = $k->id_reaction;
                                    }
                                    if (!in_array($k->id_utilisateur_reaction, $list_user)){
                                        $list_user[] = $k->id_utilisateur_reaction;
                                    }
                                }

                                foreach ($list_reaction as $nb):
                                    $reaction_result = $activite->getReactionActivite($allReactionActivite[0]->id_activite_reaction, $nb);
                                    $exist = false;
                                    foreach ($reaction_result as $item){
                                        if ($item->id_utilisateur_reaction == $_SESSION['_1']->getId()){
                                            $exist = true;
                                        }
                                    }

                                    ?>
                                    <a href="#" class="btn btn-sm btn-white <?= $exist === true ? "reaction_you" : "" ?> emojiItem emojiItem-<?= $activite->getReaction($nb, 'id_reaction')[0]->unicode ?>" unicode="<?= $activite->getReaction($nb, 'id_reaction')[0]->id_reaction ?>" contexte="<?= $status ?>" >
                                        <?= $activite->getReaction($nb, 'id_reaction')[0]->emote_reaction ?> <?= count($reaction_result) ?>
                                    </a>
                                    &nbsp;
                                <?php endforeach; ?>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end">

                                    <div class="dropdown col-auto">
                                        <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="add_reaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Add Reaction
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="add_reaction">
                                            <div class="d-flex flex-wrap justify-content-start p-1" style="overflow: scroll; height: 200px;">
                                                <?php
                                                $all_reaction = $activite->getReaction();

                                                foreach ($all_reaction as $key_reaction => $value_reaction):?>
                                                    <div class="btn btn-sm btn-white emojiItem emojiItem-<?= $value_reaction->unicode ?>" unicode="<?= $value_reaction->id_reaction ?>" contexte="<?= $status ?>" style="margin: 0.125rem 0.125rem;"><?= $value_reaction->emote_reaction ?></div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-auto mr-n3 d-none d-sm-flex">

                                    <div class="avatar-group">

                                        <?php
                                        count($list_user) >= 5 ? $countable = 5 : $countable = count($list_user);
                                        for ($i = 0; $i< $countable; $i++):
                                            $user_reaction = $utilisateurDAO->getImageUtilisateur($utilisateurDAO->findUtilisateurNoOjbet($list_user[$i], 'id_utilisateur')[0]['id_image_utilisateur']);
                                        ?>
                                        <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="<?= $utilisateurDAO->findUtilisateurNoOjbet($list_user[$i], 'id_utilisateur')[0]['pseudo'] ?>">
                                            <img src="<?= isset($user_reaction) && $user_reaction[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php?id=" . $list_user[$i] : $user_reaction[0]['path']; ?>" alt="..." class="avatar-img rounded-circle">
                                        </a>
                                        <?php endfor; ?>
                                    </div>

                                </div>
                                <div class="col-auto">

                                    <a href="#" class="btn btn-sm btn-white">
                                        Partager
                                    </a>

                                </div>
                            </div> <!-- / .row -->
                        </div>

                        <!-- Divider -->
                        <hr>

                        <div class="format-comment scrollbar style-7 p-3" style="overflow-y: scroll; overflow-x: hidden;">
                            <!-- Comments -->

                            <?php

                            $commentaires = $activite->getCommentaire($status, 'id_activite');

                            foreach ($commentaires as $commentaire):

                                $commenteur = $utilisateurDAO->findUtilisateurNoOjbet($commentaire->id_utilisateur, 'id_utilisateur');
                                $commenteur_image = $main->getImageUtilisateur($utilisateurDAO, $commentaire->id_utilisateur);
                                ?>

                                <div class="comment mb-3">
                                    <div class="row <?= $commentaire->id_utilisateur == $_SESSION['_1']->getId() ? "d-flex flex-row-reverse justify-content-end" : "" ?>">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <a class="avatar" href="#">
                                                <img src="<?= isset($commenteur_image) && $commenteur_image[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php?id=" . $commentaire->id_utilisateur : $commenteur_image[0]['path']; ?>" alt="..." class="avatar-img rounded-circle">
                                            </a>

                                        </div>
                                        <div class="col ml-n2 <?= $commentaire->id_utilisateur == $_SESSION['_1']->getId() ? "d-flex justify-content-end" : "" ?>">

                                            <!-- Body -->
                                            <div class="comment-body">

                                                <div class="row">
                                                    <div class="col">

                                                        <!-- Title -->
                                                        <h5 class="comment-title">
                                                            <?= $commenteur[0]['pseudo'] ?>
                                                        </h5>

                                                    </div>
                                                    <div class="col-auto">

                                                        <!-- Time -->
                                                        <time class="<?= getDefaulftDateTime($commentaire->date_commentaire, true) ?>">
                                                            <?= getDefaulftDateTime($commentaire->date_commentaire) ?>
                                                        </time>

                                                    </div>
                                                </div> <!-- / .row -->

                                                <!-- Text -->
                                                <p class="comment-text">
                                                    <?= nl2br($displaySecure->format_charac($commentaire->text_commentaire)) ?>
                                                </p>

                                            </div>

                                        </div>
                                    </div> <!-- / .row -->
                                </div>

                            <?php endforeach; ?>
                        </div>

                        <!-- Divider -->
                        <hr>

                        <!-- Form -->
                        <div class="row align-items-start">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar">
                                    <img src="<?= isset($profil_image) && $profil_image[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php" : $profil_image[0]['path']; ?>" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml-n2">

                                <!-- Input -->
                                <form method="post" action="inc/traitement/activite/manage_activite.php" name="activite-n-<?= $status ?>" id="activite-n-<?= $status ?>">
                                    <label class="sr-only">Laissez un commentaire...</label>
                                    <textarea class="form-control" placeholder="Laissez un commentaire" rows="2" name="text_commentaire"></textarea>*
                                    <input type="hidden" name="area_activite_contexte" value="<?= base64_encode($status) ?>">

                                    <button type="submit" class="btn btn-primary mt-3 float-right comment-message">
                                        Poster
                                    </button>
                                </form>

                            </div>

                            <div class="col-12 d-flex justify-content-end ">

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>

    </div>
    <div class="col-12 col-xl-4">

        <!-- Card -->
        <div class="card">
            <div class="card-body">

                <div class="row align-items-center">
                    <div class="col">

                        <!-- Title -->
                        <h5 class="mb-0">
                            Date de naissance
                        </h5>

                    </div>
                    <div class="col-auto">

                        <time class="small text-muted" datetime="1988-10-24">
                            non disponible
                        </time>

                    </div>
                </div> <!-- / .row -->

                <!-- Divider -->
                <hr>

                <div class="row align-items-center">
                    <div class="col">

                        <!-- Title -->
                        <h5 class="mb-0">
                            Rejoins
                        </h5>

                    </div>
                    <div class="col-auto">

                        <time class="small text-muted" datetime="2018-10-28">
                            <?= getDefaulftDateTime($_SESSION['_1']->getDateCreationCompte()) ?>
                        </time>

                    </div>
                </div> <!-- / .row -->

                <!-- Divider -->
                <hr>

                <div class="row align-items-center">
                    <div class="col">

                        <!-- Title -->
                        <h5 class="mb-0">
                            Localisation
                        </h5>

                    </div>
                    <div class="col-auto">

                        <small class="text-muted">
                            non disponible
                        </small>

                    </div>
                </div> <!-- / .row -->

                <!-- Divider -->
                <hr>

                <div class="row align-items-center">
                    <div class="col">

                        <!-- Title -->
                        <h5 class="mb-0">
                            note
                        </h5>

                    </div>
                    <div class="col-auto">

                        <a href="#!" class="small">
                            <?= $_SESSION['_1']->getNote(); ?>
                        </a>

                    </div>
                </div> <!-- / .row -->

            </div>
        </div>

        <!-- Weekly Hours -->
        <div class="card">
            <div class="card-header">

                <!-- Title -->
                <h4 class="card-header-title">
                    Weekly Hours
                </h4>

            </div>
            <div class="card-body">

                <!-- Chart -->
                <div class="chart chart-sm">
                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">

                            </div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0">

                            </div>
                        </div>
                    </div>
                    <canvas id="weeklyHoursChart" class="chart-canvas chartjs-render-monitor"></canvas>
                </div>

            </div>
        </div>

    </div>
</div> <!-- / .row -->