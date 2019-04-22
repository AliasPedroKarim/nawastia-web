<nav class=" col-md-2 navbar navbar-vertical fixed-left navbar-expand-md navbar-light mb-3" id="sidebar">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="<?= $main_logo_web ?>" class="navbar-brand-img
            mx-auto" alt="...">
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">

                <!-- Toggle -->
                <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="#" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Settings</a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">Logout</a>
                </div>

            </div>

        </div>

        <!-- Collapse -->
        <div class="navbar-collapse collapse" id="sidebarCollapse" style="">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarDashboards" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="fe fe-home"></i> Dashboards
                    </a>
                    <div class="collapse " id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" id="dashboard-default-tab" data-toggle="tab" href="#dashboard-default" role="tab" aria-controls="dashboard-default" aria-selected="true">
                                    Default
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarProfiles" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfiles">
                        <i class="fe fe-user"></i> Profil
                    </a>
                    <div class="collapse show" id="sidebarProfiles">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    Imformation
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profil-edit-tab" data-toggle="tab" href="#profil-edit" role="tab" aria-controls="profil-edit" aria-selected="true">
                                    Modifier <span class="badge badge-soft-success ml-auto">Bientot</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php if (isset($navbar_status_admin) && !empty($navbar_status_admin)):
                    if ($navbar_status_admin == true):?>
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarUtilisateur" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUtilisateur">
                                <i class="fe fe-user"></i> Utilisateur
                            </a>
                            <div class="collapse " id="sidebarUtilisateur">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" id="utilisateur-list-tab" data-toggle="tab" href="#utilisateur-list" role="tab" aria-controls="utilisateur-list" aria-selected="true">
                                            Liste
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ">
                                            Gestion
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ">
                                            Permission <span class="badge badge-soft-success ml-auto">Bientot</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarPages" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarPages">
                                <i class="fe fe-file"></i> Pages
                            </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#sidebarProfile" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarProfile">
                                            Profile
                                        </a>
                                        <div class="collapse" id="sidebarProfile">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link active">
                                                        Posts
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        Groups
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        Projects
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        Files
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        Subscribers
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarProject" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProject">
                                            Project
                                        </a>
                                        <div class="collapse " id="sidebarProject">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        Overview
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        Files
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        Reports
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        New project
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarTeam" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTeam">
                                            Team
                                        </a>
                                        <div class="collapse " id="sidebarTeam">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        Overview
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        Projects
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        Members
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link ">
                                                        New team
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ">
                                            Orders
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ">
                                            Feed
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ">
                                            Settings
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ">
                                            Invoice
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ">
                                            Pricing
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarAuth" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="fe fe-user"></i> Authentication
                            </a>
                            <div class="collapse" id="sidebarAuth">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#sidebarSignIn" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn">
                                            Sign in
                                        </a>
                                        <div class="collapse" id="sidebarSignIn">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Cover
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Illustration
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Basic
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarSignUp" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignUp">
                                            Sign up
                                        </a>
                                        <div class="collapse" id="sidebarSignUp">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Cover
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Illustration
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Basic
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarPassword" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPassword">
                                            Password reset
                                        </a>
                                        <div class="collapse" id="sidebarPassword">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Cover
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Illustration
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Basic
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarError" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarError">
                                            Error
                                        </a>
                                        <div class="collapse" id="sidebarError">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Illustration
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        Basic
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php endif;
                endif; ?>
                <li class="nav-item d-md-none">
                    <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                        <span class="fe fe-bell"></span> Notifications
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="navbar-divider my-3">

            <!-- Heading -->
            <h6 class="navbar-heading">
                Documentation
            </h6>

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-4">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
                        <i class="fe fe-clipboard"></i> Serveur
                    </a>
                    <div class="collapse " id="sidebarComponents">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Status
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  id="profil-reglement-tab" data-toggle="tab" href="#profil-reglement" role="tab" aria-controls="profil-reglement" aria-selected="true">
                        <i class="fe fe-git-branch"></i> Règlement <span class="badge badge-primary ml-auto"><i class="fe fe-paperclip"></i></span>
                    </a>
                </li>
            </ul>

            <!-- Push content down -->
            <!--<div class="mt-auto"></div>-->


            <!-- Customize -->
            <a href="#modalDemo" class="btn btn-block btn-primary mb-4" data-toggle="modal">
                <i class="fe fe-sliders mr-2"></i> Réglages
            </a>



            <!-- User (md) -->
            <div class="navbar-user d-none d-md-flex" id="sidebarUser">

                <!-- Icon -->
                <a href="#sidebarModalActivity" class="navbar-user-link" data-toggle="modal">
                <span class="icon">
                  <i class="fe fe-bell"></i>
                </span>
                </a>

                <!-- Dropup -->
                <div class="dropup">

                    <!-- Toggle -->
                    <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="<?= isset($_SESSION['_1']) ? $_SESSION['_1']->getPhotoProfil() : null?>" class="avatar-img rounded-circle" alt="...">
                        </div>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                        <a href="profil.php" class="dropdown-item">Profile</a>
                        <!--<a href="#" class="dropdown-item">Settings</a>-->
                        <hr class="dropdown-divider">
                        <a href="inc/traitement/deconnexion.php" class="dropdown-item">Logout</a>
                    </div>

                </div>

                <!-- Icon -->
                <a href="#sidebarModalSearch" class="navbar-user-link" data-toggle="modal">
                <span class="icon">
                  <i class="fe fe-search"></i>
                </span>
                </a>

            </div>


        </div> <!-- / .navbar-collapse -->

    </div>
</nav>