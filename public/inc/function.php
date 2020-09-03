<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 18/02/2019
 * Time: 12:55
 */

function varDum($array){
    $array = func_get_args();
    echo '<div class="bg-white p-3 text-black" style="z-index: 99999999;">';
    foreach ($array as $v){
        echo '<pre>';
        var_dump($v);
        echo '</pre>';
    }
    echo '</div>';
}

function chargerClass($class){
    $i = explode("\\", $class);
    if ($i[0] === "Core"){
        $class = str_replace("Core\\", "", $class);
        require dirname(__DIR__, 2) . "\\core\\" . $class . ".class.php";
    }elseif ($i[0] === "App"){
        $class = str_replace("App\\", "", $class);
        require dirname(__DIR__, 2) . "\\app\\" . $class . ".class.php";
    }
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

function getDefaulftDateTime($date_time, $html_time = false){
    try {
        $date = new DateTime($date_time);
    } catch (Exception $e) {
    }
    if ($html_time === true){
        return $date->format('Y-m-d');
    }else{
        return $date->format('d/m/Y') . " à " . $date->format('H:i');
    }
}

function pluralize( $count, $text ){
    return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
}

function ago( $datetime ){
    $interval = date_create('now')->diff( $datetime );
    $suffix = ( $interval->invert ? ' ' : '' );
    if ( $v = $interval->y >= 1 ) return pluralize( $interval->y, 'année' ) . $suffix;
    if ( $v = $interval->m >= 1 ) return pluralize( $interval->m, 'mois' ) . $suffix;
    if ( $v = $interval->d >= 1 ) return pluralize( $interval->d, 'jours' ) . $suffix;
    if ( $v = $interval->h >= 1 ) return pluralize( $interval->h, 'h' ) . $suffix;
    if ( $v = $interval->i >= 1 ) return pluralize( $interval->i, 'mn' ) . $suffix;
    return pluralize( $interval->s, 's' ) . $suffix;
}

$activeSaut = true;

define("DEBUG", true);
define("ROOT", dirname($_SERVER['DOCUMENT_ROOT']));

session_start();