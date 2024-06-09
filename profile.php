<?php
session_start();
require("Database_conection.php");
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    print_r("welcome  " . $user);
} else {
    header("Location: register&login.php");
}