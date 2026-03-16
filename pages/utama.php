<?php include 'data/produk.php'; ?>

<h1 class="page-title">Selamat Datang</h1>

<div class="gallery-row">
<?php foreach ($produk as $item): ?>
    <div style="text-align:center;">
        <img src="gambar/<?= htmlspecialchars($item['gambar']) ?>" 
             class="gallery-thumb"
             alt="<?= htmlspecialchars($item['nama']) ?>">

        <h3><?= htmlspecialchars($item['nama']) ?></h3>
    </div>
<?php endforeach; ?>
</div>