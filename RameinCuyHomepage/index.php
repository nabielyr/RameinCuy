<?php
define('BASE_URL', 'http://localhost:8080/RameinCuyHomepage/');
require_once __DIR__ . '/App/Controllers/EventController.php';

$controller = new EventController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch($action) {
    case 'index':
        $controller->index();
        break;
    case 'detail':
        $controller->detail($id);
        break;
    case 'checkout':
        $controller->checkout();
        break;
    case 'confirmation':
        $controller->confirmation();
        break;
    default:
        $controller->index();
        break;
}