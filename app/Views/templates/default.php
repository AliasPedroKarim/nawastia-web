<!DOCTYPE html>
    <html lang="en">
        <?php isset($title) ? $title : $title = "Nawastia Web"; ?>
        <head>
            <meta charset="UTF-8">
            <title><?= $title ?></title>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
            <link rel="stylesheet" href="assets/css/external-assets/highlight.vs2015.css">
            <link rel="stylesheet" href="assets/css/external-assets/quill.core.css">
            <link rel="stylesheet" href="assets/css/external-assets/select2.min.css">
            <link rel="stylesheet" href="assets/font/feather/feather.min.css">
            <link rel="stylesheet" href="assets/css/style.css" id="stylesheetLight">
            <link rel="stylesheet" href="assets/css/style.css" id="stylesheetDark">

            <style type="text/css">
                /* Chart.js */

                @-webkit-keyframes chartjs-render-animation {
                    from {
                        opacity: 0.99
                    }
                    to {
                        opacity: 1
                    }
                }

                @keyframes chartjs-render-animation {
                    from {
                        opacity: 0.99
                    }
                    to {
                        opacity: 1
                    }
                }

                .chartjs-render-monitor {
                    -webkit-animation: chartjs-render-animation 0.001s;
                    animation: chartjs-render-animation 0.001s;
                }

            </style>

            <!-- jQuery -->
            <script type="text/javascript" src="assets/js/jquery/jquery-3.3.1.js"></script>
            <script type="text/javascript" src="assets/js/jquery/jquery-1.11.0.js"></script>
        </head>
        <body class="scrollbar style-7" style="background: url(<?= $main_bg ?>) fixed;">
            <div class="dark-blur"></div>
            <?php
            if (isset($display_navbar_main) && $display_navbar_main === true){
                require_once 'inc/partie/navbar-main.php';
            }
            ?>
            <?php require_once 'inc/partie/profil/notification.php'; ?>
            <?php require_once 'inc/partie/profil/search.php'; ?>
            <?php require_once 'inc/partie/modal-info.php'; ?>
            <?php require_once 'inc/partie/modal-info_serveur.php'; ?>

            <?= $content; ?>

            <script src="assets/js/external-assets/Chart.bundle.min.js"></script>

            <script src="assets/js/external-assets/highlight.pack.min.js"></script>
            <script src="assets/js/external-assets/list.min.js"></script>
            <script src="assets/js/external-assets/quill.min.js"></script>
            <script src="assets/js/external-assets/select2.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <!-- BS JavaScript -->
            <script type="text/javascript" src="assets/js/bootstrap.js"></script>
            <script type="text/javascript" src="assets/js/edit_profil.js"></script>
            <div class="script_manage_activite">
                <script type="text/javascript" src="assets/js/manage_activite.js"></script>
            </div>
            <div class="script_manage_friend">
                <script type="text/javascript" src="assets/js/manage_friend.js"></script>
            </div>
            <div class="script_manage_notification">
                <script type="text/javascript" src="assets/js/manage_notification.js"></script>
            </div>
            <!-- Have fun using Bootstrap JS -->

            <?= isset($supplies_footer_script) ? $supplies_footer_script : null; ?>

            <script type="text/javascript" src="assets/js/main.js"></script>
            <script type="text/javascript" src="assets/js/custom/chart-custom.js"></script>

        </body>
</html>
