
<h2>Data Film</h2>

<?php if (isset($_GET['status'])): ?>
    <?php if ($_GET['status'] === 'create_success'): ?>
        <p>Data film berhasil ditambahkan.</p>
    <?php elseif ($_GET['status'] === 'create_error'): ?>
        <p>Data film gagal ditambahkan.</p>
    <?php elseif ($_GET['status'] === 'update_success'): ?>
        <p>Data film berhasil diperbarui.</p>
    <?php elseif ($_GET['status'] === 'update_error'): ?>
        <p>Data film gagal diperbarui.</p>
    <?php elseif ($_GET['status'] === 'delete_success'): ?>
        <p>Data film berhasil dihapus.</p>
    <?php elseif ($_GET['status'] === 'delete_error'): ?>
        <p>Data film gagal dihapus.</p>
    <?php endif; ?>
<?php endif; ?>

<p>Daftar film yang tersimpan di database.</p>

<a href="index.php?page=film&action=create">+ Tambah Film</a>

<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Judul Film</th>
            <th>Genre</th>
            <th>Durasi (Menit)</th>
            <th>Tahun Rilis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($films)): ?>
            <?php foreach ($films as $index => $film): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($film['judul']) ?></td>
                    <td><?= htmlspecialchars($film['genre']) ?></td>
                    <td><?= htmlspecialchars((string) $film['durasi']) ?></td>
                    <td><?= htmlspecialchars((string) $film['tahun_rilis']) ?></td>
                    <td>
                    <a href="index.php?page=film&action=edit&id=<?= (int) $film['id'] ?>">
                    Edit
                    </a>
                <form action="index.php?page=film&action=delete"
          method="POST"
          style="display:inline;"
          onsubmit="return confirm('Yakin ingin menghapus film ini?');">
        <input type="hidden" name="id"
               value="<?= (int) $film['id'] ?>">
        <button type="submit">Hapus</button>
    </form>
</td>
 </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
               <td colspan="6">Belum ada data film.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
