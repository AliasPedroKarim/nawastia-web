<?php


namespace App\Controller;


use App\Activite\ActiviteDAO;
use App\Main\Main;
use App\Main\MainSecurity;
use App\Utilisateur\AmisDAO;
use App\Utilisateur\UtilisateurDAO;

class MainController extends AppController{

    public function home(){

        extract($this->initMainConfig());

        $title =  $debug . "Accueil" . $main_name_web;

        $utilisateurDAO = new UtilisateurDAO();

        isset($_SESSION['_1']) ? $userIdSession = $_SESSION['_1']->getId() : $userIdSession = null;

        $main = new Main();

        $profil_image = $main->getImageUtilisateur($utilisateurDAO, $userIdSession);

        $navbar_status_admin = $main->isStaff($userIdSession);

        $this->render('home', compact('title', 'utilisateurDAO', 'userIdSession', 'main', 'profil_image', 'navbar_status_admin'));
    }

    public function test(){
        $title =  "Accueil";
        $this->render('test', compact("title"));
    }

    public function profil(){

        extract($this->initMainConfig());

        $main = new Main();
        $utilisateurDAO = new UtilisateurDAO();
        $amisDAO = new AmisDAO();

        $displaySecure = new MainSecurity();
        $activite = new ActiviteDAO();

        if (!isset($_SESSION) || empty($_SESSION)){
            header("Location: /");
            die();
        }

        $title =  $debug . "Profile - " . $_SESSION['_1']->getPseudo() . $main_name_web;

        isset($_SESSION['_1']) ? $userIdSession = $_SESSION['_1']->getId() : $userIdSession = null;

        $allRole = $main->allRole($utilisateurDAO, $userIdSession);

        $profil_image = $main->getImageUtilisateur($utilisateurDAO, $_SESSION['_1']->getId());

        $allUtilisateur = $utilisateurDAO->getListUtilisateur('object');
        $navbar_status_admin = $main->isStaff($userIdSession);

        $this->render('profil', compact('main', 'utilisateurDAO', 'amisDAO', 'displaySecure', 'activite', 'title', 'userIdSession', 'allRole', 'profil_image', 'allUtilisateur', 'navbar_status_admin'));
    }

    public function administration(){

        extract($this->initMainConfig());

        if (empty($_SESSION)) {
            header("Location: /");
            die();
        }

        $utilisateurDAO = new UtilisateurDAO();

        isset($_SESSION['_1']) ? $userIdSession = $_SESSION['_1']->getId() : $userIdSession = null;

        $title =  $debug . "Administration - " . $_SESSION['_1']->getPseudo() . $main_name_web;

        $main = new Main();

        $profil_image = $main->getImageUtilisateur($utilisateurDAO, $userIdSession);

        $navbar_status_admin = $main->isStaff($userIdSession);

        if (isset($navbar_status_admin)){
            if ($navbar_status_admin == false){
                header("Location: /");
                die();
            }
        }

        $allJoueur = $utilisateurDAO->getListUtilisateur('object');

        $this->render('administration', compact('utilisateurDAO', 'userIdSession', 'title', 'main', 'profil_image', 'navbar_status_admin', 'allJoueur'));
    }

    public function connexion(){
        extract($this->initMainConfig());

        if (isset($_SESSION['_1'])){
            header("Location: /");
            die();
        }

        $title =  $debug . "Connexion" . $main_name_web;

        $display_navbar_main = false;

        $this->render('connexion', compact('title', 'display_navbar_main'));

    }

    public function inscription(){
        extract($this->initMainConfig());

        if (isset($_SESSION['_1'])){
            header("Location: /");
            die();
        }

        $title =  $debug . "Inscription" . $main_name_web;

        $display_navbar_main = false;

        $this->render('inscription', compact('title', 'display_navbar_main'));
    }

    public function not_found(){

        extract($this->initMainConfig());

        $title =  $debug . "404" . $main_name_web;

        $main = new Main();
        $utilisateurDAO = new UtilisateurDAO();
        $amisDAO = new AmisDAO();

        $displaySecure = new MainSecurity();
        $activite = new ActiviteDAO();

        isset($_SESSION['_1']) ? $userIdSession = $_SESSION['_1']->getId() : $userIdSession = null;

        $profil_image = $main->getImageUtilisateur($utilisateurDAO, $userIdSession);

        $navbar_status_admin = $main->isStaff($userIdSession);

        $this->render('error/404', compact('title', 'main', 'utilisateurDAO', 'amisDAO', 'displaySecure', 'activite', 'userIdSession', 'profil_image', 'navbar_status_admin'));
    }
}