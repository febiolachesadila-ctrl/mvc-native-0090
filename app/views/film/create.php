
<h2>Tambah Data Film</h2>

<form action="index.php?page=film&action=store" method="POST">
    <label>Judul Film</label><br>
    <input type="text" name="judul" required maxlength="150">
    <br><br>

    <label>Genre</label><br>
    <input type="text" name="genre" required maxlength="50">
    <br><br>

    <label>Durasi (menit)</label><br>
    <input type="number" name="durasi" required min="1">
    <br><br>

    <label>Tahun Rilis</label><br>
    <input type="number" name="tahun_rilis" required min="1888" max="2155">
    <br><br>

    <button type="submit">Simpan Film</button>
    <a href="index.php?page=film">Kembali</a>
</form>
