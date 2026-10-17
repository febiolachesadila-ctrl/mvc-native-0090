
<?php

require_once __DIR__ . '/../models/Film.php';

class FilmController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new Film($db);
    }

    public function index()
    {
        $films = $this->model->getAll();

        require __DIR__ . '/../views/film/index.php';
    }
    
public function create()
{
    require __DIR__ . '/../views/film/create.php';
}

public function store()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        exit('Metode tidak diizinkan.');
    }

    $judul = trim($_POST['judul'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $durasi = filter_input(INPUT_POST, 'durasi', FILTER_VALIDATE_INT);
    $tahun_rilis = filter_input(INPUT_POST, 'tahun_rilis', FILTER_VALIDATE_INT);

    if (
        $judul === '' ||
        $genre === '' ||
        $durasi === false || $durasi === null || $durasi < 1 ||
        $tahun_rilis === false || $tahun_rilis === null ||
        $tahun_rilis < 1888 || $tahun_rilis > 2155
    ) {
        exit('Input tidak valid. Periksa kembali data film.');
    }

    if ($this->model->insert($judul, $genre, $durasi, $tahun_rilis)) {
        header('Location: index.php?page=film&status=create_success');
        exit;
    }

    header('Location: index.php?page=film&status=create_error');
    exit;
}

}
