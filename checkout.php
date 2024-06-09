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


?>

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    margin-bottom: 20px;
  }

  .section {
    margin-bottom: 20px;
  }

  .section h2 {
    margin-bottom: 10px;
  }

  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  input[type="text"] {
    width: calc(100% - 10px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
  }

  button {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  button:hover {
    background-color: #218838;
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">
    <h1>Checkout</h1>
    <form action="checkout.php" method="post">
      <div class="section">
        <h2>Billing Information :<?php echo '£' . $total; ?> </h2>
        <label for="billing-name">Full Name</label>
        <input type="text" id="billing-name" name="billing-name" placeholder="<?php echo $user ?>;" required>

        <label for="billing-address">Address</label>
        <input type="text" id="billing-address" name="billing-address" required>

        <label for="billing-city">City</label>
        <input type="text" id="billing-city" name="billing-city" required>

        <label for="billing-zip">Zip Code</label>
        <input type="text" id="billing-zip" name="billing-zip" required>

        <label for="billing-country">Country</label>
        <input type="text" id="billing-country" name="billing-country" required>
      </div>

      <div class="section">
        <h2>Shipping Information</h2>
        <label for="shipping-name">Full Name</label>
        <input type="text" id="shipping-name" name="shipping-name" required>

        <label for="shipping-address">Address</label>
        <input type="text" id="shipping-address" name="shipping-address" required>

        <label for="shipping-city">City</label>
        <input type="text" id="shipping-city" name="shipping-city" required>

        <label for="shipping-zip">Zip Code</label>
        <input type="text" id="shipping-zip" name="shipping-zip" required>

        <label for="shipping-country">Country</label>
        <input type="text" id="shipping-country" name="shipping-country" required>
      </div>

      <div class="section">
        <h2>Payment Details</h2>
        <label for="card-name">Name on Card</label>
        <input type="text" id="card-name" name="card-name" required>

        <label for="card-number">Card Number</label>
        <input type="text" id="card-number" name="card-number" required>

        <label for="expiry-date">Expiry Date</label>
        <input type="text" id="expiry-date" name="expiry-date" required>

        <label for="cvv">CVV</label>
        <input type="text" id="cvv" name="cvv" required>
      </div>

      <button type="submit">Place Order</button>
    </form>
  </div>
</body>

</html>