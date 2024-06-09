<?php
require("Database_conection.php");
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $user_id = $user['id'];
}

if (isset($_GET['total'])) {
    $total = intval($_GET['total']);
}

$q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (" . $user . "," . $total . ", NOW() ) ";
$r = mysqli_query($link, $q);

echo $user;
