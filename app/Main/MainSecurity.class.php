<?php

namespace App\Main;


class MainSecurity{

    public function format_charac($data = ''){

        return htmlspecialchars(htmlentities($data));

    }

}