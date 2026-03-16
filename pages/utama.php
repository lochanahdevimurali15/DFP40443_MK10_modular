<?php
include 'data/produk.php';
?>

<h1 class="page-title">Halaman Utama</h1>

<div class="gallery-row">
    <?php foreach ($produk as $item): ?>
        <img src="gambar/<?php echo $item['gambar']; ?>" 
             alt="<?php echo $item['nama']; ?>" 
             class="gallery-thumb">
    <?php endforeach; ?>
</div>