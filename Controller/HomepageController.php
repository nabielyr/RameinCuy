<?php
require_once __DIR__ . '/../Model/HomepageModel.php';

class HomepageController {
    private $homepageModel;

    public function __construct() {
        $this->homepageModel = new HomepageModel();
    }

    public function index() {
        $events = $this->homepageModel->getEvents();
        require_once __DIR__ . '/../View/Homepage/page1.php';
    }

    public function checkout($id) {
        $event = $this->homepageModel->getEvent($id);
        require_once __DIR__ . '/../View/Homepage/page3.php';
    }

    public function confirmation() {
        require_once __DIR__ . '/../View/Homepage/page4.php';
    }

    public function detail($id) {
        $event = $this->homepageModel->getEvent($id);
        require_once __DIR__ . '/../View/Homepage/page2.php';
    }

    public function placeOrder($id) {
        $db = getDatabaseConnection();

        $event = $this->homepageModel->getEvent($id);

        if (!$event) {
            echo "Event tidak ditemukan.";
            exit();
        }

        $customerName = "Qoid Kafi";
        $customerEmail = "qoidkafi@student.ub.ac.id";
        $customerPhone = "0895123113";
        $customerId = "352241245141212";
        $customerGender = "Laki-Laki";
        $paymentMethod = "E Wallet";

        $ticketPrice = $event['harga_tiket'];
        $quantity = 1;
        $subtotal = $ticketPrice * $quantity;
        $adminFee = 1000;
        $total = $subtotal + $adminFee;

        $query = "INSERT INTO orders (
            ticket_price, quantity, customer_name, customer_email, customer_phone, 
            customer_id, customer_gender, payment_method, subtotal, admin_fee, total, order_date
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $db->prepare($query);
        $stmt->execute([
            $ticketPrice,
            $quantity,
            $customerName,
            $customerEmail,
            $customerPhone,
            $customerId,
            $customerGender,
            $paymentMethod,
            $subtotal,
            $adminFee,
            $total
        ]);

        header('Location: index.php?page=homepage&action=confirmation');
        exit();
    }
}