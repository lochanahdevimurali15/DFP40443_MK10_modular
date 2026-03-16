<h2 class="page-title">Invois</h2>

<?php
if(isset($_SESSION['invois'])):

$data = $_SESSION['invois'];
?>

<p>Nama: <?= $data['nama']; ?></p>

<table border="1" width="100%">
<tr>
<th>Produk</th>
<th>Saiz</th>
<th>Kuantiti</th>
<th>Jumlah</th>
</tr>

<?php foreach($data['items'] as $item): ?>
<tr>
<td><?= $item['nama']; ?></td>
<td><?= $item['saiz']; ?></td>
<td><?= $item['kuantiti']; ?></td>
<td>RM<?= number_format($item['jumlah'],2); ?></td>
</tr>
<?php endforeach; ?>

<tr>
<td colspan="3"><b>Jumlah Besar</b></td>
<td><b>RM<?= number_format($data['jumlah'],2); ?></b></td>
</tr>

</table>

<?php else: ?>
<p>Tiada invois.</p>
<?php endif; ?>