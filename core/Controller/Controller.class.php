<?php


namespace Core\Controller;

class Controller{

    protected $viewPath;

    protected $template;

    public function render($view){

        ob_start();

        require ($this->viewPath . str_replace('.', '/', $view) . "php");

        ob_get_clean();

        require ($this->viewPath . 'templates/' . $this->template . '.php');

    }

}