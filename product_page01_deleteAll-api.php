<?php
require __DIR__. '/parts/__connect_db.php';
    foreach($_POST['checkbox'] as $value){
    $pdo -> query("DELETE  FROM `product_item` WHERE sid=$value");
}

$come_from = $_SERVER['HTTP_REFERER'] ?? 'product_page01.php';
header("Location: $come_from");
?>

