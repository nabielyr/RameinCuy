<?php
require_once __DIR__ . '/Controller/HomepageController.php';
require_once __DIR__ . '/Controller/PostingEventController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'homepage';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($page) {
    case 'homepage':
        $homepageController = new HomepageController();
        switch ($action) {
            case 'detail':
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                $homepageController->detail($id);
                break;
            case 'checkout':
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                if ($id) {
                    $homepageController->checkout($id);
                } else {
                    echo "Invalid event ID.";
                    exit();
                }
                break;
            case 'confirmation':
                $homepageController->confirmation();
                break;
            case 'placeOrder':
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                if ($id) {
                    $homepageController->placeOrder($id);
                } else {
                    echo "Invalid event ID.";
                    exit();
                }
                break;
            default:
                $homepageController->index();
                break;
        }
        break;

    case 'postingEvent':
        $postingEventController = new PostingEventController();
        switch ($action) {
            case 'createEventForm':
                require_once __DIR__ . '/View/PostingEvent/postEvent.php';
                break;
            case 'createEventDetails':
                session_start();

                if (isset($_FILES['posterUpload']) && $_FILES['posterUpload']['tmp_name']) {
                    $posterBase64 = base64_encode(file_get_contents($_FILES['posterUpload']['tmp_name']));
                    $_SESSION['posterBase64'] = $posterBase64;
                }

                $_SESSION['postEventData'] = $_POST;

                require_once __DIR__ . '/View/PostingEvent/postCreateDetail.php';
                break;
            case 'confirmation':
                require_once __DIR__ . '/View/PostingEvent/postConfirmation.php';
                break;
            case 'saveEvent':
                session_start();
                $db = getDatabaseConnection();

                $postEventData = $_SESSION['postEventData'];
                $postCreateDetailData = $_POST;

                $posterPath = null;
                if (isset($_POST['posterBase64'])) {
                    $uploadsDir = __DIR__ . '/View/Uploads/';
                    $fileName = uniqid() . '.png';
                    $filePath = $uploadsDir . $fileName;

                    file_put_contents($filePath, base64_decode($_POST['posterBase64']));
                    $posterPath = 'View/Uploads/' . $fileName;
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
                    unset($_SESSION['posterBase64']);
                    header('Location: index.php?page=postingEvent&action=confirmation');
                    exit();
                } else {
                    echo "Failed to save event.";
                }
                break;
            default:
                require_once __DIR__ . '/View/PostingEvent/postEvent.php';
                break;
        }
        break;

    default:
        $homepageController = new HomepageController();
        $homepageController->index();
        break;
}