<?php
require_once __DIR__ . '/../Models/EventModel.class.php';

class EventController {
    private $eventModel;

    function __construct() {
        $this->eventModel = new EventModel();
    }

    function index() {
        $events = $this->eventModel->getAllEvents();
        require_once __DIR__ . '/../View/event/page1.php';
    }

    function detail($id) {
        $event = $this->eventModel->getEvent($id);
        require_once __DIR__ . '/../View/event/page2.php';
    }

    function checkout() {
        require_once __DIR__ . '/../View/event/page3.php';
    }

    function confirmation() {
        require_once __DIR__ . '/../View/event/page4.php';
    }
}