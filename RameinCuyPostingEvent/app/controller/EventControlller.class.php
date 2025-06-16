<?php
class EventController {
    private $eventModel;
    
    public function __construct() {
        require_once 'app/models/EventModel.class.php';
        $this->eventModel = new EventModel();
    }
    
    public function index() {   
        require_once 'app/views/event/halaman1.php';
    }
    
    public function createEventForm() {
        require_once 'app/views/event/halaman2.php';
    }
        
    public function createEventDetails() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $posterImage = null;
            if (isset($_FILES['posterUpload']) && $_FILES['posterUpload']['error'] === 0) {
                $uploadDir = 'app/views/event/uploads/';
                
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                $fileName = time() . '_' . $_FILES['posterUpload']['name'];
                $filePath = $uploadDir . $fileName;
                
                if (move_uploaded_file($_FILES['posterUpload']['tmp_name'], $filePath)) {
                    $posterImage = $fileName;
                }
            }
            
            $eventData = [
                'poster_image' => $posterImage,
                'kategori' => $_POST['kategoriEvent'],
                'title' => $_POST['namaEvent'],
                'description' => $_POST['deskripsiEvent'],
                'date' => $_POST['tanggalEvent'],
                'time' => $_POST['waktuEvent'],
                'location' => $_POST['lokasiEvent'],
                'narahubung_nama' => $_POST['namaNarahubung'],
                'narahubung_email' => $_POST['emailNarahubung'],
                'narahubung_ponsel' => $_POST['ponselNarahubung']
            ];
            
            $_SESSION['event_data'] = $eventData;
            require_once 'app/views/event/halaman3.php';
        } else {
            header('Location: index.php?action=createEventForm');
            exit();
        }
    }
    
    public function createEventTicket() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $eventData = isset($_SESSION['event_data']) ? $_SESSION['event_data'] : null;
            
            if (!$eventData) {
                header('Location: index.php?action=createEventForm');
                exit();
            }
            
            $ticketData = [
                'nama_tiket' => $_POST['namaTiket'],
                'jumlah_tiket' => $_POST['jumlahTiket'],
                'harga_tiket' => $_POST['hargaTiket'],
                'deskripsi_tiket' => $_POST['deskripsiTiket'],
                'tgl_mulai_jual' => $_POST['tglMulaiJual'],
                'waktu_mulai_jual' => $_POST['waktuMulaiJual'],
                'tgl_akhir_jual' => $_POST['tglAkhirJual'],
                'waktu_akhir_jual' => $_POST['waktuAkhirJual']
            ];
            
            $completeEventData = array_merge($eventData, $ticketData);
            $eventId = $this->eventModel->saveEvent($completeEventData);
            
            if ($eventId) {
                $_SESSION['event_created'] = true;
                $_SESSION['event_id'] = $eventId;
                unset($_SESSION['event_data']);
                
                require_once 'app/views/event/halaman4.php';
            } else {
                $_SESSION['error'] = 'Failed to create event.';
                require_once 'app/views/event/halaman3.php';
            }
        } else {
            require_once 'app/views/event/halaman3.php';
        }
    }
    
    public function viewEvent() {
        $eventId = isset($_SESSION['event_id']) ? $_SESSION['event_id'] : null;
        
        if ($eventId) {
            $event = $this->eventModel->getEventById($eventId);
            $this->index();
        } else {
            $this->index();
        }
    }
}
?>