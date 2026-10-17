
<h2>Data Film</h2>

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
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Belum ada data film.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
