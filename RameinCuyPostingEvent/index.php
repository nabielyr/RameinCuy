<?php
session_start();
require_once 'app/controller/EventControlller.class.php';
$controller = new EventController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'createEventForm':
        $controller->createEventForm();
        break;
    case 'createEventDetails':
        $controller->createEventDetails();
        break;
    case 'createEventTicket':
        $controller->createEventTicket();
        break;
    case 'viewEvent':
        $controller->viewEvent();
        break;
    default:
        $controller->index();
        break;
}
?>