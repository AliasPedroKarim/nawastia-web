<?php

namespace App\Main;


class MainSecurity{

    public function format_charac($data = ''){
        return htmlspecialchars(htmlentities($data));
    }

    public function remove_charac($data = ''){
        return preg_replace("#<script>|</script>#", "", $data);
    }

}