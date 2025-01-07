<?php
require __DIR__ . '/config/conn.php';

if (isset($_POST["s1"])) {
    $name = $_POST["name"];
    $message = $_POST["message"];

$sql = "INSERT INTO commentaires (nom, message, horodatage) 
        VALUES (:name, :message, now())";
$stmt= $pdo->prepare($sql);
$stmt->execute([
    ':name'=>$name,
    ':message'=>$message
]); 
}
// header('location: index.php');                          
?>