<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 11/04/2019
 * Time: 01:28
 */

use App\Utilisateur\Utilisateur;
use App\Utilisateur\UtilisateurDAO;

require_once 'inc/function.php';

if (empty($_SESSION)) {

    header("Location: index.php");
}

$utilisateurDAO = new UtilisateurDAO();

$userIdSession = $_SESSION['_1']->getId();


$title =  $debug . "Administration - " . $_SESSION['_1']->getPseudo() . $main_name_web;

//Get the status and decode the JSON
$status = json_decode(file_get_contents('https://api.mcsrvstat.us/1/play.jaime-la-survie.com')); //nawa.mcpe.eu:19145

$allRole = allRole($utilisateurDAO, $userIdSession);

require_once 'inc/pre-load-function.php';

if (isset($navbar_status_admin)){
    if ($navbar_status_admin == false){
        header("Location: index.php");
    }
}

// Get all joueur

$allJoueur = $utilisateurDAO->getListUtilisateur('object');

?><!DOCTYPE html>
    <html lang="en">
    <?php require_once 'inc/partie/head.php'; ?>
    <body style="background-image: url('assets/img/background/bg-test.jpg');">
        <div style="width: 100%; height: 100vh; background-color: rgba(0,0,0,.25); z-index: -1; position: absolute;"></div>

        <?php require_once 'inc/partie/profil/notification.php'; ?>
        <?php require_once 'inc/partie/profil/search.php'; ?>
        <?php require_once 'inc/partie/modal-info.php'; ?>
        <?php require_once 'inc/partie/navbar-main.php'; ?>

        <br>
        <br>
        <br>
            <div class="container-fluid mt-5">

                <div class="row m-0">
                    <?php require_once 'inc/partie/navbar-admin.php'; ?>

                    <div class="col-md-10">

                        <div class="container-fluid tab-content">
                            <div class="tab-pane fade show active" id="dashboard-default" role="tabpanel" aria-labelledby="dashboard-default-tab">
                                <div class="container-fluid">
                                    <div class="row mt-3 mb-3">
                                        <div class="col-12 col-lg-6 col-xl">

                                            <!-- Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col">

                                                            <!-- Title -->
                                                            <h6 class="card-title text-uppercase text-muted mb-2">
                                                                Budget
                                                            </h6>

                                                            <!-- Heading -->
                                                            <div class="mb-0 d-flex flex-row align-items-center">
                                                            <span class="h2">
                                                              $24,500
                                                            </span>
                                                                &nbsp;
                                                                <div>
                                                                    <span class="badge badge-soft-success">+3.5%</span>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-auto">

                                                            <!-- Icon -->
                                                            <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>

                                                        </div>
                                                    </div> <!-- / .row -->

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-lg-6 col-xl">

                                            <!-- Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col">

                                                            <!-- Title -->
                                                            <h6 class="card-title text-uppercase text-muted mb-2">
                                                                Total Hours
                                                            </h6>

                                                            <!-- Heading -->
                                                            <span class="h2 mb-0">
                                                          763.5
                                                        </span>

                                                        </div>
                                                        <div class="col-auto">

                                                            <!-- Icon -->
                                                            <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                                                        </div>
                                                    </div> <!-- / .row -->

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-lg-6 col-xl">

                                            <!-- Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col">

                                                            <!-- Title -->
                                                            <h6 class="card-title text-uppercase text-muted mb-2">
                                                                Progress
                                                            </h6>

                                                            <div class="row align-items-center no-gutters">
                                                                <div class="col-auto">

                                                                    <!-- Heading -->
                                                                    <span class="h2 mr-2 mb-0">
                                                                  84.5%
                                                                </span>

                                                                </div>
                                                                <div class="col">

                                                                    <!-- Progress -->
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>

                                                                </div>
                                                            </div> <!-- / .row -->

                                                        </div>
                                                        <div class="col-auto">

                                                            <!-- Icon -->
                                                            <span class="h2 fe fe-clipboard text-muted mb-0"></span>

                                                        </div>
                                                    </div> <!-- / .row -->

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-lg-6 col-xl">

                                            <!-- Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col">

                                                            <!-- Title -->
                                                            <h6 class="card-title text-uppercase text-muted mb-2">
                                                                Effective Hourly
                                                            </h6>

                                                            <!-- Heading -->
                                                            <span class="h2 mb-0">
                                                          $85.50
                                                        </span>

                                                        </div>
                                                        <div class="col-auto">

                                                            <!-- Icon -->
                                                            <span class="h2 fe fe-clock text-muted mb-0"></span>

                                                        </div>
                                                    </div> <!-- / .row -->

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mt-3 mb-3">

                                        <div class="card w-100">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">

                                                        <!-- Title -->
                                                        <h4 class="card-header-title">
                                                            Liste des bannis
                                                        </h4>

                                                    </div>
                                                    <div class="col-auto">

                                                        <!-- Button -->
                                                        <a href="#!" class="btn btn-sm btn-white">
                                                            <?= $debug ?>
                                                        </a>

                                                    </div>
                                                </div> <!-- / .row -->
                                            </div>
                                            <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                                                <table class="table table-sm table-nowrap card-table">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            <a href="#" class="text-muted sort" data-sort="goal-project">
                                                                Pseudo
                                                            </a>
                                                        </th>
                                                        <th>
                                                            <a href="#" class="text-muted sort" data-sort="goal-status">
                                                                Temps
                                                            </a>
                                                        </th>
                                                        <th>
                                                            <a href="#" class="text-muted sort" data-sort="goal-progress">
                                                                Banni par
                                                            </a>
                                                        </th>
                                                        <th>
                                                            <a href="#" class="text-muted sort" data-sort="goal-date">
                                                                Durée
                                                            </a>
                                                        </th>
                                                        <th class="text-right">
                                                            Raison
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>

                                                    <tbody class="list">

                                                    <?php

                                                    $result = [];
                                                    $result_time = [];

                                                    $listeBan = fopen(ROOT . "/test/pmmp/banned-players.txt", 'r');

                                                    while ($line = fgets($listeBan)){
                                                        $line = trim($line);
                                                        if (strpos($line, '#') !== 0 && !empty($line)){

                                                            $result_player_ban = explode( "|", $line);

                                                            $time_date = explode(" ", $result_player_ban[1]);

                                                            array_push($result, [
                                                                "nom" => $result_player_ban[0],
                                                                "time" => [
                                                                    "date" => $time_date[0],
                                                                    "time" => $time_date[1],
                                                                    "time_zone" => $time_date[2]
                                                                ],
                                                                "banni_par" => $result_player_ban[2],
                                                                "banni_pour" => $result_player_ban[3],
                                                                "raison" => $result_player_ban[4],

                                                            ]);
                                                        }
                                                    }
                                                    fclose($listeBan);

                                                    foreach ($result as $key => $value): ?>
                                                        <tr>
                                                            <td class="goal-project">
                                                                <?= $value['nom'] ?>
                                                            </td>
                                                            <td class="goal-status">
                                                                <?php foreach ($value['time'] as $key1 => $value1): ?>
                                                                    <span class="text-primary">●</span> <?= $value['time'][$key1] ?> <br>
                                                                <?php endforeach; ?>

                                                            </td>
                                                            <td class="goal-progress">
                                                                <?= $value['banni_par'] ?>
                                                            </td>
                                                            <td class="goal-date">
                                                                <!--<time datetime="2018-10-24">07/24/18</time>-->
                                                                <?= $value['banni_pour'] ?>
                                                            </td>
                                                            <td class="text-right">
                                                                <?= $value['raison'] ?>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-circle-notch"></i>
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
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">

                                                        <!-- Title -->
                                                        <h4 class="card-header-title">
                                                            Orders
                                                        </h4>

                                                    </div>
                                                    <div class="col-auto mr-n3">

                                                        <!-- Caption -->
                                                        <span class="text-muted">
                                                  Show affiliate:
                                                </span>

                                                    </div>
                                                    <div class="col-auto">

                                                        <!-- Switch -->
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="cardToggle" data-toggle="chart" data-target="#ordersChart" data-add="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[15,10,20,12,7,0,8,16,18,16,10,22],&quot;backgroundColor&quot;:&quot;#d2ddec&quot;,&quot;label&quot;:&quot;Affiliate&quot;}]}}">
                                                            <label class="custom-control-label" for="cardToggle"></label>
                                                        </div>

                                                    </div>
                                                </div> <!-- / .row -->

                                            </div>
                                            <div class="card-body">

                                                test

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="utilisateur-list" role="tabpanel" aria-labelledby="utilisateur-list-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">

                                            <!-- Files -->
                                            <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">

                                                            <!-- Title -->
                                                            <h4 class="card-header-title">
                                                                Utilisateurs
                                                            </h4>

                                                        </div>
                                                        <div class="col-auto">

                                                            <!-- Dropdown -->
                                                            <div class="dropdown">

                                                                <!-- Toggle -->
                                                                <a href="#" class="small text-muted dropdown-toggle" data-toggle="dropdown">
                                                                    Ordre
                                                                </a>

                                                                <!-- Menu -->
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item sort" data-sort="name" href="#!">
                                                                        Ascendant
                                                                    </a>
                                                                    <a class="dropdown-item sort" data-sort="name" href="#!">
                                                                        Descendant
                                                                    </a>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="col-auto">

                                                            <!-- Button -->
                                                            <a href="#!" class="btn btn-sm btn-primary">
                                                                Créer
                                                            </a>

                                                        </div>
                                                    </div> <!-- / .row -->
                                                </div>
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-12">

                                                            <!-- Form -->
                                                            <form>
                                                                <div class="input-group input-group-flush input-group-merge">
                                                                    <input type="search" class="form-control form-control-prepended search" placeholder="Search">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <span class="fe fe-search"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div> <!-- / .row -->
                                                </div>
                                                <div class="card-body">

                                                    <!-- List -->
                                                    <ul class="list-group list-group-lg list-group-flush list my-n4">
                                                    <?php foreach ($allJoueur as $key => $value): ?>
                                                        <li class="list-group-item px-0">

                                                            <div class="row align-items-center">
                                                                <div class="col-auto">

                                                                    <!-- Avatar -->
                                                                    <a href="#!" class="avatar avatar-lg">
                                                                        <img src="<?= $value->photo_profil ?>" alt="..." class="avatar-img rounded">
                                                                    </a>

                                                                </div>
                                                                <div class="col ml-n2">

                                                                    <!-- Title -->
                                                                    <h4 class="card-title mb-1 name">
                                                                        <a href="#!"><?= $value->pseudo ?></a>
                                                                    </h4>

                                                                    <!-- Text -->
                                                                    <p class="card-text small text-muted mb-1">
                                                                        2.5kb SVG
                                                                    </p>

                                                                    <!-- Time -->
                                                                    <p class="card-text small text-muted">
                                                                        Dernière activité <time datetime="2018-01-03"><?= getDefaulftDateTime($value->date_dernier_activite) ?></time>
                                                                    </p>

                                                                </div>
                                                                <div class="col-auto">

                                                                    <!-- Button -->
                                                                    <a href="#!" class="btn btn-sm btn-white d-none d-md-inline-block">
                                                                        <span class="fe fe-more-horizontal"></span>
                                                                    </a>

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

                                                        </li>
                                                    <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row">

                </div>
            </div>

    </body>
    <!-- jQuery -->
    <script type="text/javascript" src="assets/js/jquery/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="assets/js/jquery/jquery-1.11.0.js"></script>
    <!-- BS JavaScript -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <!-- Have fun using Bootstrap JS -->
    <script type="text/javascript">

    </script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</html>