
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Mahasiswa</h2>

    <form action="index.php?page=mahasiswa&action=update" method="POST">
        <input type="hidden" name="id"
               value="<?= (int) $data['id'] ?>">

        <p>
            <label>NIM</label><br>
            <input type="text" name="nim"
                   value="<?= htmlspecialchars($data['nim']) ?>" required>
        </p>

        <p>
            <label>Nama</label><br>
            <input type="text" name="nama"
                   value="<?= htmlspecialchars($data['nama']) ?>" required>
        </p>

        <p>
            <label>Program Studi</label><br>
            <input type="text" name="prodi"
                   value="<?= htmlspecialchars($data['prodi']) ?>" required>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="index.php?page=mahasiswa">Kembali</a>
    </form>
</body>
</html>
