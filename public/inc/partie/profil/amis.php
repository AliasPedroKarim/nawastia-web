<div class="container-fluid">
    <div class="row">
        <?php for ($i = 0; $i < 3; $i++): ?>
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

                    <img src="assets/img/background/bg-test-1.png" alt="..." class="card-img-top">

                    <div class="card-body text-center">

                        <a href="#" class="avatar avatar-xl card-avatar card-avatar-top">
                            <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-4 border-card" alt="...">
                        </a>

                        <h2 class="card-title">
                            <a href="#">fictif friends</a>
                        </h2>

                        <p class="card-text text-muted">
                            <small>
                                small description
                            </small>
                        </p>

                        <p class="card-text">
                                                      <span class="badge badge-soft-secondary">
                                                        role
                                                      </span>
                            <span class="badge badge-soft-secondary">
                                                        <?= $debug ?>
                                                      </span>
                        </p>

                        <hr>

                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">

                                <small>
                                    <span class="secondary">●</span> Offline
                                </small>

                            </div>
                            <div class="col-auto">

                                <a href="#!" class="btn btn-sm btn-primary">
                                    Désinscrire
                                </a>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        <?php endfor; ?>
    </div>
</div>