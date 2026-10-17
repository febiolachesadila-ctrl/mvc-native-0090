
<h2>Edit Data Film</h2>

<form action="index.php?page=film&action=update" method="POST">
    <input type="hidden" name="id"
           value="<?= htmlspecialchars((string) $film['id']) ?>">

    <label>Judul Film</label><br>
    <input type="text" name="judul"
           value="<?= htmlspecialchars($film['judul']) ?>"
           required maxlength="150">
    <br><br>

    <label>Genre</label><br>
    <input type="text" name="genre"
           value="<?= htmlspecialchars($film['genre']) ?>"
           required maxlength="50">
    <br><br>

    <label>Durasi (menit)</label><br>
    <input type="number" name="durasi"
           value="<?= htmlspecialchars((string) $film['durasi']) ?>"
           required min="1">
    <br><br>

    <label>Tahun Rilis</label><br>
    <input type="number" name="tahun_rilis"
           value="<?= htmlspecialchars((string) $film['tahun_rilis']) ?>"
           required min="1888" max="2155">
    <br><br>

    <button type="submit">Simpan Perubahan</button>
    <a href="index.php?page=film">Kembali</a>
</form>
