<h1 class="page-title">Selamat Datang</h1>

<div class="gallery-row">

<?php foreach ($data as $produk): ?>

    <div class="gallery-item">
        <img src="gambar/<?= $produk['gambar']; ?>" 
             alt="<?= $produk['nama']; ?>" 
             class="gallery-thumb">
    </div>

<?php endforeach; ?>

</div>