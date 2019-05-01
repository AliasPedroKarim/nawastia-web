<?php


namespace App\Controller;

use Core\Controller\Controller;

class AppController extends Controller {

    protected $template = 'default';

    public function __construct(){

        $this->template = ROOT . '/app/Views/';

    }

}