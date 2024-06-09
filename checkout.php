<?php
session_start();
require("Database_conection.php");
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $userId = $_SESSION['user_id'];
}

if (isset($_GET['total'])) {
  $total = intval($_GET['total']);
}

$q = "INSERT INTO orders (user_id, user_name, total, order_date) VALUES ('$userId', '$user', '$total', NOW())";
$r = mysqli_query($link, $q);

echo $userId . $user . $total;
?>