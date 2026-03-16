<?php
session_start();

$menu = $_GET['menu'] ?? 'utama';

include 'data/produk.php';
include 'includes/header.php';
include 'includes/navbar.php';

switch ($menu) {

    case 'tempah':
        include 'pages/tempah.php';
        break;

    case 'invois':
        include 'pages/invois.php';
        break;

    default:
        include 'pages/utama.php';
}

include 'includes/footer.php';
?>