<?php
class EventModel {
    private $db;
    
    public function __construct() {
        $host = 'localhost';
        $dbname = 'rameincuy';
        $username = 'root';
        $password = '';
        
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    
    public function saveEvent($eventData) {
        try {
            $this->db->beginTransaction();
            
            $eventQuery = "INSERT INTO events (
                kategori, title, description, date, time, location, 
                poster_image, narahubung_nama, narahubung_email, narahubung_ponsel,
                created_at
            ) VALUES (
                :kategori, :title, :description, :date, :time, :location,
                :poster_image, :narahubung_nama, :narahubung_email, :narahubung_ponsel,
                NOW()
            )";
            
            $eventStmt = $this->db->prepare($eventQuery);
            $eventStmt->bindParam(':kategori', $eventData['kategori']);
            $eventStmt->bindParam(':title', $eventData['title']);
            $eventStmt->bindParam(':description', $eventData['description']);
            $eventStmt->bindParam(':date', $eventData['date']);
            $eventStmt->bindParam(':time', $eventData['time']);
            $eventStmt->bindParam(':location', $eventData['location']);
            $eventStmt->bindParam(':poster_image', $eventData['poster_image']);
            $eventStmt->bindParam(':narahubung_nama', $eventData['narahubung_nama']);
            $eventStmt->bindParam(':narahubung_email', $eventData['narahubung_email']);
            $eventStmt->bindParam(':narahubung_ponsel', $eventData['narahubung_ponsel']);
            $eventStmt->execute();
            
            $eventId = $this->db->lastInsertId();
            
            $ticketQuery = "INSERT INTO tickets (
                event_id, nama_tiket, jumlah_tiket, harga_tiket, deskripsi_tiket,
                tgl_mulai_jual, waktu_mulai_jual, tgl_akhir_jual, waktu_akhir_jual
            ) VALUES (
                :event_id, :nama_tiket, :jumlah_tiket, :harga_tiket, :deskripsi_tiket,
                :tgl_mulai_jual, :waktu_mulai_jual, :tgl_akhir_jual, :waktu_akhir_jual
            )";
            
            $ticketStmt = $this->db->prepare($ticketQuery);
            $ticketStmt->bindParam(':event_id', $eventId);
            $ticketStmt->bindParam(':nama_tiket', $eventData['nama_tiket']);
            $ticketStmt->bindParam(':jumlah_tiket', $eventData['jumlah_tiket']);
            $ticketStmt->bindParam(':harga_tiket', $eventData['harga_tiket']);
            $ticketStmt->bindParam(':deskripsi_tiket', $eventData['deskripsi_tiket']);
            $ticketStmt->bindParam(':tgl_mulai_jual', $eventData['tgl_mulai_jual']);
            $ticketStmt->bindParam(':waktu_mulai_jual', $eventData['waktu_mulai_jual']);
            $ticketStmt->bindParam(':tgl_akhir_jual', $eventData['tgl_akhir_jual']);
            $ticketStmt->bindParam(':waktu_akhir_jual', $eventData['waktu_akhir_jual']);
            $ticketStmt->execute();
            
            $this->db->commit();
            
            return $eventId;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Error saving event: " . $e->getMessage());
            return false;
        }
    }
    
    public function getEventById($eventId) {
        try {
            $query = "SELECT e.*, t.* 
                     FROM events e
                     LEFT JOIN tickets t ON e.id = t.event_id
                     WHERE e.id = :id";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $eventId, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error retrieving event: " . $e->getMessage());
        }
    }
    
    public function getAllEvents() {
        try {
            $query = "SELECT * FROM events ORDER BY created_at DESC";
            $stmt = $this->db->query($query);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error retrieving events: " . $e->getMessage());
            return false;
        }
    }
}
?>