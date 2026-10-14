
<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/models/Mahasiswa.php';
require_once __DIR__ . '/../app/controllers/MahasiswaController.php';

$database = new Database();
$db = $database->connect();

$model = new Mahasiswa($db);
$controller = new MahasiswaController($model);

$page = $_GET['page'] ?? 'mahasiswa';
$action = $_GET['action'] ?? 'index';

if ($page !== 'mahasiswa') {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

switch ($action) {
    case 'index':
        $controller->index();
        break;

    case 'create':
        $controller->create();
        break;

    case 'store':
        $controller->store();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'update':
        $controller->update();
        break;

    case 'delete':
        $controller->delete();
        break;

    default:
        http_response_code(404);
        exit('Aksi tidak ditemukan.');
}
