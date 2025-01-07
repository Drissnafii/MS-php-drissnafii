<?php
require __DIR__ . '/submit_feedback.php';

    try {
        $sql = "SELECT nom, message, horodatage
                FROM commentaires";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        error_log("error: " . $e->getMessage());
    }