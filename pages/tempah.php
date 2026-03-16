<?php
// Start session already done in index.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $produk_id = $_POST['produk_id'];
    $saiz = $_POST['saiz'];
    $kuantiti = $_POST['kuantiti'];

    // Cari produk
    foreach ($data as $item) {
        if ($item['id'] == $produk_id) {

            $nama = $item['nama'];
            $harga = $item['harga'][$saiz];
            $jumlah = $harga * $kuantiti;

            // Simpan dalam session
            $_SESSION['invois'] = [
                'nama' => $nama,
                'saiz' => $saiz,
                'kuantiti' => $kuantiti,
                'harga' => $harga,
                'jumlah' => $jumlah
            ];

            header("Location: index.php?menu=invois");
            exit();
        }
    }
}
?>

<h1 class="page-title">Tempahan</h1>

<form method="POST">

    <label>Pilih Produk:</label><br>
    <select name="produk_id" required>
        <?php foreach ($data as $item): ?>
            <option value="<?= $item['id']; ?>">
                <?= $item['nama']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Saiz:</label><br>
    <select name="saiz" required>
        <option value="pek_mini">Pek Mini</option>
        <option value="kecil">Kecil</option>
        <option value="besar">Besar</option>
    </select>
    <br><br>

    <label>Kuantiti:</label><br>
    <input type="number" name="kuantiti" min="1" required>
    <br><br>

    <button type="submit">Tempah</button>

</form>