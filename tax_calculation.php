<?php
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$password = isset($_SESSION['password']) ? $_SESSION['password'] : "";
if ((strlen($username) == 0) || ($username != $password)) {
    print "<script>location.href='login.php';</script>";
}

$tax_rate = 0.045;
$subtotal = $_SESSION['subtotal'];

$tax = $subtotal * $tax_rate;
$total = $subtotal + $tax;
$_SESSION['total'] = $total;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tax Calculation</title>
</head>
<body>
    <a href="logout.php"><button type="submit">Log Out</button></a>
    <h1>Tax Calculation</h1>
     
    <p>Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
    <p>Tax: $<?php echo number_format($tax, 2); ?></p>
    <p>Total: $<?php echo number_format($total, 2); ?></p>
    <form action="checkout.php" method="POST">
        <button type="submit">Checkout</button>
    </form>
    <a href="index.php"><button type="submit">Continue Shopping</button></a>
    
</body>
</html>