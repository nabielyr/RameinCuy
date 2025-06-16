<?php

class Database {
    private $host = "localhost";
    private $db_name = "rameincuy";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

require_once __DIR__ . '/../../config/database.php';

class EventModel {
    private $conn;
    private $table = 'events';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getEvent($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllEvents() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createEvent($data) {
        $query = "INSERT INTO " . $this->table . " 
                (id, kategori, title, description, date, time, location, price, poster_image, narahubung_nama, narahubung_email, narahubung_ponsel, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['id'],
            $data['kategori'],
            $data['title'],
            $data['description'],
            $data['date'],
            $data['time'],
            $data['location'],
            $data['price'],
            $data['poster_image'],
            $data['narahubung_nama'],
            $data['narahubung_email'],
            $data['narahubung_ponsel'],
            $data['created_at']
        ]);
    }
}