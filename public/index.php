<?php
use App\Controller\MainController;

require_once 'inc/function.php';

$path = 'home';

if (isset($_GET['path'])) {
    $path = $_GET['path'];
    if (substr($path, 0, 1) === "/") {
        $path = str_replace("/", "", $path);
    }
}

$controller = new MainController();

if ($path === "home"){
    $controller->home();
}elseif ($path === "test"){
    $controller->test();
}elseif ($path === "profil"){
    $controller->profil();
}elseif ($path === "administration"){
    $controller->administration();
}elseif ($path === "connexion"){
    $controller->connexion();
}elseif ($path === "inscription"){
    $controller->inscription();
}else{
    $controller->not_found();
}