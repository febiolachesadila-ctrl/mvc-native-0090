
<?php

class Database
{
    private $host = 'localhost';
    private $db = 'kampus';
    private $user = 'root';
    private $pass = '';

    public function connect()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $this->user, $this->pass);

            $pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $pdo->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

            return $pdo;
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }
}
