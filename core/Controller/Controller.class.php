<?php


namespace Core\Controller;

class Controller{

    protected $viewPath;

    protected $template;

    public function render($view, $data = []){

        extract($this->initMainConfig());

        ob_start();

        extract($data);

        !isset($display_navbar_main) ? $display_navbar_main = true : $display_navbar_main;

        if (isset($main)){
            $info_serveur_minecraft = $main->getInfoMC("https://api.mcsrvstat.us/1/play.jaime-la-survie.com", ROOT . "/config/certificat/api.mcsrvstat.cer"); // for test -> play.nethergames.org:19132 or play.jaime-la-survie.com
        }

        require ($this->viewPath . $view . ".php");
        $content = ob_get_clean();
        ob_get_clean();

        require ($this->viewPath . 'templates/' . $this->template . '.php');

    }

    public function initMainConfig(){
        $main_name_web = " - Nawastia Web";

        (DEBUG === true) ? $debug = "[DEBUG] " : $debug = null;

        !isset($main_bg) ? $main_bg = "assets/img/background/bg-test-2.png" : $main_bg;
        !isset($main_logo_web) ? $main_logo_web = "assets/img/icon/icon-website.webp" : $main_logo_web;

        return compact('main_name_web', 'debug', 'main_bg', 'main_logo_web');
    }

}