<?php
session_start();

$menu = $_GET['menu'] ?? 'utama';

include 'header.php';
include 'navbar.php';

switch($menu){

    case 'tempah':
        include 'tempah.php';
        break;

    case 'invois':
        include 'invois.php';
        break;

    default:
        include 'utama.php';
}

include 'footer.php';
?>