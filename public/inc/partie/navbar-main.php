<header class="w-100 top-fixed">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom" style="background-color: rgba(52, 58, 64, 0.0);">
        <div class="container d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <a href="\" class="navbar-brand covered-top-center main-logo" style="width: 40px; height: 40px; background-image: url('<?= $main_logo_web ?>'); margin-right: 20px;">

                </a>
                <div class="navbar-brand">
                    <a href="\" class="text-light">Nawastia</a>

                    <span class="small-caractere">- <?= isset($main) && isset($info_serveur_minecraft) && !isset($info_serveur_minecraft->offline) ? $info_serveur_minecraft->players->online . " joueurs connectés" : "Server offline"?></span>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#list-item" aria-controls="list-item" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="list-item">
                <ul class="navbar-nav ml-auto" style="margin-right: -2rem !important;">
                    <li class="nav-item active">
                        <div class="nav-link">
                            <a class="full-center text-light" href="/"><i class="fas fa-igloo"></i> <span class="sr-only">(current)</span></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <a class="full-center text-light" href="#"><i class="fas fa-newspaper"></i></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <a class="full-center text-light" href="#"><i class="fas fa-poll"></i></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <a class="full-center text-light" href="#"><i class="fas fa-store"></i></a>
                        </div>
                    </li>
                <?php if (!isset($_SESSION['_1'])): ?>
                    <li class="nav-item">
                        <div class="nav-link">
                            <a class="full-center text-light" href="inscription"><i class="fas fa-address-card"></i></a> <!-- <i class="fas fa-sign-out-alt"></i> -->
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <a class="full-center text-light" href="connexion"><i class="fas fa-sign-in-alt"></i></a> <!-- <i class="far fa-user"></i> -->
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropleft">
                        <a class="nav-link dropdown-toggle dropdown-toggle-split" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                            <div class="d-inline-block align-top" style="width: 40px; height: 40px; background-size: cover; background-position: top center; border-radius: 50% 50%; background-image: url('<?= isset($profil_image) && $profil_image[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php" : $profil_image[0]['path']; ?>');">

                            </div>
                        </a>
                        <div class="dropdown-menu w-75" aria-labelledby="dropdownMenu">
                            <h6 class="dropdown-header">Gestion</h6>
                            <a class="dropdown-item" href="profil">Profil</a>
                            <?php if (isset($_SESSION['_1'])):
                                if (isset($navbar_status_admin) && !empty($navbar_status_admin)):
                                    if ($navbar_status_admin == true):?>
                                        <a class="dropdown-item" href="administration">Administration <span class="badge badge-danger">admin</span></a>
                                        <a class="dropdown-item" href="administration">Statistique <span class="badge badge-danger">admin</span> </a>
                                    <?php endif;
                                endif; ?>
                            <?php endif; ?>
                            <h6 class="dropdown-header">Status</h6>
                            <a class="dropdown-item" href="inc/traitement/deconnexion.php">Deconnexion</a>
                        </div>
                    </li>
                <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>
</header>