<?php
require_once "./models/User.php";

if (isset($_POST["s1"])) {


    $name = $_POST["name"];
    $message = $_POST["message"];
    $User = new User($name, $message);
    $User->create();

}
header('location: index.php');
?>