<?php
include 'data/produk.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama_pelanggan = htmlspecialchars($_POST['nama_pelanggan']);
    $tempahan = $_POST['tempahan'] ?? [];

    $item_tempahan = [];
    $jumlah_besar = 0;

    foreach ($tempahan as $id => $saiz_list) {

        foreach ($produk as $p) {
            if ($p['id'] == $id) {

                foreach ($saiz_list as $saiz => $qty) {

                    if ($qty > 0) {
                        $harga = $p['harga'][$saiz];
                        $jumlah = $harga * $qty;

                        $item_tempahan[] = [
                            'nama'=>$p['nama'],
                            'saiz'=>$saiz,
                            'harga'=>$harga,
                            'kuantiti'=>$qty,
                            'jumlah'=>$jumlah
                        ];

                        $jumlah_besar += $jumlah;
                    }
                }
            }
        }
    }

    $_SESSION['invois'] = [
        'nama'=>$nama_pelanggan,
        'items'=>$item_tempahan,
        'jumlah'=>$jumlah_besar
    ];

    header("Location: index.php?menu=invois");
}
?>

<h2 class="page-title">Tempah Biskut</h2>

<form method="POST">

Nama: <input type="text" name="nama_pelanggan" required>

<br><br>

<?php foreach($produk as $p): ?>
    <div>
        <img src="gambar/<?= $p['gambar']; ?>" class="gallery-thumb">
        <h4><?= $p['nama']; ?></h4>

        <?php foreach($p['harga'] as $saiz=>$harga): ?>
            <?= $saiz ?> (RM<?= $harga ?>)
            <input type="number" name="tempahan[<?= $p['id']; ?>][<?= $saiz; ?>]" value="0" min="0">
            <br>
        <?php endforeach; ?>

    </div>
    <hr>
<?php endforeach; ?>

<button type="submit">Hantar</button>

</form>