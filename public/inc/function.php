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

    require dirname(__DIR__, 2) . "\\app\\App\\" . $class . ".class.php";
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

$activeSaut = true;
define("DEBUG", true);
define("ROOT", dirname($_SERVER['DOCUMENT_ROOT']));


$main_name_web = " - Nawastia Web";

(DEBUG === true) ? $debug = "[DEBUG] " : $debug = null;

session_start();