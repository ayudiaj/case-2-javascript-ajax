<?php

// Koneksi ke database
$db_host = 'localhost:3308';
$db_name = 'chat_db';
$db_user = 'root';
$db_pass = 'ayu123';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}