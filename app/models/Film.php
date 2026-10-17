
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

public function getById($id)
{
    $sql = "SELECT * FROM film WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':id' => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update($id, $judul, $genre, $durasi, $tahun_rilis)
{
    $sql = "UPDATE film
            SET judul = :judul,
                genre = :genre,
                durasi = :durasi,
                tahun_rilis = :tahun_rilis
            WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':judul' => $judul,
        ':genre' => $genre,
        ':durasi' => $durasi,
        ':tahun_rilis' => $tahun_rilis
    ]);
}

public function delete($id)
{
    $sql = "DELETE FROM film WHERE id = :id";
    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
}

}
