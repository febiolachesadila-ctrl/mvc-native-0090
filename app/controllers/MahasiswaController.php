
<?php

class MahasiswaController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $mahasiswa = $this->model->getAll();
        require __DIR__ . '/../views/mahasiswa/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../views/mahasiswa/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=mahasiswa');
            exit;
        }

        $nim = trim($_POST['nim'] ?? '');
        $nama = trim($_POST['nama'] ?? '');
        $prodi = trim($_POST['prodi'] ?? '');

        if (!$this->validateInput($nim, $nama, $prodi)) {
            die('Semua kolom wajib diisi dengan benar.');
        }

        $this->model->insert($nim, $nama, $prodi);

        header('Location: index.php?page=mahasiswa');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $data = $this->model->findById($id);

        if (!$data) {
            die('Data mahasiswa tidak ditemukan.');
        }

        require __DIR__ . '/../views/mahasiswa/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=mahasiswa');
            exit;
        }

        $id = $_POST['id'] ?? null;
        $nim = trim($_POST['nim'] ?? '');
        $nama = trim($_POST['nama'] ?? '');
        $prodi = trim($_POST['prodi'] ?? '');

        if (!$id || !$this->validateInput($nim, $nama, $prodi)) {
            die('Data tidak valid. Pastikan semua kolom terisi.');
        }

        $this->model->update($id, $nim, $nama, $prodi);

        header('Location: index.php?page=mahasiswa');
        exit;
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=mahasiswa');
            exit;
        }

        $id = $_POST['id'] ?? null;

        if (!$id) {
            die('ID mahasiswa tidak valid.');
        }

        $this->model->delete($id);

        header('Location: index.php?page=mahasiswa');
        exit;
    }

    private function validateInput($nim, $nama, $prodi)
    {
        return $nim !== '' && $nama !== '' && $prodi !== '';
    }
}
