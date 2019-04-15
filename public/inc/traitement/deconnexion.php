<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 27/02/2019
 * Time: 17:49
 */

session_start();
$_SESSION = array();
session_destroy();
header("Location: ../../index.php");