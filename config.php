<?php
define('BASE_URL', 'http://localhost/RameinCuy/');

define('DB_HOST', 'localhost');
define('DB_NAME', 'rameincuy');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

function getDatabaseConnection() {
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Database connection failed: ' . $e->getMessage());
    }
}