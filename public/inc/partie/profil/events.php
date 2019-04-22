<div data-toggle="lists" data-lists-values="[&quot;name&quot;]">
    <div class="container-fluid" data-toggle="lists" data-lists-class="listAlias" data-lists-values="[&quot;name&quot;]">
        <div class="row mb-4">
            <div class="col">

                <!-- Form -->
                <form>
                    <div class="input-group input-group-lg input-group-merge">
                        <input type="text" class="form-control form-control-prepended search" placeholder="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fe fe-search"></span>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-auto">

                <!-- Navigation (button group) -->
                <div class="nav btn-group" role="tablist">
                    <button class="btn btn-lg btn-white active" data-toggle="tab" data-target="#tabPaneOne" role="tab" aria-controls="tabPaneOne" aria-selected="true">
                        <span class="fe fe-grid"></span>
                    </button>
                    <button class="btn btn-lg btn-white" data-toggle="tab" data-target="#tabPaneTwo" role="tab" aria-controls="tabPaneTwo" aria-selected="false">
                        <span class="fe fe-list"></span>
                    </button>
                </div> <!-- / .nav -->

            </div>
        </div> <!-- / .row -->

        <!-- Tab content -->
        <div class="tab-content">
            <div class="tab-pane fade active show" id="tabPaneOne" role="tabpanel">
                <div class="row listAlias">
                    <?php
                    $name_event = "Gagnant Giveway";
                    $asset_event = "https://media.discordapp.net/attachments/444132605642932224/495284335407267841/Screenshot_20180928-192038.png?width=1202&height=677";

                    for ($i = 0; $i < 5; $i++): ?>
                        <div class="col-12 col-md-6 col-xl-4">

                            <!-- Card -->
                            <div class="card">
                                <a href="#">
                                    <img src="<?= $asset_event ?>" alt="..." class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">

                                            <!-- Title -->
                                            <h4 class="card-title mb-2 name">
                                                <a href="#"><?= $name_event ?></a>
                                            </h4>

                                            <!-- Subtitle -->
                                            <p class="card-text small text-muted">
                                                <?= $debug ?>
                                            </p>

                                        </div>
                                        <div class="col-auto">

                                            <!-- Dropdown -->
                                            <div class="dropdown">
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

                                        </div>
                                    </div> <!-- / .row -->

                                    <!-- Divider -->
                                    <hr>

                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">

                                                    <div class="small mr-2">29%</div>

                                                </div>
                                                <div class="col">

                                                    <!-- Progress -->
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                        <div class="col-auto">

                                            <!-- Avatar group -->
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Adolfo Hess">
                                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Daniela Dewitt">
                                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Miyah Myles">
                                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                                </a>
                                            </div>

                                        </div>
                                    </div> <!-- / .row -->

                                </div> <!-- / .card-body -->
                            </div>

                        </div>
                    <?php endfor; ?>
                </div> <!-- / .row -->
            </div>
            <div class="tab-pane fade" id="tabPaneTwo" role="tabpanel">
                <div class="row list">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <div class="col-12">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <a href="#" class="avatar avatar-lg avatar-4by3">
                                                <img src="<?= $asset_event ?>" alt="..." class="avatar-img rounded">
                                            </a>

                                        </div>
                                        <div class="col ml-n2">

                                            <!-- Title -->
                                            <h4 class="card-title mb-1 name">
                                                <a href="#"><?= $name_event ?></a>
                                            </h4>

                                            <!-- Text -->
                                            <p class="card-text small text-muted mb-1">
                                                <time datetime="2018-06-21"><?= $debug ?></time>
                                            </p>

                                            <!-- Progress -->
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">

                                                    <div class="small mr-2">29%</div>

                                                </div>
                                                <div class="col">

                                                    <!-- Progress -->
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>

                                                </div>
                                            </div> <!-- / .row -->

                                        </div>
                                        <div class="col-auto">

                                            <!-- Avatar group -->
                                            <div class="avatar-group d-none d-md-inline-flex">
                                                <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                                                </a>
                                                <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Adolfo Hess">
                                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                                                </a>
                                                <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Daniela Dewitt">
                                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                                                </a>
                                                <a href="#" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Miyah Myles">
                                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                                                </a>
                                            </div>

                                        </div>
                                        <div class="col-auto">

                                            <!-- Dropdown -->
                                            <div class="dropdown">
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

                                        </div>
                                    </div> <!-- / .row -->
                                </div> <!-- / .card-body -->
                            </div>

                        </div>
                    <?php endfor; ?>
                </div> <!-- / .row -->
            </div>
        </div> <!-- / .tab-content -->

    </div>
</div>