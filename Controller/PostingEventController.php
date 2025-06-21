<?php
require_once __DIR__ . '/../Model/PostingEventModel.php';
require_once __DIR__ . '/../config.php';

class PostingEventController {
    private $postingEventModel;

    public function __construct() {
        $this->postingEventModel = new PostingEventModel();
    }

    public function index() {
        require_once __DIR__ . '/../View/PostingEvent/halaman2.php';
    }

    public function createEvent() {
        require_once __DIR__ . '/../View/PostingEvent/createEvent.php';
    }

    public function editEvent($id) {
        $event = $this->postingEventModel->getEvent($id);
        require_once __DIR__ . '/../View/PostingEvent/editEvent.php';
    }

    public function deleteEvent($id) {
        $this->postingEventModel->deleteEvent($id);
        header('Location: index.php');
    }

    public function saveEvent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $db = getDatabaseConnection();

            $postEventData = $_SESSION['postEventData'];
            $postCreateDetailData = $_POST;

            $posterPath = null;
            if (isset($_FILES['posterUpload']) && $_FILES['posterUpload']['tmp_name']) {
                $uploadsDir = __DIR__ . '/../View/Uploads/';
                $fileName = uniqid() . '_' . basename($_FILES['posterUpload']['name']);
                $filePath = $uploadsDir . $fileName;

                if (move_uploaded_file($_FILES['posterUpload']['tmp_name'], $filePath)) {
                    $posterPath = 'View/Uploads/' . $fileName;
                } else {
                    echo "Failed to upload file.";
                    exit();
                }
            } else {
                echo "No file uploaded.";
                exit();
            }

            $query = "INSERT INTO events (
                poster, kategori_event, nama_event, tanggal_event, waktu_event, 
                nama_penyelenggara, lokasi_event, deskripsi_event, nama_narahubung, 
                email_narahubung, no_ponsel, nama_tiket, jumlah_tiket, harga_tiket, 
                deskripsi_tiket, tanggal_mulai_jual, waktu_mulai_jual, tanggal_berakhir_jual, waktu_berakhir_jual
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $db->prepare($query);

            $stmt->bindParam(1, $posterPath);
            $stmt->bindParam(2, $postEventData['kategoriEvent']);
            $stmt->bindParam(3, $postEventData['namaEvent']);
            $stmt->bindParam(4, $postEventData['tanggalEvent']);
            $stmt->bindParam(5, $postEventData['waktuEvent']);
            $stmt->bindParam(6, $postEventData['penyelenggaraEvent']);
            $stmt->bindParam(7, $postEventData['lokasiEvent']);
            $stmt->bindParam(8, $postEventData['deskripsiEvent']);
            $stmt->bindParam(9, $postEventData['namaNarahubung']);
            $stmt->bindParam(10, $postEventData['emailNarahubung']);
            $stmt->bindParam(11, $postEventData['ponselNarahubung']);
            $stmt->bindParam(12, $postCreateDetailData['namaTiket']);
            $stmt->bindParam(13, $postCreateDetailData['jumlahTiket']);
            $stmt->bindParam(14, $postCreateDetailData['hargaTiket']);
            $stmt->bindParam(15, $postCreateDetailData['deskripsiTiket']);
            $stmt->bindParam(16, $postCreateDetailData['tglMulaiJual']);
            $stmt->bindParam(17, $postCreateDetailData['waktuMulaiJual']);
            $stmt->bindParam(18, $postCreateDetailData['tglAkhirJual']);
            $stmt->bindParam(19, $postCreateDetailData['waktuAkhirJual']);

            if ($stmt->execute()) {
                unset($_SESSION['postEventData']);
                header('Location: index.php?page=postingEvent&action=confirmation');
                exit();
            } else {
                echo "Failed to save event.";
            }
        }
    }
}

$posterPath = isset($_SESSION['posterPath']) ? $_SESSION['posterPath'] : null;
?>