<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 18/02/2019
 * Time: 12:55
 */

function varDum($array){
    echo '<pre>';
    var_dump($array);
    echo '</pre>';
}

function chargerClass($class){

    $class = str_replace("App\\", "", $class);

    require dirname(__DIR__, 2) . "\\app\\" . $class . ".class.php";
}

spl_autoload_register('chargerClass');


function get_ip() {
    // IP si internet partagé
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    // IP derrière un proxy
    elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Sinon : IP normale
    else {
        return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
    }
}

function getDefaulftDateTime($date_time){
    try {
        $date = new DateTime($date_time);
    } catch (Exception $e) {
    }
    return $date->format('d/m/Y') . " à " . $date->format('H:i');
}

$activeSaut = true;

$main_logo_web = "assets/img/icon/icon-website.webp";

define("DEBUG", true);
define("ROOT", dirname($_SERVER['DOCUMENT_ROOT']));


$main_name_web = " - Nawastia Web";

(DEBUG === true) ? $debug = "[DEBUG] " : $debug = null;
!isset($main_logo_web) ? $main_logo_web = "assets/img/icon/icon-website.webp" : $main_logo_web;

session_start();

function allRole(\App\Utilisateur\UtilisateurDAO $utilisateurDAO, $userIdSession){
    if ($userIdSession == null){
        return [];
    }else{
        if (isset($_SESSION['_1'])){
            $allRole = $utilisateurDAO->getAllRole($userIdSession);
        }

        return $allRole;
    }
}