<h1 class="page-title">Invois</h1>

<?php
if (isset($_SESSION['invois'])) {

    $invois = $_SESSION['invois'];
?>

    <p><strong>Nama Produk:</strong> <?= $invois['nama']; ?></p>
    <p><strong>Saiz:</strong> <?= $invois['saiz']; ?></p>
    <p><strong>Kuantiti:</strong> <?= $invois['kuantiti']; ?></p>
    <p><strong>Harga Seunit:</strong> RM <?= number_format($invois['harga'], 2); ?></p>
    <p><strong>Jumlah:</strong> RM <?= number_format($invois['jumlah'], 2); ?></p>

<?php
} else {
    echo "<p>Tiada invois.</p>";
}
?>