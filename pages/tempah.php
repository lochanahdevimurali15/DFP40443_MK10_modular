<h1>Borang Tempahan</h1>

<form method="POST">

<?php foreach ($data as $produk): ?>

    <h3><?= $produk['nama'] ?></h3>

    <?php foreach ($produk['harga'] as $saiz => $harga): ?>

        <label><?= ucfirst(str_replace('_',' ',$saiz)) ?> (RM <?= $harga ?>)</label>
        <input type="number"
               name="tempahan[<?= $produk['id'] ?>][<?= $saiz ?>]"
               min="0"
               value="0"><br>

    <?php endforeach; ?>

<?php endforeach; ?>

<br>
Nama:
<input type="text" name="nama_pelanggan" required>

<br><br>
<button type="submit">Teruskan</button>

</form>