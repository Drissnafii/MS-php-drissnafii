<?php
require __DIR__ . '/Config/conn.php';

if (isset($_POST["s1"])) {
    $name = $_POST["name"];
    $message = $_POST["message"];

    try {
        $sql = "INSERT INTO commentaires (nom, message, horodatage) 
                VALUES (:name, :message, now())";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':message' => $message
        ]);
    } catch (PDOException $e) {
        error_log("error: " . $e->getMessage());
    }
}
header('location: index.php');
?>