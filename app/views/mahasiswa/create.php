
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Tambah Mahasiswa</h2>

    <form action="index.php?page=mahasiswa&action=store" method="POST">
        <p>
            <label>NIM</label><br>
            <input type="text" name="nim" required>
        </p>

        <p>
            <label>Nama</label><br>
            <input type="text" name="nama" required>
        </p>

        <p>
            <label>Program Studi</label><br>
            <input type="text" name="prodi" required>
        </p>

        <button type="submit">Simpan</button>
        <a href="index.php?page=mahasiswa">Kembali</a>
    </form>
</body>
</html>
