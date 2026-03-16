<h1>Invois</h1>

<?php
if (!isset($_SESSION['invois_data'])) {
    echo "<p>Tiada invois.</p>";
    exit();
}

$invois = $_SESSION['invois_data'];
?>

<p>Nama: <?= $invois['nama_pelanggan'] ?></p>
<p>No Invois: <?= $invois['no_invois'] ?></p>
<p>Jumlah: RM <?= number_format($invois['jumlah_besar'],2) ?></p>

<button onclick="window.print()">Cetak</button>