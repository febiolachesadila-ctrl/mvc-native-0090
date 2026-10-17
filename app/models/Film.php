
<?php

class Film
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM film ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($judul, $genre, $durasi, $tahun_rilis)
{
    $sql = "INSERT INTO film (judul, genre, durasi, tahun_rilis)
            VALUES (:judul, :genre, :durasi, :tahun_rilis)";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':judul' => $judul,
        ':genre' => $genre,
        ':durasi' => $durasi,
        ':tahun_rilis' => $tahun_rilis
    ]);
}
}
