<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "user_system";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}
?>
