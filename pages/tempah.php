<?php
include 'data/produk.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama_pelanggan = isset($_POST['nama_pelanggan'])
        ? htmlspecialchars(trim($_POST['nama_pelanggan']))
        : "Pelanggan";

    $tempahan_input = isset($_POST['tempahan']) ? $_POST['tempahan'] : [];

    $item_tempahan = [];
    $jumlah_besar = 0;

    foreach ($tempahan_input as $produk_id => $saiz_list) {

        foreach ($data as $p) {
            if ($p['id'] == $produk_id) {

                foreach ($saiz_list as $saiz => $kuantiti) {

                    $kuantiti = (int)$kuantiti;

                    if ($kuantiti > 0 && isset($p['harga'][$saiz])) {

                        $harga_seunit = $p['harga'][$saiz];
                        $jumlah_harga = $kuantiti * $harga_seunit;

                        $item_tempahan[] = [
                            'nama_produk' => $p['nama'],
                            'saiz' => ucwords(str_replace('_', ' ', $saiz)),
                            'harga_seunit' => $harga_seunit,
                            'kuantiti' => $kuantiti,
                            'jumlah_harga' => $jumlah_harga
                        ];

                        $jumlah_besar += $jumlah_harga;
                    }
                }
            }
        }
    }

    if ($jumlah_besar == 0) {
        echo "<script>
                alert('Sila pilih sekurang-kurangnya satu jenis biskut.');
                window.location.href='index.php?menu=tempah';
              </script>";
        exit();
    }

    $_SESSION['invois_data'] = [
        'no_invois' => 'INV-' . rand(10000, 99999),
        'nama_pelanggan' => $nama_pelanggan,
        'tarikh' => date("d/m/Y"),
        'items' => $item_tempahan,
        'jumlah_besar' => $jumlah_besar
    ];

    echo "<script>
            alert('Tempahan Berjaya!');
            window.location.href='index.php?menu=invois';
          </script>";
    exit();
}
?>

<h1 class="page-title">Halaman Tempah</h1>

<form method="POST">

    <label>Nama Pelanggan:</label>
    <input type="text" name="nama_pelanggan" required>

    <br><br>

    <?php foreach ($data as $produk): ?>

        <div class="produk-item">
            <img src="gambar/<?= $produk['gambar']; ?>" width="120">

            <h3><?= $produk['nama']; ?></h3>

            <?php foreach ($produk['harga'] as $saiz => $harga): ?>
                <label>
                    <?= ucwords(str_replace('_', ' ', $saiz)); ?>
                    (RM <?= number_format($harga,2); ?>)
                </label>

                <input type="number"
                       name="tempahan[<?= $produk['id']; ?>][<?= $saiz; ?>]"
                       value="0"
                       min="0">
                <br>
            <?php endforeach; ?>

        </div>
        <hr>

    <?php endforeach; ?>

    <button type="submit">Hantar Tempahan</button>

</form>