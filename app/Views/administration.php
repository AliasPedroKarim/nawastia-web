<div class="container-fluid mt-5 padding-header-top-default">

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
                            <div class="col-12 col-lg-12 col-xl">
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
                                                <a href="#" class="btn btn-sm btn-white">
                                                    <?= $debug ?>
                                                </a>

                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                    <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;tables-row&quot;, &quot;tables-pseudo&quot;, &quot;tables-temps&quot;, &quot;tables-bannipar&quot;, &quot;tables-duree&quot;]">
                                        <table class="table table-sm table-nowrap card-table">
                                            <thead>
                                            <tr>
                                                <th scope="col">
                                                    <a href="#" class="text-muted sort" data-sort="tables-row">#</a>
                                                </th>
                                                <th class="col">
                                                    <a href="#" class="text-muted sort" data-sort="tables-pseudo">
                                                        Pseudo
                                                    </a>
                                                </th>
                                                <th class="col">
                                                    <a href="#" class="text-muted sort" data-sort="tables-temps">
                                                        Temps
                                                    </a>
                                                </th>
                                                <th class="col">
                                                    <a href="#" class="text-muted sort" data-sort="tables-bannipar">
                                                        Banni par
                                                    </a>
                                                </th>
                                                <th class="col">
                                                    <a href="#" class="text-muted sort" data-sort="tables-duree">
                                                        Durée
                                                    </a>
                                                </th>
                                                <th class="text-right col">
                                                    Raison
                                                </th>
                                                <th class="col"></th>
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
                                                        "pseudo" => $result_player_ban[0],
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
                                                    <th scope="row" class="tables-row"><?= $key+1 ?></th>
                                                    <th class="tables-pseudo">
                                                        <?= $value['pseudo'] ?>
                                                    </th>
                                                    <td class="tables-temps">
                                                        <?php foreach ($value['time'] as $key1 => $value1): ?>
                                                            <span class="text-primary">●</span> <?= $value['time'][$key1] ?> <br>
                                                        <?php endforeach; ?>

                                                    </td>
                                                    <td class="tables-bannipar">
                                                        <?= $value['banni_par'] ?>
                                                    </td>
                                                    <td class="tables-duree">
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
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col-12 col-lg-12 col-xl">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="header bg-dark pb-5">
                                            <div class="container-fluid">

                                                <!-- Body -->
                                                <div class="header-body">
                                                    <div class="row align-items-end">
                                                        <div class="col">

                                                            <!-- Pretitle -->
                                                            <h6 class="header-pretitle text-secondary">
                                                                Overview
                                                            </h6>

                                                            <!-- Title -->
                                                            <h1 class="header-title text-white">
                                                                Performance
                                                            </h1>

                                                        </div>
                                                        <div class="col-auto">

                                                            <!-- Nav -->
                                                            <ul class="nav nav-tabs header-tabs">
                                                                <li class="nav-item" data-toggle="chart" data-target="#headerChart" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0,10,5,15,10,20,15,25,20,30,25,40]}]}}">
                                                                    <a href="#" class="nav-link text-center active" data-toggle="tab">
                                                                        <h6 class="header-pretitle text-secondary">
                                                                            Earnings
                                                                        </h6>
                                                                        <h3 class="text-white mb-0">
                                                                            $19.2k
                                                                        </h3>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item" data-toggle="chart" data-target="#headerChart" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[7,35,12,27,34,17,19,30,28,32,24,39]}]}}">
                                                                    <a href="#" class="nav-link text-center" data-toggle="tab">
                                                                        <h6 class="header-pretitle text-secondary">
                                                                            Sessions
                                                                        </h6>
                                                                        <h3 class="text-white mb-0">
                                                                            92.1k
                                                                        </h3>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item" data-toggle="chart" data-target="#headerChart" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[2,12,35,25,36,25,34,16,4,14,15,37]}]}}">
                                                                    <a href="#" class="nav-link text-center" data-toggle="tab">
                                                                        <h6 class="header-pretitle text-secondary">
                                                                            Bounce
                                                                        </h6>
                                                                        <h3 class="text-white mb-0">
                                                                            50.2%
                                                                        </h3>
                                                                    </a>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div> <!-- / .row -->
                                                </div> <!-- / .header-body -->

                                                <!-- Footer -->
                                                <div class="header-footer">

                                                    <!-- Chart -->
                                                    <div class="chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="headerChart" class="chart-canvas chartjs-render-monitor" width="763" height="300" style="display: block; width: 763px; height: 300px;"></canvas>
                                                    </div>

                                                </div>

                                            </div>
                                        </div> <!-- / .header -->

                                    </div>
                                    <div class="card-footer bg-dark">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-xl-8">
                                <div class="card w-100">
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
                                                    <input type="checkbox" class="custom-control-input" id="cardToggle" data-toggle="chart" data-target="#ordersChartAlias" data-add="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[15,10,20,12,7,0,8,16,18,16,10,22],&quot;backgroundColor&quot;:&quot;#d2ddec&quot;,&quot;label&quot;:&quot;Affiliate&quot;}]}}">
                                                    <label class="custom-control-label" for="cardToggle"></label>
                                                </div>

                                            </div>
                                        </div> <!-- / .row -->

                                    </div>
                                    <div class="card-body">

                                        <!-- Chart -->
                                        <div class="chart">
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
                                            <canvas id="ordersChartAlias" class="chart-canvas chartjs-render-monitor" width="580" height="300" style="display: block; width: 580px; height: 300px;"></canvas>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">

                                                <!-- Title -->
                                                <h4 class="card-header-title">
                                                    Devices
                                                </h4>

                                            </div>
                                            <div class="col-auto">

                                                <!-- Tabs -->
                                                <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
                                                    <li class="nav-item" data-toggle="chart" data-target="#devicesChart" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[60,25,15]}]}}">
                                                        <a href="#" class="nav-link active" data-toggle="tab">
                                                            All
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" data-toggle="chart" data-target="#devicesChart" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[15,45,20]}]}}">
                                                        <a href="#" class="nav-link" data-toggle="tab">
                                                            Direct
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div> <!-- / .row -->

                                    </div>
                                    <div class="card-body">

                                        <!-- Chart -->
                                        <div class="chart chart-appended"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                            <canvas id="devicesChart" class="chart-canvas chartjs-render-monitor" data-target="#devicesChartLegend" width="310" height="241" style="display: block; width: 310px; height: 241px;"></canvas>
                                        </div>

                                        <!-- Legend -->
                                        <div id="devicesChartLegend" class="chart-legend"><span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #2C7BE5"></i>Desktop</span><span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #A6C5F7"></i>Tablet</span><span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #D2DDEC"></i>Mobile</span></div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col-12 col-lg-12 col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive" data-toggle="lists" data-lists-values='["tables-row", "tables-first", "tables-last", "tables-handle"]'>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <a href="#" class="text-muted sort" data-sort="tables-row">#</a>
                                                    </th>
                                                    <th scope="col">
                                                        <a href="#" class="text-muted sort" data-sort="tables-first">First</a>
                                                    </th>
                                                    <th scope="col">
                                                        <a href="#" class="text-muted sort" data-sort="tables-last">Last</a>
                                                    </th>
                                                    <th scope="col">
                                                        <a href="#" class="text-muted sort" data-sort="tables-handle">Handle</a>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="list">
                                                <tr>
                                                    <th scope="row" class="tables-row">1</th>
                                                    <td class="tables-first">Mark</td>
                                                    <td class="tables-last">Otto</td>
                                                    <td class="tables-handle">@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="tables-row">2</th>
                                                    <td class="tables-first">Jacob</td>
                                                    <td class="tables-last">Thornton</td>
                                                    <td class="tables-handle">@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="tables-row">3</th>
                                                    <td class="tables-first">Larry</td>
                                                    <td class="tables-last">the Bird</td>
                                                    <td class="tables-handle">@twitter</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
                                                        <a class="dropdown-item sort" data-sort="name" href="#">
                                                            Ascendant
                                                        </a>
                                                        <a class="dropdown-item sort" data-sort="name" href="#">
                                                            Descendant
                                                        </a>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-auto">

                                                <!-- Button -->
                                                <a href="#" class="btn btn-sm btn-primary">
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
                                                        <?php $image__utilisateur = $main->getImageUtilisateur($utilisateurDAO, $value->id_utilisateur);?>
                                                        <!-- Avatar -->
                                                        <a href="#" class="avatar avatar-lg">
                                                            <img src="<?= isset($image__utilisateur) && $image__utilisateur[0]['blob'] == 1 ? "inc/partie/blob/displayImage.php?id=" . $value->id_utilisateur : $image__utilisateur[0]['path']; ?>" alt="..." class="avatar-img rounded">
                                                        </a>

                                                    </div>
                                                    <div class="col ml-n2">

                                                        <!-- Title -->
                                                        <h4 class="card-title mb-1 name">
                                                            <a href="#"><?= $value->pseudo ?></a>
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
                                                        <a href="#" class="btn btn-sm btn-white d-none d-md-inline-block">
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