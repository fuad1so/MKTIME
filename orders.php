<?php
session_start();
require("Database_conection.php");
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userId = $_SESSION['user_id'];
}
$orderNum =1 ;

$sqlCheck = "SELECT user_name, total, order_date FROM orders WHERE user_id = $userId";

$r = mysqli_query($link, $sqlCheck);

?>
<!DOCTYPE html>
<html>
<?php require("head.php") ?>
<title>Shopping Cart</title>
<link rel="stylesheet" type="text/css" href="stylesCart.css">
</head>

<body>
    <div class="banner_bg_main">
        <!-- header section start -->
        <?php require("header_section.php") ?>

        <div class="containerC">
            <h1>Your orders</h1>
            <?php if (empty($r)) : ?>
            <p> You don't have any order </p>
            <?php else : ?>
            <table>
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Order Date</th>
                        <th>Total Bill</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($r)) : ?>
                    <tr>
                        <td><?php echo $orderNum ?></td>
                        <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                        <td> £<?php echo htmlspecialchars($row['total']); ?></td>
                    </tr>
                    <?php $orderNum++ ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</body>
<?php require("footer.php"); ?>

</html>