<div class="row">
    <div class="col-12 col-lg-6">

        <!-- Card -->
        <div class="card">
            <div class="card-body">

                <!-- Dropdown -->
                <div class="dropdown card-dropdown">
                    <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                <!-- Avatar -->
                <div class="text-center">
                    <a href="team-overview.html" class="card-avatar avatar avatar-lg mx-auto">
                        <img src="https://cdn.discordapp.com/emojis/513722394699890738.png?v=1" alt="" class="avatar-img rounded">
                    </a>
                </div>

                <!-- Title -->
                <h2 class="card-title text-center mb-3">
                    <a href="team-overview.html">NawaStia V3 ouvre bientôt ses portes !</a>
                </h2>

                <!-- Text -->
                <p class="card-text text-center text-muted mb-4">
                    <?php

                    $message = "Yo les gens !
                    La vidéo qui présente les nouveautés de la V3 est enfin disponible ! (Par @Matthieu005)
                    A bientôt sur NawaStia V3 !! <br>
                    https://www.youtube.com/watch?v=Z78jE-1mtZ0";

                    echo $main->formatMesssage($message); ?>
                </p>

                <!-- Divider -->
                <hr>

                <div class="row align-items-center">
                    <div class="col">

                        <!-- Time -->
                        <p class="card-text small text-muted">
                            <i class="fe fe-clock"></i> Updated 2hr ago
                        </p>

                    </div>
                    <div class="col-auto">

                        <!-- Avatar group -->
                        <div class="avatar-group">
                            <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                            </a>
                            <!--<div class="avatar avatar-xs">
                                <div class="avatar-title rounded-circle t">+7</div>
                            </div>-->
                        </div>

                    </div>
                </div> <!-- / .row -->

            </div> <!-- / .card-body -->
        </div>

    </div>
</div> <!-- / .row -->