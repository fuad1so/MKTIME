<?php
session_start();
require("Database_conection.php");
$quantity = 1;

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}



// Add item to the cart
if (isset($_GET['id'])) {
    $itemId = intval($_GET['id'] + 1);



    // Fetch the item details from the database
    $sqlCheck = "SELECT item_id, item_name, item_desc, item_img, item_price FROM items WHERE item_id = ?";
    $stmt = mysqli_prepare($link, $sqlCheck);
    mysqli_stmt_bind_param($stmt, "i", $itemId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $item_id, $item_name, $description, $image, $price);
    if (mysqli_stmt_fetch($stmt)) {
        // Add the item to the cart session
        $_SESSION['cart'][] = [
            'item_id' => $item_id,
            'item_name' => $item_name,
            'item_desc' => $description,
            'item_img' => $image,
            'item_price' => $price,

        ];
    }
    mysqli_stmt_close($stmt);
}

// Remove item from cart
if (isset($_GET['remove'])) {
    $removeId = intval($_GET['remove']);
    unset($_SESSION['cart'][$removeId]);
    // Reindex array to maintain proper indices
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

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
            <h1>Your Shopping Cart</h1>
            <?php if (empty($_SESSION['cart'])) : ?>
                <p>Your cart is empty.</p>
            <?php else : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Item Image</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Remove</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $index => $item) : ?>
                            <tr>
                                <td><img src="img/<?php echo $item['item_img']; ?>" alt="<?php echo $item['item_name']; ?>" width="100"></td>
                                <td><?php echo $item['item_name']; ?></td>
                                <td><?php echo $item['item_desc']; ?></td>
                                <td>£<?php echo $item['item_price']; ?></td>
                                <td> <?php echo $quantity ?></td>
                                <td><a href="cart.php?remove=<?php echo $index; ?>">Remove</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
<?php require("footer.php"); ?>

</html>