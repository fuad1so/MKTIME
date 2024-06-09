<?php
session_start();
require("Database_conection.php");
$user = $_SESSION['user'];
print_r($user);
