<?php
session_start();

require_once 'data/products.php';
require_once 'processess/functions.php';

$menu = getMenu();
$data = getProducts($productsData);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $menu === 'tempah') {
    handleOrderSubmission($data);
}

$pageTitle = getPageTitle($menu);

include 'includes/header.php';
include 'includes/nav.php';

if ($menu === 'utama') {
    include 'includes/utama.php';
} elseif ($menu === 'tempah') {
    include 'includes/tempah.php';
} elseif ($menu === 'invois') {
    include 'includes/invois.php';
} else {
    include 'includes/error.php';
}

include 'includes/footer.php';