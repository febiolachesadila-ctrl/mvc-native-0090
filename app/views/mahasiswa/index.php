
<h2>Data Mahasiswa</h2>

<?php
$status = $_GET['status'] ?? '';

if ($status === 'create_success') {
    echo '<p style="color: green;">Data mahasiswa berhasil ditambahkan!</p>';
} elseif ($status === 'create_error') {
    echo '<p style="color: red;">Data mahasiswa gagal ditambahkan!</p>';
}
?>

<a href="index.php?page=mahasiswa&action=create">+ Tambah Mahasiswa</a>

<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($mahasiswa)): ?>
            <?php $no = 1; ?>
            <?php foreach ($mahasiswa as $m): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($m['nim']); ?></td>
                    <td><?= htmlspecialchars($m['nama']); ?></td>
                    <td><?= htmlspecialchars($m['prodi']); ?></td>
                    <td>
                        <a href="index.php?page=mahasiswa&action=edit&id=<?= $m['id']; ?>">Edit</a>

                        <form action="index.php?page=mahasiswa&action=delete" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $m['id']; ?>">
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Belum ada data mahasiswa.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
