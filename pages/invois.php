<?php
if (!isset($_SESSION['invois_data'])) {
    header("Location: index.php?menu=tempah");
    exit();
}

$invois = $_SESSION['invois_data'];
?>