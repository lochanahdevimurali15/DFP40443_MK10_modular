<?php
session_start();

$menu = $_GET['menu'] ?? 'utama';

include 'includes/header.php';
include 'includes/navbar.php';

if ($menu === 'utama') {
    include 'pages/utama.php';
}
elseif ($menu === 'tempah') {
    include 'pages/tempah.php';
}
elseif ($menu === 'invois') {
    include 'pages/invois.php';
}
else {
    echo "<h2>Menu tidak ditemukan</h2>";
}

include 'includes/footer.php';
?>