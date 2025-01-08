<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "feedback_db";

try {
  $dsn = "mysql:host=" .  $host. ";dbname=" . $db;
  $pdo = new PDO($dsn, $username, $password);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
} 