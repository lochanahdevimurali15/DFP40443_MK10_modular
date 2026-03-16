<h1>Selamat Datang</h1>

<div>
<?php foreach ($data as $produk): ?>
    <img src="gambar/<?= $produk['gambar'] ?>" width="150">
<?php endforeach; ?>
</div>

<p>Sila ke menu Tempah untuk membuat pesanan.</p>