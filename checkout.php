<?php
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$password = isset($_SESSION['password']) ? $_SESSION['password'] : "";
if ((strlen($username) == 0) || ($username != $password)) {
    print "<script>location.href='login.php';</script>";
}

include('validate_card.php');

$total = $_SESSION['total'];




?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <a href="logout.php"><button type="submit">Log Out</button></a>
    <h1>Checkout</h1>
    <p>Total: $<?php echo number_format($total, 2); ?></p>
    <form action="payment.php" method="POST">
        
        <label for="card_number">Credit Card Number:</label>
        <input type="text" id="card_number" name="card_number" required>
        <button type="submit">Submit Payment</button>
    </form>
</body>
</html>
