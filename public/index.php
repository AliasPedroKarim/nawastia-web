<?php
use App\Controller\MainController;

require_once 'inc/function.php';

isset($_GET['one']) ? $one = $_GET['one'] : $one = 'home';

$controller = new MainController();

if ($one === "home"){
    $controller->home();
}elseif ($one === "test"){
    $controller->test();
}elseif ($one === "profil"){
    $controller->profil();
}elseif ($one === "administration"){
    $controller->administration();
}elseif ($one === "connexion"){
    $controller->connexion();
}elseif ($one === "inscription"){
    $controller->inscription();
}else{
    $controller->not_found();
}